<?php
require_once '../models/feedbackModel.php.php';
require_once '../../configuration/dbConnection.php';

class FeedbackController
{
    private $model;

    public function __construct($pdo)
    {
        $this->model = new FeedbackModel($pdo);
    }

    // Handle form submission
    public function handleFormSubmission()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullName = $_POST['fullName'] ?? '';
            $email = $_POST['email'] ?? '';
            $mobileNo = $_POST['mobileNo'] ?? '';
            $message = $_POST['message'] ?? '';

            if ($fullName && $email && $mobileNo && $message) {
                if ($this->model->insertFeedback($fullName, $email, $mobileNo, $message)) {
                    return "Feedback submitted successfully!";
                } else {
                    return "Failed to submit feedback. Please try again.";
                }
            } else {
                return "Please fill in all fields.";
            }
        }
        return '';
    }
}
