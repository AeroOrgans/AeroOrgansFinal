<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "mysql";
$dbname = "aeroorgans";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];


//since we are dealing with two tables in our database (HP & Pilot) we must in this case
//make two queries, beacuse of them as users can request password reset  
$sql = "SELECT * FROM pilots WHERE username = '$username'"; 
$result = $conn->query($sql);
$sql2 = "SELECT * FROM hospitalreps WHERE username = '$username'"; 
$result2 = $conn->query($sql2);

//first condition, if a match was found in the pilot table
if ($result->num_rows > 0) {

    if (strlen($password1) < 8 || !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password1)) {
        echo "<script>alert('Invalid password format');</script>";
        echo "<script>window.location.href = 'passwordResetPage.html';</script>";
        exit();
    }

    //Password1 & password2 confirmation fields must match first
    if ($_POST['password1'] === $_POST['password2']) {
    
    $query = "UPDATE pilots SET password = '$password1' WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    echo "<script> alert('Password updated!');</script>";
    echo "<script>window.location.href = 'contract.html';</script>";

    } else {
        //if Password1 & password2 confirmation fields dont match, 
        //a message will be illustrated, and it will navigate back to password reset page 
        //so the user can try again 
        
        echo "<script> alert('Passwords do not match, please try again');</script>";
        echo "<script>window.location.href = 'passwordResetPage.html';</script>";
    }


//second condition, if a match was found in the hospitalreps table
} elseif ($result2->num_rows > 0) {
    if (strlen($password1) < 8 || !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password1)) {
        echo "<script>alert('Invalid password format. Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, one digit, and one special character.');</script>";
        echo "<script>window.location.href = 'passwordResetPage.html';</script>";
        exit();
    }
    //same steps mentioned with the pilots table
    if ($_POST['password1'] === $_POST['password2']) {
        
        $query = "UPDATE hospitalreps SET password = '$password1' WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        echo "<script> alert('Password updated!');</script>";
        echo "<script>window.location.href = 'contract.html';</script>";
    
    
        } else {
            echo "<script> alert('Passwords do not match, please try again');</script>";
            echo "<script>window.location.href = 'passwordResetPage.html';</script>";
        }
    

} else {
    echo "<script>alert('Unexpected Error has occured, please try again later');</script>";
    echo "<script>window.location.href = 'l.html';</script>";
    die();
}

$conn->close();


?>