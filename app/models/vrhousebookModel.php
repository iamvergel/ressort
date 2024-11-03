<?php

class Mvrhousebook {
    private $pdo;
    private $fullName;
    private $email;
    private $contactNumber;
    private $room;
    private $quantity;
    private $preferredDate;
    private $session;
    private $createdAt;
    private $status;
    private $code;
    private $price;

    public function __construct($pdo, $fullName, $email, $contactNumber, $room, $quantity, $preferredDate, $session, $createdAt, $status = 'pending', $code, $price) {
        $this->pdo = $pdo;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->contactNumber = $contactNumber;
        $this->room = $room;
        $this->quantity = $quantity;
        $this->preferredDate = $preferredDate;
        $this->session = $session;
        $this->createdAt = $createdAt;
        $this->status = $status;
        $this->code = $code;
        $this->price = $price;
    }

    public function save() {
        $sql = "INSERT INTO inquiries (full_name, email, contact_number, room, quantity, preferred_date, created_at, session, status, code, price) 
                VALUES (:full_name, :email, :contact_number, :room, :quantity, :preferred_date, :created_at, :session, :status, :code, :price)";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':full_name', $this->fullName);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':contact_number', $this->contactNumber);
            $stmt->bindParam(':room', $this->room);
            $stmt->bindParam(':quantity', $this->quantity);
            $stmt->bindParam(':preferred_date', $this->preferredDate);
            $stmt->bindParam(':created_at', $this->createdAt);
            $stmt->bindParam(':session', $this->session);
            $stmt->bindParam(':status', $this->status);
            $stmt->bindParam(':code', $this->code);
            $stmt->bindParam(':price', $this->price);

            return $stmt->execute();
        } catch (PDOException $e) {
            die("Database error: " . htmlspecialchars($e->getMessage()));
        }
    }
}
