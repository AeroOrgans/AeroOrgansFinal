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
use PHPMailer\PHPMailer\Exception;



//once the user triggers verify 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //first i will take the otp entered by the user
    $inputOtp = $_POST['otp'];
    //then i will get the random otp i generated
    $storedOtp = $_SESSION['otp'] ?? '';
    
    if ($inputOtp === $storedOtp) {
        header('Location: hospitalIndex.php');
        exit();
    } else {
        echo "<script> alert('Invalid OTP. Please try again.');</script>";
    }
} else {

    $username = $_SESSION['username'] ?? null;

    if ($username) {
        $query = "SELECT email FROM hospitalreps WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row['email'];

            // Generate OTP
            $otpLength = 6;
            $characters = '0123456789';
            $otp = '';
            for ($i = 0; $i < $otpLength; $i++) {
                $otp .= $characters[rand(0, strlen($characters) - 1)];
            }
            // Store OTP in session
            $_SESSION['otp'] = $otp;  // Store OTP in session

            // send the otp to the user's email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "Aero.organs@gmail.com";
                $mail->Password = "kmxr omlj yupw jgjm";
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom($mail->Username, 'Aero Organs');
                $mail->addAddress($email);
                $mail->Subject = 'OTP Verification';
                $mail->Body = 'Your OTP is: ' . $otp;
                $mail->send();
            } catch (Exception $e) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        } else {
            echo "<script> alert('Email not found for user.');</script>";
        }
    } else {
        echo "<script> alert('Username is not set. Please log in again');</script>";
    }
}

$conn->close();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Aero Organs - Login</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Icons -->
  <link href="img/logosmalll.png" rel="icon">
  <link href="img/logobig.png" rel="apple-touch-icon">

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
    background-color: #080710;
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
.shape:first-child{
    background: linear-gradient(
      #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #1845ad,
        #23a2f6
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
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
button{
    margin-top: 50px;
    width: 100%;
    background-color:  #3EC1D5;
    color: #ffffff;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

span{
    font-size: smaller;
}
h2,h5{
text-align: center;
}
</style>
</head>

<body>
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
    <h2>OTP Verification</h2>
    <h5>An OTP was sent to your email</h5>
    <br>
    <label for="otp">OTP:</label>
    <input type="text" id="otp" name="otp" required>
    <button type="submit">Verify OTP</button>
    </form>
</body>
</html>

