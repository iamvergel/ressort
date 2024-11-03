<div class="text-light bg-primary w-100 py-3 rounded-2">
<div id="current-date-time" class="p-3" style="font-size: 12px"></div>
<h1 class="mx-5 fw-bold"><i class="bi bi-person-fill me-3"></i>Admim Side</h1>
</div>

<script>
        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();

        // Display current date, time, and day
        function updateDateTime() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDate = now.toLocaleDateString(undefined, options);
            const formattedTime = now.toLocaleTimeString();
            document.getElementById('current-date-time').innerText = `${formattedDate}, ${formattedTime}`;
        }
        setInterval(updateDateTime, 0); // Update every second
    </script>