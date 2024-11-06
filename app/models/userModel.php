<?php

// User Model: User.php

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Validation to check if email or username already exists
    public function validateEmailAndUsername($email, $username) {
        // Update the table name to users_account
        $stmt = $this->pdo->prepare('SELECT id FROM users_account WHERE username = ? OR email = ?');
        $stmt->execute([$username, $email]);
        return $stmt->fetch(); // Return the user if found, else return false
    }
}
