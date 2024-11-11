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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="public/assets/css/aboutus.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;600;700&display=swap" rel="stylesheet">
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
    
    <main class="overflow-hidden">
        <section class="py-5 text-center" data-aos="zoom-in" data-aos-duration="800">
            <div class="row py-lg-5 mt-5" data-aos="fade-up" data-aos-duration="700">
                <div class="col-lg-12 col-md-12 mx-auto z-3 text-light">
                    <h1 class="fw-semibold mt-3">Villa Reyes Family Private Resort</h1>
                    <h1 class="fw-bold">Amenities Gallery</h1>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <!-- Image Cards with Different Animations -->
                    <div class="col" data-aos="flip-left" data-aos-duration="700">
                        <div class="card shadow-sm">
                            <img class="card-image"
                                src="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-31-59.jpg?raw=true"
                                width="100%" alt="Image 1">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!-- Trigger Modal Button -->
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            data-bs-toggle="modal" data-bs-target="#viewModal"
                                            data-image="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-31-59.jpg?raw=true"
                                            data-image-two="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-29-11.jpg?raw=true"
                                            data-image-three="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-34-50.jpg?raw=true">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col" data-aos="fade-left" data-aos-duration="800">
                        <div class="card shadow-sm">
                            <img class="card-image"
                                src="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-35-24.jpg?raw=true"
                                width="100%" alt="Image 2">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!-- Trigger Modal Button -->
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            data-bs-toggle="modal" data-bs-target="#viewModal"
                                            data-image="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-35-24.jpg?raw=true"
                                            data-image-two="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/2.jpg?raw=true"
                                            data-image-three="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/3.jpg?raw=true">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col" data-aos="flip-right" data-aos-duration="800">
                        <div class="card shadow-sm">
                            <img class="card-image"
                                src="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-36-04.jpg?raw=true"
                                width="100%" alt="Image 2">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!-- Trigger Modal Button -->
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            data-bs-toggle="modal" data-bs-target="#viewModal"
                                            data-image="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-36-04.jpg?raw=true"
                                            data-image-two="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/4.jpg?raw=true"
                                            data-image-three="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/5.jpg?raw=true">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col" data-aos="zoom-out" data-aos-duration="700">
                        <div class="card shadow-sm">
                            <img class="card-image"
                                src="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/6.jpg?raw=true"
                                width="100%" alt="Image 2">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!-- Trigger Modal Button -->
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            data-bs-toggle="modal" data-bs-target="#viewModal"
                                            data-image="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/6.jpg?raw=true"
                                            data-image-two="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/7.jpg?raw=true"
                                            data-image-three="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/8.jpg?raw=true">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col" data-aos="slide-up" data-aos-duration="800">
                        <div class="card shadow-sm">
                            <img class="card-image"
                                src="public\assets\images\ressortimages\amacan01.jpg"
                                width="100%" alt="Image 2">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!-- Trigger Modal Button -->
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            data-bs-toggle="modal" data-bs-target="#viewModal"
                                            data-image="public\assets\images\ressortimages\amacan01.jpg"
                                            data-image-two="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/9.jpg?raw=true"
                                            data-image-three="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/10.jpg?raw=true">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col" data-aos="slide-up" data-aos-duration="1200">
                        <div class="card shadow-sm">
                            <img class="card-image"
                                src="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/11.jpg?raw=true"
                                width="100%" alt="Image 2">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!-- Trigger Modal Button -->
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            data-bs-toggle="modal" data-bs-target="#viewModal"
                                            data-image="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/11.jpg?raw=true"
                                            data-image-two="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/12.jpg?raw=true"
                                            data-image-three="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/13.jpg?raw=true">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Structure -->
                    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl" data-aos="fade-up" data-aos-duration="500">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- Main Image in the col-8 -->
                                        <div class="col-12 p-0" style="width: 100vw; height: 70vh; overflow-x: scroll;">
                                            <img id="modalMainImage"
                                                src=""
                                                alt="Modal Main Image" class="mainImage">
                                        </div>

                                        <!-- Thumbnails in the col-4 -->
                                        <div class="col-12 mt-5">
                                            <div class="row">
                                                <div class="col-4 mb-3" style="height: 25vh; overflow: hidden;">
                                                    <img id="imageOne" class="thumbnail"
                                                        src=""
                                                        alt="Image 1" class="img-fluid w-100"
                                                        style="width: 100%; height: 100%; object-fit: cover;"
                                                        onclick="changeImage(this)">
                                                </div>
                                                <div class="col-4 mb-3" style="height: 25vh; overflow: hidden;">
                                                    <img id="imageTwo" class="thumbnail"
                                                        src=""
                                                        alt="Image 2" class="img-fluid w-100"
                                                        style="width: 100%; height: 100%; object-fit: cover;"
                                                        onclick="changeImage(this)">
                                                </div>
                                                <div class="col-4" style="height: 25vh; overflow: hidden;">
                                                    <img id="imageThree" class="thumbnail"
                                                        src=""
                                                        alt="Image 3" class="img-fluid w-100"
                                                        style="width: 100%; height: 100%; object-fit: cover;"
                                                        onclick="changeImage(this)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Contact -->
    <?php include 'app/views/contact.php'; ?>
    <?php include 'app/include/footer.php'; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        AOS.init();
        
        // Function to set the main image and thumbnails in the modal based on the clicked "View" button
        const viewButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
        
        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const imageSrc = this.getAttribute('data-image'); // Get main image source from data attribute
                const imageTwoSrc = this.getAttribute('data-image-two'); // Get secondary thumbnail source
                const imageThreeSrc = this.getAttribute('data-image-three'); // Get tertiary thumbnail source

                const modalImage = document.getElementById('modalMainImage');
                const imageOne = document.getElementById('imageOne');
                const imageTwo = document.getElementById('imageTwo');
                const imageThree = document.getElementById('imageThree');

                // Set the sources for main image and thumbnails
                modalImage.src = imageSrc; // Set the main image in the modal
                imageOne.src = imageSrc;   // Set first thumbnail image
                imageTwo.src = imageTwoSrc; // Set second thumbnail image
                imageThree.src = imageThreeSrc; // Set third thumbnail image
            });
        });

        // Function to change the main image when a thumbnail is clicked inside the modal
        function changeImage(thumbnail) {
            var mainImage = document.getElementById('modalMainImage'); // Get the main image in the modal
            mainImage.src = thumbnail.src; // Set the main image source to the clicked thumbnail's source
        }
    </script>
</body>

</html>
