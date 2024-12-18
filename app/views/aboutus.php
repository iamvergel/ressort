<?php
session_start(); // Start the session
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

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="public/assets/css/aboutus.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Navigation Bar -->

    <?php
    // Check if the user is logged in
    if (isset($_SESSION['user'])) {
        include 'app/views/user/include/header.php'; // Redirect to room if the user is logged in
    } else {
        include 'app/include/navigation.php';
    }
    ?>

    <div class="aboutus">
        <div class="whoweare pt-5 px-5 shadow-lg" style="background-color : #011F37ff;" data-aos="fade-up"
            data-aos-duration="800">
            <div class="container">
                <div class="row pt-5 px-5 mt-5">
                    <div class="col-6 text-light" data-aos="fade-right" data-aos-duration="1000">
                        <p class="mt-5 px-5 pt-5 fw-semibold"
                            style="font-size: 15px; line-height: 1.7; letter-spacing: 1px">Who we are</p>
                        <p class="mt-2 px-5 fw-light" style="font-size: 12px; line-height: 1.7; letter-spacing: 1px">
                            <span class="fw-semibold">Villa Reyes Family Private Resort </span>began welcoming guests in
                            <span class="fw-semibold">September 2023</span>.
                            In our early days, we successfully hosted numerous family gatherings and created countless
                            cherished memories...
                        </p>
                    </div>
                    <div class="col-6 p-5" data-aos="zoom-in" data-aos-duration="1200">
                        <div class="right w-100 h-100 shadow-lg" style="border: solid 1px #ffffff86;">
                            <iframe
                                src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid0sNoamzNPpaph7n3PzMs1TG5H41vKCbZegjhHyYbbsMUCSPFKkninwyqvEoYHjGu3l%26id%3D61550930460686&show_text=false&width=500"
                                width="100%" height="450" style="border:none;overflow:hidden" scrolling="no"
                                frameborder="0" allowfullscreen="true"
                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="vision px-5 bg-light" data-aos="fade-up" data-aos-duration="800">
            <div class="container">
                <div class="row px-5">
                    <div class="col-6 p-5" data-aos="zoom-in-left" data-aos-duration="1000">
                        <div class="right w-100 h-100 shadow-lg" style="border: solid 1px #000;">
                            <img src="https://github.com/Manjares360/villareyesimage/blob/main/amacan/photo_2024-10-29_15-36-45.jpg?raw=true"
                                width="100%" height="450" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-6 text-dark" data-aos="fade-left" data-aos-duration="1000">
                        <p class="mt-5 pt-5 px-5 fw-semibold"
                            style="font-size: 15px; line-height: 1.7; letter-spacing: 1px">Our Vision</p>
                        <p class="mt-2 px-5 fw-light" style="font-size: 12px; line-height: 1.7; letter-spacing: 1px">Our
                            vision is to offer a relaxing getaway...</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mission px-5" style="background-color : #011F37ff;" data-aos="fade-up" data-aos-duration="800">
            <div class="container">
                <div class="row px-5">
                    <div class="col-6 text-light" data-aos="fade-right" data-aos-duration="1000">
                        <p class="mt-5 pt-5 px-5 fw-semibold"
                            style="font-size: 15px; line-height: 1.7; letter-spacing: 1px">Our Mission</p>
                        <p class="mt-2 px-5 fw-light" style="font-size: 12px; line-height: 1.7; letter-spacing: 1px">We
                            strive to be the leading resort...</p>
                    </div>
                    <div class="col-6 p-5" data-aos="zoom-in-right" data-aos-duration="1200">
                        <div class="right w-100 h-100 shadow-lg" style="border: solid 1px #ffffff86;">
                            <img src="https://github.com/Manjares360/villareyesimage/blob/main/vr/photo_2024-10-29_15-40-34.jpg?raw=true"
                                width="100%" height="450" style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="map my-5 px-2 w-100" data-aos="fade-up" data-aos-duration="1000">
            <iframe width="100%" class="px-5" height="700" frameborder="0" scrolling="no" marginheight="0"
                marginwidth="0"
                src="https://maps.google.com/maps?q=Villa%20Reyes%20Family%20Private%20Resort%2C%20Barangay%20Proper%202%2C%20Rodriguez%2C%20Rizal%2C%20Philippines&amp;output=embed">
                <a href="https://www.gps.ie/"> View on Map</a>
            </iframe>
        </div>
    </div>

    <!-- Contact -->
    <?php include 'app/views/contact.php'; ?>

    <?php include 'app/include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
</body>

</html>