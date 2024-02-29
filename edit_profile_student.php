<?php

 session_start();

 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: ../login.php");
    exit;
 }   

 $mysqli = require __DIR__ . "/includes/config.php";

 if (isset($_SESSION['id'])) {
	$myid = $_SESSION['id'];
	//Get user data
	$get_user = $mysqli->query("SELECT username, fullname FROM foititis WHERE id = '$myid'");
	$user_data_row = $get_user->fetch_row();
	$userDataFullname = $user_data_row[1];
}

// Define variables and initialize with empty values
$username = $password = $conf_password = $name = $email = $address = $dob = "";
$uni_part = $uni = $aboutme = $phone = "";
$sem = "";
$image = $bio = "";
$username_err = $password_err = $confirm_password_err = $fullname_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate fullname
    if(empty(trim($_POST["fullname"]))){
        $fullname_err = "Παρακαλώ δώστε ονοματεπώνυμο.";
    } elseif(strlen(trim($_POST["fullname"])) < 2){
        $fullname_err = "Το ονοματεπώνυμο πρέπει να έχει τουλάχιστον 2 χαρακτήρες.";
    } else{
        $fullname = trim($_POST["fullname"]);
    }

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

    // Check input errors before inserting in database
    if(empty($fullname_err)){

        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // Prepare an insert statement
        $sql = "UPDATE foititis SET username= ?, fullname= ?, password= ?, email= ?, phone= ?, dateOfBirth= ?, address= ?,
                        sxoli= ?, tmima= ?, examino= ?, cv= ?, text= ?, image= ? WHERE id = ? ";
        
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt,"ssssssssssbsb",
                                            $_POST["username"],
                                            $_POST["name"],
                                            $password_hash,
                                            $_POST["email"],
                                            $_POST["phone"],
                                            $_POST["address"],
                                            $_POST["dob"],
                                            $_POST["uni"],
                                            $_POST["uni_part"],
                                            $_POST["sem"],
                                            $_POST["bio"],
                                            $_POST["aboutme"],
                                            $_POST["image"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect
				$done_message = "<div class='alert alert-success' role='alert'>Η αλλαγή ολοκληρώθηκε!</div>";
                header("Location: student_profil.php");
            } else{
                echo "Κάποιο λάθος συνέβη, δοκιμάστε ξανά αργότερα!";
			}

			// Close statement
			mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($mysqli);
}
?>