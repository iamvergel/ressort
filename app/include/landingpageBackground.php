<style>
  .mask {
    opacity: 0.4;
  }

  .carousel-inner {
    height: 100vh;
  }

  .Firstslide {
    width: auto;
    object-fit: cover;
    object-position: center -200px;
  }

  .mobile {
    height: 100vh;
    width: 100vw;
    background-image: url("https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-29-11.jpg?raw=true");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    animation: bg 25s infinite alternate-reverse;
  }

  @keyframes bg {
    0% {
      background-image: url("https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-29-11.jpg?raw=true");
    }
    20% {
      background-image: url("public/assets/images/ressortimages/amacan02.jpg");
    }
    40% {
      background-image: url("https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-34-47.jpg?raw=true");
    }
    60% {
      background-image: url("https://github.com/Manjares360/villareyesimage/blob/main/vr/photo_2024-10-29_15-34-02.jpg?raw=true");
    }
    80% {
      background-image: url("public/assets/images/ressortimages/amacan04.jpg");
    }
    100% {
      background-image: url("public/assets/images/ressortimages/amacan02.jpg");
    }
  }

  .mobile::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    background-color: #000;
    width: 100%;
    height: 100%;
    opacity: 0.5;
  }
</style>

<div id="carouselDark" class="carousel carousel-dark slide d-none d-lg-block" data-bs-ride="carousel"
  data-bs-interval="10000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="0" class="active" aria-current="true"
      aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img
        src="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-29-11.jpg?raw=true"
        alt="Villa Reyes Amenities" class="d-block w-100 img-fluid Firstslide" alt="First slide">
      <div class="mask bg-dark opacity-50 position-absolute top-0 left-0 w-100 h-100"></div>
    </div>
    <div class="carousel-item" data-bs-interval="10000">
      <img src=" public/assets/images/ressortimages/amacan02.jpg" class="d-block w-100" alt="Second slide">
      <div class="mask bg-dark opacity-50 position-absolute top-0 left-0 w-100 h-100"></div>
    </div>
    <div class="carousel-item" data-bs-interval="10000">
      <img
        src="https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-34-47.jpg?raw=true"
        class="d-block w-100" alt="Third slide">
      <div class="mask bg-dark opacity-50 position-absolute top-0 left-0 w-100 h-100"></div>
    </div>
    <div class="carousel-item" data-bs-interval="10000">
      <img src="https://github.com/Manjares360/villareyesimage/blob/main/vr/photo_2024-10-29_15-34-02.jpg?raw=true"
        class="d-block w-100" alt="Fourth slide">
      <div class="mask bg-dark opacity-50 position-absolute top-0 left-0 w-100 h-100"></div>
    </div>
    <div class="carousel-item" data-bs-interval="10000">
      <img src="  public/assets/images/ressortimages/amacan04.jpg" class="d-block w-100" alt="Fifth slide">
      <div class="mask bg-dark opacity-50 position-absolute top-0 left-0 w-100 h-100"></div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselDark" data-bs-slide="next">
    <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="mobile bg-danger d-block d-lg-none">
</div>