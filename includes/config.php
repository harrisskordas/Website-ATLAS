<?php

$host = "localhost";
$db_username = "root";
$db_password =  "";
$db_name = "atlas";
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli($host, $db_username, $db_password, $db_name);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;
?>