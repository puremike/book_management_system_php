<!DOCTYPE html>
<html>
<head>
    <title>Book Management</title>
    <link rel="stylesheet" href="../index.css">
</head>

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

a {
    text-decoration: none;
    color: rgb(24, 83, 172);
    font-weight: bold;
}

h2 {
    margin: 1.3rem 0;
}

.form-class {
    padding: 2rem 2rem;
}
</style>

<body>
<div class="nav-class">
    <nav><a href="../index.php">Home</a></nav>   
</div>

<div class="body-c">

<h2>Add Book</h2>
<form action="bookfeatures.php" method="post">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title"><br>
    <label for="author">Author:</label>
    <input type="text" name="author" id="author"><br>
    <label for="genre">Genre:</label>
    <input type="text" name="genre" id="genre"><br>
    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" id="isbn"><br>
    <input type="submit" name="add_book" value="Add Book">
</form>

<h2>Remove Book</h2>
<form action="bookfeatures.php" method="post">
    <label for="tit">Title:</label>
    <input type="text" name="title" id="tit"><br>
    <input type="submit" name="remove_book" value="Remove Book">
</form>

<h2>View Books</h2>
<form action="bookfeatures.php" method="get">
    <input type="submit" value="View Books" name="view_books">
</form>

</div>


</body>
</html>

