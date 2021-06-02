<?php
require_once "session.php";
$conn = mysqli_connect("localhost", "samaa", "12345", "librarysystem");

if (!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}
    $result = mysqli_query($conn, "SELECT * From book") or die("Invalid query");
    if(mysqli_affected_rows($conn)!=0){
        echo "<br><br><br><br><br><br><br><br>";
        echo "<style> table , td, th
            {
            border: 2px solid rgb(0, 0, 0);
            width: 500px;
            background-color: rgb(230, 213, 192);
            margin-left: 400px;
            margin-down: 600px; 
            align-content: center;
            padding: 5px;
            border-collapse: collapse;
            }
            div
           {
               margin-left:470px;
               color: rgb(230, 213, 192);
               width: 350px;
               background-color:rgb(128, 0, 0) ;
               margin-top: -90px;
               padding: 1px;
               text-align: center;
            } 
           h1
           { 
               font-size: 30px;
            } 
            </style>";
        echo "<div><h1> All Books in the Library</h1> </div><br>";
    echo "<table><tr><th>Book Name</th><th>Book ISBN</th><th>publication Year</th><th>Author</th><th>Genre</th></tr>";
    while ($row = mysqli_fetch_row($result))  
    {
        echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>". $row[3]. "</td><td>". $row[4]. "</td></tr>";
    }
        echo  "</table>";
    }
    else
    {
        echo '<script type="text/javascript"> alert("This book is NOT in the Library.."); </script>';
    }
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-image: url('row-of-books-in-shelf-256541.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            font-family: sans-serif;
        }
    </style>
</head>
<body>

</body>
</html>


