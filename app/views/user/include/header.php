<link rel="stylesheet" href="public/assets/css/navigation.css">

<div class="d-none d-lg-block">
    <nav class="navbar navbar-expand-lg fixed-top" data-aos="fade-down" data-aos-duration="1000" id="navHead">
        <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
            <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                    class="nav-link fw-normal text-uppercase" aria-current="page" href="/userdashboard">Home</a></li>
            <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                    class="nav-link fw-normal text-uppercase" href="/room">Room</a></li>
            <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                    class="nav-link fw-normal text-uppercase" href="/amenities">Amenities</a></li>
            <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                    class="nav-link fw-normal text-uppercase" href="/AboutUs">About Us</a></li>
            <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                    class="nav-link fw-normal text-uppercase" href="/Services">Services</a></li>
            <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                    class="nav-link fw-normal text-uppercase" href="#contact">Contact Us</a></li>
            <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                    class="nav-link fw-normal text-uppercase" href="/promo">Promo/s</a></li>
        </ul>

        <div class="dropdown" style="position: absolute; right: 0;">
            <button
                class="border-0 dropdown-toggle mx-2 text-dark bg-light px-2 py-1 rounded-5 d-flex justify-content-center align-items-center"
                style="font-size: 12px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="bg-dark rounded-circle fw-bold text-light"
                    style="font-size: 20px; width: 40px; height: 40px; margin-right: 0.4rem; display: flex; align-items: center; justify-content: center;">
                    <?php
                    $firstLetter = strtoupper(substr(htmlspecialchars($_SESSION['email']), 0, 1));
                    echo $firstLetter;
                    ?>
                </span><?php
                $firstLetter = $_SESSION['email'];
                echo $firstLetter;
                ?>
            </button>
            <ul class="dropdown-menu mx-5 w-75">
                <li><a class="dropdown-item" href="/accountsetting">Account Setting</a></li>
                <li><a class="dropdown-item" href="/logout">Sign out</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="d-block d-lg-none">
    <a class="fixed-top text-light fs-2 text-start px-3 py-1" style="z-index: 500" id="mobileNav"
        data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        <i class="bi bi-list"></i>
    </a>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="dropdown mt-3">
                <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                    <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                            class="nav-link fw-normal text-uppercase" aria-current="page" href="/userdashboard">Home</a>
                    </li>
                    <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                            class="nav-link fw-normal text-uppercase" href="/room">Room</a></li>
                    <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                            class="nav-link fw-normal text-uppercase" href="/amenities">Amenities</a></li>
                    <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                            class="nav-link fw-normal text-uppercase" href="/AboutUs">About Us</a></li>
                    <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                            class="nav-link fw-normal text-uppercase" href="/Services">Services</a></li>
                    <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                            class="nav-link fw-normal text-uppercase" href="#contact">Contact Us</a></li>
                    <li class="nav-item mx-2" data-aos="fade-right" data-aos-duration="1000"><a
                            class="nav-link fw-normal text-uppercase" href="/promo">Promo/s</a></li>
                </ul>
            </div>
        </div>

        <div class="dropdown" style="position: absolute; bottom: 15rem;">
            <button
                class="border-0 dropdown-toggle mx-2 text-dark bg-light px-2 py-1 rounded-5 d-flex justify-content-center align-items-center"
                style="font-size: 12px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="bg-dark rounded-circle fw-bold text-light"
                    style="font-size: 20px; width: 40px; height: 40px; margin-right: 0.4rem; display: flex; align-items: center; justify-content: center;">
                    <?php
                    $firstLetter = strtoupper(substr(htmlspecialchars($_SESSION['email']), 0, 1));
                    echo $firstLetter;
                    ?>
                </span><?php
                $firstLetter = $_SESSION['email'];
                echo $firstLetter;
                ?>
            </button>
            <ul class="dropdown-menu mx-4 w-75">
                <li><a class="dropdown-item" href="/accountsetting">Account Setting</a></li>
                <li><a class="dropdown-item" href="/logout">Sign out</a></li>
            </ul>
        </div>
    </div>
</div>


<script>
    let navBar = document.getElementById("navHead");
    let offcanvas = document.getElementById("mobileNav");

    // Function to handle scroll event for both desktop and mobile
    function onScroll() {
        // For the desktop navbar
        if (window.scrollY > 0) {
            navBar.style.height = "80px";
            navBar.style.backgroundColor = "#0000006e";
            // For the mobile navbar (offcanvas)
            if (offcanvas) {
                offcanvas.style.backgroundColor = "#0000006e";  // Change background color
            }
        } else {
            navBar.style.height = "100px";
            navBar.style.backgroundColor = "transparent";
            // For the mobile navbar (offcanvas)
            if (offcanvas) {
                offcanvas.style.backgroundColor = "transparent";  // Reset to transparent
            }
        }
    }

    window.addEventListener("scroll", onScroll);

    // Optional: Mobile-specific hover effect (if you want to add any)
    let mobileLinks = document.querySelectorAll(".offcanvas .nav-item .nav-link");
    mobileLinks.forEach(link => {
        link.addEventListener("mouseenter", () => {
            link.style.color = "#fbd69cff";
        });

        link.addEventListener("mouseleave", () => {
            if (window.scrollY > 0) {
                link.style.color = "#fff";
            } else {
                link.style.color = "#fff";
            }
        });
    });
</script>