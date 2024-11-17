<?php
// Check if the user is logged in
if (isset($_SESSION['user'])) {
  $button_link = '/room'; // Redirect to room if the user is logged in
} else {
  $button_link = '/signin'; // Redirect to signin if the user is not logged in
}

require_once(dirname(__DIR__, 2) . '/configuration/dbConnection.php');

// Get current month and year, handle next and previous month logic
$month = isset($_GET['month']) ? (int) $_GET['month'] : date('m');
$year = isset($_GET['year']) ? (int) $_GET['year'] : date('Y');

// Fetch event data from the amacan table
$stmt = $pdo->query("SELECT date, name, session, slots FROM availableslots WHERE name IN ('Amacan', 'VR House', '22 Hours')");
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
    'name' => $event['name'],
    'session' => $event['session'],
    'slots' => $event['slots']
  ];
}

$firstDayOfMonth = date('w', strtotime("$year-$month-01"));
?>

<link rel="stylesheet" href="public/assets/css/landingpage.css">
<style>
  .mask {
    opacity: 0.4;
  }

  .carousel-inner {
    height: 100vh;
  }

  .Firstslide {
    width: auto;
    object-fit: cover;
    object-position: center -200px;
  }

  .mobile {
    height: 100vh;
    width: 100vw;
    background-image: url("https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-29-11.jpg?raw=true");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    animation: bg 25s infinite alternate-reverse;
  }

  @keyframes bg {
    0% {
      background-image: url("https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-29-11.jpg?raw=true");
    }

    20% {
      background-image: url("public/assets/images/ressortimages/amacan02.jpg");
    }

    40% {
      background-image: url("https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-34-47.jpg?raw=true");
    }

    60% {
      background-image: url("https://github.com/Manjares360/villareyesimage/blob/main/vr/photo_2024-10-29_15-34-02.jpg?raw=true");
    }

    80% {
      background-image: url("public/assets/images/ressortimages/amacan04.jpg");
    }

    100% {
      background-image: url("public/assets/images/ressortimages/amacan02.jpg");
    }
  }

  .mobile::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    background-color: #000;
    width: 100%;
    height: 100%;
    opacity: 0.5;
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

  .active-day {
    border: solid 10px #011F37ff;
    font-weight: bold;
  }
</style>

