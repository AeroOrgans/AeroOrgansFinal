<?php
session_start()
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Aero Organs - Track Drone</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

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
 <link href="css/Stylesheet2.css" rel="stylesheet">


<style>    

body {
    background: linear-gradient(to right, black, #001242);
    Font-family:'lato', sans-serif;

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
h2,h5{
  color: white;
}
h2{
    font-size: 30px;
    color: #fff;
    font-weight: 300;
    text-align: center;
    margin-bottom: 15px;
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
                     <a class="page-scroll" href="hospitalIndex.php">Home</a>
                  </li>
                  
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Request<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href= "HospitalIndex.php#Request" >Make Request</a></li>
                      <li><a href= History.php >Request History</a></li>
                    </ul> 
                  </li>

                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Track<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href= Trackdrone.php >Track Drone</a></li>
                      <li><a href= Trackcontainer.php >Track Container</a></li>
                    </ul> 
                  </li>

                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="NewHospProfile.php" >Profile Page</a></li>
                      <li><a href="logout.php" >Logout</a></li> 
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


  <div id="services" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          
            <br> 
            <br> 
            
            <h2><b>Track Drone</b></h2>
      
        </div>
      </div>
      <br>
      <br>
       <!-- Start Google Map -->
<div>
  <!-- Start Map -->
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3565.741484700564!2d39.21712731509217!3d21.485811785706984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3a4e8d9c7f085%3A0x9a6e1a7e62a5c2d0!2sJeddah%2C%20Saudi%20Arabia!5e0!3m2!1sen!2sbg!4v1644081467782" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
  <!-- End Map -->
</div>
<!-- End Google Map -->

<div class="section-headline services-head text-center">
  <br> 
 
  <h5>Live GPS bradcast to know where the drone is at at all times</h5>
  
</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <br> <br> <br>
<!-- Start Footer bottom Area -->
<footer>
  <div class="footer-area">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="footer-content">
            <div class="footer-head">
              <div class="footer-logo">
                  
                <h2>Aero<span>Organs</span></h2>

              </div>

            
              
            </div>
          </div>
        </div>

        <!-- end single footer -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="footer-content">
            <div class="footer-head">
              <h4> Contact Us </h4>
              <br>
              <div class="footer-contacts">
                <p><span>Email:</span> aero.organs@gmail.com </p>
                <p><span>Phone:</span> +966543272052 </p>
              </div>
            </div>
          </div>
        </div>
        
        
         
        <!-- end single footer -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="footer-content">
            <div class="footer-head">
            
              <h4> Follow Us </h4>

              <div class="footer-icons"> 
              <ul>
                <li>
                  <a href="https://www.linkedin.com/in/aero-organ-9b78272a5?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"><i class="fa fa-linkedin"></i></a>
                </li>
                <li>
                  <a href="https://x.com/aeroorgans?s=11"><i class="fa fa-twitter"></i></a>
                </li>
              </ul>
          
            </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <div class="footer-area-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="copyright text-center">
            <p>
              &copy; Copyright <strong>AERO-ORGANS</strong>. All Rights Reserved
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

  
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
  