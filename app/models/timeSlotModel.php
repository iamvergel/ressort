<?php

class Mtimeslots
{
    // Properties for each column
    private $id;
    private $date;
    private $time;
    private $slots;
    private $created_at;
    private $updated_at;

    private $conn;

    // Constructor to initialize the properties (make all parameters optional)
    public function __construct($conn, $id = null, $date = null, $time = null, $slots = null, $created_at = null, $updated_at = null)
    {
        $this->conn = $conn;
        $this->id = $id;
        $this->date = $date;
        $this->time = $time;
        $this->slots = $slots;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getTime()
    {
        return $this->time;
    }
    public function setTime($time)
    {
        $this->time = $time;
    }
    public function getSlots()
    {
        return $this->slots;
    }

    public function setSlots($slots)
    {
        $this->slots = $slots;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function deleteSlots($id)
    {
        try {
            // Correct SQL syntax with placeholder for the id
            $sql = "DELETE FROM availableslots WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            // Binding the parameter to the statement
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute the statement
            $stmt->execute();

            // Check if any rows were affected
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getAllSlots()
    {
        try {
            $sql = "SELECT id, date, time, slots, created_at, updated_at FROM availableslots";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching slots: " . $e->getMessage());
        }
    }

    public function getSlotsById($date)
    {
        try {
            $sql = "SELECT id, date, time, created_at, updated_at FROM availableslots WHERE date = :date";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':date', $date);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
