<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Reyes Ressort</title>
    <link rel="shortcut icon" href="public/assets/images/logo/villaresortlogo.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="public/assets/css/services.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php
    // Check if the user is logged in
    if (isset($_SESSION['user'])) {
        include 'app/views/user/include/header.php'; // Redirect to room if the user is logged in
    } else {
        include 'app/include/navigation.php';
    }
    ?>

    <div class="services overflow-hidden">
        <!-- Amacan Section -->
        <div class="amacan">
            <div class="header w-100 d-flex justify-content-center align-items-center" data-aos="fade-up">
                <img src="public/assets/images/ressortimages/amacan05.jpg" alt="Amacan Resort Image"
                    class="w-100 object-fit-cover" height="400">
                <h1 class="text-uppercase fw-semibold me-5">Amacan <i class="bi bi-house-fill mx-5"></i></h1>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-4 p-5">
                    <div class="d-block">
                        <img src="public/assets/images/ressortimages/amacan01.jpg" alt="Amacan Room 1" height="250"
                            class="rounded-4 shadow mb-5" data-aos="zoom-in">
                        <img src="public/assets/images/ressortimages/amacan02.jpg" alt="Amacan Room 2" height="250"
                            class="rounded-4 shadow mb-5 mx-5" data-aos="zoom-in" data-aos-delay="100">
                        <img src="public/assets/images/ressortimages/amacan03.jpg" alt="Amacan Room 3" height="250"
                            class="rounded-4 shadow" data-aos="zoom-in" data-aos-delay="200">
                    </div>
                </div>
                <div class="col-md-8" data-aos="fade-left">
                    <div class="row">
                        <div class="col-md-6 p-5 text-center">
                            <h1>Day Tour</h1>
                            <p>8 AM to 6 PM</p>

                            <h3>Weekdays</h3>
                            <h5>P 8,000.00</h5>
                            <p>Good for 20 people</p>

                            <h3>Weekends</h3>
                            <h5>P 9,000.00</h5>
                            <p>Good for 20 people</p>
                        </div>

                        <div class="col-md-6 p-5 text-center">
                            <h1>Night Tour</h1>
                            <p>6 PM to 8 AM</p>

                            <h3>Weekdays</h3>
                            <h5>P 9,000.00</h5>
                            <p>Good for 20 people</p>

                            <h3>Weekends</h3>
                            <h5>P 10,000.00</h5>
                            <p>Good for 20 people</p>
                        </div>

                        <div class="col-md-12 px-5" data-aos="fade-up">
                            <p class="text-start pt-3 mx-5">List of amenities included in the package:</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="text-light mx-5">
                                        <li>wifi with strong signal smart tv 55</li>
                                        <li>videoke (until 10pm only)</li>
                                        <li>barbecue grill</li>
                                        <li>Billiards</li>
                                        <li>Adult and kiddie pool</li>
                                        <li>Bathrooms</li>
                                        <li>basketball court (until 10pm only)</li>
                                        <li>Water dispenser hot/coldgallons of water</li>
                                        <li>Stove (add 200 for the use of gas)</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="text-light mx-5">

                                        <li>Utensils and plates rice cooker</li>
                                        <li>Dart board</li>
                                        <li>Air conditioned rooms (VR only)</li>
                                        <li>Board games (Sungka),</li>
                                        <li>Badminton Racket</li>
                                        <li>Sumngyup grill</li>
                                        <li>Refrigerator</li>
                                        

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- VR House Section -->
        <div class="vrhouse my-5" data-aos="fade-up" data-aos-delay="200">
            <div class="header w-100 d-flex justify-content-center align-items-center">
                <img src="public/assets/images/ressortimages/vr02.jpg" alt="VR House Resort Image"
                    class="w-100 object-fit-cover" height="400">
                <h1 class="text-uppercase fw-semibold">VR HOUSE <i class="bi bi-house-fill mx-5"></i></h1>
            </div>

            <div class="row">
                <div class="col-md-4 p-5">
                    <div class="d-block">
                        <img src="public/assets/images/ressortimages/vr02.jpg" alt="VR House Room 1" height="250"
                            class="rounded-4 shadow mb-5" data-aos="zoom-in">
                        <img src="public/assets/images/ressortimages/vr03.jpg" alt="VR House Room 2" height="250"
                            class="rounded-4 shadow mb-5 mx-5" data-aos="zoom-in" data-aos-delay="100">
                        <img src="public/assets/images/ressortimages/vr02.jpg" alt="VR House Room 3" height="250"
                            class="rounded-4 shadow" data-aos="zoom-in" data-aos-delay="200">
                    </div>
                </div>
                <div class="col-md-8" data-aos="fade-left">
                    <div class="row">
                        <div class="col-md-6 p-5 text-center">
                            <h1>Day Tour</h1>
                            <p>8 AM to 6 PM</p>

                            <h3>Weekdays</h3>
                            <h5>P 8,000.00</h5>
                            <p>Good for 20 people</p>

                            <h3>Weekends</h3>
                            <h5>P 9,000.00</h5>
                            <p>Good for 20 people</p>
                        </div>

                        <div class="col-md-6 p-5 text-center">
                            <h1>Night Tour</h1>
                            <p>6 PM to 8 AM</p>

                            <h3>Weekdays</h3>
                            <h5>P 9,000.00</h5>
                            <p>Good for 20 people</p>

                            <h3>Weekends</h3>
                            <h5>P 10,000.00</h5>
                            <p>Good for 20 people</p>
                        </div>

                        <div class="col-md-12 px-5" data-aos="fade-up">
                            <p class="text-start pt-3 mx-5">List of amenities included in the package:</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="text-dark mx-5">
                                    <li>wifi with strong signal smart tv 55</li>
                                        <li>videoke (until 10pm only)</li>
                                        <li>barbecue grill</li>
                                        <li>Billiards</li>
                                        <li>Adult and kiddie pool</li>
                                        <li>Bathrooms</li>
                                        <li>basketball court (until 10pm only)</li>
                                        <li>Water dispenser hot/coldgallons of water</li>
                                        <li>Stove (add 200 for the use of gas)</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="text-dark mx-5">
                                    <li>Utensils and plates rice cooker</li>
                                        <li>Dart board</li>
                                        <li>Air conditioned rooms (VR only)</li>
                                        <li>Board games (Sungka),</li>
                                        <li>Badminton Racket</li>
                                        <li>Sumngyup grill</li>
                                        <li>Refrigerator</li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Whole Day Section -->
        <div class="wholeDay">
            <div class="header w-100 d-flex justify-content-center align-items-center" data-aos="fade-up">
                <img src="public/assets/images/ressortimages/amacan05.jpg" alt="Whole Day Amacan & VR House"
                    class="w-100 object-fit-cover" height="400">
                <h1 class="text-uppercase fw-semibold me-5 text-center">Whole Day <br /> Amacan & VR House <i
                        class="bi bi-house-fill mx-5"></i></h1>
            </div>

            <div class="row">
                <div class="col-md-4 p-5">
                    <div class="d-block" data-aos="zoom-in">
                        <img src="public/assets/images/ressortimages/amacan01.jpg" alt="Whole Day Amacan Room 1"
                            height="250" class="rounded-4 shadow mb-5">
                        <img src="public/assets/images/ressortimages/amacan02.jpg" alt="Whole Day Amacan Room 2"
                            height="250" class="rounded-4 shadow mb-5 mx-5">
                        <img src="public/assets/images/ressortimages/amacan03.jpg" alt="Whole Day Amacan Room 3"
                            height="250" class="rounded-4 shadow">
                    </div>
                </div>
                <div class="col-md-8" data-aos="fade-left">
                    <div class="row">
                        <div class="col-md-6 p-5 text-start">
                            <h1>22 Hours</h1>
                            <p>P1,000.00 per head minimun of 10 pax <br />
                                (if 10pax choose between Amacan and VR House) <br />
                                if 15pax 2 houses will be given as accomodation <br />
                                3 years o;d below is free but included in head count as 20pax <br />
                                Maximum of 20pax
                            </p>
                        </div>

                        <div class="col-md-6 p-5 text-center">
                        </div>

                        <div class="col-md-12 px-5" data-aos="fade-up">
                            <p class="text-start pt-3 mx-5">List of amenities included in the package:</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="text-light mx-5">
                                    <li>wifi with strong signal smart tv 55</li>
                                        <li>videoke (until 10pm only)</li>
                                        <li>barbecue grill</li>
                                        <li>Billiards</li>
                                        <li>Adult and kiddie pool</li>
                                        <li>Bathrooms</li>
                                        <li>basketball court (until 10pm only)</li>
                                        <li>Water dispenser hot/coldgallons of water</li>
                                        <li>Stove (add 200 for the use of gas)</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="text-light mx-5">
                                    <li>Utensils and plates rice cooker</li>
                                        <li>Dart board</li>
                                        <li>Air conditioned rooms (VR only)</li>
                                        <li>Board games (Sungka),</li>
                                        <li>Badminton Racket</li>
                                        <li>Sumngyup grill</li>
                                        <li>Refrigerator</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Contact Section -->
    <?php include 'app/views/contact.php'; ?>

    <?php include 'app/include/footer.php'; ?>

    <!-- Bootstrap and AOS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 500,  // Animation duration in milliseconds
            once: true,  // Ensures animation occurs only once (when scrolled into view)
            easing: 'ease-in-out', // Easing function for smooth transitions
        });
    </script>
</body>

</html>