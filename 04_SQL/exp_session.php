<?php
  session_start();

  session_destroy();

  echo "The Session has been destroyed";

     // unset the session variable
    //   session_unset(); // unset all session variables
   //   unset($_SESSION['info']); // unset the session variable
  // Redirect to the login page
 //  header("Location: login.php");
//   exit(); // Good practice to call exit after a redirect


//   if(isset($_SESSION['info'])){
//   }

?>

<!-- 
http://localhost/PHP43/04_SQL/exp_session.php

-->