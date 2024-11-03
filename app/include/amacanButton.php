<link rel="stylesheet" href="../public/assets/css/buttons.css">

<div class="amacanButton z-3 d-flex justify-content-center align-items-center">
    <button class="mt-5 border-0 w-100" type="button" onclick="amacanGallery()">
        See Amacan Gallery
    </button>
</div>

<script>
    function amacanGallery() {
        document.getElementById('amacanGallery').scrollIntoView({ behavior: 'smooth' });
    }
</script>