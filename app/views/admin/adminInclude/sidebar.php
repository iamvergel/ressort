<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            width: 350px; /* Corrected from 35000px to 350px */
            margin-left: 0; /* Initial state */
            max-width: 350px;
            background-color: #011F37ff;
            overflow-y: scroll;
            scrollbar-width: thin;
            scrollbar-color: #011F37ff #fff;
            scroll-padding: 0;
            scroll-margin: 0;
            /* For Firefox */
            font-size: 12px;
            transition: all 0.3s ease;
        }

        /* For WebKit-based browsers (Chrome, Safari) */
        .sidebar::-webkit-scrollbar {
            width: 8px;
            /* Width of the scrollbar */
        }

        .sidebar::-webkit-scrollbar-thumb {
            background-color: #413958;
            /* Color of the scrollbar thumb */
            border-radius: 10px;
            /* Round the corners of the thumb */
        }

        .sidebar::-webkit-scrollbar-track {
            background: #413958;
            /* Color of the scrollbar track */
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #413958;
        }

        .sidebar a.active {
            background-color: #413958;
            /* Background color for the active link */
        }

        h4 {
            font-size: 14px;
            margin-bottom: 8rem;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="text-center mt-5 mb-0">
            <img src="/public/assets/images/logo/villaresortlogo.png" alt="logo" width="80"
                class="bg-light rounded-circle border border-secondaey">
            <h4 class="text-white fs-6 mt-3 fw-bold mb-5 px-2">Villa Reyes Family Private Resort</h4>
        </div>

        <p class="text-light mx-3 border-bottom border-light py-3 mb-1" style="font-size: 12px;"><i class="bi bi-border-all me-2"></i>General</p>
        <a href="/dashboard">Dashboard</a>
        <a href="/adminInquiries">Inquiries</a>

        <p class="text-light mx-3 border-bottom border-light py-3 mb-1 mt-3" style="font-size: 12px;"><i class="bi bi-journal-check me-1"></i><i class="bi bi-journal-x me-2"></i></i>Manage Bookings
        </p>
        <a href="/AddAppointment">Add Appointment Slot</a>

        <p class="text-light mx-3 border-bottom border-light py-3 mb-1 mt-3" style="font-size: 12px;"><i class="bi bi-person-lines-fill me-2"></i>Admin Controls</p>
        <a href="/AcceptedInquiries">Accepted Inquiries</a>
        <a href="/DeclinedInquiries">Declined Inquiries</a>

        <p class="text-light mx-3 border-bottom border-light py-3 mt-4 mb-1" style="font-size: 12px;"><i class="bi bi-journal-text me-2"></i>Booking Management
        </p>
        <a href="#">Payment Records</a>
        <a href="#">Manage Account</a>
        <a href="/logout" class="my-5"><i class="bi bi-box-arrow-left me-2"></i>Logout</a>


        <div class="text-light bg-primary d-flex align-items-end justify-content-start py-2">
            <span class="bg-dark rounded-circle mx-3 fw-bold"
                style="font-size: 20px; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                <?php
                $firstLetter = strtoupper(substr(htmlspecialchars($_SESSION['user']), 0, 1));
                echo $firstLetter;
                ?>
            </span>
            <div style="font-size: 12px; line-height: 0">
                <p style="font-size: 14px;"><?php echo htmlspecialchars($_SESSION['user']); ?></p>
                <p>admin</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the current URL path
            const currentPath = window.location.pathname;

            // Get all the sidebar links
            const links = document.querySelectorAll('.sidebar a');

            links.forEach(link => {
                // Check if the href of the link matches the current path
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active'); // Add the active class
                }
            });
        });
    </script>
</body>

</html>