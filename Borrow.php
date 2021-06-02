<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="book.css">
</head>

                
<body align="center">
    <table align="center">
        <tr>
            <td align="center">
                <h1 style="color: brown; font-weight: 700;">Enter Borrowing Details knowing that the borrowing period is 10 days: </h1>
            </td>
        </tr>
        <tr>
            <td align="center">
            <form method="POST" action="Borrow.php" align="center">
                    <input type="text"  class="d12" placeholder="Enter ISBN: " class="allInputs" id="bookISBN" name="bookISBN"><br>
                    <input type="date"  class="d12" placeholder="Enter Borrow Date: "  id="borrowDate" name="borrowDate"><br>
                    <input type="submit" name="submit" value= "submit"class="d11"><br>
                </form>
            </td>
        </tr>
    </table>
</body>

<script>
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("container").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "Student.html", true);
    xhttp.send();
</script>

</html>
<?php
require_once "session.php";
$conn = mysqli_connect("localhost", "samaa", "12345", "librarysystem");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit']))  //mentioning that all copies of the same book has the same ISBN and the default return date is 10 days
{
    $email=$_SESSION["email"];
    $bookISBN=$_POST["bookISBN"];
    $borrowDate=$_POST["borrowDate"];
    $returnDate = date('Y-m-d', strtotime($borrowDate. ' + 10 days'));
    $bookexist= true;

    $queryBook = mysqli_query($conn, "SELECT bookISBN from book where bookISBN = ". $bookISBN ) or die("Invalid query");
    if(mysqli_affected_rows($conn)==0)
    {
        $bookexist=false;
        echo '<script type="text/javascript"> alert("This BOOK is NOT in the library.."); </script>';
    }
    if( $bookexist)
    {
            if ((empty($bookISBN)) or(empty($borrowDate))  )
            {    
                echo '<script type="text/javascript"> alert("You haveNOT entered all the fields required.."); </script>';
            }
            else
            {
                $query = mysqli_query($conn, "INSERT INTO borrows VALUES ('$email', '$borrowDate', '$returnDate', '$bookISBN')");
                if(mysqli_affected_rows($conn)!=0)
                 { 
                    echo '<script type="text/javascript"> alert("Borrowing is done SUCCESSFULLY.."); </script>';
                 } 

            }
        
    } 
}
mysqli_close($conn);
?>