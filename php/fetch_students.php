<?php
require_once 'dbconfig.php';

// Get the selected filters from the AJAX request
$department = $_POST['department'];
$course = $_POST['course'];
$semester = $_POST['semester'];
$yearOfStudy = $_POST['yearOfStudy'];

// Construct the query based on the selected filters
$query = "SELECT * FROM students WHERE 1=1"; // Start with a basic query

if (!empty($department)) {
    $query .= " AND department = '$department'";
}

if (!empty($course)) {
    $query .= " AND course = '$course'";
}

if (!empty($semester)) {
    $query .= " AND semester = '$semester'";
}

if (!empty($yearOfStudy)) {
    $query .= " AND year_of_study = '$yearOfStudy'";
}

// Perform the query and fetch the results
$result = mysqli_query($conn, $query);

// Build the table rows with the fetched data
$tableRows = '';
while ($row = mysqli_fetch_assoc($result)) {
    $tableRows .= "<tr>";
    $tableRows .= "<td>{$row['registration_number']}</td>";
    $tableRows .= "<td>{$row['department']}</td>";
    $tableRows .= "<td>{$row['year_of_study']}</td>";
    $tableRows .= "<td>{$row['theory_marks']}</td>";
    $tableRows .= "<td>{$row['practical_marks']}</td>";
    $tableRows .= "<td>{$row['theory_ica_01_marks']}</td>";
    $tableRows .= "<td>{$row['theory_ica_02_marks']}</td>";
    $tableRows .= "<td>{$row['theory_ica_03_marks']}</td>";
    $tableRows .= "<td>{$row['practical_ica_01_marks']}</td>";
    $tableRows .= "<td>{$row['practical_ica_02_marks']}</td>";
    $tableRows .= "<td>{$row['practical_ica_03_marks']}</td>";
    $tableRows .= "<td>{$row['theory_grade']}</td>";
    $tableRows .= "<td>{$row['practical_grade']}</td>";
    $tableRows .= "<td>{$row['overall_grade']}</td>";
    $tableRows .= "<td>{$row['gpa']}</td>";
    $tableRows .= "</tr>";
}

// Return the table rows
echo $tableRows;
?>
