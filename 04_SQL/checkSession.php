<?php
   if (empty($_SESSION['u_info'])) {
    # code...
    header("Location: login.php");
    exit(); // Stop the script if no user is logged in
   }
?>