<?php

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Validate user by username and password, checking both 'users' and 'users_account'
    public function validate($username, $password) {
        // First, check the 'users' table (for admins)
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            // Return the user from 'users' table (admin)
            $user['role'] = 'admin';  // Add a custom 'role' field
            return $user;
        }

        // Then, check the 'users_account' table (for regular users)
        $stmt = $this->pdo->prepare('SELECT * FROM users_account WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            // Return the user from 'users_account' table (regular user)
            $user['role'] = 'user';  // Add a custom 'role' field
            return $user;
        }

        // If no user is found or password does not match
        return false;
    }
}