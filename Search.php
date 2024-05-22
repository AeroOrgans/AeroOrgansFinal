<?php
session_start();


?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Aero Organs - Search</title>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!--Stylesheet-->
    <style>
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
  background: linear-gradient(to right, black, #001242); 
    min-height: 115vh;
    Font-family:'lato', sans-serif;
    display: block;
  }

.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}

.myform{
    height: 550px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    transform: translate(-50%,-50%);
    position: relative;
    top: 60%;
    left: 50%;
    
    border-radius: 15px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
   
}
.myform *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
.myform h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 50px;
    text-align: center;
}
label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}

.social{
  margin-top: 30px;
  display: flex;
}

.footer-icons ul li a {
    display: block;
    width: 35px;
    height: 35px;
    cursor: pointer;
    background-color: #3EC1D5;
    font-size: 20px;
    text-align: center;
    line-height: 35px;
    color: aliceblue;
    line-height: 35px;
  }
  


span{
    font-size: smaller;
}

h2{
    font-size: 30px;
    color: #fff;
    font-weight: 300;
    text-align: center;
    margin-bottom: 15px;
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

<div class="myform">
  <div class="flexbox">
    <div class="search">
      <h2><b>Search your ID</b></h2>
      <div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
          <input type="text" name="id" placeholder="Type your ID, then enter" required>
          
        </form>
      </div>
   </div>
    <div class="result">     
  <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // retrieve the ID that was submitted in the form by the hospital rep
        $id = $_POST["id"];
        $servername = "localhost";
        $username = "root";
        $password = "mysql";
        $dbName = "aeroorgans";
        $connection = mysqli_connect($servername, $username, $password, $dbName);
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $Email = "";
        if (isset($_SESSION['username'])) {
        $user = $_SESSION['username'];
        $sql = "SELECT email FROM hospitalreps WHERE username = '$user'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Email = $row["email"];
        } 
      }
        $query = "SELECT * FROM requests WHERE ID = '$id' AND Email = '$Email'";
        $result = mysqli_query($connection, $query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $userId = $row["ID"];
                    // Display the fetched results of that specific request ID that was entered
                    echo '<br>';
                    echo "<h2><b>ID: $userId<b></h2>";
                    echo "<p>Email: " . $row["Email"] . "</p>";
                    echo "<p>Organ: " . $row["Organ"] . "</p>";
                    echo "<p>Source: " . $row["Source"] . "</p>";
                    echo "<p>Destination: " . $row["Destination"] . "</p>";
                    echo "<p>Weight: " . $row["Weight1"] . "</p>";
                    echo "<p>Urgency: " . $row["Urgency"] . "</p>";
                    echo "<p>Notes: " . $row["Notes"] . "</p>";

                    // Buttons for update and delete
                    echo '<div class="button-container">';
                    echo '<form method="POST" action="edit.php">';
                    echo '<input type="hidden" name="id" value="' . $userId . '">';
                    echo '<br>';
                    echo '<button type="submit">To Update/Delete Click here</button>';
                    echo '</form>';
                }
            } else {
              echo "<script> alert('Invalid ID, Please try again');</script>";
              echo "<script>window.location.href = 'Search.php';</script>";
            }
            mysqli_free_result($result);
        } else {
            echo "Error executing the query: " . mysqli_error($connection);
        }
        mysqli_close($connection);
    }
   ?>


      </div>
    </div>
  </div>
</div> 



<!-- Start Footer bottom Area -->
<footer style="margin-top: 250px;">
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
