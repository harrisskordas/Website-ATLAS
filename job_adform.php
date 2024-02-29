<?php

 session_start();

 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: signin.php");
    exit;
 }   

 $mysqli = require __DIR__ . "/includes/config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        ul.breadcrumb {
            padding: 10px 16px;
            list-style: none;
        }

        /* Display list items side by side */
        ul.breadcrumb li {
            display: inline;

        }

        /* Add a slash symbol (/) before/behind each list item */
        ul.breadcrumb li+li:before {
            padding: 8px;
            color: black;
            content: "/\00a0";
            font-size: 14px;
        }

        /* Add a color to all links inside the list */
        ul.breadcrumb li a {
            color: #0275d8;
            text-decoration: none;
        }

        /* Add a color on mouse-over */
        ul.breadcrumb li a:hover {
            color: #01447e;
            text-decoration: underline;
        }

        .dropbtn {
            background-color: #b8b8bf;
            color: white;
            padding: 2px 12px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            text-align: center;
            margin-bottom: 75px;
            margin-left: -90px;
            /* margin-top: -500px; */
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            margin-top: -95px;
            margin-left: -90px;
            /* margin-left: -100px; */
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            /* margin-bottom: 70px;
  margin-left: -50px; */
            /* margin-left: -100px; */
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #7eb4e7;
        }


        .text {
            margin-right: 500px;
            margin-top: -55px;
            color: #000;
        }

        .text_aboutme {
            margin-right: -100px;
            margin-top: -80px;
            color: #000
        }

        .form {
            /* width: clamp(420px, 30%, 430px); */
            margin: 50px;
            border: 1px solid #b8b8bf;
            background-color: rgb(238, 238, 238);
            border-radius: 0.35rem;
            padding: 2rem;
            margin-left: 400px;
            margin-top: -30px;
        }

        ul.breadcrumb {
            padding: 10px 16px;
            list-style: none;
        }

        /* Display list items side by side */
        ul.breadcrumb li {
            display: inline;
            font-size: 18px;
        }

        /* Add a slash symbol (/) before/behind each list item */
        ul.breadcrumb li+li:before {
            padding: 8px;
            color: black;
            content: "/\00a0";
        }

        /* Add a color to all links inside the list */
        ul.breadcrumb li a {
            color: #0275d8;
            text-decoration: none;
        }

        /* Add a color on mouse-over */
        ul.breadcrumb li a:hover {
            color: #01447e;
            text-decoration: underline;
        }


        input {
            display: block;
            width: 70%;
            padding: 0.40rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            /* margin: 100px -20px 70px 45px; */
        }


        .input-group {
            margin: 1.5rem 0;
            margin-left: 200px;
        }

        /* Button */
        .btns-group {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .btn {
            padding: 0.75rem;
            display: block;
            text-decoration: none;
            background-color: var(--primary-color);
            color: #f3f3f3;
            text-align: center;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
        }

        .modal-box {
            font-family: 'Poppins', sans-serif;
        }

        .show-modal {
            color: #fff;
            background: #026fd4;
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
            background: #026fd4;
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
            background: #026fd4;
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


    <meta charset="utf-8">
    <title>Atlas - Add a new job</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <p><a href="index.html"><img src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\atlas_icon.png"
                    style="width:100px;height:100px;margin-top:10px;"></a></p>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="" class="nav-item nav-link"><b>Ανάρτηση Αγγελίας</b></a>
                <a href="" class="nav-item nav-link"><b>Οι Αγγελίες μου</b></a>
            </div>
            <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i
                    class="fa fa-search"></i></button>
            <div class="dropdown">
                <button class="dropbtn"><i class='fas fa-user-circle'
                        style='font-size:25px;color: rgb(238, 238, 238)'></i></button>
                <div class="dropdown-content">
                    <a href="companies_profil">Στοιχεία</a>
                    <a href="#">Μηνύματα</a>
                    <a action='logout.php' href="index.php">Αποσύνδεση</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->



    <div class="container-fluid position-relative pt-5 wow fadeInUp" data-wow-delay="0.1s" style="z-index: 1;">
        <ul class="breadcrumb">
            <li style="font-size: 14px;"><a href="λινκ αρχικης σελίδας"><i class="fa fa-home"></i></a></li>
            <li style="font-size: 14px;"><a href="λινκ αρχικης εγγραφής">Φορείς Υποδοχής Πρακτικής</a></li>
            <li style="font-size: 14px;color:black">Ανάρτηση Αγγελίας</li>
        </ul>
        <p style="font-size:19px;margin-left: 400px;color: #000;"><b>Ανάρτηση Αγγελίας</b></p><br><br>
        <form action="job_ad.php" method="post" class="form" style="width:700px">
            <div class="input-group">
                <input type="text" name="object" required id="object">
            </div>
            <div class="text">
                <label for="object"><b>Γνωστικό Αντικείμενο:</b></label>
            </div>
            <div class="input-group">
                <input type="text" name="place" required id="place">
            </div>
            <div class="text">
                <label for="place"><b>Τοποθεσία:</b></label>
            </div>
            <div class="input-group">
                <input type="text" name="part" required id="part">
            </div>
            <div class="text">
                <label for="part"><b>Τμήμα:</b></label>
            </div>
            <div class="input-group">
                <select name="dur" id="dur">
                    <option value="months3">3 μήνες</option>
                    <option value="months6">6 μήνες</option>
                    <!-- <option value="part_time">Μερική Απασχόληση</option>
                        <option value="full_time">Πλήρης Απασχόληση</option> -->
                </select>
            </div>
            <div class="text">
                <label for="dur"><b>Διάρκεια:</b></label>
            </div>
            <div class="input-group">
                <select name="time" id="time">
                    <option value="part_time">Μερική Απασχόληση</option>
                    <option value="full_time">Πλήρης Απασχόληση</option>
                </select>
            </div>
            <div class="text">
                <label for="time"><b>Τρόπος Απασχόλησης:</b></label>
            </div>
            <div class="input-group">
                <input type="date" name="from" required id="from">
            </div>
            <div class="text">
                <label for="from"><b>Από:</b></label>
            </div>
            <div class="input-group">
                <input type="date" name="to" required id="to">
            </div>
            <div class="text">
                <label for="to"><b>Εώς:</b></label>
            </div>
            <div class="input-group">
                <input type="number" name="salary" required id="salary">
            </div>
            <div class="text">
                <label for="salary"><b>Αμοιβή:</b></label>
            </div>
            <div class="input-group">
                <textarea id="aboutjob" name="aboutjob" rows="4" cols="50"
                    style="width:450px;margin-left: -3px;margin-top: -3px;"></textarea>
            </div>
            <div class="text_aboutme">
                <label for="aboutjob"><b>Περιγραφή:</b></label>
            </div>
            <button
                style="margin-top:60px;margin-left: 200px;border: none;color: white;background-color:  #026fd4;padding: 4px 21px; cursor:pointer;border-radius: 0.25rem; box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);">Υποβολή</button>
            <button
                style="margin-top:60px;margin-left:20px;border: none;color: black;background-color:  #cfcece;padding: 4px 21px;cursor:pointer;border-radius: 0.25rem;">Προσωρινή
                Αποθήκευση</button>
        </form>
    </div>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light py-5 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: -75px;">
        <div class="container pt-5">
            <div class="row g-5 pt-4">
                <div class="col-lg-3 col-md-6" style="margin-left:100px;">
                    <h3 class="text-white mb-4" style="font-size:19px;">Social Networks</h3>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"
                            style="width:30px;height:33px;"><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"
                            style="width:30px;height:33px;"><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"
                            style="width:30px;height:33px;"><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"
                            style="width:30px;height:33px;"><i class="fab fa-instagram fw-normal"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" style="margin: left 100px;">
                    <h3 class="text-white mb-4" style="font-size:19px;">Επικοινωνία</h3>
                    <p style="font-size:13px;">Σύστημα Κεντρικής Υποστήριξης της Πρακτικής Άσκησης Φοιτητών ΑΕΙ</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i> <a href="#"
                            style="font-size:13px;">Φόρμα Επικοινωνίας</a></p>
                    <p class="mb-0" style="font-size:13px;"><i class="bi bi-telephone text-primary me-2"></i>+30 215 215
                        7860</p>

                    <a href="https://www.grnet.gr/"><img
                            src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\img\grnet_logo.png"
                            style="width:30%;height:50px;margin-top:-90px;margin-left:450px;"></a>
                    <a href="https://www.espa.gr/en/Pages/default.aspx"><img
                            src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\img\espa.jpg"
                            style="width:70px;height:43px;margin-top:-290px;margin-left:670px;"></a>
                    <a
                        href="https://commission.europa.eu/funding-tenders/find-funding/funding-management-mode/2014-2020-european-structural-and-investment-funds_el"><img
                            src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\img\europe.png"
                            style="width:25%;height:45px;margin-top:-350px;margin-left:450px;"></a>
                    <a href="https://www.minedu.gov.gr/"><img
                            src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\img\logo.png"
                            style="width:60%;height:65px;margin-top:-230px;margin-left:650px;"></a>

                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="lib/twentytwenty/jquery.event.move.js"></script>
        <script src="lib/twentytwenty/jquery.twentytwenty.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
</body>

</html>