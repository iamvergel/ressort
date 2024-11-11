<?php
require_once(dirname(__DIR__, 3) . '/configuration/dbConnection.php');
require_once(dirname(__DIR__, 3) . '/app/controllers/amacanbookController.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $full_name = $_POST['full_name'];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        echo "<script>
                    alert('Invalid email format.');
                    window.history.back();
                  </script>";
        exit;
    }

    $contact_number = $_POST['contact_number'];
    $room = $_POST['room'];
    $quantity = $_POST['quantity'];
    $preferred_date = $_POST['preferred_date'];
    $session = $_POST['session'];
    $created_at = date('Y-m-d H:i:s');
    $status = 'pending'; // Default status
    $code = uniqid(); // Generating a unique code for the booking

    // Determine the price based on conditions
    $dateTime = new DateTime($preferred_date);
    $dayOfWeek = $dateTime->format('N'); // 1 (Monday) to 7 (Sunday)

    // Initialize price
    $price = 0;

    if ($session === '22 Hours') {
        $price = $quantity * 1000; // $1,000 per quantity
    } else {
        // Pricing for AM and PM sessions
        if ($dayOfWeek >= 6) { // Weekend (Saturday/Sunday)
            $price = ($session === 'AM') ? 9000 : 10000; // Weekend pricing
        } else { // Weekday
            $price = ($session === 'AM') ? 8000 : 9000; // Weekday pricing
        }
    }

    // Check available slots before making any updates
    $stmt = $pdo->prepare("SELECT slots FROM availableslots WHERE date = :date AND session = :session AND name IN ('VR House', '22 Hours')");
    $stmt->bindParam(':date', $preferred_date); // Ensure you use the correct variable
    $stmt->bindParam(':session', $session);
    $stmt->execute();
    $slot = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch as an associative array

    if ($slot['slots'] > 0) {
        // Proceed with slot adjustments
        try {
            if ($session === '22 Hours') {
                // Set slots to 0 for AM and PM sessions in Amacan and VR House
                $stmt = $pdo->prepare("UPDATE availableslots SET slots = 0 WHERE date = :date AND session IN ('AM', 'PM', '22 Hours') AND name IN ('Amacan', 'VR House', '22 Hours')");
                $stmt->bindParam(':date', $preferred_date);
                $stmt->execute();
            } else {
                // Decrement slots by 1 for the specified AM or PM session for Amacan
                $slotsAdjustment = -1; // Decrement by 1
                $stmt = $pdo->prepare("UPDATE availableslots SET slots = slots + :adjustment WHERE date = :date AND session = :session AND name = 'VR House'");
                $stmt->bindParam(':adjustment', $slotsAdjustment, PDO::PARAM_INT);
                $stmt->bindParam(':date', $preferred_date);
                $stmt->bindParam(':session', $session);
                $stmt->execute();

                // Set "22 Hours" slot to 0 if either AM or PM is booked
                $stmt = $pdo->prepare("UPDATE availableslots SET slots = 0 WHERE date = :date AND session = '22 Hours' AND name IN ('Amacan', 'VR House', '22 Hours')");
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
                'status' => $status, // Ensure status is set to pending
                'code' => $code,
                'price' => $price // Ensure price is included
            ];

            // Proceed to create the booking
            if ($controller->create($bookingData)) {
                echo "<script>
                    alert('Booking successful!');
                    window.location.href = '/vrhouse';
                  </script>";
                exit();
            }
        } catch (PDOException $e) {
            echo "Error during booking: " . $e->getMessage();
        }
    } else {
        echo "<script>
            alert('No slots available for the selected date and session.');
            window.history.back();
          </script>";
    }
}
