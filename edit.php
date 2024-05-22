<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbName = "aeroorgans";

$conn = new mysqli($servername, $username, $password, $dbName);


$id="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $action = isset($_POST["action"]) ? $_POST["action"] : ""; 

        if ($action == "delete") {

            // Delete the request record for the specified ID

            $query = "DELETE FROM requests WHERE ID = $id";
            mysqli_query($conn, $query);

            echo "<script> alert('Request was deleted successfully');</script>";
            echo "<script>window.location.href = 'History.php';</script>";

        } else {

            $query = "SELECT * FROM requests WHERE ID = $id"; 

            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $Organ = $row['Organ'];
                    $Source = $row['Source'];
                    $Destination = $row['Destination'];
                    $Weight1 = $row['Weight1'];
                    $Urgency = $row['Urgency'];
                    $Notes = $row['Notes'];
                }
            } else {
              echo "<script> alert('No data found for the provided ID.');</script>";
            }
        }
    } else {
      echo "<script> alert('ID is not set.');</script>";
    }
//the user here will have the option to edit a specifc data or all data depending on his prefrences 
    if (!empty($_POST["NewOrgan"])) {
        $newO = $_POST["NewOrgan"];
        $query = "UPDATE requests SET Organ = '$newO' WHERE ID = $id";
        mysqli_query($conn, $query);
        
    }

    if (!empty($_POST["NewSource"])) {
        $NewS = $_POST["NewSource"];
        $query = "UPDATE requests SET Source = '$NewS' WHERE ID = $id";
        mysqli_query($conn, $query);
    }

    if (!empty($_POST["NewDestination"])) {
        $NewD = $_POST["NewDestination"];
        $query = "UPDATE requests SET Destination = '$NewD' WHERE ID = $id";
        mysqli_query($conn, $query);
    }

    if (!empty($_POST["NewNotes"])) {
        $NewN = $_POST["NewNotes"];
        $query = "UPDATE requests SET Notes = '$NewN' WHERE ID = $id";
        mysqli_query($conn, $query);
    }

    if (!empty($_POST["NewUrgency"])) {
        $NewU = $_POST["NewUrgency"];
        $query = "UPDATE requests SET Urgency = '$NewU' WHERE ID = $id";
        mysqli_query($conn, $query);
    }

    if (!empty($_POST["NewWeight"])) {
        $NewW = $_POST["NewWeight"];
        $query = "UPDATE requests SET Weight1 = '$NewW' WHERE ID = $id";
        mysqli_query($conn, $query);
    }
   

}
$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Aero Organs - Edit</title>
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
     body{
    background: -webkit-linear-gradient(left, #25c481, #25b7c4);
    background: linear-gradient(to right, black, #001242);
    Font-family:'lato', sans-serif;
    font-size: 14px;
  }

    .container9 {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      color: #ffffff;
    }

    h2{
    font-size: 30px;
    color: #fff;
    font-weight: 300;
    text-align: center;
    margin-bottom: 15px;
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
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      color:black;
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
  width: 100%;
}


.header-area5 {
 position: absolute;
 top: 0;
 left: 0;
 width: 100%;
 height: auto;
 background: rgba(0, 0, 0, 0.30);
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
<body data-spy="scroll" >
<br><br>
<br><br>
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


 <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <div class="container9">
    <h2><b>Request ID: <?php echo $id; ?></b></h2>
    <!-- echoing the request id -->
    <?php if (isset($message)) : ?>
      <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>
    <!-- and all the details associated with it -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="id" value="<?php echo $id; ?>">

      <label for="organ">Organ:</label>
      <input type="text" id="organ" name="NewOrgan" value="<?php echo $Organ; ?>">

      <label for="source">Source:</label>
      <input type="text" id="source" name="NewSource" value="<?php echo $Source; ?>">

      <label for="destination">Destination:</label>
      <input type="text" id="destination" name="NewDestination" value="<?php echo $Destination; ?>">

      <label for="urgency">Urgency:</label>
      <input type="text" id="urgency" name="NewUrgency" value="<?php echo $Urgency; ?>">

      <label for="weight">Weight:</label>
      <input type="text" id="weight" name="NewWeight" value="<?php echo $Weight1; ?>">

      <label for="notes">Notes:</label>
      <input type="text" id="notes" name="NewNotes" value="<?php echo $Notes; ?>">
      <br>
      <button type="submit">Update</button>
      <br>
      <button type="submit" name="action" value="delete">Delete</button>
    </form>
  </div>

<form>
<br><br><br><br><br>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

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

