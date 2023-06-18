<?php
// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to index.php
header("Location: \Backup 09\index.php");
exit();
?>
