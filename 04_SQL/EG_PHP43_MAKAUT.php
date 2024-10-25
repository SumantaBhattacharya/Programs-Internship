<?php
/*
Hostname
MySQL username
MySQL password 
your database name
Create connection

if(!$connection){
    die("Connection failed: ".mysqli_connect_error());
}else{
    echo "Connected successfully<br>";
}

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
    echo "Connected successfully<br>";

*/

// MySQLi connection

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

<!-- 
http://localhost/PHP43/04_SQL/EG_PHP43_MAKAUT.php

Since the UID field in your Students table is defined as AUTO_INCREMENT, you don't need to include it in the form. The database will automatically generate a unique UID value whenever a new record is inserted.

-->