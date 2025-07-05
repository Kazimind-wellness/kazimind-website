const calendar = document.getElementById("calendar");
const monthYear = document.getElementById("month-year");
const prevBtn = document.getElementById("prev");
const nextBtn = document.getElementById("next");
const modal = document.getElementById("event-modal");
const tooltip = document.getElementById("event-tooltip");

let currentDate = new Date();
let selectedDate = null;

// let events = JSON.parse(localStorage.getItem("events")) || {};

let events = {};
fetch('get_calendar_events.php')
  .then(res => res.json())
  .then(data => {
    events = data;
    renderCalendar();
  })
  .catch(err => console.error('Error loading events:', err));

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

  const prevLastDate = new Date(year, month, 0).getDate();

  // Previous month days
  for (let i = firstDay - 1; i >= 0; i--) {
    const day = document.createElement("div");
    day.className = "day other-month";
    day.textContent = prevLastDate - i;
    calendar.appendChild(day);
  }

  // Current month days
  for (let i = 1; i <= lastDate; i++) {
    const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
    const day = document.createElement("div");
    day.className = "day";
    day.textContent = i;

    // Show event if available
    if (events[dateStr]) {

      // const eventDiv = document.createElement("div");
      // eventDiv.className = "event";
      // eventDiv.textContent = events[dateStr].title;
      // day.appendChild(eventDiv);

      // Show tooltip on hover
      
      day.addEventListener("mouseenter", (e) => {
        tooltip.textContent = events[dateStr].title;
        tooltip.style.display = 'block';
        tooltip.style.alignItems = 'space-evenly';
      });

      day.addEventListener("mousemove", (e) => {
        tooltip.style.left = `${e.pageX + 10}px`;
        tooltip.style.top = `${e.pageY + 10}px`;
      });

      day.addEventListener("mouseleave", () => {
        tooltip.style.display = 'none';
      });

      day.addEventListener("click", () => {
        const rect = day.getBoundingClientRect();
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
        
        if (tooltip.style.display === 'block') {
          // Tooltip is visible, so hide it
          tooltip.style.display = 'none';
        } else {
          // Tooltip is hidden, so show it
          tooltip.textContent = events[dateStr].title;
          tooltip.style.display = 'block';
          tooltip.style.position = 'absolute';
          tooltip.style.top = rect.top + scrollTop + day.offsetHeight + 'px';
          tooltip.style.left = rect.left + scrollLeft + 'px';
          tooltip.style.alignItems = 'space-evenly';
        }
      });

    if (events[dateStr].imageUrl) {
                day.classList.add("with-image");
                day.style.backgroundImage = `url(${events[dateStr].imageUrl})`;
                day.style.backgroundSize = 'cover';
                day.style.backgroundPosition = 'center';
                day.style.backgroundRepeat = 'no-repeat';
                day.style.color = 'red';
                day.style.fontSize = '21px';
    }
    }

    calendar.appendChild(day);
  }
}


function saveEventWithImage() {
    if (selectedDate && eventTitleInput.value.trim()) {
        const file = eventImageInput.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                events[selectedDate] = {
                    title: eventTitleInput.value.trim(),
                    imageUrl: e.target.result
                };
                localStorage.setItem("events", JSON.stringify(events));
                modal.classList.add("hidden");
                renderCalendar();
                eventImageInput.value = ""; // Clear the file input
            };
            reader.readAsDataURL(file);
        } else {
            events[selectedDate] = {
                title: eventTitleInput.value.trim(),
                imageUrl: events[selectedDate]?.imageUrl || ""
            };
            localStorage.setItem("events", JSON.stringify(events));
            modal.classList.add("hidden");
            renderCalendar();
        }
    }
}


// Buttons
prevBtn.addEventListener("click", () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  renderCalendar();
});

nextBtn.addEventListener("click", () => {
  currentDate.setMonth(currentDate.getMonth() + 1);
  renderCalendar();
});


renderCalendar();

        