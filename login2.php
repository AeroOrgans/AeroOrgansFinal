<?php
session_start();

function connectToDatabase($dbhost, $dbuser, $dbpass, $dbname) {
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function authenticatePilot($conn, $username, $password) {
    $sql = "SELECT * FROM pilots WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    return $result->num_rows === 1;
}

function authenticateHospitalRep($conn, $username, $password, $contractNumber) {
    $sql = "SELECT * FROM hospitalreps WHERE username = '$username' AND password = '$password' AND contract_num = '$contractNumber'";
    $result = $conn->query($sql);
    return $result->num_rows === 1;
}

function setSessionUsername($username) {
    $_SESSION['username'] = $username;
}

function redirectTo($page) {
    header("Location: $page");
    exit;
}

function showErrorAndRedirect($message, $redirectPage) {
    echo "<script> alert('$message');</script>";
    echo "<script>window.location.href = '$redirectPage';</script>";
}

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "mysql";
$dbname = "aeroorgans";
$conn = connectToDatabase($dbhost, $dbuser, $dbpass, $dbname);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        if (authenticatePilot($conn, $username, $password)) {
            setSessionUsername($username);
            redirectTo("PilotPage.php");
        } else {
            $contractNumber = isset($_SESSION['cnumber']) ? $_SESSION['cnumber'] : '';
            if (authenticateHospitalRep($conn, $username, $password, $contractNumber)) {
                setSessionUsername($username);
                redirectTo("otp.php");
            } else {
                showErrorAndRedirect("Invalid username or password! Please try again.", "l.html");
            }
        }
    } else {
        showErrorAndRedirect("Username and password cannot be empty!", "l.html");
    }
}
?>