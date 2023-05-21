<?php
	require 'dbconfig.php';

	if(isset($_POST['year']) && isset($_POST['faculty'])) {
		$year = $_POST['year'];
		$faculty = $_POST['faculty'];
		$query = "SELECT reg_number, sname, department,date_of_admission FROM student WHERE academic_year = '$year' AND faculty = '$faculty'";
		$result = mysqli_query($conn, $query);

		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
		    $rows[] = $r;
		}

		if(mysqli_num_rows($result) > 0) {
			echo json_encode($rows);
		} else {
			echo "No records found.";
		}
	}
	$conn->close();
?> 
