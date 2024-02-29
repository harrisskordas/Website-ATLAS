<!DOCTYPE html>
<html lang="en">

<head>
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

    
<meta charset="utf-8">
    <title>DentCare - Dental Clinic Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <!-- <link href="img/favicon.ico" rel="icon"> -->

    <!-- Google Web Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">  -->

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
</head>

<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <p><a href="index.html"><img src="C:\xampp\htdocs\startbootstrap-agency-gh-pages\atlas_icon.png" style="width:100px;height:100px;margin-top:10px;"></a></p>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><b>Φοιτητές/τριες</b></a>
                    <div class="dropdown-menu m-0">
                        <a href="team.html" class="dropdown-item"><b>Αναζήτηση Θέσεων</b></a>
                        <a href="testimonial.html" class="dropdown-item"><b>Οι Αιτήσεις μου</b></a>
                        <a href="appointment.html" class="dropdown-item"><b>Αγαπημένες Θέσεις</b></a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><b>Φορείς Υποδοχείς</b></a>
                    <div class="dropdown-menu m-0">
                        <a href="team.html" class="dropdown-item"><b>Ανάρτηση Αγγελίας</b></a>
                        <a href="testimonial.html" class="dropdown-item"><b>Οι Αγγελίες μου</b></a>
                        <!-- <a href="appointment.html" class="dropdown-item"><b>Επικοινωνία</b></a> -->
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><b>Γραφεία Πρακτικής Άσκησης</b></a>
                    <div class="dropdown-menu m-0">
                        <a href="testimonial.html" class="dropdown-item"><b>Αναζήτηση Θέσεων</b></a>
                        <a href="team.html" class="dropdown-item"><b>Δεύσμευση Θέσεων</b></a>
                        <a href="appointment.html" class="dropdown-item"><b>Επιλεγμένες Θέσεις</b></a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link"><b>Ανακοινώσεις</b></a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><b>Βοήθεια</b></a>
                    <div class="dropdown-menu m-0">
                        <a href="price.html" class="dropdown-item"><b>Συχνές Ερωτήσεις</b></a>
                        <a href="team.html" class="dropdown-item"><b>Επικοινωνία</b></a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><b>Σχετικά με Εμάς</b></a>
                    <div class="dropdown-menu m-0">
                        <a href="price.html" class="dropdown-item"><b>Ποιοι Είμαστε</b></a>
                    </div>
                </div>
            </div>
            <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
            <a href="σελίδα αγγλικών"><img src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\img\united-kingdom.png" style="width:18px;height:18px;;margin-top: -70px;margin-left:-40px;"></a>
            <p style = "margin-top: -50px;font-size: 18px;color:#026fd4;"><b><a style="color:#026fd4" href="C:\xampp\htdocs\myapp\popup_Login.html">Είσοδος</b></a><b>/</b><b><a style="color:#026fd4"href="">Εγγραφή</a></b></p>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\img\carusel1.jpg" style="height:600px" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 1000px;">
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn" style="font-size:40px;margin-top: 2px;">Σπουδάζεις και θέλεις να μάθεις για τις διαθέσιμες θέσεις πρακτικής;<br><br></h1>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Αναζήτηση Θέσεων</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\img\carusel2.jpg" style = "height:600px"alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn" style="font-size:40px;margin-top: 2px;">Είστε Φορέας και θέλετε να αναρτήσετε μία αγγελία για πρακτική;<br><br></h1>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Ανάρτηση Αγγελίας</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\img\person-holding-light-bulb-with-graduation-cap.jpg" style = "height:600px"alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn" style="font-size:40px;margin-top: 2px;">Είστε Γραφείο Πρακτικής και θέλετε να μάθετε για τις διαθέσιμες θέσεις πρακτικής;<br><br></h1>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Αναζήτηση Θέσεων</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Σχετικά με εμάς</h5>
                    </div>
                    <p class="mb-4">Ο Άτλας είναι μία κεντρική διαδικτυακή υπηρεσία, η οποία δίνει τη δυνατότητα σε Φοιτητές/τριες να 
                        αναζητήσουν και να κάνουν αίτηση για τις ποικίλες διαθέσιμες θέσεις πρακτικής άσκησης τις,οποίες παρέχουν οι φορείς. Επίσης,
                        διασυνδέει τους φορείς που παρέχουν θέσεις πρακτικής άσκησης (ΠΑ) με όλα τα ακαδημαϊκά Ιδρύματα της επικράτειας, 
                        δημιουργώντας μία ενιαία βάση θέσεων πρακτικής άσκησης οι οποίες είναι διαθέσιμες προς επιλογή στα Ιδρύματα.</p>
                    <div class="row g-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.3s">
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Επαγγελατικό Προσωπικό</h5>
                            <!-- <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Πάντα στη διάθεση σας</h5> -->
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Πάντα στη διάθεση σας</h5>
                        </div>
                    </div>
                    <a href="appointment.html" class="btn btn-primary py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">Δείτε Περισσότερα</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\img\executives-joking-laughing-office.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    
    
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light py-5 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: -75px;">
        <div class="container pt-5">
            <div class="row g-5 pt-4">
                <div class="col-lg-3 col-md-6" style="margin-left:100px;">
                    <h3 class="text-white mb-4" style = "font-size:19px;">Social Networks</h3>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#" style="width:30px;height:33px;"><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#" style="width:30px;height:33px;"><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"style="width:30px;height:33px;"><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"style="width:30px;height:33px;"><i class="fab fa-instagram fw-normal"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" style="margin: left 100px;">
                    <h3 class="text-white mb-4" style = "font-size:19px;">Επικοινωνία</h3>
                    <p style = "font-size:13px;">Σύστημα Κεντρικής Υποστήριξης της Πρακτικής Άσκησης Φοιτητών ΑΕΙ</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i> <a href="#" style = "font-size:13px;">Φόρμα Επικοινωνίας</a></p>
                    <p class="mb-0" style = "font-size:13px;"><i class="bi bi-telephone text-primary me-2"></i>+30 215 215 7860</p>
               
                <a href="https://www.grnet.gr/"><img src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\img\grnet_logo.png"style="width:30%;height:50px;margin-top:-90px;margin-left:450px;"></a>
                <a href="https://www.espa.gr/en/Pages/default.aspx"><img src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\img\espa.jpg"style="width:70px;height:43px;margin-top:-290px;margin-left:670px;"></a>
                <a href="https://commission.europa.eu/funding-tenders/find-funding/funding-management-mode/2014-2020-european-structural-and-investment-funds_el"><img src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\img\europe.png"style="width:25%;height:45px;margin-top:-350px;margin-left:450px;"></a>
                <a href="https://www.minedu.gov.gr/"><img src="C:\xampp\htdocs\myapp\dentcare-1.0.0\dentcare-1.0.0\img\logo.png"style="width:60%;height:65px;margin-top:-230px;margin-left:650px;"></a>
            
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
</body>

</html>