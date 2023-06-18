<?php
require 'dbconfig.php';

if (isset($_POST['yearOfStudy']) && isset($_POST['semester'])) {
    $yearOfStudy = $_POST['yearOfStudy'];
    $semester = $_POST['semester'];

    $query = "SELECT subject_code, year_of_study, semester, subject_type FROM subjects WHERE year_of_study = ? AND semester = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $yearOfStudy, $semester);
    $stmt->execute();
    $result = $stmt->get_result();

    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    echo json_encode($rows);
}

$stmt->close();
$conn->close();
?>
