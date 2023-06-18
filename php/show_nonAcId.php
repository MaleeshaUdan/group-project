<?php
    require 'dbconfig.php';

    // Set the starting stfId value
    $last_id = 'STF000009';

    // Get the last recorded stfId from the nonAcStaff table
    $query = "SELECT stfId FROM nonacstaff ORDER BY stfId DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      $last_id = $row['stfId'];
    }

    // Generate the next staff ID by incrementing the last ID by 1
    $next_id = 'STF' . str_pad(substr($last_id, 3) + 1, 6, '0', STR_PAD_LEFT);

    echo $next_id;

?>
