<?php
// models/SlotModel.php
require_once '../db.php';

class SlotModel {
    private $conn;

    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function getExistingSessions($date) {
        try {
            $stmt = $this->conn->prepare("SELECT session FROM availableslots WHERE date = ?");
            $stmt->execute([$date]);
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function addSlots($date, $sessions) {
        try {
            foreach ($sessions as $session) {
                $stmt = $this->conn->prepare("INSERT INTO availableslots (date, slots, session, created_at, updated_at) VALUES (?, 1, ?, NOW(), NOW())");
                $stmt->execute([$date, $session]);
            }
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function getDisabledDates() {
        try {
            $stmt = $this->conn->prepare("SELECT DISTINCT date FROM availableslots");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}
?>
