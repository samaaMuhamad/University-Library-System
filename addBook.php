<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="homePages.css">
</head>
<body style ="background-image: url('Background2.jpeg');"  align="center">
    <table align="center">
        <tr>
            <td align="center">
                <h2 style="color: brown; font-weight: 700;">Add A New Book</small>
                </h2>
            </td>
        </tr>
        <tr>
            <td align="center">
                <form method="POST" action="addBook.php" align="center">
                    <input type="text" class="allInputs" placeholder="Book Name" id="bookName" name="bookName"><br>
                    <input type="text" placeholder="Enter ISBN" class="allInputs" id="bookISBN" name="bookISBN"><br>
                    <input type="text" class="allInputs" placeholder="Publication Year"  id="publicationYear" name="publicationYear"><br>
                    <input type="text" class="allInputs" placeholder="Author" id="author" name="author"><br>
                    <input type="text" class="allInputs" placeholder="Genre" id="genre" name="genre"><br>
                    <input type="submit" name="submit" value= "submit" class="d11" ><br>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>

<?php
require_once "session.php";
$conn = mysqli_connect("localhost", "samaa", "12345", "librarysystem");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "<style>
body
    {
        background-image: url('Background2.jpeg');
        background-size: auto 100%;
    }
    </style>";
if(isset($_POST['submit']))
{
    $bookISBN=$_POST["bookISBN"];
    $bookName=$_POST["bookName"];
    $publicationYear=$_POST["publicationYear"];
    $author=$_POST["author"];
    $genre=$_POST["genre"];
    if ((empty($_POST["bookName"])) or (empty($_POST["bookISBN"])) or (empty($_POST["publicationYear"])) or (empty($_POST["author"])) or (empty($_POST["genre"])) )
    {
     echo '<script type="text/javascript"> alert("Required fields are empty. Please enter all required.."); </script>';
    }
    else
    {
        $queryEmail = mysqli_query($conn, "SELECT bookISBN from book where bookISBN = ". $bookISBN ) or die("Invalid query");
        if(mysqli_affected_rows($conn)!=0)
        {
            echo '<script type="text/javascript"> alert("This BOOK is ALREADY added.. Please add a new Book."); </script>';
        }
        else
        {
            $query = mysqli_query($conn, "INSERT INTO book (bookName, bookISBN, publicationYear, author,genre) 
            VALUES ('$bookName', '$bookISBN',  '$publicationYear', '$author', '$genre')");
            if (!$query) {
                die('Invalid query: ' . mysql_error());
            }
            else{
                echo '<script type="text/javascript"> alert("Book is SUCCESSFULLY added To the Library."); </script>';
                }
        } 
    }
}
mysqli_close($conn);
?>