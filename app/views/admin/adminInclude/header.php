<!-- Inside header.php -->
<div class="container-fluid text-light py-4 rounded-2 mt-2 d-flex justify-content-between align-items-center pe-5" style="background-color: #011F37ff">
    <button id="toggleSidebar" class="btn btn-light btn-sm ms-2" style="height: 30px;"><i class="bi bi-list"></i></button>
    <h1 class="mx-2 fw-bold"><i class="bi bi-person-fill me-3"></i>Admin Side</h1>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('toggleSidebar');
        const sidebar = document.querySelector('.sidebar');

        toggleButton.addEventListener('click', function () {
            if (sidebar.style.marginLeft === '-350px') {
                sidebar.style.marginLeft = '0'; // Show sidebar
            } else {
                sidebar.style.marginLeft = '-350px'; // Hide sidebar
            }
        });
    });
</script>
