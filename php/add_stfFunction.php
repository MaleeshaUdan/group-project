<?php

require 'dbconfig.php';

$stf_id = filter_input(INPUT_POST, 'staff-id', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, 'staff-name', FILTER_SANITIZE_STRING);
$name = strtoupper($name);
$sname = filter_input(INPUT_POST, 'stfs-name', FILTER_SANITIZE_STRING);
$sname = strtoupper($sname);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone_number = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_NUMBER_INT);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$address = strtoupper($address);
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);
$gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
$date_of_joining = filter_input(INPUT_POST, 'dateOfJoining', FILTER_SANITIZE_STRING);
$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING);
$position = strtoupper($position);
$section = filter_input(INPUT_POST, 'section', FILTER_SANITIZE_STRING);
$section = strtoupper($section);
$nid = filter_input(INPUT_POST, 'nid', FILTER_SANITIZE_STRING);
$nid = strval($nid); // convert to string
$nid = str_replace('v', 'V', $nid); // replace any 'v' characters with 'V'

// check for duplicates based on email
$sql = "SELECT * FROM nonAcStaff WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Error: Staff Member Already Exists (Email must be unique).')</script>";
    echo "<script>window.location = 'add_nonAcStf.php'</script>";
} else {
    $sql = "INSERT INTO nonAcStaff (stfId, firstName, lastName, email, phoneNumber, address, dob, gender, dateOfJoining, position, section, nic) 
        VALUES ('$stf_id', '$name', '$sname', '$email', '$phone_number', '$address', '$dob', '$gender', '$date_of_joining', '$position', '$section','$nid');";
        
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Non-Academic Staff added successfully.')</script>";
        echo "<script>window.location = 'add_nonAcStf.php'</script>";
    } else {
        echo "<script>alert('Error: Record Not Saved')</script>";
        echo "<script>window.location = 'add_nonAcStf.php'</script>";
    }
}

$conn->close();

?>
