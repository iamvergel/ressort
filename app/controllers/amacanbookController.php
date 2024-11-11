<?php

require_once(__DIR__ . '/../models/amacanbookModel.php');
require_once(dirname(__DIR__, 2) . '/configuration/dbConnection.php');

class Camacanbook {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($data) {
        // Check required fields
        if (empty($data['full_name']) || empty($data['email']) || empty($data['contact_number']) || 
            empty($data['room']) || empty($data['quantity']) || empty($data['preferred_date']) || 
            empty($data['session']) || empty($data['price'])) {
            return json_encode(["error" => "One or more fields are empty. Please check your input values."]);
        }
    
        // Validate email format
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return json_encode(["error" => "Invalid email format."]);
        }
    
        // Set timestamps
        $created_at = date('Y-m-d H:i:s');
        $status = isset($data['status']) ? $data['status'] : 'pending'; // Use provided status or default to 'pending'
        $code = uniqid(); // Generate a unique booking code
    
        // Prepare SQL statement
        $sql = "INSERT INTO inquiries (full_name, email, contact_number, room, quantity, preferred_date, created_at, session, status, code, price) 
                VALUES (:full_name, :email, :contact_number, :room, :quantity, :preferred_date, :created_at, :session, :status, :code, :price)";
        
        try {
            $stmt = $this->pdo->prepare($sql);
    
            // Bind parameters
            $stmt->bindValue(':full_name', $data['full_name']);
            $stmt->bindValue(':email', $data['email']);
            $stmt->bindValue(':contact_number', $data['contact_number']);
            $stmt->bindValue(':room', $data['room']);
            $stmt->bindValue(':quantity', $data['quantity']);
            $stmt->bindValue(':preferred_date', $data['preferred_date']);
            $stmt->bindValue(':created_at', $created_at);
            $stmt->bindValue(':session', $data['session']);
            $stmt->bindValue(':status', $status);
            $stmt->bindValue(':code', $code);
            $stmt->bindValue(':price', $data['price']);
    
            // Execute the statement
            if ($stmt->execute()) {
                return json_encode(["success" => "Booking successful!"]);
            } else {
                return json_encode(["error" => "Error in booking. Please try again."]);
            }
        } catch (PDOException $e) {
            return json_encode(["error" => "Database error: " . htmlspecialchars($e->getMessage())]);
        }
    }    
}
