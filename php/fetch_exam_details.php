<?php
require_once 'dbconfig.php';

if (isset($_POST['registrationNumber']) && isset($_POST['subject_code'])) {
    $registrationNumber = $_POST['registrationNumber'];
    $subjectCode = $_POST['subject_code'];

    // Prepare the SQL query to fetch exam details
    $query = "SELECT * FROM exams WHERE reg_number = '$registrationNumber' AND subject_code = '$subjectCode'";
    $result = mysqli_query($conn, $query);
    $examDetails = mysqli_fetch_assoc($result);

    // Return the exam details as JSON response
    echo json_encode($examDetails);
}
?>
