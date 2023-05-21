<?php

require 'dbconfig.php';

$lec_id=filter_input(INPUT_POST,'lecture-id',FILTER_SANITIZE_STRING);
$lecturer_name = filter_input(INPUT_POST, 'lecturer-name', FILTER_SANITIZE_STRING);
$lecturer_name = strtoupper($lecturer_name);
$name_with_initials = filter_input(INPUT_POST, 'sname', FILTER_SANITIZE_STRING);
$name_with_initials = strtoupper($name_with_initials);
$gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$address = strtoupper($address);
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_NUMBER_INT);
$nid = filter_input(INPUT_POST, 'nid', FILTER_SANITIZE_STRING);
$nid = strval($nid); // convert to string
$nid = str_replace('v', 'V', $nid); // replace any 'v' characters with 'V'
$university = filter_input(INPUT_POST, 'university', FILTER_SANITIZE_STRING);
$university = strtoupper($university);
$degree = filter_input(INPUT_POST, 'degree', FILTER_SANITIZE_STRING);
$degree = strtoupper($degree);

// check for duplicates based on email or NIC
$sql = "SELECT * FROM staff WHERE nic='$nid' OR email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Error: Lecturer Already Exists (NIC or Email can not be same).')</script>";
    echo "<script>window.location = 'add_lec.php'</script>";
} else {
    
		$sql = "INSERT INTO staff (lecId,fname, sname, gender, address, dob, email, telephone, nic, university, degree) 
        VALUES ('$lec_id','$lecturer_name', '$name_with_initials', '$gender', '$address', '$dob', '$email', '$telephone', '$nid', '$university', '$degree')";
        if (mysqli_query($conn, $sql)) {
		    echo "<script>alert('Lecturer added successfully.')</script>";
		    echo "<script>window.location = 'add_lec.php'</script>";
		} else {
		    echo "<script>alert('Error: Record Not Saved')</script>";
		    echo "<script>window.location = 'add_lec.php'</script>";
		}
    } 


$conn->close();

?>
