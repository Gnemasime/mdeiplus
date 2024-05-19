<!DOCTYPE html>
<html>

<?php
include ('conn.php');

$id = $_GET['updateid'];
$query = $con->query("SELECT * FROM `book` WHERE id = $id ");
$row = mysqli_fetch_assoc($query);
$name = $row['name'];

$cell = $row['cell'];
$reason = $row['reason'];
$date = $row['date'];
$time = $row['time'];

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //SOMETHING WAS POSTED
    $name = $_POST['name'];
   
    $cell= $_POST['cell'];
    $reason = $_POST['reason'];
    $date= $_POST['date'];
    $time = $_POST['time'];

    $query = $con->query("UPDATE  `book` SET id = $id,
     name = '$name', cell = '$cell' , reason = '$reason' , date = $date , time = $time
     WHERE id = $id");
     if($query){
        echo "<script>alert('Booking information updated successfully.')</script>";
        header("Location:dashboard.php");
     } else{
        echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
     }
}
?>
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Title -->
    <title>Mediplus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/> 
    <!-- Favicon -->
    <link rel="icon" href="img/favicon.png">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- icofont CSS -->
    <link rel="stylesheet" href="css/icofont.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="css/owl-carousel.css">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="css/datepicker.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    
    <!-- Medipro CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    
</head>
<body>

<!-- Preloader -->
<div class="preloader">
    <div class="loader">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>

        <div class="indicator"> 
            <svg width="16px" height="12px">
                <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
            </svg>
        </div>
    </div>
</div>


<header class="header" >
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-12">
                    <!-- Contact -->
                    <ul class="top-link">
                        <li><a href="index.html">About</a></li>
                        
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                    <!-- End Contact -->
                </div>
                <div class="col-lg-6 col-md-7 col-12">
                    <!-- Top Contact -->
                    <ul class="top-contact">
                        <li><i class="fa fa-phone"></i>+27639951341</li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:support@yourmail.com">support@mediplus.com</a></li>
                    </ul>
                    <!-- End Top Contact -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <!-- Start Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="img/logo.png" alt="#"></a>
                        </div>
                        <!-- End Logo -->
                        <!-- Mobile Nav -->
                        <div class="mobile-nav"></div>
                        <!-- End Mobile Nav -->
                    </div>
                    <div class="col-lg-7 col-md-9 col-12">
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <nav class="navigation">
                                <ul class="nav menu">
                                    <li class="active"><a href="index.html">Logout <i class="icofont-rounded-down"></i></a>
                                        
                                    </li>
                                   
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                    <div class="col-lg-2 col-12">
                        <div class="get-quote">
                            <a href="dashboard.php" class="btn">Bookings History</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>


<div class="container mt-5"> 
    <div class="row justify-content-center"> 
        <div class="col-md-6"> 
            <h2 class="text-center mb-4">Book Appointment</h2>
            <!-- Booking Form -->
            <form  method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
               
                <div class="mb-3">
                    <label for="cell" class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="cell" name="cell" required>
                </div>
                <div class="mb-3">
                    <label for="reason" class="form-label">Reason for Appointment</label>
                    <select class="form-select" id="reason" name="reason" required>
                        <option value="">Select a reason</option>
                        <option value="Heart Surgery">Heart Surgery</option>
                        <option value="Fetching Medication">Fetching Medication</option>
                        <option value="Feeling Sick">Feeling Sick</option>
                        <option value="Ear Problems">Ear Problems</option>
                        <option value="Plastic Surgery">Plastic Surgery</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Preferred Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Preferred Time</label>
                    <input type="time" class="form-control" id="time" name="time" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Info</button>
            </form>
            <!-- End Booking Form -->
        </div>
    </div>
</div>

<!-- jQuery Min JS -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Migrate JS -->
<script src="js/jquery-migrate-3.0.0.js"></script>
<!-- jQuery UI JS -->
<script src="js/jquery-ui.min.js"></script>
<!-- Easing JS -->
<script src="js/easing.js"></script>
<!-- Color JS -->
<script src="js/colors.js"></script>
<!-- Popper JS -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap Datepicker JS -->
<script src="js/bootstrap-datepicker.js"></script>
<!-- jQuery Nav JS -->
<script src="js/jquery.nav.js"></script>
<!-- Slicknav JS -->
<script src="js/slicknav.min.js"></script>
<!-- ScrollUp JS -->
<script src="js/jquery.scrollUp.min.js"></script>
<!-- Nice Select JS -->
<script src="js/niceselect.js"></script>
<!-- Tilt Jquery JS -->
<script src="js/tilt.jquery.min.js"></script>
<!-- Owl Carousel JS -->
<script src="js/owl-carousel.js"></script>
<!-- Counterup JS -->
<script src="js/jquery.counterup.min.js"></script>
<!-- Steller JS -->
<script src="js/steller.js"></script>
<!-- Wow JS -->
<script src="js/wow.min.js"></script>
<!-- Magnific Popup JS -->
<script src="js/jquery.magnific-popup.min.js"></script>
<!-- Counter Up CDN JS -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<!-- Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>
<!-- Main JS -->
<script src="js/main.js"></script>
</body>
</html>

