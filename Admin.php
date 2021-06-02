<?php
require_once "session.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="homePages.css">
</head>

<body >
    <div class="navbar">
        <div>
            <p>University Library</p>
        </div>
        <a href="LateBorrowers.php">Send Emails</a>
        <a href="updateINFO.php">Update Info</a>
        <a href="updateBOOK.php">Update book details</a>
        <a href="showAllBooks.php">Browse Books</a>
        <div class="dropdown">
            <button class="dropbtn">Search
        <i class="fa fa-caret-down"></i>
        </button>
            <div class="dropdown-content">
                <a href="BookName.php">Book Name</a>
                <a href="AuthorList.php">Author</a>
                <a href="ISBN.php">ISBN</a>
                <a href="PublicationYear.php">Publication year</a>
                <a href="Genre.php">Genre</a>
            </div>
        </div>
        <a href="addBook.php" onclick="loadAddBook()">Adding Book</a>
        <a href="Logout.php">Log out</a>
    </div>
    <div id="container">
    <?php
if(isset($_COOKIE["user"]))
{
    echo "<div class='welcome'><h1>Welcome Admin </h1></div>";
    echo "<style>
    .welcome 
    {
        margin-left: 100px;
        margin-top: 100px;
        color: rgb(230, 213, 192);
        width: 650px;
        background-color:rgb(128, 0, 0) ;
        background-width: 70px;
        text-align: center;
    }
    h1 
    {
        font-weight: 700;
        font-size: 70px;
    }

    body
    {
        background-image: url('Background2.jpeg');
        background-size: auto 100%;
    }
    </style>";
} 
?>
    </div>
</body>
</html>

