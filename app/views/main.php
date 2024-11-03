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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        const cols = document.querySelectorAll('.col-box');

        cols.forEach(col => {
            const img = col.querySelector('img');

            // Add mouseenter event listener to images
            img.addEventListener('mouseenter', () => {
                cols.forEach(otherCol => {
                    // Expand the hovered image's column and shrink others
                    if (otherCol === col) {
                        otherCol.classList.remove('col-lg-2');
                        otherCol.classList.add('col-lg-7');
                    } else {
                        otherCol.classList.remove('col-lg-2');
                        otherCol.classList.add('col-lg-1');
                    }
                });
            });

            // Add mouseleave event listener
            img.addEventListener('mouseleave', () => {
                cols.forEach(otherCol => {
                    // Reset all columns back to original size
                    otherCol.classList.remove('col-lg-7', 'lg-col-1');
                    otherCol.classList.add('col-lg-2');
                });
            });
        });
    </script>
</body>

</html>