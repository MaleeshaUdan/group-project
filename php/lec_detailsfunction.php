<?php

require 'dbconfig.php';

$search = filter_input(INPUT_POST, 'srch', FILTER_SANITIZE_STRING);
$search = preg_replace('/[a-z]+/i', strtoupper('$0'), $search);

$sql = "SELECT * FROM staff WHERE lecId='$search'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}else 
{
   echo "error";

}


$conn->close();

?>