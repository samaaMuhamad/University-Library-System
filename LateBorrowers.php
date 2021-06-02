
<?php
$conn = mysqli_connect("localhost", "samaa", "12345", "librarysystem");
if (!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}
$todayDate= date('Y-m-d');
$query = mysqli_query($conn, "SELECT * from borrows where returnDate < '". $todayDate . "'") or die("Invalid query");


if(mysqli_affected_rows($conn)!=0) 
   {
       echo "<br><br><br>";
        echo "<style> table , td, th
            {
            border: 2px solid rgb(0, 0, 0);
            width: 500px;
            background-color: rgb(230, 213, 192);
            margin-left: 100px;
            margin-down: 600px; 
            align-content: center;
            padding: 5px;
            border-collapse: collapse;
            }
           div
           {
               margin-left:150px;
               color: rgb(230, 213, 192);
               width: 400px;
               background-color:rgb(128, 0, 0) ;
               text-align: center;
            } 
            h2 
            {
                font-size: 50px;
            }
            </style>";
        echo "<div><h2> Late Borrowers</h2> </div>";
        echo "<table><tr><th>Email</th><th>Borrow Date</th><th>Return Date</th><th>Book ISBN</th></tr>";
        while ($row = mysqli_fetch_row($query))  
        {
            echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>". $row[3]. "</td></tr>";
        }
            echo  "</table>";
            echo "<br><br><br><br>";
    }
else
    {
        echo '<script type="text/javascript"> alert("No Late Borrowers.."); </script>';
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
            background-image: url('Background2.jpeg');
            background-size: auto 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            font-family: sans-serif;
            align: center;
            margin-left: 340px;
            margin-top: -40px;
        }
        .form11 
        {
            align: center;
            margin-left: 140px;
            height: 20px;
            border: 2px solid brown;
            border-radius: 70px;
            width: 250px;
            padding: 10px;
            font-size: 18px;
            margin: 1px;
        }
        .form12
        {
            align: center;
            margin-left: 190px;
            border: 2px solid brown;
            font-size: 18px;
            margin: 10px;
        }
        .form3
        {
            margin-top: 80px;
            border-radius: 10px;
            text-align: center;
            font-size: 18px;
            border: 1px solid brown;
        }

    </style>
</head>
<body>
<body align="center">
    <table align="center">
        <tr>
            <td class ="form3" align="center">
                <h1 style="color: brown; font-weight: 700; font-size: 30px; ">Enter Email: </h1>
            </td>
        </tr>
        <tr>
            <td align="center">
            <form method="POST"  align="left">
                    <input class="form11" type="text"  placeholder="Enter student email: "  id="email" name="email"><br><br>
                    <input class="form12" type="submit" name="submit" value= "send"class="d11"><br>
                </form>
            </td>
        </tr>
    </table>
</body>
</body>
</html>
