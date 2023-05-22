<?php
require 'dbconfig.php';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$confirmPassword = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_STRING);

if ($password !== $confirmPassword) {
    echo "Error: Passwords do not match.";
    echo "<script>alert('Passwords do not match.'); window.location.href = 'superad.php';</script>";
    exit();
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Check if username already exists
$checkQuery = "SELECT * FROM login WHERE username = '$username'";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    echo "Error: Username already exists.";
    echo "<script>alert('Username already exists.'); window.location.href = 'superad.php';</script>";
    exit();
}

// Insert the user information into the login table
$sql = "INSERT INTO login (name, username, password) VALUES ('$name', '$username', '$hashedPassword')";

if (mysqli_query($conn, $sql)) {
    echo "User created successfully.";
    echo "<script>alert('User created successfully'); window.location.href = 'superad.php';</script>";
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
