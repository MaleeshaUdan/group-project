<?php
require_once 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $regNumber = $_POST['regNumber'];

    // Check if the registration number exists in the student table
    $query = "SELECT COUNT(*) AS count FROM student WHERE reg_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $regNumber);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $count = $row['count'];

    if ($count > 0) {
        echo "success";
    } else {
        echo "error";
    }
}

$stmt->close();
$conn->close();
?>
