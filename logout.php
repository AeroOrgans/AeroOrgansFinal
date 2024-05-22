<?php
session_start();
//In order to logout the session must be ended 

if(isset($_SESSION['username'])){
    session_destroy();
    header('location: index.html');
} else {
    header('location: index.html');
}
?>
