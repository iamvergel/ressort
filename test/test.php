<?php
require_once(dirname(__DIR__, 2) . '/configuration/dbConnection.php');
require_once(dirname(__DIR__, 2) . '/app/controllers/amacanbookController.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $room = 'Amacan'; 
    $quantity = $_POST['quantity'];
    $preferred_date = $_POST['preferred_date'];
    $session = $_POST['session'];
    $created_at = date('Y-m-d H:i:s');
    $status = 'pending'; // default status
    $code = uniqid(); // generating a unique code for the booking

    // Determine the price based on conditions
    $dateTime = new DateTime($preferred_date);
    $dayOfWeek = $dateTime->format('N'); // 1 (Monday) to 7 (Sunday)
    
    // Initialize price
    $price = 0;

    if ($session === 'Whole day') {
        $price = $quantity * 1000; // $1,000 per quantity
    } else {
        // Pricing for AM and PM sessions
        if ($dayOfWeek >= 6) { // Weekend (Saturday/Sunday)
            $price = ($session === 'AM') ? 9000 : 10000; // Weekend pricing
        } else { // Weekday
            $price = ($session === 'AM') ? 8000 : 9000; // Weekday pricing
        }
        $price *= $quantity; // Total price based on quantity
    }

    // Check if the email already exists in the database
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM inquiries_amacan WHERE email = ?");
    $stmt->execute([$email]);
    $existingBookings = $stmt->fetchColumn();

    if ($existingBookings > 0) {
        echo "<script>
            alert('Booking with this email already exists. Please use a different email.');
            window.history.back();
          </script>";
        exit();
    }

    // Check available slots before making any updates
    $stmt = $pdo->prepare("SELECT slots FROM availableslots WHERE date = :date AND session = :session AND name IN ('Amacan', '22 Hours')");
    $stmt->execute(['date' => $preferred_date, 'session' => $session]);
    $slot = $stmt->fetch();

    if ($slot && $slot['slots'] > 0) {
        // Proceed with slot adjustments
        try {
            if ($session === '22 Hours') {
                $stmt = $pdo->prepare("UPDATE availableslots SET slots = 0 WHERE date = :date AND session IN ('AM', 'PM') AND name IN ('Amacan', 'VR House')");
                $stmt->bindParam(':date', $preferred_date);
                $stmt->execute();
            } else {
                // Adjust slots for AM or PM
                $slotsAdjustment = -1; // Decrement by 1 for AM or PM
                $stmt = $pdo->prepare("UPDATE availableslots SET slots = slots + :adjustment WHERE date = :date AND session = :session AND name = 'Amacan'");
                $stmt->bindParam(':adjustment', $slotsAdjustment, PDO::PARAM_INT);
                $stmt->bindParam(':date', $preferred_date);
                $stmt->bindParam(':session', $session);
                $stmt->execute();

                // Set "22 Hours" slot to 0 if either AM or PM is booked
                $stmt = $pdo->prepare("UPDATE availableslots SET slots = 0 WHERE date = :date AND session = '22 Hours'");
                $stmt->bindParam(':date', $preferred_date);
                $stmt->execute();
            }

            // Create an instance of the controller
            $controller = new Camacanbook($pdo);

            // Prepare data for booking
            $bookingData = [
                'full_name' => $full_name,
                'email' => $email,
                'contact_number' => $contact_number,
                'room' => $room,
                'quantity' => $quantity,
                'preferred_date' => $preferred_date,
                'created_at' => $created_at,
                'session' => $session,
                'status' => $status,
                'code' => $code,
                'price' => $price
            ];

            // Proceed to create the booking
            if ($controller->create($bookingData)) {
                echo "<script>
                    alert('Booking successful!');
                    window.location.href = '/amacan';
                  </script>";
                exit();
            }
        } catch (PDOException $e) {
            echo "Error during booking: " . $e->getMessage();
        }
    } else {
        echo "<script>
            alert('No slots available for the selected date and session.');
            window.location.href = '/amacan';
          </script>";
    }
}
