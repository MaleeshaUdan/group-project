<?php
	require 'dbconfig.php';

	if(isset($_POST['lectureid'])) {
		$search = filter_input(INPUT_POST, 'lectureid', FILTER_SANITIZE_STRING);
		$search = preg_replace('/[a-z]+/i', strtoupper('$0'), $search);

		$sql = "DELETE FROM staff WHERE lecId='$search'";
		
		if (mysqli_query($conn,$sql)) {
			echo "Record deleted successfully.";
		} else {
			echo "Error: Failed to delete the record.";
		}
	} else {
		echo "Error: Invalid request.";
	}

	$conn->close();
?>