<?php
session_start();

require 'vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $newDate = $_POST["new_date"];
    $newTime = $_POST["new_time"];
    
    // Perform the flight rescheduling logic
    // Send email notification
    $to = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $subject = "Flight Rescheduled";
    $message = "Your flight has been rescheduled to $newDate at $newTime.";
    $fromEmail = "dialafayouumi@gmail.com";
    $fromName = "AeroPilot";
    
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    
    try {
        // Set up SMTP configuration
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "Aero.organs@gmail.com";
        $mail->Password = "kmxr omlj yupw jgjm";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
    
        // Set up email content
        $mail->setFrom($fromEmail, $fromName);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $message;
    
        // Send the email
        $mail->send();
        echo '<script>alert("flight has been rescheduled successfully!");</script>';
    } catch (Exception $e) {
        echo '<script>alert("An error occurred while rescheduling. Please try again later.");</script>';
    
    }
}
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
 
            margin: 0;
            padding: 0;
        

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

.container9 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-wrapper {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #555;
        }
        
      
</style>
</head>
<body data-spy="scroll" data-target="#navbar-example">

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
<div class="container9">
        <div class="form-wrapper">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2>Flight Rescheduling</h2>
                <label for="new_date">New Date:</label>
                <input type="date" id="new_date" name="new_date" required>
                <br><br>
                <label for="new_time">New Time:</label>
                <input type="time" id="new_time" name="new_time" required>
                <br><br>
                <button type="submit">Reschedule Flight</button>
            </form>
        </div>
    </div>

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
 

 
   

</body>
</html>