<?php
$username = $password = $conf_password = $name = $email = $address = $dob = "";
$uni_part = $uni = $text = $phone = "";
$sem = 0;
$image = $bio = "";

if (empty($_POST["username"])) {
    die("username is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
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

if (empty($_POST["name"])) {
    die("Name is required");
}

if (empty($_POST["address"])) {
    die("Address is required");
}

if (empty($_POST["dob"])) {
    die("birthday date is required");
}

if (( preg_match("/[0-9]/", $_POST["phone"])) && strlen($_POST["phone"] == 10)) {
    die("Phone must be 10 numbers");
}

if (empty($_POST["uni"])) {
    die("Uni is required");
}

if (empty(trim($_POST["uni_part"]))) {
    die("Department is required");
}

if (empty(trim($_POST["sem"]))){
    die("It's must be a number");
}

if (empty($_POST["bio"])) {
    die("Cv is required");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/includes/config.php";

$sql = "INSERT INTO foititis (username, fullname, password, email, phone, dateOfBirth, address, sxoli, tmima,
                examino, cv, text, image)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssssssssbsb",
                  $_POST["username"],
                  $_POST["name"],
                  $password_hash,
                  $_POST["email"],
                  $_POST["phone"],
                  $_POST["dob"],
                  $_POST["address"],
                  $_POST["uni"],
                  $_POST["uni_part"],
                  $_POST["sem"],
                  $_POST["bio"],
                  $_POST["text"],
                  $_POST["image"]);
                  
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
