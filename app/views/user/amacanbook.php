<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: /signin'); // Redirect to the login page if not logged in
    exit();
}

require_once(dirname(__DIR__, 3) . '/configuration/dbConnection.php');

// Get current month and year, handle next and previous month logic
$month = isset($_GET['month']) ? (int) $_GET['month'] : date('m');
$year = isset($_GET['year']) ? (int) $_GET['year'] : date('Y');

// Fetch event data from the amacan table
$stmt = $pdo->query("SELECT date, session, slots FROM availableslots WHERE name IN ('Amacan', '22 Hours')");
$eventsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

$events = [];
// Initialize all days in the month
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

for ($day = 1; $day <= $daysInMonth; $day++) {
    $dateString = sprintf('%04d-%02d-%02d', $year, $month, $day);
    $events[$dateString] = []; // Default to an empty array for each day
}

// Update availability based on actual data from the database
foreach ($eventsData as $event) {
    $events[$event['date']][] = [
        'session' => $event['session'],
        'slots' => $event['slots']
    ];
}

$firstDayOfMonth = date('w', strtotime("$year-$month-01"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Reyes Resort</title>
    <link rel="shortcut icon" href="public/assets/images/logo/villaresortlogo.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../public/assets/css/booknow.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        .row {
            display: flex;
        }

        .col {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100px;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .col:hover {
            background-color: #011F37ff;
            color: #fff;
        }

        .monsun {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100px;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .monsun:hover {
            background-color: #fff;
            color: #011F37ff;
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            padding-inline: 0rem;
        }

        .select-red {
            border: 1px solid red;
        }

        .unavailable {
            color: #011F37ff;
            cursor: not-allowed;
        }

        label {
            font-size: 15px;
            padding-block: 1rem;
            color: #011F37ff;
            font-weight: 500;
        }

        .form-control {
            border: solid 1px #011f3785;
            border-radius: 0;
            font-size: 13px;
            padding-block: 0.7rem;
        }

        .btn {
            letter-spacing: 2px;
            background-color: #011F37ff;
            color: #fff;
            font-size: 14px;
            padding-block: 0.7rem;
        }

        .btn:hover {
            background-color: #003866;
            color: #fff;
        }

        .payment-info {
            background-color: #011F37ff;
            color: #fff;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include 'app/views/user/include/header.php'; ?>

    <div class="header p-5 bg-dark"></div>

    <div class="container-fluid py-5 mb-5 bg-light">
        <div class="payment-info mt-5 p-5 mb-5 rounded-4 shadow-lg">
            <h4 class="fw-semibold text-uppercase">Payment Information</h4>
            <p>
                <strong>Metrobank:</strong> Villa Reyes Family
                Private Resort 000-0-00000000-0<br>
                <strong>Philippine Business Bank:</strong> Villa Reyes Family
                Private Resort 000-0-0000000-0
            </p>
            <ul>
                <li class="my-2">Once deposited, send us a screenshot/photo of the deposit/reservation together
                    with your
                    reservation details.</li>
                <li>Deposits are non-refundable and non-transferable.</li>
                <li class="my-2">Kindly bring/present the original copy on the day of the reservation.</li>
            </ul>
            <h4 class="fw-semibold text-uppercase">Contact Us Through</h4>
            <p>
                <strong>Phone:</strong> 00000000000, 0000000000<br>
                <strong>Email:</strong> <a href="villareyes1986@gmail.com">villareyes1986@gmail.com</a>
            </p>
        </div>
        <div class="row">
            <div class="col-lg-7 col-12 px-3">
                <div class="d-flex d-flex justify-content-center">
                    <button id="prevBtn" class="rounded-circle border-0 fs-1 mx-5" style="color: #011F37ff;"
                        onclick="changeDate('prev')"><i class="bi bi-arrow-left-circle-fill"></i></button>
                    <h2 id="monthYear" class="text-center mt-2 fw-semibold" style="color: #011F37ff;"></h2>
                    <button id="nextBtn" class="rounded-circle border-0 fs-1 mx-5" style="color: #011F37ff;"
                        onclick="changeDate('next')"><i class="bi bi-arrow-right-circle-fill"></i></button>
                </div>
                <div class="calendarbg p-4 bg-light shadow-lg rounded-4">
                    <div class="row text-center" style="color: #011F37ff;">
                        <div class="col bg-light fw-semibold fs-5 monsun">Sun</div>
                        <div class="col bg-light fw-semibold fs-5 monsun">Mon</div>
                        <div class="col bg-light fw-semibold fs-5 monsun">Tue</div>
                        <div class="col bg-light fw-semibold fs-5 monsun">Wed</div>
                        <div class="col bg-light fw-semibold fs-5 monsun">Thu</div>
                        <div class="col bg-light fw-semibold fs-5 monsun">Fri</div>
                        <div class="col bg-light fw-semibold fs-5 monsun">Sat</div>
                    </div>
                    <div class="calendar" id="calendar"></div>
                </div>

                <div class="p-4 mt-4 rounded-3 shadow-lg" style="background-color: #011F37ff">
                    <div class="p-2 rounded-3 shadow-lg" style="background-color: #011F37ff"></div>
                </div>
            </div>

            <div class="col-lg-5 col-12 p-3 py-5">
                <form action="/amacanbooking" method="post" id="bookingForm" class="bg-light shadow p-5 rounded-4">
                    <p class="fw-semibold mb-3">Fill up this form and we’ll get in touch with you as soon as possible.
                        <br /><br /><small class="fw-normal">(Please choose a date from the calendar for your
                            session.)</small>
                    </p>
                    <div class="form-group">
                        <label for="preferred_date"><span class="text-danger">*</span>Preferred Date:</label>
                        <input type="date" class="form-control" name="preferred_date" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="room"><span class="text-danger">*</span>Room :</label>
                        <input type="text" class="form-control" name="room" id="roomInput" required readonly>
                    </div>

                    <div class="form-group">
                        <label for="session"><span class="text-danger">*</span>Session : <small class="fw-normal"
                                style="font-size: 12px;">(Select Session)</small></label><br />
                        <select name="session" class="form-control" id="sessionSelect" required>
                            <option value=""></option>
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                            <option value="22 Hours">22 Hours</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="full_name"><span class="text-danger">*</span>Full Name:</label>
                        <input type="text" class="form-control" name="full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><span class="text-danger">*</span>Email: <small class="fw-normal"
                                style="font-size: 12px;">(Please ensure that your email address is formatted correctly
                                with @gmail.com.)</small></label>
                        <input type="email" class="form-control" name="email" required
                            pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$" title="Please enter a valid Gmail address.">
                    </div>
                    <div class="form-group">
                        <label for="contact_number"><span class="text-danger">*</span>Contact Number: <br /><small
                                class="fw-normal" style="font-size: 12px;">(Please ensure the phone numbers begin with
                                '09' and consist of 11 digits in total.)</small></label>
                        <input type="text" class="form-control" name="contact_number" required pattern="^09\d{9}$"
                            title="Please enter a valid 11-digit number starting with 09.">
                    </div>
                    <div class="form-group">
                        <label for="quantity"><span class="text-danger">*</span>Quantity: <br /><small class="fw-normal"
                                style="font-size: 12px;">(The maximum capacity is 10 people for AM and PM. If the
                                session is 22 hours, the maximum capacity is 20 people.)</small></label>
                        <input type="number" class="form-control" name="quantity" id="quantity" required min="1"
                            max="10">
                    </div>
                    <button type="submit" id="submitButton" name="button"
                        class="btn mt-5 mb-5 w-100 rounded-1 text-uppercase fw-semibold">Reserve Now</button>
                </form>

            </div>
        </div>
    </div>

    <?php include 'app/views/contact.php'; ?>
    <?php include 'app/include/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changeDate(action) {
            let month = <?= $month ?>;
            let year = <?= $year ?>;

            if (action === 'next') {
                month++;
                if (month > 12) {
                    month = 1;
                    year++;
                }
            } else if (action === 'prev') {
                month--;
                if (month < 1) {
                    month = 12;
                    year--;
                }
            }

            window.location.href = '/amacan?month=' + month + '&year=' + year;
        }

        const events = <?php echo json_encode($events); ?>;
        let currentMonth = <?= $month ?>;
        let currentYear = <?= $year ?>;

        function renderCalendar() {
            const daysInMonth = new Date(currentYear, currentMonth, 0).getDate();
            const firstDayOfMonth = new Date(currentYear, currentMonth - 1, 1).getDay();
            const calendar = document.getElementById('calendar');
            calendar.innerHTML = '';

            document.getElementById('monthYear').textContent = `${new Date(currentYear, currentMonth - 1).toLocaleString('default', { month: 'long' })} ${currentYear}`;

            // Create empty cells for days before the first day of the month
            for (let i = 0; i < firstDayOfMonth; i++) {
                calendar.innerHTML += '<div class="col"></div>';
            }

            // Render days in the month
            for (let day = 1; day <= daysInMonth; day++) {
                const date = `${currentYear}-${String(currentMonth).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                const eventStatus = events[date] || [];
                const allSlotsZero = eventStatus.every(event => event.slots === 0); // Check if all slots are 0

                calendar.innerHTML += `
                <div class="col ${allSlotsZero ? 'unavailable' : ''}" 
                style="margin: 0.1rem; font-size: 10px; cursor: ${allSlotsZero ? 'not-allowed' : 'pointer'}; background-color: ${allSlotsZero ? '#011f3785' : 'light'};" 
                ${!allSlotsZero ? `onclick="setDate('${date}')" ` : 'disabled'}>
                <div style="font-size: 15px;" class="mb-2 fw-semibold">${day}</div>
                ${eventStatus.map(event => `<div>${event.session}: ${event.slots} slot</div>`).join('')}
                </div>`;
            }



            updateSessionSelect();
        }

        function updateSessionSelect() {
            const sessionSelect = document.getElementById('sessionSelect');
            const selectedDate = document.querySelector('input[name="preferred_date"]').value;
            const slotsAvailable = events[selectedDate] && events[selectedDate].length > 0;
            const quantityInput = document.getElementById('quantity');
            const roomInput = document.getElementById('roomInput'); // Get the room input

            if (!slotsAvailable) {
                sessionSelect.classList.add('select-red');
                sessionSelect.disabled = false;
                quantityInput.max = 1; // Set to 1 if no slots available
                quantityInput.value = 0; // Default to 1
                roomInput.value = "Amacan"; // Reset room input
            } else {
                sessionSelect.classList.remove('select-red');
                sessionSelect.disabled = false;

                // Automatically select the first available session
                const availableSessions = events[selectedDate];
                if (availableSessions.length > 0) {
                    sessionSelect.value = availableSessions[0].session; // Default to the first session

                    // Set max based on selected session type
                    const selectedSession = sessionSelect.value;
                    if (selectedSession === "AM" || selectedSession === "PM") {
                        quantityInput.max = 10; // Set max for AM/PM
                        roomInput.value = "Amacan"; // Set room to Amacan
                    } else if (selectedSession === "22 Hours") {
                        quantityInput.max = 20; // Set max for 22 Hours
                        roomInput.value = "Amacan & VR House"; // Change room to Amacan & VR House
                    }
                }
            }

            // Handle case when session selection changes
            sessionSelect.onchange = function () {
                const selectedSession = this.value;
                if (selectedSession === "AM" || selectedSession === "PM") {
                    quantityInput.max = 10; // Set max for AM/PM
                    roomInput.value = "Amacan"; // Set room to Amacan
                } else if (selectedSession === "22 Hours") {
                    quantityInput.max = 20; // Set max for 22 Hours
                    roomInput.value = "Amacan & VR House"; // Change room to Amacan & VR House
                }
            };
        }



        function setDate(date) {
            document.getElementsByName('preferred_date')[0].value = date;
            updateSessionSelect(); // Update session dropdown when a date is selected
        }

        renderCalendar();

        // Function to check if all required fields are filled
        function checkFormValidity() {
            const requiredFields = document.querySelectorAll('#bookingForm .form-control[required]');
            const submitButton = document.getElementById('submitButton');
            let allFilled = true;

            requiredFields.forEach(field => {
                if (!field.value) {
                    allFilled = false; // If any required field is empty
                }
            });

            submitButton.disabled = !allFilled; // Disable the button if not all fields are filled
        }

        // Add event listeners to check form validity on input changes
        const formControls = document.querySelectorAll('#bookingForm .form-control');
        formControls.forEach(control => {
            control.addEventListener('input', checkFormValidity);
        });

        // Initial check on page load
        checkFormValidity();
    </script>

</body>

</html>