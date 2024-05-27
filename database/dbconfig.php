<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dbenv";
    $port = "3306";
    
    // Object oriented method of connecting to a database using mysqli
        $conn = new mysqli($servername, $username, $password, $database,  $port);
    
        if($conn->connect_error){
            die( "An error occured during database connection" . $conn->connect_error);
        }

        // echo "Connected Successfully!";
?>