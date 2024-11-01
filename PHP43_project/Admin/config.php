<?php
// session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PHP43";

// Create connection

$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($connection->connect_error){
    die("Connection failed: " .$connection->connect_error);
}
// else{
//     echo "Connected successfully<br>";
// }

?>
<!-- D:\xampp\htdocs\PHP43\PHP43_project\Admin\config.php 
    http://localhost/PHP43/PHP43_project/Admin/config.php 
-->