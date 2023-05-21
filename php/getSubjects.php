<?php
	require 'dbconfig.php';

	if(isset($_POST['year']) && isset($_POST['semester'])) {
		$year = $_POST['year'];
		$semester = $_POST['semester'];
		$query = "SELECT subject_code, subject_name, number_of_credits FROM subjects WHERE year_of_study = '$year' AND semester = '$semester'";
		$result = mysqli_query($conn, $query);

		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
		    $rows[] = $r;
		}

		echo json_encode($rows);
	}
	$conn->close();
?>
