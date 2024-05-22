<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbName = "aeroorgans";

$conn = new mysqli($servername, $username, $password, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT email, username, licenseNumber FROM pilots WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['licenseNumber'] = $row['licenseNumber'];
    }
}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Aero Organs - Profile</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Icons -->
  <link href="img/logosmalll.png" rel="icon">
  <link href="img/logobig.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Slider  -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">

 <!-- Extra Stylesheet -->
 <link href="css/Stylesheet2.css" rel="stylesheet2">

<style>
body {
    background: linear-gradient(to right, black, #001242); 
    min-height: 100vh; 
    display: flex;
    align-items: center; 
    justify-content: center; 
    padding: 20px; 
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden;
    max-width: 800px;
    margin: 0 auto;
}

.card {
    border-radius: 5px;
    background-color: rgba(255,255,255,0.01);
    -webkit-box-shadow: 0 1px 20px 0 rgba(255,255,255,0.9);
    box-shadow: 0 1px 20px 0 rgba(255,255,255,0.2);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 10px 0 0 10px;
}

.bg-c-lite-green {
    background: linear-gradient(to right, black, #001242);
}
.user-profile {
    padding: 38px 0;
}
.card-block {
    padding: 1.25rem;
}
.m-b-25 {
    margin-bottom: 25px;
}
.img-radius {
    border-radius: 5px;
    display: block;
    margin: 0 auto; 
    width: 90px; 
    height: auto; 
}
h6,p,h4 {
    font-size: 14px;
    font-family: 'Raleway', sans-serif;
    color: white;
}
.card .card-block p {
    line-height: 25px;
}
@media only screen and (min-width: 1400px){
p {
    font-size: 14px;
}
}
.card-block {
    padding: 1.25rem;
}
.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}
.m-b-20 {
    margin-bottom: 20px;
}
.p-b-5 {
    padding-bottom: 5px !important;
}
.card .card-block p {
    line-height: 25px;
}
.m-b-10 {
    margin-bottom: 10px;
}
.text-muted {
    color: #919aa3 !important;
}
.b-b-default {
    border-bottom: 1px solid #919aa3;
}
.f-w-600 {
    font-weight: 600;
}
.m-b-20 {
    margin-bottom: 20px;
}
.m-t-40 {
    margin-top: 20px;
}
.p-b-5 {
    padding-bottom: 5px !important;
}
.m-b-10 {
    margin-bottom: 10px;
}
.m-t-40 {
    margin-top: 20px;
}
.user-card-full .social-link li {
    display: inline-block;
}
.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
.center {
  text-align: center; 
  color: white;
}
.header-area5 {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: auto;
  background: rgba(0, 0, 0, 0.20);
  z-index: 9;
}
.header-area5.stick {
  background-color: rgba(0, 0, 0, 1);
  height: 70px;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1000;
}
.user-card-full {
    overflow: hidden;
    max-width: 900px; 
    margin: auto; 
    box-shadow: 0px 0px 8px 0px rgba(255, 255, 255, 0.2); 
    border: 1px solid rgba(255, 255, 255, 0.25); 
    background-color: rgba(255,255,255,0.01); 
}
</style>
</head>
<body data-spy="scroll" >
<header>
    <!-- header-area start -->
    <div id="sticker" class="header-area5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <nav class="navbar navbar-default">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                   <img src="Logo3.png" alt=" title=Aero-Organs" class="logo-img"> 
                </a>
              </div>
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="pilotpage.php">Home</a>
                  </li>
                  
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="pilotPage.php" >Profile Page</a></li>
                      <li><a href="logout.php" >Logout</a></li> <!-- lINK THE MAIN INDEX -->
                    </ul> 
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header> 
<br><br><br><br><br>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-4 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                <img src= "img/profile-removebg-preview.png" class="img-radius" alt="User-Profile-Image">
                                </div>
                                <h4 class="center"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></h4>
                                <p class="center"> Drone Pilot</p>
                                <i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <!-- Retrieving Info from database pilots to be displayed to the pilot currently logged in to the session -->
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'Guest'; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Username</p>
                                        <h6 class="text-muted f-w-400"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Details</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">License Number</p>
                                        <h6 class="text-muted f-w-400"><?php echo isset($_SESSION['licenseNumber']) ? $_SESSION['licenseNumber'] : 'Guest'; ?></h6>
                                    </div>
                                    
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <script src="js/main.js"></script>


</body>
</html>