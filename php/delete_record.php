<?php
require 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the registration number is provided
    if (isset($_POST['registrationNumber'])) {
        $registrationNumber = $_POST['registrationNumber'];

        // Perform the delete operation in your database
        // Modify the following code based on your database structure and query

        // Example code using MySQLi
        $sql = "DELETE FROM exams WHERE reg_number = ?";
        $stmt = $conn->prepare($sql);
		$stmt->bind_param('s', $registrationNumber);
        
        if ($stmt->execute()) {
            // Deletion successful
            echo json_encode(['status' => 'success', 'message' => 'Record deleted successfully.']);
            exit;
        } else {
            // Error occurred during deletion
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the record: ' . $stmt->error]);
            exit;
        }
    } else {
        // Registration number not provided
        echo json_encode(['status' => 'error', 'message' => 'Registration number is required.']);
        exit;
    }
} else {
    // Invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}
