<?php
require_once 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $regNumber = $_POST['regNumber'];
    $subjectCode = $_POST['subjectCode'];

    // Check if the subject code is already present for the registration number
    $query = "SELECT COUNT(*) AS count FROM exams WHERE reg_number = '$regNumber' AND subject_code = '$subjectCode'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if ($count > 0) {
        $error = "Error: Subject code already exists for the registration number.";
        header("Location: exam_details.php?error=" . urlencode($error));
        exit;
    }

    // Retrieve the form data
    $department = $_POST['department'];
    $yearOfStudy = $_POST['yearOfStudy'];
    $theoryMarks = $_POST['theoryMarks'];
    $practicalMarks = $_POST['practicalMarks'];
    $ica01Marks = $_POST['theory_ica01_marks'];
    $ica02Marks = $_POST['theory_ica02_marks'];
    $ica03Marks = $_POST['theory_ica03_marks'];
    $practicalIca01Marks = $_POST['practical_ica01_marks'];
    $practicalIca02Marks = $_POST['practical_ica02_marks'];
    $practicalIca03Marks = $_POST['practical_ica03_marks'];


    // Calculate theory grade
    $theoryGrade = '';
    $icaMarksArray = array($ica01Marks, $ica02Marks, $ica03Marks);
    rsort($icaMarksArray); // Sort the ICA marks array in descending order


    // Calculate theory grade
    $theoryPercentage = ($theoryMarks * 0.7) + (($icaMarksArray[0] + $icaMarksArray[1]) / 2);
    if ($theoryPercentage >= 80) {
        $theoryGrade = 'A+';
    } elseif ($theoryPercentage >= 75) {
        $theoryGrade = 'A';
    } elseif ($theoryPercentage >= 70) {
        $theoryGrade = 'A-';
    } elseif ($theoryPercentage >= 65) {
        $theoryGrade = 'B+';
    } elseif ($theoryPercentage >= 60) {
        $theoryGrade = 'B';
    } elseif ($theoryPercentage >= 55) {
        $theoryGrade = 'B-';
    } elseif ($theoryPercentage >= 50) {
        $theoryGrade = 'C+';
    } elseif ($theoryPercentage >= 45) {
        $theoryGrade = 'C';
    } elseif ($theoryPercentage >= 40) {
        $theoryGrade = 'C-';
    } elseif ($theoryPercentage >= 35) {
        $theoryGrade = 'D+';
    } elseif ($theoryPercentage >= 30) {
        $theoryGrade = 'D';
    } else {
        $theoryGrade = 'E';
    }



    // Calculate practical grade
    $practicalGrade = '';
    $practicalIcaMarksArray = array($practicalIca01Marks, $practicalIca02Marks, $practicalIca03Marks);
    rsort($practicalIcaMarksArray); // Sort the practical ICA marks array in descending order
   
    // Calculate practical grade
    $practicalPercentage = ($practicalMarks * 0.6) + (($practicalIcaMarksArray[0] + $practicalIcaMarksArray[1]) / 2);


    if ($practicalPercentage >= 80) {
        $practicalGrade = 'A+';
    } elseif ($practicalPercentage >= 75) {
        $practicalGrade = 'A';
    } elseif ($practicalPercentage >= 70) {
        $practicalGrade = 'A-';
    } elseif ($practicalPercentage >= 65) {
        $practicalGrade = 'B+';
    } elseif ($practicalPercentage >= 60) {
        $practicalGrade = 'B';
    } elseif ($practicalPercentage >= 55) {
        $practicalGrade = 'B-';
    } elseif ($practicalPercentage >= 50) {
        $practicalGrade = 'C+';
    } elseif ($practicalPercentage >= 45) {
        $practicalGrade = 'C';
    } elseif ($practicalPercentage >= 40) {
        $practicalGrade = 'C-';
    } elseif ($practicalPercentage >= 35) {
        $practicalGrade = 'D+';
    } elseif ($practicalPercentage >= 30) {
        $practicalGrade = 'D';
    } else {
        $practicalGrade = 'E';
    }

    // Calculate overall grade
    $overallGrade = '';
    $overallPercentage = ($theoryPercentage + $practicalPercentage) / 2;
    if ($overallPercentage >= 80) {
        $overallGrade = 'A+';
    } elseif ($overallPercentage >= 75) {
        $overallGrade = 'A';
    } elseif ($overallPercentage >= 70) {
        $overallGrade = 'A-';
    } elseif ($overallPercentage >= 65) {
        $overallGrade = 'B+';
    } elseif ($overallPercentage >= 60) {
        $overallGrade = 'B';
    } elseif ($overallPercentage >= 55) {
        $overallGrade = 'B-';
    } elseif ($overallPercentage >= 50) {
        $overallGrade = 'C+';
    } elseif ($overallPercentage >= 45) {
        $overallGrade = 'C';
    } elseif ($overallPercentage >= 40) {
        $overallGrade = 'C-';
    } elseif ($overallPercentage >= 35) {
        $overallGrade = 'D+';
    } elseif ($overallPercentage >= 30) {
        $overallGrade = 'D';
    } else {
        $overallGrade = 'E';
    }

    // Calculate GPA
    $gpa = '';
    if ($overallPercentage >= 80) {
        $gpa = 4.0;
    } elseif ($overallPercentage >= 75) {
        $gpa = 3.7;
    } elseif ($overallPercentage >= 70) {
        $gpa = 3.3;
    } elseif ($overallPercentage >= 65) {
        $gpa = 3.0;
    } elseif ($overallPercentage >= 60) {
        $gpa = 2.7;
    } elseif ($overallPercentage >= 55) {
        $gpa = 2.3;
    } elseif ($overallPercentage >= 50) {
        $gpa = 2.0;
    } elseif ($overallPercentage >= 45) {
        $gpa = 1.7;
    } elseif ($overallPercentage >= 40) {
        $gpa = 1.3;
    } elseif ($overallPercentage >= 35) {
        $gpa = 1.0;
    } elseif ($overallPercentage >= 30) {
        $gpa = 0.7;
    } else {
        $gpa = 0.0;
    }

    // Insert the data into the database
    $query = "INSERT INTO exams (reg_number, department, year_of_study, subject_code, theory_marks, practical_marks, theory_ica01_marks, theory_ica02_marks, theory_ica03_marks, practical_ica01_marks, practical_ica02_marks, practical_ica03_marks, theory_grade, practical_grade, overall_grade, gpa)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssiiiiiiiisssd", $regNumber, $department, $yearOfStudy, $subjectCode, $theoryMarks, $practicalMarks, $ica01Marks, $ica02Marks, $ica03Marks, $practicalIca01Marks, $practicalIca02Marks, $practicalIca03Marks, $theoryGrade, $practicalGrade, $overallGrade, $gpa);



    if ($stmt->execute()) {
        echo '<script>alert("Data saved successfully."); window.location.href = "exam_details.php";</script>';
        exit;
    } else {
        $error = "Failed to insert the data into the database.";
        header("Location: exam_details.php?error=" . urlencode($error));
        exit;
    }
}

$conn->close();
