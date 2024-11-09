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

    <link rel="stylesheet" href="public/assets/css/promo.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Navigation Bar -->
    <?php include 'app/include/navigation.php'; ?>

    <div class="promo overflow-hidden">
        <section class="py-5 text-center" data-aos="zoom-in" data-aos-duration="800">
            <div class="row py-lg-5 mt-5" data-aos="fade-up" data-aos-duration="700">
                <div class="col-lg-12 col-md-12 mx-auto z-3 text-light">
                    <h1 class="fw-semibold mt-3">Villa Reyes Family Private Resort</h1>
                    <h1 class="fw-bold">Promo this year</h1>
                </div>
            </div>
        </section>

        <div class="container-fluid" id="promo">
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
