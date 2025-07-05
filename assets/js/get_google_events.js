document.addEventListener("DOMContentLoaded", () => {
  const calendar = document.getElementById("calendar");
  const monthYear = document.getElementById("month-year");
  const prevBtn = document.getElementById("prev");
  const nextBtn = document.getElementById("next");
  const tooltip = document.getElementById("event-tooltip");

  let currentDate = new Date();
  let calendarId = "";
  let apiKey = "";

  // Step 1: Load API key and Calendar ID from PHP file
  fetch("env-config.php")
    .then(res => res.json())
    .then(env => {
      calendarId = encodeURIComponent(env.CALENDAR_ID);
      apiKey = env.API_KEY;

      // Start rendering once credentials are loaded
      renderCalendar();
    })
    .catch(err => {
      console.error("Failed to load API key and Calendar ID", err);
    });

  // Step 2: Fetch Google Calendar events
  function fetchEvents(startDate, endDate) {
    const url = `https://www.googleapis.com/calendar/v3/calendars/${calendarId}/events?key=${apiKey}&timeMin=${startDate.toISOString()}&timeMax=${endDate.toISOString()}&singleEvents=true&orderBy=startTime`;

    return fetch(url)
      .then(res => res.json())
      .then(data => data.items || [])
      .catch(err => {
        console.error("Failed to fetch events", err);
        return [];
      });
  }

  // Step 3: Render calendar grid
  function renderCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();

    monthYear.textContent = currentDate.toLocaleString("default", {
      month: "long",
      year: "numeric"
    });

    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();

    calendar.innerHTML = "";

    const start = new Date(year, month, 1);
    const end = new Date(year, month + 1, 0);

    fetchEvents(start, end).then(events => {
      const eventMap = {};
      events.forEach(event => {
        const dateStr = new Date(event.start.date || event.start.dateTime).toISOString().split("T")[0];
        eventMap[dateStr] = event;
      });

      // Empty cells for alignment
      for (let i = 0; i < firstDay; i++) {
        const empty = document.createElement("div");
        empty.className = "day empty";
        calendar.appendChild(empty);
      }

      // Populate days
      for (let i = 1; i <= lastDate; i++) {
        const day = document.createElement("div");
        const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
        day.className = "day";
        day.textContent = i;

        if (eventMap[dateStr]) {
          const evt = eventMap[dateStr];
          day.classList.add("event-day");
          day.title = evt.summary;

          day.addEventListener("click", () => {
            window.location.href = `event-details.php?date=${dateStr}`;
          });

          let imageUrl = "images/AP.jpg";
          if (evt.description) {
            const lines = evt.description.split(/\r?\n/);
            const imageLine = lines.find(line => /^\s*image\s*:\s*https?:\/\/\S+/i.test(line));
            if (imageLine) {
              const match = imageLine.match(/^\s*image\s*:\s*(https?:\/\/\S+)/i);
              if (match && match[1]) {
                imageUrl = match[1].trim();
              }
            }
          }

          day.style.backgroundImage = `url(${imageUrl})`;
          day.style.backgroundSize = "cover";
          day.style.backgroundPosition = "center";
          day.style.color = "red";
          day.style.border = "1px solid #ccc";
        }

        calendar.appendChild(day);
      }
    });
  }

  // Prev and next button functionality
  prevBtn.addEventListener("click", () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar();
  });

  nextBtn.addEventListener("click", () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar();
  });

  // Tooltip functionality
  calendar.addEventListener("mouseover", (e) => {
    if (e.target.classList.contains("event-day")) {
      tooltip.textContent = e.target.title;
      tooltip.style.display = "block";
    }
  });

  calendar.addEventListener("mousemove", (e) => {
    tooltip.style.left = `${e.pageX + 10}px`;
    tooltip.style.top = `${e.pageY + 10}px`;
  });

  calendar.addEventListener("mouseout", () => {
    tooltip.style.display = "none";
  });
});
