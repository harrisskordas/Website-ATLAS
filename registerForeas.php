<?php

//account 
$image = $username = $email_A = $password = $conf_password = "";
//stoixeia upeuthinou atlas
$fullname_Y = $phone_Y = $email_Y = "";
//stoixeia forea
$type = $activity = $brand = $afm = $doy = $phone_C = $email_C = $site = $logo = $aboutme = "";
//stoixeia dieythinsis edras
$country = $address = $tk = $region = $township = "";
//stoixeia nomimou ekprosopou
$fullname_N = $phone_N = $email_N = $num_id = $image_id ="";
  

// step 1
if (empty($_POST["username"])) {
    die("username is required");
}

if ( ! filter_var($_POST["email_A"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["conf_password"]) {
    die("Passwords must match");
}

// step 2
if (empty($_POST["fullname_Y"])) {
    die("username is required");
}

if ( ! filter_var($_POST["email_Y"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (( preg_match("/[0-9]/", $_POST["phone_Y"])) && strlen($_POST["phone_Y"] == 10)) {
    die("Phone must be 10 numbers");
}
// step 3
// type = eidos forea
if (empty($_POST["type"])) {
    die("Eidos forea is required");
}

// activity = dedio_drasis
if (empty($_POST["activity"])) {
    die("Pedio drasis is required");
}

if (( preg_match("/[0-9]/", $_POST["phone_C"])) && strlen($_POST["phone_C"] == 10)) {
    die("Phone must be 10 numbers");
}

if ( ! filter_var($_POST["email_C"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (empty($_POST["brand"])) {
    die("Eponumia is required");
}

if (empty(trim($_POST["afm"]))){
    die("It's must be a number");
}

if (empty($_POST["doy"])) {
    die("Doy is required");
}

/*if (empty($_POST["site"])) {
    die("site is required");
}*/


// step 4
if (empty($_POST["country"])) {
    die("country is required");
}

if (empty($_POST["address"])) {
    die("Address is required");
}

if (empty($_POST["tk"])) {
    die("taxydromikos kodikas is required");
}

if (empty($_POST["region"])) {
    die("perifereia is required");
}

if (empty($_POST["township"])) {
    die("Dimos is required");
}

// step 5
if ( ! filter_var($_POST["email_N"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (( preg_match("/[0-9]/", $_POST["phone_N"])) && strlen($_POST["phone_N"] == 10)) {
    die("Phone must be 10 numbers");
}

if (strlen($_POST["num_id"]) != 8) {
    die("Number id must be 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["num_id"])) {
    die("Number id must contain two letter");
}

if ( ! preg_match("/[0-9]/", $_POST["num_id"])) {
    die("Number id must contain six number");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/includes/config.php";

//query need changes!
// 27 values must be entered in this query!

$sql = "INSERT INTO foreas_upodoxis (username, password, email_A, fullname_Y, phone_Y, email_Y, eidos_forea,
                              pedio_drasis, eponumia, phone_C, email_C, afm, doy, site, aboutme, logo,
                              country, address, tk, perifereia, dimos, fullname_N, phone_N, email_N,
                              num_id, image_id, image)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

// big bind!
//ssssssssssssssbssssssssssbb

$stmt->bind_param("ssssssssssssssbssssssssssbb",
                  $_POST["username"],
                  $password_hash,
                  $_POST["email_A"],
                  $_POST["fullname_Y"],
                  $_POST["phone_Y"],
                  $_POST["email_Y"],
                  $_POST["type"],
                  $_POST["activity"],
                  $_POST["brand"],
                  $_POST["afm"],
                  $_POST["doy"],
                  $_POST["phone_C"],
                  $_POST["email_C"],
                  $_POST["site"],
                  $_POST["aboutme"],
                  $_POST["logo"],
                  $_POST["country"],
                  $_POST["address"],
                  $_POST["tk"],
                  $_POST["region"],
                  $_POST["township"],
                  $_POST["fullname_N"],
                  $_POST["phone_N"],
                  $_POST["email_N"],
                  $_POST["num_id"],
                  $_POST["image_id"],
                  $_POST["image"],);
                  
if ($stmt->execute()) {

    header("Location: signin.php");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
//add a query to check if a username already exists!
?>
