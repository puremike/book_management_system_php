<?php 
require "./../database/dbconfig.php";
    $books =  array(
        "Things Fall Apart" => array(
            "author" => "Chinua Achebe",
            "genre" => "Fiction",
            "isbn" => "978-0385474542"
        ),
        "Pride and Prejudice" => array(
            "author" => "Jane Austen",
            "genre" => "Romantic Fiction",
            "isbn" => "9780141439518"
        ),
        "The Catcher in the Rye" => array(
            "author" => "J.D. Salinger",
            "genre" => "Literary Fiction",
            "isbn" => "9780316769488"
        )
    );

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      if(isset($_POST["add_book"])){
        $title = $_POST["title"];
        $author = $_POST["author"];
        $genre = $_POST["genre"];
        $isbn = $_POST["isbn"];
        $stmt = $conn->prepare("INSERT INTO book (title, author, genre, isbn) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $author, $genre, $isbn);
        $title = $_POST["title"];
        $author = $_POST["author"];
        $genre = $_POST["genre"];
        $isbn = $_POST["isbn"];
        $stmt->execute();
        echo "New records created successfully";
        echo "<h2>These are the books before adding '$title' </h2> ";
        // displayBooksAndDetails();
        // addBook($books, $title, $author, $genre, $isbn);
        echo "<br> <br>";
        // displaySingleBookDetails($books, $title);
        echo "<br> <br>";
        displayBooksAndDetails();
      }
      else if(isset($_POST["remove_book"])){
        $title = $_POST["title"];
        echo "<h2>These are the books before removing '$title' </h2> ";
        displayBooksAndDetails();
        removeBook($books, $title);
        echo "<br> <br>";
        displayBooksAndDetails();
      }
    }
    else if($_SERVER['REQUEST_METHOD'] == "GET"){
        if(isset($_GET["view_books"])){
            displayBooksAndDetails();
        }
        else{
            echo "Nothing for you here man!!!";
        }
    }
    else {
        echo "Nothing for you here man!!!";
    }





    function displayBooksAndDetails(){
        // global $books;
        // Fetching data from database
        global $conn;
        $selectAllSql = "SELECT * FROM book";
        $result = $conn->query($selectAllSql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Title: " . $row['title'] . "\n";
                echo "Author: " . $row['author'] . "\n";
                echo "Genre: " . $row['genre'] . "\n";
                echo "ISBN: " . $row['isbn'] . "\n\n";
                echo "<br> <br>";
            }
        } else {
            echo "0 results";
        }
        // foreach($books as $title => $details){
        //     echo "Title: $title\n";
        //     echo "Author: " . $details['author'] . "\n";
        //     echo "Genre: " . $details['genre'] . "\n";
        //     echo "ISBN: " . $details['ISBN'] . "\n\n";
        //     echo "<br> <br>";
        // }
    }

    function removeBook(&$books, $title) {
        if (array_key_exists($title, $books)) {
            unset($books[$title]);
            echo "<h2>$title has been removed from the library.</h2>";
        } else {
            echo "Book with title: '$title' not found in the library.\n";
        }
    }


    function addBook(&$books, $title, $author, $genre, $isbn) {
        $books[$title] = array(
            "author" => $author,
            "genre" => $genre,
            "isbn" => $isbn
        );
        echo "<h2>$title has been added to the library.\n</h2>";
    }

    function displaySingleBookDetails($books, $title) {
        if (array_key_exists($title, $books)) {
            echo "<b>Displaying single book details for $title:\n\n</b>";
            echo "Title: $title\n";
            echo "Author: " . $books[$title]['author'] . "\n";
            echo "Genre: " . $books[$title]['genre'] . "\n";
            echo "isbn: " . $books[$title]['isbn'] . "\n\n";
        } else {
            echo "Book not found in the library.\n";
        }
    } 
?>