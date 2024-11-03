<?php
require_once(dirname(__DIR__, 3) . '/../configuration/dbConnection.php');

// Function to determine if the given date is a weekend
function isWeekend($date)
{
    return (date('N', strtotime($date)) >= 6); // 6 (Saturday) and 7 (Sunday) are weekend days
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'] ?? '';

    if ($date) {
        try {
            // Check if the date already has slots
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM availableslots WHERE date = ?");
            $stmt->execute([$date]);
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                $errorMessage = "Slots for this date already exist.";
            } else {
                // Define your slot entries with specific times and names
                $slots = [
                    ['time_in' => '08:00:00', 'time_out' => '18:00:00', 'name' => 'Amacan', 'session' => 'AM'],
                    ['time_in' => '18:00:00', 'time_out' => '06:00:00', 'name' => 'Amacan', 'session' => 'PM'],
                    ['time_in' => '08:00:00', 'time_out' => '18:00:00', 'name' => 'VR House', 'session' => 'AM'],
                    ['time_in' => '18:00:00', 'time_out' => '06:00:00', 'name' => 'VR House', 'session' => 'PM'],
                    ['time_in' => '08:00:00', 'time_out' => '04:00:00', 'name' => '22 Hours', 'session' => '22 Hours'],
                    // Add additional slots as necessary
                ];

                foreach ($slots as $slotData) {
                    $stmt = $pdo->prepare("INSERT INTO availableslots (date, time, slots, created_at, updated_at, name, time_in, time_out, session) VALUES (?, ?, ?, NOW(), NOW(), ?, ?, ?,?)");
                    $stmt->execute([$date, $slotData['time_in'], 1, $slotData['name'], $slotData['time_in'], $slotData['time_out'], $slotData['session']]);
                }

                $successMessage = "Slots added successfully!";
            }
        } catch (PDOException $e) {
            $errorMessage = "Database error: " . $e->getMessage();
        }
    } else {
        $errorMessage = "Please select a date.";
    }
}

// Fetch dates with existing slots
$availableDates = [];
try {
    $stmt = $pdo->prepare("SELECT DISTINCT date FROM availableslots");
    $stmt->execute();
    $availableDates = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    $errorMessage = "Database error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Available Slots</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add Available Slots</h1>

        <?php if (isset($successMessage)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo htmlspecialchars($successMessage); ?>
            </div>
        <?php elseif (isset($errorMessage)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($errorMessage); ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" id="appointmentForm">
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="text" id="date" name="date" class="form-control border-1 border-primary" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Available Slots</button>
        </form>

        <h3 class="mt-5 my-3"> <i class="bi bi-clock-history me-2"></i>History Appointment Dates and Slots</h3>
        <div class="container-fluid border border-1 border-primary rounded-2 p-3" style="height: 200px; overflow-y: scroll;">
            <ul id="availableDates" class="list-group mt-3">
                <?php foreach ($availableDates as $availableDate): ?>
                    <li class="list-group-item">
                        <?php echo htmlspecialchars($availableDate); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let availableDates = <?php echo json_encode($availableDates); ?>;

            flatpickr('#date', {
                dateFormat: 'Y-m-d',
                minDate: "today", // Disable past dates
                disable: availableDates.map(date => date), // Disable already taken dates
            });
        });
    </script>

</body>

</html>