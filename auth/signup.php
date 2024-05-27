<?php 
 include "./../database/dbconfig.php";

 if(isset($_POST["submit"])){
    if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"])){
        echo "Please fill in all the fields";
    }
    else{
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "INSERT INTO employer (fullname, email, pass_word) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $password);
        $stmt->execute();
        if($stmt->affected_rows > 0){
            echo "New records created successfully";
            header("Location: login.php");    
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
   
    }
    
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="../index.css">
    <style>    

        a {
	color: rgb(24, 83, 172);
	font-weight: bold;
}
    .nav-class {
        display: flex;
        justify-content: center;
        margin-top: 1rem;
        font-size: 2rem;
    }

    .nav-class nav {
        padding-left: 2rem;
    }

    form {
        margin-top: 1rem;
        color: rgb(24, 83, 172);
        font-size: 25px;
    }

    input {
	margin: 0.5rem auto 0.5rem auto;
	padding: 0.3rem 0.1rem;
	text-align: center;
}

.register-btn {
	padding: 0.6rem 1.3rem;
	border: 1px solid rgb(90, 149, 236);
	border-radius: 0.2rem;
	color: rgb(230, 214, 214);
	background-color: rgb(24, 83, 172);
	margin-bottom: 2rem;
}

.register-btn:hover {
	background-color: rgb(10, 54, 119);
}
    
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup Page</title>
    </head>
    <body>
    <div class="nav-class">
        <nav><a href="../index.php">Home</a></nav>
    </div>
    <div class="body-c">
        <h1>Welcome To Our Book Website.</h1>
        <h2>Sign Up Your Account!</h2>
        <form method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <br> <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" >
        <br> <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" >
        <br> <br>
        <input class="register-btn" type="submit" value="Register" name="submit">
        
    </form>
    <h2><a href="login.php">Login</a> If You Already Have An Account!</h2>
    </div>

    
        
    
    </body>
</html>