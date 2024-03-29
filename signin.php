<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: signin.php");
    exit;
}
 
// Include config file
$mysqli = require __DIR__ . "/includes/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Παρακαλώ εισάγετε το username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Παρακαλώ εισάγετε τον κωδικό σας.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, fullname, password FROM foititis WHERE username = ?";
        
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $fullname, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            $_SESSION["fullname"] = $fullname;                            

                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Ο κωδικός που δώσατε είναι λανθασμένος.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Δεν βρέθηκε λογαριασμός με αυτό το username.";
                }
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

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .modal-box {
            font-family: 'Poppins', sans-serif;
        }

        .show-modal {
            color: #fff;
            background:  #026fd4;
            font-size: 18px;
            font-weight: 600;
            text-transform: capitalize;
            padding: 10px 15px;
            margin: 200px auto 0;
            border: none;
            outline: none;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            display: block;
            transition: all 0.3s ease 0s;
        }

        .show-modal:hover,
        .show-modal:focus {
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
            outline: none;
        }

        .modal-dialog {
            width: 400px;
            margin: 70px auto 0;
        }

        .modal-dialog {
            transform: scale(0.5);
        }

        .modal-dialog {
            transform: scale(1);
        }

        .modal-dialog .modal-content {
            text-align: center;
            border: none;
        }

        .modal-content .close {
            color: #fff;
            background:  #026fd4;
            font-size: 25px;
            font-weight: 400;
            text-shadow: none;
            line-height: 27px;
            height: 25px;
            width: 25px;
            border-radius: 50%;
            overflow: hidden;
            opacity: 1;
            position: absolute;
            left: auto;
            right: 8px;
            top: 8px;
            z-index: 1;
            transition: all 0.3s;
        }

        .modal-content .close:hover {
            color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .close:focus {
            outline: none;
        }

        .modal-body {
            padding: 60px 40px 40px !important;
        }

        .modal-body .title {
            color: #0a0a0a;
            font-size: 27px;
            font-weight: 700;
            margin: 0 0 10px;
        }

        .modal-body .description {
            color: #9A9EA9;
            font-size: 16px;
            margin: 0 0 20px;
        }

        .modal-body .form-group {
            text-align: left;
            margin-bottom: 20px;
            position: relative;
        }

        .modal-body .input-icon {
            color: #777;
            font-size: 18px;
            transform: translateY(-50%);
            position: absolute;
            top: 50%;
            left: 20px;
        }

        .modal-body .form-control {
            font-size: 17px;
            height: 45px;
            width: 100%;
            padding: 6px 0 6px 50px;
            margin: 0 auto;
            border: 2px solid #eee;
            border-radius: 5px;
            box-shadow: none;
            outline: none;
        }

        .form-control::placeholder {
            color: #AEAFB1;
        }

        .form-group.checkbox {
            width: 130px;
            margin-top: 0;
            display: inline-block;
        }

        .form-group.checkbox label {
            color: #9A9EA9;
            font-weight: normal;
        }

        .form-group.checkbox input[type=checkbox] {
            margin-left: 0;
        }

        .modal-body .forgot-pass {
            color: #7F7FD5;
            font-size: 13px;
            text-align: right;
            width: calc(100% - 135px);
            margin: 2px 0;
            display: inline-block;
            vertical-align: top;
            transition: all 0.3s ease 0s;
        }

        .forgot-pass:hover {
            color: #9A9EA9;
            text-decoration: underline;
        }

        .modal-content .modal-body .btn {
            color: #fff;
            background:  #026fd4;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            line-height: 38px;
            width: 100%;
            height: 40px;
            padding: 0;
            border: none;
            border-radius: 5px;
            border: none;
            display: inline-block;
            transition: all 0.6s ease 0s;
        }

        .modal-content .modal-body .btn:hover {
            color: #fff;
            letter-spacing: 2px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .modal-content .modal-body .btn:focus {
            outline: none;
        }

        @media only screen and (max-width: 480px) {
            .modal-dialog {
                width: 95% !important;
            }

            .modal-content .modal-body {
                padding: 60px 20px 40px !important;
            }
        }
    </style>
</head>

<body>
    <form method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal-box">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg show-modal" data-toggle="modal"
                            data-target="#myModal">
                            Login Form
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content clearfix">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <h3 class="title">Είσοδος</h3><br>
                                        <div class="form-group">
                                            <span class="input-icon"><i class="fa fa-user"></i></span>
                                            <input type="username" class="form-control" placeholder="Username" name="username" value="<?php echo $_POST['username']; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <span class="input-icon"><i class="fas fa-key"></i></span>
                                            <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" >
                                        </div>
                                        <div class="form-group checkbox">
                                            <input type="checkbox">
                                            <label>Θυμήσου με</label>
                                        </div>
                                        <a href="" class="Ξέχασες τον κωδικό?">Ξέχασες τον κωδικό?</a>
                                        <button class="btn">Login</button> <br> <br>
                                        <p style="color: #9A9EA9;">Δεν έχεις λογαριασμό?
                                            <a href="companies_register.html" class="Κάνε εγγραφή τώρα!">Κάνε εγγραφή τώρα!</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    </form>
</body>

</html>