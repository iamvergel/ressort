<?php

require_once '../../configuration/dbConnection.php';
require_once '../models/customerModel.php';

class customerController
{
    private $conn;
    private $model;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->model = new customerModel($conn);
    }

    public function createStudent($firstName)
    {
        try {
            // Ensure the SQL query is complete and secure
            $sql = "INSERT INTO Student (firstName) VALUES (:firstName)";
            $stmt = $this->conn->prepare($sql);

            $modelFirstName = $this->model->getCustomer();

            // Bind parameters to prevent SQL injection
            $stmt->bindParam(':firstName', $modelFirstName);

            // Execute the statement
            $stmt->execute();

            // Optionally return the ID of the newly created record
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            // Handle SQL exceptions and provide a meaningful message
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
}
;
?>