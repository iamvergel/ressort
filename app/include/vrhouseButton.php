<link rel="stylesheet" href="../public/assets/css/buttons.css">

<div class="vrhouseButton z-3 d-flex justify-content-center align-items-center">
    <button class="mt-5 border-0 w-100" type="button" onclick="vrhouseGallery()">
        See VR House Gallery
    </button>
</div>

<script>
    function vrhouseGallery() {
        document.getElementById('vrhouseGallery').scrollIntoView({ behavior: 'smooth' });
    }
</script>