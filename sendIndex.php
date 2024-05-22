<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Database connection variables
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "mysql";
$dbname = "aeroorgans";

// Initialize MySQL connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Define the sendMail function
function sendMail($name, $email, $subject, $message, PHPMailer $mail) {
    try {
        $mail->SMTPSecure = 'tls';
        $mail->Username = "Aero.organs@gmail.com";
        $mail->Password = "kmxr omlj yupw jgjm";
        $mail->AddAddress("Aero.organs@gmail.com");
        $mail->FromName = "User:" . $name;
        $mail->Subject = $subject;
        $mail->Body = "Message was sent by: $name, With the email: $email<br><br>$message";
        $mail->AltBody = "Message was sent by: $name, With the email: $email<br><br>$message";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->From = $mail->Username;
        return $mail->send();
    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}


    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';


    if ($name && $email && $subject && $message) {
        $mail = new PHPMailer();
        $isSent = sendMail($name, $email, $subject, $message, $mail);

        if ($isSent) {
            echo "<script>alert('Message was sent successfully');</script>";
        } else {
            echo "<script>alert('Message could not be sent.');</script>";
        }

        echo "<script>window.location.href = 'index.html';</script>";
    }

// Close database connection
$conn->close();
?>
