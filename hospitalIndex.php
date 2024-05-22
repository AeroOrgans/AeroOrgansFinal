<?php

session_start();

//Function for Database Connectio 
function getDatabaseConnection() {
  $servername = "localhost";
  $username = "root";
  $password = "mysql";
  $dbName = "aeroorgans";

  $conn = new mysqli($servername, $username, $password, $dbName);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
}
//invoking the database connection function
$conn = getDatabaseConnection(); 

if (isset($_SESSION['username'])) {
  $user = $_SESSION['username'];
  $Email = getUserEmail($conn, $user);  
} else {
  //if no user is logged in, session will not set anything. for that the email will be empty
  $Email = "";  
}

// Function to handle user data retrieval to get the email
function getUserEmail($conn, $username) {
  $sql = "SELECT email FROM hospitalreps WHERE username = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row["email"];
  } else {
      return null;  
  }
}

// Function to handle form submission
function submitRequest($conn, $Email, $Organ, $Source, $Destination, $Weight1, $Urgency, $Notes) {
  $sql = "INSERT INTO requests (Email, Organ, Source, Destination, Weight1, Urgency, Notes,status1)
          VALUES ('$Email', '$Organ', '$Source', '$Destination', '$Weight1', '$Urgency', '$Notes','Incompleted')";

  if ($conn->query($sql) === TRUE) {
      return true; 
  } else {
      return false; 
  }
}

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
  $Organ = $_POST["Organ"];
  $Source = $_POST["Source"];
  $Destination = $_POST["Destination"];
  $Weight1 = $_POST["Weight1"];
  $Urgency = $_POST["Urgency"];
  $Notes = $_POST["Notes"];

  $success = submitRequest($conn, $Email, $Organ, $Source, $Destination, $Weight1, $Urgency, $Notes);  // Use function for submission (optional)

  if ($success) {
      echo "<script>alert('Request was sent successfully');</script>";
      echo "<script>window.location.href = 'History.php';</script>";
      exit();
  } else {
      echo "Error in inserting data: " . $conn->error;
  }
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Aero Organs - Home</title>
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

   .container2 {
     max-width: 400px;
     margin: 0 auto;
     padding: 20px;
   }
   body {
   font-family: 'lato', sans-serif;
   background-color:#fff rgba(0, 0, 0, 0.8);
   background-size: cover;
   background-repeat: no-repeat;
 }

   .message {
     margin-bottom: 10px;
     color: #f00;
   }

   label {
     display: block;
     margin-bottom: 5px;
   }

   input[type="text"] {
     width: 100%;
     padding: 6px;
     margin-bottom: 6px;
     border-radius: 5px;
     border: 1px solid #ccc;
   }

   button[type="submit"] {
     display: block;
     width: 100%;
     padding: 6px;
     background-color: #4caf50;
     color: #fff;
     border: none;
     border-radius: 5px;
     cursor: pointer;
   }

   button[type="submit"]:hover {
     background-color: #45a049;
   }

   button[name="delete"] {
     display: block;
     width: 100%;
     padding: 10px;
     background-color: #f44336;
     color: #fff;
    border: none;
     border-radius: 5px;
     cursor: pointer;
   }

   button[name="delete"]:hover {
     background-color: #d32f2f;
   }

   body {
   font-family: 'lato', sans-serif;
   background-color:#fff rgba(0, 0, 0, 0.5);
   background-size: cover;
   background-repeat: no-repeat;
 }

 h3 {
   font-size: 26px;
   margin: 20px 0;
   text-align: center;
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

.header-area5 {
 position: absolute;
 top: 0;
 left: 0;
 width: 100%;
 height: auto;
 background: rgba(0, 0, 0, 0.80);
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

.track-buttons {
  display: flex;
  justify-content: space-between;
  justify-content: center;
}

.button-container {
  text-align: center;
  margin: 0 10px;
}

.circular-button {
  width: 170px;
  height: 170px; 
  border-radius: 50%;
  border: none;
  background-color:#3EC1D5; 
  overflow: hidden;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}

.circular-button img {
  width: 100%;
  height: auto;
  object-fit: contain;
  transform: scale(0.98);
}

img.img2 {
  width: 100%;
  height: auto;
  object-fit: contain;
  transform: scale(1.4);
}

.track-buttons p {
  margin-top: 5px;
  font-size: 14px;
  font-family: 'Raleway',sans-serif;
  color: #333;
}

.circular-button:hover {
  opacity: 0.8;
}
.trackh2{
  color: aliceblue;
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
                      <li><a href=#Request >Make Request</a></li>
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

  <!-- Start Slider Area -->
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
                  <a class="ready-btn right-btn page-scroll" href="#Request">Make Request</a>
                  <a class="ready-btn page-scroll" href="#TrackRequest">Track Request</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Aero Organs</h2>
                </div>
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Ultimately saving lives through efficient and cost-effective solutions</h1>
                </div>
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#Request">Make Request</a>
                  <a class="ready-btn page-scroll" href="#TrackRequest">Track Request</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Aero Organs</h2>
                </div>
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Secure and rapid delivery of kidneys and livers in Saudi Arabia</h1>
                </div>
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#Request">Make Request</a>
                  <a class="ready-btn page-scroll" href="#TrackRequest">Track Request</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Slider Area -->
      
  <!-- Start Request Area -->
  <div id="Request" class="request-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
            
              <h2>Request Form</h2>
            </div>
          </div>
        </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        
            <div class="Request">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" onsubmit="return validateForm()">
      <div class="form-group">
        <input type="text" placeholder="Organ" id="Organ" name="Organ" required>
      </div>

      <div class="form-group">
        <input type="text" placeholder="Source" id="Source" name="Source" required>
      </div>

      <div class="form-group">
        <input type="text" placeholder="Destination" id="Destination" name="Destination" required>
      </div>

    <div class="form-group">
        <input type="text" placeholder="Urgency" id="Urgency" name="Urgency" required>
      </div>

      <div class="form-group">
  <input type="text" placeholder="Weight" id="Weight1" name="Weight1" 
         required pattern="[0-9.]+" title="Please enter a number"
         inputmode="numeric">
</div>

      <div class="form-group">
        <input type="text" placeholder="Notes" id="text" name="Notes">
      </div>

      <div class="track-buttons">
       <button type="submit"> Place Order </button>
       </div>
       </form>

        </div>
       </div>   

        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="single-well">
            
              <img src="img/BlueDrone.jpg" height="800" width= "900" alt="Medical drone flying">
        
            </div>
        </div>
      </div>
    </div>
  </div>
        
    </div>
  </div>
  <!-- End Request Area -->


<!-- our Track area start -->
<div class="our-skill-area fix hidden-sm">
    <div class="test-overly"></div>
    <div class="skill-bg area-padding-2">
      <div class="container">
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
            
              <h2 class="trackh2"> Track Request</h2>
            </div>
          </div>
          <div class="skill-text">

            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
              </div>
            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                         
  <div class="track-request-container">
      
    </div>
    
    <div class="track-buttons">
      <div class="button-container">
        <a href="trackdrone.php">
          <button class="circular-button">
            <img src="img/whitedrone.png" alt="Drone">
          </button>
        </a>
      </div>
        </a>
      </div>
    </div>
              </div>
            </div>
              <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
              <div class="track-request-container">
              <div class="button-container">
        <a href="Trackcontainer.php">
          <button class="circular-button">
            <img class="img2" src="img/white_box-removebg-preview.png" alt="Container">
          </button> 
        </a>
        <br><br><br>
         </div>
          </div>
             <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Start Footer bottom Area -->

<footer style="margin-top: 150px;">
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