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

    <link rel="stylesheet" href="public/assets/css/main.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Navigation Bar -->
    <?php include 'app/include/navigation.php'; ?>

    <!-- Landing Page -->
    <?php include 'app/views/landingpage.php'; ?>

    <!-- Contact -->
    <?php include 'app/views/contact.php'; ?>

    <?php include 'app/include/footer.php'; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        AOS.init()
        
        const cols = document.querySelectorAll('.col-box');

        cols.forEach(col => {
            const img = col.querySelector('div'); 
            const button = col.querySelector('.content'); 
            const mask = col.querySelector('.mask'); 

            // Add mouseenter event listener to images
            img.addEventListener('mouseenter', () => {
                cols.forEach(otherCol => {
                    if (otherCol === col) {
                        // Expand the column that is hovered over
                        otherCol.classList.remove('col-lg-3');
                        otherCol.classList.add('col-lg-6');
                        // Show the button when the column is expanded
                        button.classList.remove('d-none');
                        mask.classList.remove('opacity-75');
                        mask.classList.add('opacity-50');
                    } else {
                        // Shrink the other columns
                        otherCol.classList.remove('col-lg-3');
                        otherCol.classList.add('col-lg-2');
                        // Hide the button in other columns
                        otherCol.querySelector('.content').classList.add('d-none');
                        otherCol.querySelector('.mask').classList.remove('opacity-50');
                        otherCol.querySelector('.mask').classList.add('opacity-75');
                    }
                });
            });

            // Add mouseleave event listener
            img.addEventListener('mouseleave', () => {
                cols.forEach(otherCol => {
                    // Reset all columns back to original size
                    otherCol.classList.remove('col-lg-6', 'col-lg-2');
                    otherCol.classList.add('col-lg-3');
                    // Hide the button in all columns when mouse leaves
                    otherCol.querySelector('.content').classList.add('d-none');
                    otherCol.querySelector('.mask').classList.add('opacity-75');
                });
            });
        });
    </script>
</body>

</html>