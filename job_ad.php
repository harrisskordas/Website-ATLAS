<?php

 session_start();

 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: ../login.php");
    exit;
 }   

 $mysqli = require __DIR__ . "/includes/config.php";

$id = $_SESSION["id"];

//echo "id-------------> $id";

$object = $place = $part = $dur = "";
$time = $from = $to = $salary = "";
$aboutjob = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $object= $_POST["object"];
    if (empty($object)) {
        die("Job title is required");
    }
    
    echo "object-----------------> $object ";

    echo "id-------------> $id";

    $place = $_POST["place"];
    if (empty(trim($place))) {
        die("Job's location is required");
    }
    echo "place-------------> $place";

    $part = $_POST["part"];
    if (empty(trim($part))){
        die("Section is required");
    }
    
    echo "part-------------> $part";

    //it's a checkbox
    if ($_POST["dur"]) {
        $dur = $_POST["dur"];
    }
    echo "dur-------------> $dur";

    //it's a checkbox
    if ($_POST["time"]) {
        $time = $_POST["time"];
    }
    $time =$_POST["time"];
    echo "id-------------> $time";

    $from = $_POST["from"];
    if (empty($_POST["from"])) {
        die("Start date is required");
    }
    echo "from-------------> $from";

    $to = $_POST["to"];
    if (empty($_POST["to"])) {
        die("Finish date is required");
    }
    echo "to-------------> $to";

    $salary = $_POST["salary"];
    if (empty($_POST["salary"])) {
        die("Salary is required");
    }
    
    echo "salary-------------> $salary";

    $aboutjob= $_POST["aboutjob"];
    if (empty($_POST["aboutjob"])) {
        die("Description is required");
    }
    echo "$aboutjob";

    $sql = "INSERT INTO jodad (title, topothesia, tmima, duration, time, dateStart, dateEnd, salary, description, foreas_upodoxis_id)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $mysqli->stmt_init();

    if ($stmt->prepare($sql)) {

        mysqli_stmt_bind_param($stmt,"sssssssisi",
                        $object,
                        $place,
                        $part,
                        $dur,
                        $time,
                        $from,
                        $to,
                        $salary,
                        $aboutjob,
                        $id);
                    
                        
        if($stmt->execute()) {
            $done_message = "Η αγγελία προστέθηκε με επιτυχία!";
            header("Location: index.php");
        } else {
            echo "Κάποιο λάθος συνέβη, δοκιμάστε ξανά αργότερα!";
        }
        $stmt->close();
    }

    $mysqli->close();
}
?>
