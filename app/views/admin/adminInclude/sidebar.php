<style>
    body {
        font-family: Arial, sans-serif;
    }

    .sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        background-color: #343a40;
        padding-top: 20px;
    }

    .sidebar a {
        display: block;
        color: white;
        padding: 15px;
        text-decoration: none;
    }

    .sidebar a:hover {
        background-color: #495057;
    }

    .content {
        margin-left: 260px;
        padding: 20px;
    }

    h4 {
        font-size: 12px;
        margin-bottom: 8rem;
    }
</style>

<div class="sidebar bg-dark">
    <h4 class="text-white text-center">Villa Reyes Family
        Private Resort</h4>
    <a href="/dashboard" >Dashboard</a>
    <a href="/adminInquiries">Inquiries</a>
    <a href="#">Add Appointment</a>
    <a href="#">Accepted Inquiries</a>
    <a href="#">Decline Inquiries</a>
    <a href="/logout">Logout</a> <!-- Change this to the logout URL -->
</div>