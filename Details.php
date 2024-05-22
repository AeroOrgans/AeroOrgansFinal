<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Aero Organs - Order History</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Icons -->
  <link href="img/logosmalll.png" rel="icon">
  <link href="img/logobig.png" rel="apple-touch-icon">

    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .order-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .order {
            border-bottom: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        .order h2 {
            color: #333;
        }

        .no-orders {
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>


<form action="Update.php">
  <button type="submit">Click here to Edit or Delete</button>
</form>
<?php
session_start();
// Establish a connection 
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbName = "aeroorgans";

$conn = new mysqli($servername, $username, $password, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//here we are trying to get the email of the loged in user, using sessions. 
$Email="";
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $sql = "SELECT email FROM hospitalreps WHERE username = '$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //Now i have the email of the logged user
        $row = $result->fetch_assoc();
        $Email = $row["email"];
    } 
}

//==========================================================
//in this part: fetching all request data that has that email + ID 

$result = $conn->query("SELECT * FROM requests WHERE Email = '$Email'");

if ($result->num_rows > 0) {
   
    while ($row = $result->fetch_assoc()  ) {
        echo '<div class="order">';
        echo '<h2>Order ID: ' . $row["ID"] . '</h2>';
        echo '<p>Email: ' . $row["Email"] .'</p>';
        echo '<p>Name: ' . $row["Organ"] . '</p>';
        echo '<p>Age: ' . $row["Source"] . '</p>';
        echo '<p>Email: ' . $row["Destination"] . '</p>';
        echo '<p>Address: ' . $row["Weight1"] . '</p>';
        echo '<p>Product: ' . $row["Urgency"] . '</p>';
        echo '<p>Notes: ' . $row["Notes"] . '</p>';
        echo '</div>';
    }
} else {
    echo '<p class="no-orders">No orders found.</p>';
}


$conn->close();

?>
  
</body>
</html>
