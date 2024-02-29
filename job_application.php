<?php

 session_start();

 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: ../signin.php");
    exit;
 }   

 $mysqli = require __DIR__ . "/includes/config.php";

$bio = $vathmoi = "";

if (empty($_POST["bio"])) {
    die("CV is required");
}

if (empty($_POST["vathmoi"])) {
    die("Analutiki Vathmologia location is required");
}




?>