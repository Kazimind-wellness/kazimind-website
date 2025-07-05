// document.addEventListener('DOMContentLoaded', function () {
//     // Load events from localStorage or initialize empty object
//     let events = JSON.parse(localStorage.getItem("events")) || {};
//     const eventsContainer = document.getElementById("admin-events-container");
//     const messageDiv = document.getElementById("admin-message");
    
//     // Function to display messages
//     function showMessage(message, isError = false) {
//         messageDiv.textContent = message;
//         messageDiv.style.color = isError ? 'red' : 'green';
//         setTimeout(() => messageDiv.textContent = '', 3000);
//     }
    
//     // Function to render all events in admin panel
//     function renderAdminEvents() {
//         eventsContainer.innerHTML = '';
        
//         if (Object.keys(events).length === 0) {
//             eventsContainer.innerHTML = '<p>No events found</p>';
//             return;
//         }
        
//         // Sort events by date
//         const sortedDates = Object.keys(events).sort();
        
//         sortedDates.forEach(date => {
//             const eventDiv = document.createElement('div');
//             eventDiv.className = 'admin-event';
            
//             const eventDate = new Date(date);
//             const formattedDate = eventDate.toLocaleDateString('en-US', {
//                 year: 'numeric',
//                 month: 'long',
//                 day: 'numeric',
//                 weekday: 'long'
//             });
            
//             eventDiv.innerHTML = `
//                 <div class="event-info">
//                     <strong>${formattedDate}</strong>
//                     <p>${events[date].title}</p>
//                 </div>
//                 ${events[date].imageUrl ? 
//                     `<div class="event-image-preview" style="background-image: url(${events[date].imageUrl})"></div>` : ''}
//                 <button class="delete-event" data-date="${date}">Delete</button>
//             `;
            
//             eventsContainer.appendChild(eventDiv);
//         });
        
//         // Add delete event listeners
//         document.querySelectorAll('.delete-event').forEach(button => {
//             button.addEventListener('click', function() {
//                 const date = this.getAttribute('data-date');
//                 delete events[date];
//                 localStorage.setItem("events", JSON.stringify(events));
//                 showMessage('Event deleted successfully');
//                 renderAdminEvents();
//             });
//         });
//     }
    
//     // Save event handler
//     document.getElementById('admin-save-event').addEventListener('click', function() {
//         const dateInput = document.getElementById('admin-event-date');
//         const titleInput = document.getElementById('admin-event-title');
//         const fileInput = document.getElementById('admin-event-image');
        
//         const date = dateInput.value;
//         const title = titleInput.value.trim();
//         const file = fileInput.files[0];
        
//         // Validation
//         if (!date || !title) {
//             showMessage('Please select a date and enter a title', true);
//             return;
//         }
        
//         // Check if date is valid
//         if (isNaN(new Date(date).getTime())) {
//             showMessage('Please select a valid date', true);
//             return;
//         }
        
//         // Format date to YYYY-MM-DD for consistency
//         const formattedDate = `${new Date(date).getFullYear()}-${String(new Date(date).getMonth()
//                              + 1).padStart(2, '0')}-${String(new Date(date).getDate()).padStart(2, '0')}`;

        
//         if (file) {
//             const reader = new FileReader();
//             reader.onload = function(e) {
//                 events[formattedDate] = {
//                     title: title,
//                     imageUrl: e.target.result
//                 };

//                 try {
//                     localStorage.setItem("events", JSON.stringify(events));
//                 } catch (e) {
//                     showMessage('Error saving event: ' + e.message, true);
//                     console.error('LocalStorage error:', e);
//                     return;
//                 }

//                 showMessage('Event added successfully with image');
//                 renderAdminEvents();
//                 // Clear form
//                 titleInput.value = '';
//                 fileInput.value = '';
//             };
//             reader.onerror = function() {
//                 showMessage('Error reading image file', true);
//             };
//             reader.readAsDataURL(file);
//         } else {
//             // Save without image (or keep existing image if editing)
//             events[formattedDate] = {
//                 title: title,
//                 imageUrl: events[formattedDate]?.imageUrl || ""
//             };
//             localStorage.setItem("events", JSON.stringify(events));
//             showMessage('Event added successfully');
//             renderAdminEvents();
//             // Clear form
//             titleInput.value = '';
//         }
//     });
    
//     // Initial render
//     renderAdminEvents();
// });


document.addEventListener('DOMContentLoaded', function () {
    let events = {};
    const eventsContainer = document.getElementById("admin-events-container");
    const messageDiv = document.getElementById("admin-message");

    function showMessage(message, isError = false) {
        messageDiv.textContent = message;
        messageDiv.style.color = isError ? 'red' : 'green';
        setTimeout(() => messageDiv.textContent = '', 3000);
    }

    function loadEvents() {
        fetch('get_events.php')
            .then(res => res.json())
            .then(data => {events = data; renderAdminEvents();});
    }

    
    function renderAdminEvents() {
        eventsContainer.innerHTML = '';

        if (Object.keys(events).length === 0) {
            eventsContainer.innerHTML = '<p>No events found</p>';
            return;
        }

        const sortedDates = Object.keys(events).sort();

        sortedDates.forEach(date => {
            const eventDiv = document.createElement('div');
            eventDiv.className = 'admin-event';

            const eventDate = new Date(date);
            const formattedDate = eventDate.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                weekday: 'long'
            });

            eventDiv.innerHTML = `
                <div class="event-info">
                    <strong>${formattedDate}</strong>
                    <p>${events[date].title}</p>
                </div>
                ${events[date].imageUrl ? 
                    `<div class="event-image-preview" style="background-image: url(${events[date].imageUrl})"></div>` : ''}
                <button class="delete-event" data-date="${date}">Delete</button>
            `;

            eventsContainer.appendChild(eventDiv);
        });


        document.querySelectorAll('.delete-event').forEach(button => {
            button.addEventListener('click', function () {
                const date = this.getAttribute('data-date');
                fetch('delete_event.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `event_date=${encodeURIComponent(date)}`
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            showMessage('Event deleted successfully');
                            loadEvents();
                        } else {
                            showMessage('Failed to delete event', true);
                        }
                    });
            });
        });
    }

    
    document.getElementById('event-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        fetch('save_event.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showMessage('Event saved successfully');
                this.reset();
                loadEvents();
            } else {
                showMessage('Failed to save event', true);
            }
        })
        .catch(err => {
            console.error('Error:', err);
            showMessage('An error occurred', true);
        });
    });

    loadEvents();
});