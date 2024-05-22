<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Aero Organs - Track Container</title>
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

  <!-- Slider -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">


  <!-- Extra Stylesheet -->
  <link href="css/Stylesheet2.css" rel="stylesheet">

 
<style>
h2{
    font-size: 30px;
    color: #fff;
    font-weight: 300;
    text-align: center;
    margin-bottom: 15px;
  }

    body{
      background: linear-gradient(to right, black, #001242);
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .data-container{
      display: flex;
      justify-content: space-between;
      width: 50%;
      margin: 50px auto;
      padding: 20px;
      background-color:white;
      box-shadow: 0 1px 20px 0 rgba(255,255,255,0.2);
      border-radius: 10px;
    }

    .data-item{
      text-align: center;
    }

    .data-item h2{
      font-size: 15px;
      font-weight: bold;
      margin-bottom: 10px;
      color: black;
    }

    .data-item p{
      font-size: 30px;
      font-weight: bold;
      color: black;
    }

    .data-head{
      margin: auto;
      width: 50%;
      text-align: center;
      font-size: 30px;
      font-weight: bold;
      margin: 50px auto;
      padding: 20px;
      background-color: white;
      box-shadow: 0 1px 20px 0 rgba(255,255,255,0.2);
      border-radius: 20px;
      color: black;
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



</style>
</head>
<body>
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
 
  <h2  style="margin-top: 200px;"><b>Track Container</b></h2>
  <div class="data-container">
    <div class="data-item">
      <h2>Temperature</h2>
      <p class="value" id="temperature"> &#8451;</p>
    </div>
    <div class="data-item">
      <h2>Humidity</h2>
      <p class="value" id="humidity">%</p>
    </div>
    <div class="data-item">
      <h2>Pressure</h2>
      <p class="value" id="pressure"> hPa</p>
    </div>
  </div>

  <!-- the scripts for products you want to access must be added-->
  <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js"></script>

  <script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.20.0/firebase-app.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration here (Do not use the existing configuration)
    const firebaseConfig = {
        apiKey: "AIzaSyDPoPpYQjPjqw2UjpPhZCdlsYmGP2sBOLE",
      authDomain: "aeroorgans-70146.firebaseapp.com",
      projectId: "aeroorgans-70146",
      databaseURL: "https://aeroorgans-70146-default-rtdb.asia-southeast1.firebasedatabase.app/" ,
      storageBucket: "hgs://aeroorgans-70146.appspot.com",
      messagingSenderId: "GUT4BgtWYwSUG4hvuQzLZ9hYg5U2",
      appId: "1:691490010473:web:f9d00c4b3cccc336a879f8"
    };
      firebase.initializeApp(firebaseConfig);

    // Retrieve temperature, humidity, and pressure data from Firebase
    var temperatureRef = firebase.database().ref("sensor/temperature");
    temperatureRef.on("value", function(snapshot) {
      var temperature = snapshot.val();
      document.getElementById("temperature").textContent = temperature + " °C";
    });

    var humidityRef = firebase.database().ref("sensor/humidity");
    humidityRef.on("value", function(snapshot) {
      var humidity = snapshot.val();
      document.getElementById("humidity").textContent = humidity + " %";
    });

    var pressureRef = firebase.database().ref("sensor/pressure");
    pressureRef.on("value", function(snapshot) {
      var pressure = snapshot.val();
      document.getElementById("pressure").textContent = pressure + " hPa";
    });
  </script>

<!-- Start Footer bottom Area -->
<footer  style="margin-top: 250px;">
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

        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="footer-content">
            <div class="footer-head">
              <h4> Contact Us </h4>
              <br>
              <div class="footer-contacts">
                <p class= "footP"><span>Email:</span> aero.organs@gmail.com </p>
                <p class= "footP"><span>Phone:</span> +966543272052 </p>
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
            <p class= "footP">
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