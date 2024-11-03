    <link rel="stylesheet" href="../public/assets/css/feedbackForm.css">

<div class="container mt-5 p-5 w-75">
    <h4 class="mb-4 text-center fw-semibold">Feedback Form</h4>

    <!-- Display success or error message -->
    <?php if (!empty($message)): ?>
        <div class="alert alert-info" role="alert">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <!-- Feedback Form -->
    <form action="" method="POST">
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name"
                required>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address"
                required>
        </div>
        <div class="form-group">
            <label for="mobileNo">Mobile No.</label>
            <input type="text" class="form-control" id="mobileNo" name="mobileNo" placeholder="Enter your mobile number"
                required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message"
                required></textarea>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <button type="submit" class="btn mt-4 px-5">Send Message</button>
        </div>
    </form>
</div>