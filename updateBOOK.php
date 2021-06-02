<?php
require_once "session.php";
$conn = mysqli_connect("localhost", "samaa", "12345", "librarysystem");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    $bookISBN=$_POST["bookISBN"];
    $queryEmail = mysqli_query($conn, "SELECT  bookISBN from book where bookISBN = '". $bookISBN . "'") or die("Invalid query");
    if(mysqli_affected_rows($conn)!=0)
       {  
           if ((empty($_POST["bookName"])) and (empty($_POST["publicationYear"]))and(empty($_POST["author"])) and (empty($_POST["genre"])) )
           {
            echo '<script type="text/javascript"> alert("You have NOT entered the field you want to update.."); </script>';
           }
           else
           {
            if(isset($_POST["bookName"]))
            {
                    $bookName=$_POST["bookName"];
                    $query = mysqli_query($conn, "UPDATE `book` SET `bookName`= '". $bookName ."' WHERE bookISBN =  '". $bookISBN. "'" )or die("Invalid query");
                    if(mysqli_affected_rows($conn)!=0) //to make sure that the email and pass is correct and if they are correct
                    {  
                        echo '<script type="text/javascript"> alert("Book Name is UPDATED Successfully.."); </script>';
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Cannot be Updated"); </script>';
                    }
            }
            if(isset($_POST["publicationYear"]))
            {
                    $publicationYear=$_POST["publicationYear"];
                    $query = mysqli_query($conn, "UPDATE `book` SET `publicationYear`= '". $publicationYear ."' WHERE bookISBN =  '". $bookISBN. "'" )or die("Invalid query");
                    if(mysqli_affected_rows($conn)!=0) //to make sure that the email and pass is correct and if they are correct
                    {  
                        echo '<script type="text/javascript"> alert("publication Year is UPDATED Successfully.."); </script>';
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Cannot be Updated"); </script>';
                    }
            }
            if(isset($_POST["author"]))
            {
                    $author=$_POST["author"];
                    $query = mysqli_query($conn, "UPDATE `book` SET `author`= '". $author ."' WHERE bookISBN =  '". $bookISBN. "'" )or die("Invalid query");
                    if(mysqli_affected_rows($conn)!=0) //to make sure that the email and pass is correct and if they are correct
                    {  
                        echo '<script type="text/javascript"> alert("Author is UPDATED Successfully.."); </script>';
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Cannot be Updated"); </script>';
                    }
            }
            if(isset($_POST["genre"]))
            {
                    $genre=$_POST["genre"];
                    $query = mysqli_query($conn, "UPDATE `book` SET `genre`= '". $genre ."' WHERE bookISBN =  '". $bookISBN. "'" )or die("Invalid query");
                    if(mysqli_affected_rows($conn)!=0) //to make sure that the email and pass is correct and if they are correct
                    {  
                        echo '<script type="text/javascript"> alert("Genre is UPDATED Successfully.."); </script>';
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Cannot be Updated"); </script>';
                    }
            }
        }
    }
    else
        {
         echo '<script type="text/javascript"> alert("This book is not registered in the library.."); </script>';
        }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="update.css">
<body align="center">
    <table align="center">
        <tr>
            <td align="center">
                <h2 style="color: brown; font-weight: 700;">Update Book Information</small>
                </h2>
            </td>
        </tr>
        <tr>
            <td align="center">
                <form method="POST" action="updateBOOK.php" align="center">
                    <input type="text" placeholder="Enter ISBN" class="allInputs" id="bookISBN" name="bookISBN"><br>
                    <input type="button" onclick="hide3()" class="d12" placeholder="Book Name" value="Update Book Name" id="bookName" name="bookName"><br>
                    <input type="button" onclick="hide()" class="d12" placeholder="Publication Year" value="Update Public. Year" id="publicationYear" name="publicationYear"><br>
                    <input type="button" onclick="hide1()" class="d12" placeholder="Author" value="Update Author" id="author" name="author"><br>
                    <input type="button" onclick="hide2()" class="d12" placeholder="Genre" value="Update Genre" id="genre" name="genre"><br>
                    <input type="submit" name="submit" value= "submit"class="d11"><br>
                </form>
            </td>
        </tr>
    </table>
</body>

<script>
    function hide() {
        var x = document.getElementById("publicationYear");
        x.type = "text";
        x.className = "allInputs";
        x.value = "";
    }
    function hide3()
    {
        var y=document.getElementById("bookName");
        y.type = "text";
        y.className = "allInputs";
        y.value = "";
    }

    function hide1() {
        var x = document.getElementById("author");
        x.type = "text";
        x.className = "allInputs";
        x.value = ""
    }

    function hide2() {
        var x = document.getElementById("genre");
        x.type = "text";
        x.className = "allInputs";
        x.value = ""
    }
</script>

</html>