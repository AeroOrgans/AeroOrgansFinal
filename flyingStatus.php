<?php
session_start();

// Ensure database credentials are correct
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "mysql";
$dbname = "aeroorgans";


$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$FS_ID = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //take the id id of the started flight from session
    $FS_ID = isset($_SESSION['id_FS']) ? $_SESSION['id_FS'] : '';

    $query = "SELECT Email FROM requests WHERE ID =  $FS_ID  AND FS IS NOT NULL";
    $result = mysqli_query($conn, $query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Redirect to the pilot alerts page
        echo "<script>window.location.href = 'pilotAlerts.php';</script>";
    } else {
      //if the query was flase this means no flight is started at this session
        echo "<script>alert('No flight was started');</script>";
        echo "<script>window.location.href = 'flyingStatus.php';</script>";
    }
 
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Aero Organs - Flight Status</title>
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

  <!-- Nivo Slider Theme -->
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
    background: -webkit-linear-gradient(left, #25c481, #25b7c4);
    background: linear-gradient(to right, black, #001242);
    Font-family:'lato', sans-serif;
    font-size: 14px;
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
button[type="submit"] {
      display: block;
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
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
.img-shadow {
  box-shadow: 0 4px 8px rgba(255, 255, 255, 0.6);
  border-radius: 5px; /* Optional: Rounded corners */
}
</style>
</head>
<body data-spy="scroll" data-target="#navbar-example">
  <div id="preloader"></div>
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
<!-- header end -->
<section  style="margin-top: 50px;">
  <div id="Flight" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <h2><b>Flight Status</b></h2>
          </div>
        </div>
        <div class="row" style="margin-top: 50px;">
          <div class="col-md-6 col-sm-6 col-xs-12">
          <img src="DroneP2.jpg" width="100%" height="50%" frameborder="0" style="border:0" allowfullscreen class="img-shadow"></img>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="transbox">
            <div text-align ="center" style="padding: 80px;">
          <form onclick="FS()" >
            <button type="submit">Flight Started</button>
            </form>
            <br>
            <form onclick="FE()">
            <button type="submit" >Flight Ended</button>
            </form>
            <br>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <button type="submit" >Report a problem</button>
         </form>
         <br>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Start Footer bottom Area -->
<footer  style="margin-top: 150px;">
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
  <script>
   function FS() {
  let id = prompt("please enter the request ID");
  if (id != null) {
    fetch('sendFlightStart.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded',},
      body: `id=${encodeURIComponent(id)}`
    })
      alert('Notification was sent Successfully');
  }
}
function FE() {
  let id = prompt("please enter the request ID");
  if (id != null){
    fetch('sendFlightEnd.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `id=${encodeURIComponent(id)}`
    })
      alert('Notification was sent Successfully');
  }
}
</script>

</body>
</html>