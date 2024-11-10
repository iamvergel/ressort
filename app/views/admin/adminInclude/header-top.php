<div class="contaier-fluid text-light py-1 d-flex justify-content-between align-items-center px-3 py-3 shadow-lg" style="background-color: #011F37ff">
    <div>ICC CORE ELECTRIC CORP. - Reservation System</div>
    <div id="current-date-time" class="p-1" style="font-size: 12px"></div>
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