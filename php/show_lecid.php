<?php
	require 'dbconfig.php';

// Set the starting lecId value
$last_id = 'LEC000009';

// Get the last recorded lecId from the staff table
$query = "SELECT lecId FROM staff ORDER BY lecId DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
if ($row) {
  $last_id = $row['lecId'];
}

// Generate the next lecturer ID by incrementing the last ID by 1
$next_id = 'LEC' . str_pad(substr($last_id, 3) + 1, 6, '0', STR_PAD_LEFT);

echo $next_id;


?>

