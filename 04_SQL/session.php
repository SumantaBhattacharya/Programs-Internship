<?php
   session_start();
   // Store the value in a session variable
   $_SESSION['info'] = "Euphoria";

   echo "Session data is set.";
?>

<!-- 

http://localhost/PHP43/04_SQL/session.php

D:\xampp\htdocs\PHP43\04_SQL\session.php

D:\xampp\tmp
sess_efucfbg940oi6vkdm4qi54ql2h

   session
   session gets executed in the server and for each and every user a unique session gets generated(server to client and the client to server)
   we can store the data in the session temporarily
   session_start() function is used to start the session.
   session_destroy() function is used to destroy the session.
   session_unset() function is used to unset all session variables.
   session_name() function is used to set the session name.
   session_regenerate_id() function is used to regenerate session id.

    $_SESSION('info') = "Sumanta";

    session_start() without starting the session you cant store the data into the session and you can retrive the data from the session

    session_destroy() to destroy the session and remove all the data associated with the session.
    
-->