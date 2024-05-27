<?php 
    include "./../database/dbconfig.php";
    session_start();
    
    if($_SESSION["loggedIn"] == true){
        header("Location: dashboard.php");
    }
    else{
        
        if(isset($_POST["submit"])){
        if(empty($_POST["email"]) || empty($_POST["password"])){
            echo "Please fill in all the fields";
        }
        else{
            $email = $_POST["email"];
            $password = $_POST["password"];
            $sql = "SELECT * FROM employer WHERE email = ? AND pass_word = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $_SESSION["loggedIn"] = true;
                $_SESSION["name"] = $row["name"];
                header("Location: dashboard.php");
            }

            else{
                echo "Invalid email or password";
            }
        }
    echo "Records: " . $_POST["EMAIL"];
    }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>

<style>
    
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
        padding: 1.5rem;
        color: cornflowerblue;
        font-size: 25px;
    }

    input {
	margin: 0.5rem auto 0.5rem auto;
	padding: 0.3rem 0.1rem;
	text-align: center;
}

.login-btn {
	padding: 0.6rem 1.3rem;
	border: 1px solid rgb(90, 149, 236);
	border-radius: 0.2rem;
	color: rgb(230, 214, 214);
	background-color: rgb(24, 83, 172);
	margin-bottom: 2rem;
}

.login-btn:hover {
	background-color: rgb(10, 54, 119);
}
    
</style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Signup Page</title>
</head>
<link rel="stylesheet" href="../index.css">
<body>
<div class="nav-class">
    <nav><a href="../index.php">Home</a></nav>
</div>
<div class="body-c">
    <h1>Welcome To Our Book Website.</h1>
    <h2>Login Your Account!</h2>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" >
        <br> <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" >
        <br> <br>
        <input class="login-btn" type="submit" value="Login" name="submit">
    </form>
    </div>       
    
</body>
</html>