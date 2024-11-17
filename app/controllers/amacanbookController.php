<?php

require_once(__DIR__ . '/../models/amacanbookModel.php');
require_once(dirname(__DIR__, 2) . '/configuration/dbConnection.php');

class Camacanbook
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($data)
    {
        // Check required fields
        if (
            empty($data['full_name']) || empty($data['email']) || empty($data['contact_number']) ||
            empty($data['room']) || empty($data['quantity']) || empty($data['preferred_date']) ||
            empty($data['session']) || empty($data['price'])
        ) {
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

        // Handle the payment screenshot upload if provided
        if (isset($data['payment_screenshot']) && $data['payment_screenshot']['error'] === UPLOAD_ERR_OK) {
            // Validate the uploaded file (optional)
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = pathinfo($data['payment_screenshot']['name'], PATHINFO_EXTENSION);

            if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                return json_encode(["error" => "Invalid file type for payment screenshot. Please upload a valid image file."]);
            }

            // Use preferred_date and full_name to generate a meaningful file name
            $formattedDate = str_replace('-', '', $data['preferred_date']); // Remove dashes from the preferred date (e.g., 2024-11-17 becomes 20241117)
            $sanitizedName = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($data['full_name'])); // Remove spaces/special characters from the name

            // Combine preferred_date and sanitized full_name to create a unique file name
            $fileName = 'payment_' . $sanitizedName . '_' . $formattedDate . '.' . $fileExtension;

            // Define the upload directory path
            $uploadDir = dirname(__DIR__, 2) . '/uploads/payment_screenshots/';
            $uploadPath = $uploadDir . $fileName;

            // Check if the directory exists, if not, create it
            if (!is_dir($uploadDir)) {
                if (!mkdir($uploadDir, 0777, true)) {
                    return json_encode(["error" => "Failed to create upload directory."]);
                }
            }

            // Check if the directory is writable
            if (!is_writable($uploadDir)) {
                return json_encode(["error" => "Upload directory is not writable."]);
            }

            // Move the uploaded file to the destination folder
            if (!move_uploaded_file($data['payment_screenshot']['tmp_name'], $uploadPath)) {
                return json_encode(["error" => "Error uploading the payment screenshot."]);
            }
        } else {
            return json_encode(["error" => "No file uploaded or error in file upload."]);
        }

        // Prepare SQL statement to insert booking information
        $sql = "INSERT INTO inquiries (full_name, email, contact_number, room, quantity, preferred_date, created_at, session, status, code, price, payment_screenshot) 
                VALUES (:full_name, :email, :contact_number, :room, :quantity, :preferred_date, :created_at, :session, :status, :code, :price, :payment_screenshot)";

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
            $stmt->bindValue(':payment_screenshot', $fileName); // Store the same file name as the one used in the upload directory

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
