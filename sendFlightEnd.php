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

// PHP Mailer libraries
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use PHPMailer\PHPMailer\SMTP;


$email="";

if (isset($_POST['id'])) {
    $feedback_id = $_POST['id'];
    $query = "SELECT Email FROM requests WHERE ID = '$feedback_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $email = $row['Email'];
        } 
    } 
} 


$mail = new PHPMailer(true);
//server settings
try {
   
    $mail = new PHPMailer();
    $mail->SMTPSecure = 'tls';
    //pilot email
    $mail->Username = "ghinafelemban@gmail.com";
    $mail->Password = "deud sstp hnwx tjby";
 
    //recipients
    $mail->addAddress($email);
    $mail->addCC('aero.organs@gmail.com');

    $mail->FromName = "Aero Organs Pilot";
    $mail->Subject = "Flight Notification";
    $mail->Body = "Flight number: ".$feedback_id." Ended.  Thank you for chosing AeroOrgans";
    

    $mail->Host = "smtp.gmail.com";
   
    $mail->Port = 587;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->From = $mail->Username;
    
    //sending the email and echoing that the email is successfully sent
    $mail->send();
        echo "<script> alert('Message was sent Successfully');</script>";

        //Udpating Flight End date in the database 
        $sql = "UPDATE requests SET FE = NOW() WHERE Id = $feedback_id";
        $sql2 = "UPDATE requests SET status1 = 'Completed' WHERE Id = $feedback_id";
        $conn->query($sql);
        $conn->query($sql2);

        $conn->close();

} catch (PHPMailerException $e) {
    echo "<script>alert('PHPMailer Error: " . addslashes($e->getMessage()) . "');</script>";
} catch (Exception $e) {
    echo "<script>alert('An unexpected error occurred: " . addslashes($e->getMessage()) . "');</script>";
}
  
$conn->close();

?>