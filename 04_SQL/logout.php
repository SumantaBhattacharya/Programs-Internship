<?php
 session_start(); // Call session_start() only once at the top
 require("EG_PHP43_MAKAUT.php"); // Ensure this only contains the connection logic

 // Unset only the 'u_info' session variable
 unset($_SESSION['u_info']);

// Destroy all session data
// $_SESSION = []; // Clear session array
// session_unset(); // Free all session variables
// session_destroy(); // Destroy the session itself

// Redirect to the login page after logout
header("Location: login.php"); // Replace 'login.php' with your login page URL
exit();

?>