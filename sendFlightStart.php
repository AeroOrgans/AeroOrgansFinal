<?php
session_start();
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use PHPMailer\PHPMailer\SMTP;


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "mysql";
$dbname = "aeroorgans";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function handleFlightNotification($conn) {
    $email = fetchEmail($conn);
    if ($email) {
        sendNotificationEmail($email);
        updateFlightStartDate($conn);
    }
}

// Fetches email based on the ID from a form submission
function fetchEmail($conn) {
    $feedback_id = $_POST['id'] ?? '';
    $_SESSION['id_FS'] = $feedback_id; // Store feedback ID in session
    $query = "SELECT Email FROM requests WHERE ID = '$feedback_id'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['Email'];
    }
    return false;
}

// Sends an email notification 
function sendNotificationEmail($email) {
    $feedback_id = $_SESSION['id_FS'];
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPSecure = 'tls';
        $mail->Username = "ghinafelemban@gmail.com";
        $mail->Password = "deud sstp hnwx tjby";
        $mail->addAddress($email);
        $mail->addCC('aero.organs@gmail.com');
        $mail->FromName = "Aero Organs Pilot";
        $mail->Subject = "Flight Notification";
        $mail->Body = "Flight number: ".$feedback_id." started. You can now track your organ through AeroOrgans Website";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->From = $mail->Username;
        $mail->send();
        echo "<script>alert('Message sent successfully');</script>";
    } catch (Exception $e) {
        echo "<script>alert('An unexpected error occurred: " . addslashes($e->getMessage()) . "');</script>";
    }
}

// Updates the flight start date in the database
function updateFlightStartDate($conn) {
    $feedback_id = $_SESSION['id_FS'];
    $sql = "UPDATE requests SET FS = NOW() WHERE Id = $feedback_id";
    if (!$conn->query($sql)) {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}


if (isset($_POST['id'])) {
    handleFlightNotification($conn);
}

$conn->close();

?>
