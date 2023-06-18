<?php
require_once 'dbconfig.php'; // Include the file containing database connection details

// Get the selected filter values from the AJAX request
$department = $_POST['department'];
$course = $_POST['course'];
$semester = $_POST['semester'];
$yearOfStudy = $_POST['yearOfStudy'];

// Construct the SQL query based on the selected filters
$query = "SELECT * FROM exams WHERE true";

if (!empty($department)) {
    $query .= " AND department = '$department'";
}

if (!empty($course)) {
    $query .= " AND subject_type = '$course'";
}

if (!empty($semester)) {
    $query .= " AND semester = '$semester'";
}

if (!empty($yearOfStudy)) {
    $query .= " AND year_of_study = '$yearOfStudy'";
}

// Execute the query
$result = mysqli_query($conn, $query);

// Generate the table rows based on the query results
$tableRows = '';
while ($row = mysqli_fetch_assoc($result)) {
    $tableRows .= "<tr>";
    $tableRows .= "<td>" . $row['reg_number'] . "</td>";
    $tableRows .= "<td>" . $row['department'] . "</td>";
    $tableRows .= "<td>" . $row['year_of_study'] . "</td>";
    $tableRows .= "<td>" . $row['theory_marks'] . "</td>";
    $tableRows .= "<td>" . $row['practical_marks'] . "</td>";
    $tableRows .= "<td>" . $row['theory_ica01_marks'] . "</td>";
    $tableRows .= "<td>" . $row['theory_ica02_marks'] . "</td>";
    $tableRows .= "<td>" . $row['theory_ica03_marks'] . "</td>";
    $tableRows .= "<td>" . $row['practical_ica01_marks'] . "</td>";
    $tableRows .= "<td>" . $row['practical_ica02_marks'] . "</td>";
    $tableRows .= "<td>" . $row['practical_ica03_marks'] . "</td>";
    $tableRows .= "<td>" . $row['theory_grade'] . "</td>";
    $tableRows .= "<td>" . $row['practical_grade'] . "</td>";
    $tableRows .= "<td>" . $row['overall_grade'] . "</td>";
    $tableRows .= "<td>" . $row['gpa'] . "</td>";
    $tableRows .= "</tr>";
}

// If no rows found, display a message
if (empty($tableRows)) {
    $tableRows = "<tr><td colspan='15'>No data found</td></tr>";
}

// Return the generated table rows
echo $tableRows;
?>
