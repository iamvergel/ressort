<link rel="stylesheet" href="public/assets/css/navigation.css">

<nav class="navbar navbar-expand-lg fixed-top" id="navHead">
  <div class="container-fluid">
    <button class="navbar-toggler fs-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
      aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <i class="bi bi-list text-light"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
        <li class="nav-item mx-2"><a class="nav-link fw-normal text-uppercase" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item mx-2 d-none"><a class="nav-link fw-normal text-uppercase" href="/room">Room</a></li>
        <li class="nav-item mx-2"><a class="nav-link fw-normal text-uppercase" href="/AboutUs">Amenities</a></li>
        <li class="nav-item mx-2"><a class="nav-link fw-normal text-uppercase" href="/AboutUs">About Us</a></li>
        <li class="nav-item mx-2"><a class="nav-link fw-normal text-uppercase" href="/Services">Services</a></li>
        <li class="nav-item mx-2"><a class="nav-link fw-normal text-uppercase" href="#contact">Contact Us</a></li>
        <li class="nav-item mx-2"><a class="nav-link fw-normal text-uppercase" href="/Promo">Promo/s</a></li>
        <li class="nav-item mx-2"><a class="nav-link fw-normal text-uppercase" href="/signin">Signin</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Offcanvas Menu -->
<div class="d-block d-lg-none text-dark fs-5 bg-light">
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header d-flex justify-content-between bg-light text-dark">
      <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
      <button type="button" class="bg-transparent border-0 text-reset text-light fs-1" data-bs-dismiss="offcanvas"
        aria-label="Close"><i class="bi bi-x"></i></button>
    </div>
    <div class="offcanvas-body bg-light text-dark">
      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item d-none"><a class="nav-link" href="/room">Room</a></li>
        <li class="nav-item"><a class="nav-link" href="/AboutUs">Amenities</a></li>
        <li class="nav-item"><a class="nav-link" href="/AboutUs">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="/Services">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link" href="/Promo">Promo/s</a></li>
        <li class="nav-item"><a class="nav-link" href="/signin">Signin</a></li>
      </ul>
    </div>
  </div>
</div>

<script>
  let navBar = document.getElementById("navHead");
  let navLinks = document.querySelectorAll(".nav-item .nav-link");

  function onScroll() {
    if (window.innerWidth >= 992) {
      if (window.scrollY > 0) {
        navBar.style.height = "80px";
        navBar.style.backgroundColor = "#0000006e";
      } else {
        navBar.style.height = "100px";
        navBar.style.backgroundColor = "transparent";
      }
    } else {
        navBar.style.height = "80px";
        navBar.style.backgroundColor = "#011F37ff";
        navLinks.forEach(link => link.style.color = "#000");
    }
  }

  window.addEventListener("scroll", onScroll);

  navLinks.forEach(link => {
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