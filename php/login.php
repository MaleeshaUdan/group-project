<?php
	session_start();
	require 'dbconfig.php';
	
	$username = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);

	$query="SELECT * FROM login WHERE username='$username' AND password='$password'";
	$result=mysqli_query($conn,$query);

	if (mysqli_num_rows($result)) {
		
			$_SESSION['username'] = $username;
   			header("Location: landing_page.php");//change header redirecting page
    		exit();

	} else {
		header("Location: user_pass_inco.php");

	}

	$conn->close();
?>
