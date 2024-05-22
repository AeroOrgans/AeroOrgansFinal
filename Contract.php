<?php
session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "aeroorgans";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the form
    $cnumber = $_POST['cnumber'];

    // Store contract number in session
    $_SESSION['cnumber'] = $cnumber;

    $sql = "SELECT * FROM hospitalreps WHERE contract_num = '$cnumber'";
   

    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // if the contract was correct navigate to login page
        header("Location: l.html");
        exit;
       
    } else {
        // Invalid credentials
        echo "<script> alert('Invalid Contract, try again');</script>";
        echo "<script>window.location.href = 'contract.html';</script>";
    }

}

$conn->close();
?>