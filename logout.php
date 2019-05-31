<?php 
// Initialize session
session_start();
// Unset all session variables
session_unset();
// Destroy all data registered to a session
session_destroy();

// Return user to login page
header("location: login.php");
exit;
?>