<?php 
session_start();
session_unset();
    // unset($_SESSION["loggedIn"]);
    // unset($_SESSION["name"]);
    session_destroy();
    header("Location: login.php");
    // echo 'You have been logged out. <a href="/auth/login.php">Go back</a>';
    // exit();
?>