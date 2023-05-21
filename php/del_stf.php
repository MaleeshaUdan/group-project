<?php
	require 'dbconfig.php';

	if(isset($_POST['staffid'])) {
		$search = filter_input(INPUT_POST, 'staffid', FILTER_SANITIZE_STRING);
		$search = preg_replace('/[a-z]+/i', strtoupper('$0'), $search);

		$sql = "DELETE FROM nonAcStaff WHERE stfId='$search'";
		
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