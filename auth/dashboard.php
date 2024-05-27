<?php 
session_start();
    if($_SESSION["loggedIn"] === true){
        $name =  $_SESSION["name"];
    }
    else{
        header("Location: login.php");
    }
?>

<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup</title>
    </head>

    <style>
    .nav-class {
	display: flex;
	justify-content: center;
	margin-top: 1rem;
    text-align : right;
	font-size: 2rem;
}

.nav-class nav {
	padding-left: 2rem;
}

    a {
	color: rgb(24, 83, 172);
	font-weight: bold;
    text-decoration: none;
}

    </style>
    <body>
        <div class="nav-class">
        <nav><a href="../index.php">Home</a></nav>
    </div>
    <form action="logout.php">
        <button type="submit">Logout</button>
        </form>
        <h2>Welcome to your dashboard<?php echo $name?></h2>
        
        <h2>Use Our <a href="../books/addbook.php">Book Management System</a></h2>
    </body>
</html>