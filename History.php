<?php
session_start()
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Aero Organs - History</title>
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
  h2{
    font-size: 30px;
    color: #fff;
    font-weight: 300;
    text-align: center;
    margin-bottom: 15px;
  }
  table{
    width:100%;
    table-layout: fixed;
 

  }
  .tbl-header{
    background-color: rgba(255,255,255,0.2);


  }
  .tbl-content{
    height:300px;
    overflow-x:auto;
    margin-top: 0px;
    border: 1px solid rgba(255,255,255,0.3);


  }
  th{
    padding: 20px 15px;
    text-align: center;
    font-weight: 500;
    font-size: 12px;
    color: #fff;
    text-transform: uppercase;
  }
  td{
    padding: 15px;
    text-align: center;
    vertical-align:middle;
    font-weight: 300;
    font-size: 12px;
    color: #fff;
    border-bottom: solid 1px rgba(255,255,255,0.1);
  }
  body{
    background: -webkit-linear-gradient(left, #25c481, #25b7c4);
    background: linear-gradient(to right, black, #001242);
    Font-family:'lato', sans-serif;
    font-size: 14px;
  }
  section{
    margin: 50px;
  }  
  
  
  ::-webkit-scrollbar {
    width: 6px;
  } 
  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
  } 
  ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
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
  <br>
  <br>
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
                      <li><a href= Trackcontainer.php>Track Container</a></li>
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

 
<section  style="margin-top: 80px;">
  <h2><b>Request History</b></h2>
  <div class="tbl-header">
    <table class="cont" cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Organ</th>
          <th>Source</th>
          <th>Destination</th>
          <th>Weight</th>
          <th>Urgency</th>
          <th>Notes</th>
          <th>Status</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php      
          $servername = "localhost";
          $username = "root";
          $password = "mysql";
          $dbName = "aeroorgans";

          $conn = new mysqli($servername, $username, $password, $dbName);
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
         //here we aim to get the email of the loged in user, through session.
          $Email="";
          if (isset($_SESSION['username'])) {
              $user = $_SESSION['username'];
              $sql = "SELECT email FROM hospitalreps WHERE username = '$user'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $Email = $row["email"];
              } 
          }
        //illustarting all the requests made with the same user.
          $result = $conn->query("SELECT * FROM requests WHERE Email = '$Email'");

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["ID"] . "</td>";
                  echo "<td>" . $row["Organ"] . "</td>";
                  echo "<td>" . $row["Source"] . "</td>";
                  echo "<td>" . $row["Destination"] . "</td>";
                  echo "<td>" . $row["Weight1"] . "</td>";
                  echo "<td>" . $row["Urgency"] . "</td>";
                  echo "<td>" . $row["Notes"] . "</td>";
                  echo "<td>" . $row["status1"] . "</td>";
                  echo "</tr>";
              }
          } else {
              echo '<tr><td colspan="7" class="no-orders">No orders found.</td></tr>';
          }

          $conn->close();
        ?>
      </tbody>
    </table>
  </div>
  </section>
  <br>


  <div style="display: flex; gap: 10px; justify-content: center;">
   
   <form action="Search.php">
       <button type="submit">Click here to Edit or Delete</button>
   </form>

 
   <form action="genReport.php">
       <button type="submit">Generate request Report</button>
   </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(window).on("load resize ", function() {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
  </script>
  

<!-- Start Footer Area -->
<footer style="margin-top: 200px;">
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