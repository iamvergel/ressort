<link rel="stylesheet" href="../public/assets/css/services.css">

<style>
    .amacanVideo {
        position: relative;
        width: 100%;
        height: 100%;
        right: 1rem;
    }

    video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
    }

    h1 {
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 40px;
        border-left: 5px solid #fff;
    }
</style>

<div class="amacanGallery" id="amacanGallery">

    <div class="gallery">
        <div class="row">
            <div class="col-lg-6 imageGallery">
                <div class="image">
                    <img src="../public/assets/images/img1.jpg" alt="image1">
                </div>
                <div class="image">
                    <img src="../public/assets/images/img1.jpg" alt="image1">
                </div>
                <div class="image">
                    <img src="../public/assets/images/img1.jpg" alt="image1">
                </div>
                <div class="image">
                    <img src="../public/assets/images/img1.jpg" alt="image1">
                </div>
                <div class="image">
                    <img src="../public/assets/images/img2.jpg" alt="image2">
                </div>
                <div class="image">
                    <img src="../public/assets/images/img1.jpg" alt="image1">
                </div>
                <div class="image">
                    <img src="../public/assets/images/img1.jpg" alt="image1">
                </div>
                <div class="image">
                    <img src="../public/assets/images/img1.jpg" alt="image1">
                </div>
                <div class="image">
                    <img src="../public/assets/images/img1.jpg" alt="image1">
                </div>

            </div>
            <div class="col-lg-6">
                <div class="amacanVideo" id="amacanVideo">
                    <h1 class="z-3 position-absolute bottom-0 mb-4 mx-3 text-light fw-smibold px-3 py-2">Amacan House
                    </h1>
                    <video id="videoPlayer" autoplay muted>
                        <source src="../public/assets/video/video2.mp4" type="video/mp4">
                    </video>
                    <div class="mask z-1 h-100 w-100 bg-dark opacity-25"></div>
                    <div class="mask z-1 h-25 w-100 bg-dark opacity-50 position-absolute bottom-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const videoElement = document.getElementById('videoPlayer');
    const videos = [
        '../public/assets/video/video2.mp4',
        '../public/assets/video/video1.mp4',
        '../public/assets/video/video3.mp4'
    ];
    let currentVideoIndex = 0;

    videoElement.addEventListener('ended', () => {
        currentVideoIndex = (currentVideoIndex + 1) % videos.length;
        videoElement.src = videos[currentVideoIndex];
        videoElement.load(); // Ensure the video is reloaded
        videoElement.play().catch(error => {
            console.error('Error playing video:', error);
        });
    });

</script>