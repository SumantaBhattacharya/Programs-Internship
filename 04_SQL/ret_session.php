<!-- retrive_session.php -->

<?php

   session_start();
   
   if(isset($_SESSION['info'])){
    // session data exists
    echo "Session data: ". $_SESSION['info']; // Display the session data
    // session_unset(); // Unset session data
   }else{
    // session data does not exist
    echo "No session data found.";
   }

   // Check if session data exists
  //  echo "Session data: ". $_SESSION['info']; // Display the session data
  
?>

<!-- 
http://localhost/PHP43/04_SQL/ret_session.php
-->