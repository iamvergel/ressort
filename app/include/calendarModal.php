<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../animated-calendar-event-gc/dist/calendar-gc.min.css" />
    <style>
        #calendar {
            width: 100%;
            height: auto;
        }

        .AM {
            background-color: blue !important;
            color: white;
        }

        .PM {
            background-color: red !important;
        }

        .modal-dialog.custom-width {
            max-width: 90%;
        }

        /* Disable interaction with calendar dates */
        #calendar .calendar-cell {
            pointer-events: none;
            /* Disable clicks and other interactions */
            background-color: #f0f0f0;
            /* Change background to indicate disabled state */
            color: #ccc;
            /* Change text color to indicate disabled state */
            cursor: not-allowed;
            /* Change cursor to indicate disabled state */
        }

        /* Make sure that navigation buttons are not affected */
        #calendar .calendar-nav-button {
            pointer-events: auto;
            /* Ensure navigation buttons are clickable */
        }
    </style>
</head>

<body>

    <!-- Main Modal -->
    <div class="modal fade" id="apointmentCalendar" tabindex="-1" aria-labelledby="apointmentCalendarLabel"
        aria-hidden="true">
        <div class="modal-dialog custom-width mt-3">
            <div class="modal-content">
                <div class="modal-header">
                    <p>Explore the available dates to select your preferred appointment slot.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="../animated-calendar-event-gc/dist/calendar-gc.min.js"></script>

    <script>
        let calendarInstance;

        // Function to initialize the calendar
        function initializeCalendar(events) {
            if (calendarInstance) {
                calendarInstance.destroy(); // Replace with the actual method if available
            }

            // Initialize or reinitialize the calendar with new events
            calendarInstance = $("#calendar").calendarGC({
                events: events,
                onclickDate: function (e, data) {
                    // Open modal and pass data
                    openModal(data);
                },
                onclick: function (e, data) {
                    // Open modal and pass data
                    openModal(data);
                }
            });

            // Disable interaction with dates
            disableCalendarInteractions();
        }

        function disableCalendarInteractions() {
            // Apply CSS to disable interaction with calendar cells
            $('#calendar .calendar-cell').css({
                'pointer-events': 'none',
                'background-color': '#f0f0f0',
                'color': '#ccc',
                'cursor': 'not-allowed'
            });
        }

        function formatDateToYYYYMMDD(date) {
            const d = new Date(date); // Convert to Date object if it's not already
            const year = d.getFullYear();
            const month = String(d.getMonth() + 1).padStart(2, '0'); // Months are 0-based
            const day = String(d.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        function openModal(data) {
            // Populate modal content with event data
            document.getElementById('session').value = data.getSession;
            document.getElementById('id').value = data.getID;
            const formattedDate = formatDateToYYYYMMDD(data.date);

            // Set the formatted date as the value of the input field
            document.getElementById('date').value = formattedDate;

            // Show eventModal
            const eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
            eventModal.show();
        }

        function closeModal() {
            const eventModal = bootstrap.Modal.getInstance(document.getElementById('eventModal'));
            eventModal.hide();
        }

        // Fetch data from the API
        // Fetch data from the API
$.ajax({
    url: 'http://localhost:8080/app/controllers/timeSlotContoller.php',
    method: 'GET',
    dataType: 'json',
    success: function (response) {
        console.log('API Response:', response); // Log the whole response for debugging

        if (response.data && Array.isArray(response.data)) {
            // Process and map the data to the event format
            const events = response.data.map(item => ({
                date: new Date(item.date),
                eventName: `${item.slots} ${item.session}`,
                getSession: item.session === "AM" ? 'AM' : 'PM',
                getID: item.id,
                dateColor: item.slots > 0 ? 'green' : 'red'
            }));

            // Initialize or reinitialize the calendar with new events
            initializeCalendar(events);
        } else {
            console.error('Unexpected response format:', response);
        }
    },
    error: function (xhr, status, error) {
        console.error('Error fetching data:', status, error);
        $('#response').text('Error: ' + error);
    }
});

    </script>
</body>

</html>