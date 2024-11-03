<?php
// index.php

require '../../../configuration/dbConnection.php';
require '../../models/admin/SlotModel.php';

$slotModel = new SlotModel($conn); // Pass the $conn variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $sessions = isset($_POST['sessions']) ? $_POST['sessions'] : [];
    
    try {
        $slotModel->addSlots($date, $sessions);
        header('Location: index.php'); // Redirect to avoid resubmission
        exit();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

$disabledDates = $slotModel->getDisabledDates();
$existingSessions = [];
if (!empty($_GET['date'])) {
    $date = $_GET['date'];
    $existingSessions = $slotModel->getExistingSessions($date);
}

require_once '../../views/admin/adminInclude'; // Adjust path as necessary
?>