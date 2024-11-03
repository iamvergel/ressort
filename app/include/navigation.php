<link rel="stylesheet" href="public/assets/css/navigation.css">

<nav class="navbar fixed-top d-none d-lg-block">
  <div class="container-fluid d-flex justify-content-center align-items-center">
    <ul class="container-fluid nav d-flex justify-content-center align-items-end">
      <li class="nav-item mx-2">
        <a class="nav-link fw-normal text-uppercase" aria-current="page" href="/">Home</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link fw-normal text-uppercase" href="/room">Room</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link fw-normal text-uppercase" href="/AboutUs">Ameneties</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link fw-normal text-uppercase" href="/AboutUs">About Us</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link fw-normal text-uppercase" href="/Services">Services</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link fw-normal text-uppercase" href="#contact">Contact Us</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link fw-normal text-uppercase" href="/Feedback">Feedback</a>
      </li>
    </ul>
  </div>
</nav>

<script>
  let navBar = document.querySelector(".navbar");
  let nav = document.querySelector(".nav");
  let navLinks = document.querySelectorAll(".nav-item .nav-link");

  function onScroll() {
    if (window.scrollY > 0) {
      navBar.style.height = "80px";
      nav.style.height = "60px";
      navBar.style.backgroundColor = "#0000006e";

      navLinks.forEach(link => {
        link.style.color = "#fff";
      });
    } else {
      navBar.style.height = "100px";
      nav.style.height = "80px";
      navBar.style.backgroundColor = "transparent";

      navLinks.forEach(link => {
        link.style.color = "#fff";
      });
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