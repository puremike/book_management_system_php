<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Website</title>
    <link rel="stylesheet" href="index.css">
</head>

<style>

    h2 {
        font-size: 2rem;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

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

</style>
<body>
    <div class="nav-class">
        <nav><a href="index.php">Home</a></nav>
        <nav><a href="./auth/signup.php">Book Website</a></nav>
    </div>
    <h2 class="body-c">Click here to visit our <a href="./auth/signup.php">book website</a></h2> 
</body>
</html>