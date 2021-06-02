
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="search.css">
</head>

<body>

    <div class="navbar">
        <div>
            <p>Show Book List</p>
        </div>
        <div class="wrapper">
            <div>
                <form method="POST">
                    <input type="text" id="search" name="search" class="allInputs" placeholder="Enter Genre: ">
                    <input type="submit" class="d12" name="submit" value="Show list"><br>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once "session.php";
$conn = mysqli_connect("localhost", "samaa", "12345", "librarysystem");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    $search=$_POST["search"];
    if (empty($search))
    {
        echo '<script type="text/javascript"> alert("Required field is empty.."); </script>';
    }
    else
    {
        $result= mysqli_query($conn, "SELECT * from book where genre = '". $search . "'") or die("Invalid query");
        if(mysqli_affected_rows($conn)!=0)
        {
            echo "<style> table , td, th
            {
            border: 2px solid rgb(0, 0, 0);
            width: 500px;
            background-color: rgb(230, 213, 192);
            margin-left: 400px; 
            margin-top: 300px;
            align-content: center;
            padding: 5px;
            border-collapse: collapse;
            } </style>";
            echo "<table><tr><th>Book Name</th><th>Book ISBN</th><th>publication Year</th><th>Author</th><th>Genre</th></tr>";
            while ($row = mysqli_fetch_row($result))  
            {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>". $row[3]. "</td><td>". $row[4]. "</td></tr>";
            }
                echo  "</table>";
        }
        else
        {
                echo '<script type="text/javascript"> alert("There are NO books with this genre in the Library.."); </script>';
        }
    }
}
mysqli_close($conn);
?>