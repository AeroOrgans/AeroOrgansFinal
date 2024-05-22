<?php
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "mysql";
$dbname = "aeroorgans";

//we must establish a connection with the database to check if the the posted email has 
//a match in the database or not
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$email = $_POST['email'];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use PHPMailer\PHPMailer\SMTP;

//since we are dealing with two parties: 1- pilot 2- hospital rep
//and both of them might request password reset 
//for that we must look for matches in both tables. 
$sql = "SELECT * FROM pilots WHERE email = '$email'"; 
$result = $conn->query($sql);
$sql2 = "SELECT * FROM hospitalreps WHERE email = '$email'"; 
$result2 = $conn->query($sql2);


if ($result->num_rows > 0 || $result2->num_rows > 0){
try {

$mail = new PHPMailer();
$mail->SMTPSecure = 'tls';
$mail->Username = "Aero.organs@gmail.com";
$mail->Password = "kmxr omlj yupw jgjm";

$mail->AddAddress($email);
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->FromName = "Aero Organs Team";
$mail->Subject = "Reset Password";
$mail->Body = "Click the link to reset your password:   ";
$mail->Body .= "http://localhost/AeroOrgansUpd44/AeroOrgansUpd/Aero_Organs/PasswordResetPage.html";
$mail->Host = "smtp.gmail.com";

$mail->Port = 587;
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->From = $mail->Username;


$mail->send();
//echoing java script messages to the user
echo "<script> alert('Please Check Your email to reset your password');</script>";
echo "<script>window.location.href = 'l.html';</script>";

}
catch (PHPMailerException $e) {
    echo "<script>alert('PHPMailer Error: " . addslashes($e->getMessage()) . "');</script>";
} catch (Exception $e) {
    echo "<script>alert('An unexpected error occurred: " . addslashes($e->getMessage()) . "');</script>";
}
  }

else {
    echo "<script> alert('This email doesn't exist');</script>";
}
 
$conn->close();

?>