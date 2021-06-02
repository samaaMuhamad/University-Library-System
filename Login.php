<?php
session_start();
$_SESSION["login"] = true;
$cookie_name = "user";
$cookie_value = "library";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); // 86400 = 1 day
$conn = mysqli_connect("localhost", "samaa", "12345", "librarysystem");
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['submit']))
{
    if ( (empty($_POST["email"])) or (empty($_POST['password'])) )
    {
     echo '<script type="text/javascript"> alert("Required fields are empty. PLease make sure you entered all the fields.."); </script>';
    }
    else
    {
        $_SESSION["email"] = $_POST["email"];
        $email = $_SESSION["email"];
        $passwordd = $_POST["password"];
        $queryEmail = mysqli_query($conn, "SELECT email from users where email = '" . $email . "'") or die("Invalid query");
        if (mysqli_affected_rows($conn) != 0)
        {
            $query = mysqli_query($conn, "SELECT email,pasword FROM users WHERE email= '" . $email . "' AND pasword = '" . $passwordd . "'") or die("Invalid query");
            if (mysqli_affected_rows($conn) != 0) //to make sure that the email and pass is correct and if they are correct
            
            {
                $queryType = mysqli_query($conn, "SELECT typee FROM users WHERE email= '" . $email . "'") or die("Invalid query");
                $row = mysqli_fetch_row($queryType);
                if ($row[0] == 'student')
                {
                    header('location:Student.php');
                }
                else if ($row[0] == 'admin')
                {
                    header('location:Admin.php');
                }
            }
            else
            {
                echo '<script type="text/javascript"> alert("Password is NOT correct.. Please Try to login again."); </script>';
            }
        }
        else
        {
            echo '<script type="text/javascript"> alert("Email is not registered in the library.."); </script>';
        }
    }
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="homePages.css">

<body>
    <form method="POST">
        <table align="center">
            <tr>
                <td align="left">
                    <img src="logo.png" style="width: 200px; height: 200px;">
                </td>
                <td align="left">
                    <h2 style="color: brown; font-weight: 700;">Welcome to <br><small>The University Library Management</small></h2>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <form method="POST" align="center" action="Login.php">
                        <input type="email" placeholder="Email" class="allInputs" name="email" id="email" <?php
if (isset($_COOKIE["user"]))
{
    echo $_COOKIE["user"];
}
?>><br>
                        <input type="password" placeholder="Password" class="allInputs" id="password" name="password"><br>
                        <input type="checkbox" onclick="showPassword()" style="margin-left: -130px;">Show Password<br>
                        <input type="submit"name="submit" value="Login" class="d12"></a> <br>
                        <label>_________OR_________</label><br>
                        <a href="signnUp.php" class="d12">Sign Up</a> <br>
                    </form>
                </td>
            </tr>
        </table>
</body>

<script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>
