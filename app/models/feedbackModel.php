<?php
class FeedbackModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Insert feedback into the database
    public function insertFeedback($fullName, $email, $mobileNo, $message)
    {
        $sql = "INSERT INTO feedback (fullName, email, mobileNo, message) VALUES (:fullName, :email, :mobileNo, :message)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mobileNo', $mobileNo);
        $stmt->bindParam(':message', $message);
        return $stmt->execute();
    }
}
