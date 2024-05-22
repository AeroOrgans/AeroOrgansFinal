<?php
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "mysql";
$dbname = "aeroorgans";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use PHPMailer\PHPMailer\SMTP;

$email='';
//taking the started flight id from session
$FS_ID = isset($_SESSION['id_FS']) ? $_SESSION['id_FS'] : '';
    //fetching the email associated with this id
    $query = "SELECT Email FROM requests WHERE ID =  $FS_ID";
    $result = mysqli_query($conn, $query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['Email'];
        $_SESSION['email'] = $email;
    }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'Aero.organs@gmail.com'; 
        $mail->Password = 'kmxr omlj yupw jgjm';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('Aero.organs@gmail.com', 'Aero Organs Team');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Problem Report';
        $mail->Body = 'Problem Description: ' . $description;

        if ($mail->send()) {
            echo "<script>alert('Issue was sent to the Hospital Representative');</script>";
            echo "<script>window.location.href = 'RescheduleFlight.php';</script>";
        }

    } catch (PHPMailerException $e) {
        echo "<script>alert('Mailer Error: " . addslashes($e->getMessage()) . "');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "');</script>";
    }
}

$conn->close();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Aero Organs - Issue Problem</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Icons -->
    <link href="img/logosmalll.png" rel="icon">
    <link href="img/logobig.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional Libraries -->
    <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
    <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
    <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/venobox/venobox.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/Stylesheet2.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, black, #001242);
            font-family: 'lato', sans-serif;
            font-size: 14px;
        }

        .container9 {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            color: #ffffff;
        }

        h2 {
            font-size: 30px;
            color: #fff;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }

        label, input[type="text"], button[type="submit"] {
            display: block;
            width: 100%;
        }

        input[type="text"], textarea {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            color: black;
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
        }

        .header-area5 {
            position: absolute;
            top: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.30);
            z-index: 9;
        }

        .header-area5.stick {
            background-color: rgba(0, 0, 0, 1);
            height: 70px;
            position: fixed;
            top: 0;
            z-index: 1000;
        }
    </style>
</head>
<body data-spy="scroll">
<header style="margin-top: 160px;">
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
                                <img src="Logo3.png" alt="" class="logo-img">
                            </a>
                        </div>
                        <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a class="page-scroll" href="PilotPage.php">Home</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?><span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="PilotProfilee.php">Profile Page</a></li>
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

<form class="form1" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin-top: 70px;">
    <div class="container9">
        <h2><b>Report a Problem</b></h2>
        <br>
        <textarea id="description" name="description" rows="5" placeholder="Describe the problem" style="width: 355px; color:black;"></textarea>
        <button type="submit" style="margin-top: 40px;">Report</button>
        <br>
    </div>
</form>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<footer style="margin-top: 180px;">
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
                            <h4>Contact Us</h4>
                            <br>
                            <div class="footer-contacts">
                                <p><span>Email:</span> aero.organs@gmail.com</p>
                                <p><span>Phone:</span> +966543272052</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>Follow Us</h4>
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
                        <p>&copy; Copyright <strong>AERO-ORGANS</strong>. All Rights Reserved</p>
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
<script src="lib/nivo-slider/js/jquery.nivo.slider.js"></script>
<script src="lib/appear/jquery.appear.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>

<script src="contactform/contactform.js"></script>
<script src="js/main.js"></script>

</body>
</html>
