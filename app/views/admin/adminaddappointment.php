<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Reyes Ressort</title>
    <link rel="shortcut icon" href="\public\assets\images\logo\villaresortlogo.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", system-ui;
        }

        body {
            font-family: Arial, sans-serif;
            overflow-x: hidden;
        }

        .amacan {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .amacan:hover {
            background-color: #ebb105;
        }

        table {
            margin-top: 5rem;
        }
    </style>
</head>

<body>
<?php include 'app/views/admin/adminInclude/header-top.php'; ?>
    <div class="d-flex">
        <?php include 'app/views/admin/adminInclude/sidebar.php'; ?>

        <div class="container-fluid">
            <?php include 'app/views/admin/adminInclude/header.php'; ?>

            <?php include 'app/views/admin/adminInclude/addappointmentslots.php'; ?>
        </div>
    </div>

</body>

</html>