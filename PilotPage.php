<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Aero Organs - Home </title>
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
  <link href="css/Stylesheet2.css" rel="stylesheet">

  <style>

.footer-area4 {
    padding: 40px 0;
    background: rgba(0, 0, 0, 0.70);
   height: auto;
   
   
  }

  button[type="submit"] {
  background-color: #3EC1D5 !important;
  border: none;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
  padding: 10px 20px;
  text-transform: uppercase;
  margin: 0 auto; 
  display: block; 
}
</style>
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
  <!-- header-area start -->
  <div id="sticker" class="header-area">
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
            <img src="Logo3.png" alt="" title="" class="logo-img"> 
						</a>
            </div>
            <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a class="page-scroll" href="PilotPage.php">Home</a>
                </li>
                <!-- Echoing the username from the current session -->
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?><span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="PilotProfilee.php" >Profile Page</a></li>
                    <li><a href="logout.php">Logout</a></li>
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

    <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="img/slider/slider1.jpg" alt="" title="#slider-direction-1" />
        <img src="img/slider/slider2.jpg" alt="" title="#slider-direction-2" />
        <img src="img/slider/slider3.jpg" alt="" title="#slider-direction-3" />
      </div>

    <div id="slider-direction-1" class="slider-direction slider-one">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content">
              <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Aero Organs</h2>
             </div>
        <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
        <h1>Welcome Back, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?>!</h1>
         </div>
              <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
              </div>
            </div>
          </div>
        </div>
      </div>
   </div>
  </div>
</div>
  <!-- Start Flight Area -->
  <div id="Flight" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Drone Coordinates</h2>
            </div>
          </div>
        </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        </div>
      </div>
      
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
  <form action="flyingStatus.php">  <button type="submit">Drone is ready</button></form>
  
</div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



<!-- Start Footer bottom Area -->

<footer style="margin-top: 150px;">
  <div class="footer-area4">
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