<div class="landingpage">
  <!-- Carousel with AOS animation -->
  <div id="carouselDark" class="carousel carousel-dark slide d-none d-lg-block" data-bs-ride="carousel"
    data-bs-interval="10000" data-aos="fade-up" data-aos-duration="1500">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img
          src="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-29-11.jpg?raw=true"
          alt="Villa Reyes Amenities" class="d-block w-100 img-fluid Firstslide" alt="First slide">
        <div class="mask bg-dark opacity-50 position-absolute top-0 left-0 w-100 h-100"></div>
      </div>
      <div class="carousel-item" data-bs-interval="10000">
        <img src=" public/assets/images/ressortimages/amacan02.jpg" class="d-block w-100" alt="Second slide">
        <div class="mask bg-dark opacity-50 position-absolute top-0 left-0 w-100 h-100"></div>
      </div>
      <div class="carousel-item" data-bs-interval="10000">
        <img
          src="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-34-47.jpg?raw=true"
          class="d-block w-100" alt="Third slide">
        <div class="mask bg-dark opacity-50 position-absolute top-0 left-0 w-100 h-100"></div>
      </div>
      <div class="carousel-item" data-bs-interval="10000">
        <img src="https://github.com/Manjares360/villareyesimage/blob/main/vr/photo_2024-10-29_15-34-02.jpg?raw=true"
          class="d-block w-100" alt="Fourth slide">
        <div class="mask bg-dark opacity-50 position-absolute top-0 left-0 w-100 h-100"></div>
      </div>
      <div class="carousel-item" data-bs-interval="10000">
        <img src="  public/assets/images/ressortimages/amacan04.jpg" class="d-block w-100" alt="Fifth slide">
        <div class="mask bg-dark opacity-50 position-absolute top-0 left-0 w-100 h-100"></div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselDark" data-bs-slide="next">
      <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Mobile Background with AOS animation -->
  <div class="mobile d-block d-lg-none" data-aos="fade-up" data-aos-duration="1500">
  </div>

  <!-- Welcome Text with AOS animation -->
  <div class="container-fluid ressort d-block " data-aos="fade-up" data-aos-duration="1500">
    <div class="text-justify text-lg-center text-light z-2">
      <h3 class="fw-normal">Welcome to</h3>
      <h1 class="fw-bold"><span>Villa Reyes Family </span><br /> Private Resort</h1>
      <p class="fw-normal">" Enjoy your Dream Resort "</p>
    </div>
  </div>

  <div class="d-flex d-flex justify-content-center mt-5">
    <button id="prevBtn" class="rounded-circle border-0 fs-1 mx-5" style="color: #011F37ff;"
      onclick="changeDate('prev')"><i class="bi bi-arrow-left-circle-fill"></i></button>
    <h2 id="monthYear" class="text-center mt-2 fw-semibold" style="color: #011F37ff;"></h2>
    <button id="nextBtn" class="rounded-circle border-0 fs-1 mx-5" style="color: #011F37ff;"
      onclick="changeDate('next')"><i class="bi bi-arrow-right-circle-fill"></i></button>
  </div>
  <div class="p-5">
    <div class="calendarbg p-2 bg-transparent shadow-lg rounded-4">
      <div class="row text-center" style="color: #011F37ff; font-size: 12px;">
        <div class="col fw-semibold  monsun">Sun</div>
        <div class="col fw-semibold  monsun">Mon</div>
        <div class="col fw-semibold  monsun">Tue</div>
        <div class="col fw-semibold  monsun">Wed</div>
        <div class="col fw-semibold  monsun">Thu</div>
        <div class="col fw-semibold monsun">Fri</div>
        <div class="col fw-semibold  monsun">Sat</div>
      </div>
      <div class="calendar" id="calendar"></div>
    </div>
  </div>

  <!-- Col Boxes with AOS animations -->
  <div class="container-fluid px-2 px-lg-5 overflow-hidden">
    <div class="row p-0 p-lg-5">
      <div class="col-12 col-lg-3 p-2 col-box" data-aos="fade-right" data-aos-duration="500">
        <div class="menu1 h-100 w-100 d-flex justify-content-center align-items-end px-5">
          <div class="content d-none px-5 text-end text-light">
            <button class="btn btn-primary px-5 mb-5 fw-bold"
              onclick="window.location.href = '<?php echo $button_link; ?>'">
              ROOM
            </button>
          </div>
          <div class="mask bg-dark h-100 w-100 position-absolute top-0 z-n1 opacity-75"></div>
        </div>
      </div>
      <div class="col-12 col-lg-3 p-2 col-box" data-aos="fade-up" data-aos-duration="500">
        <div class="menu2 h-100 w-100 d-flex justify-content-center align-items-end px-5">
          <div class="content d-none px-5 text-end text-light">
            <button class="btn btn-primary px-5 mb-5 fw-bold">ABOUT US</button>
          </div>
          <div class="mask bg-dark h-100 w-100 position-absolute top-0 z-n1 opacity-75"></div>
        </div>
      </div>
      <div class="col-12 col-lg-3 p-2 col-box" data-aos="fade-left" data-aos-duration="500">
        <div class="menu3 h-100 w-100 d-flex justify-content-center align-items-end px-5">
          <div class="content d-none px-5 text-end text-light">
            <button class="btn btn-primary px-5 mb-5 fw-bold">ABOUT US</button>
          </div>
          <div class="mask bg-dark h-100 w-100 position-absolute top-0 z-n1 opacity-75"></div>
        </div>
      </div>
      <div class="col-12 col-lg-3 p-2 col-box" data-aos="fade-left" data-aos-duration="500">
        <div class="menu4 h-100 w-100 d-flex justify-content-center align-items-end px-5">
          <div class="content d-none px-5 text-end text-light">
            <button class="btn btn-primary px-5 mb-5 fw-bold">SERVICES</button>
          </div>
          <div class="mask bg-dark h-100 w-100 position-absolute top-0 z-n1 opacity-75"></div>
        </div>
      </div>
    </div>

    <!-- Customer Feedback Section -->
    <div class="container py-5" id="custom-cards" data-aos="fade-up" data-aos-duration="1500">
      <h4 class="pb-2 border-bottom text-center text-dark fw-semibold">Customer Feedback</h4>
    </div>
  </div>
</div>

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

    window.location.href = '/userdashboard?month=' + month + '&year=' + year;
  }

  const events = <?php echo json_encode($events); ?>;
  let currentMonth = <?= $month ?>;
  let currentYear = <?= $year ?>;

  function renderCalendar() {
    const daysInMonth = new Date(currentYear, currentMonth, 0).getDate();
    const firstDayOfMonth = new Date(currentYear, currentMonth - 1, 1).getDay();
    const calendar = document.getElementById('calendar');
    calendar.innerHTML = '';

    // Get the current date to highlight it
    const today = new Date();
    const todayDate = today.getDate();
    const todayMonth = today.getMonth() + 1; // JavaScript months are 0-indexed, so add 1
    const todayYear = today.getFullYear();

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

      // Check if this day is today
      const isToday = (day === todayDate && currentMonth === todayMonth && currentYear === todayYear);

      calendar.innerHTML += `
    <div class="col ${allSlotsZero ? 'unavailable' : ''} ${isToday ? 'active-day' : ''}" 
         style="margin: 0.1rem; height: 10rem; font-size: 10px; cursor: ${allSlotsZero ? 'not-allowed' : 'pointer'}; background-color: ${allSlotsZero ? '#011f3785' : 'light'};" 
         ${!allSlotsZero ? `onclick="setDate('${date}')" ` : 'disabled'} 
         data-aos="fade-up" 
         data-aos-duration="500" 
         data-aos-delay="${day * 50}">
      <div style="font-size: 15px;" class="mb-2 fw-semibold">${day}</div>
      ${eventStatus.map(event => `<div>${event.name} ${event.session}: ${event.slots} slot</div>`).join('')}
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

    window.location.href = '/signin';
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