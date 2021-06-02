<?php
require_once "session.php";
$conn = mysqli_connect("localhost", "samaa", "12345", "librarysystem");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    $email=$_SESSION["email"];
         if ((empty($_POST["firstName"])) and(empty($_POST["lastName"])) and(empty($_POST["newPassword"])) )
           {
            echo '<script type="text/javascript"> alert("You haveNOT entered the field you want to update.."); </script>';
           }
           else
           {
            if(isset($_POST["firstName"]))
            {
                    $firstname=$_POST["firstName"];
                    $query = mysqli_query($conn, "UPDATE `users` SET `firstName`= '". $firstname ."' WHERE email =  '". $email. "'" )or die("Invalid query");
                    if(mysqli_affected_rows($conn)!=0) //to make sure that the email and pass is correct and if they are correct
                    {  
                        echo '<script type="text/javascript"> alert("First Name is UPDATED Successfully.."); </script>';
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Cannot be Updated"); </script>';
                    }
            }
            if (isset($_POST["lastName"]) )
            {
                    $lastname=$_POST["lastName"];
                    $query = mysqli_query($conn, "UPDATE `users` SET `lastName`= '". $lastname ."' WHERE email =  '". $email. "'" )or die("Invalid query");
                    if(mysqli_affected_rows($conn)!=0) //to make sure that the email and pass is correct and if they are correct
                    {  
                        echo '<script type="text/javascript"> alert("Last Name is UPDATED Successfully.."); </script>';
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Cannot be Updated"); </script>';
                    }
            }
                if (isset($_POST["newPassword"]))
                {
                    $paswordd=$_POST["newPassword"];
                    $query = mysqli_query($conn, "UPDATE `users` SET `pasword`= '". $paswordd ."' WHERE email =  '". $email. "'" )or die("Invalid query");
                    if(mysqli_affected_rows($conn)!=0) //to make sure that the email and pass is correct and if they are correct
                    {  
                        echo '<script type="text/javascript"> alert("Password is UPDATED Successfully.."); </script>';
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Cannot be Updated"); </script>';
                    }
               }
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
                <h1 style="color: brown; font-weight: 700;">Update Information </h1>
            </td>
        </tr>
        <tr>
            <td align="center">
                <form method="POST" action="updateINFO.php" align="center">
                    <input type="button" onclick="hide()" class="d12" placeholder="First Name" value="Update First Name" id="firstName" name="firstName"><br>
                    <input type="button" onclick="hide1()" class="d12" placeholder="Last Name" value="Update Last Name" id="lastName" name="lastName"><br>
                    <input type="button" onclick="hide2()" class="d12" placeholder="New Password" value="Add New Password" id="myPass" name="newPassword"><br>
                    <input type="button" placeholder="Password-check" class="d12" id="myPass2" name="password-check"><br>
                    <input type="submit" name="submit" value= "submit"class="d11"><br>
                </form>
            </td>
        </tr>
    </table>
</body>

<script>
    function hide() {
        var x = document.getElementById("firstName");
        x.type = "text";
        x.className = "allInputs";
        x.value = "";
    }

    function hide1() {
        var x = document.getElementById("lastName");
        x.type = "text";
        x.className = "allInputs";
        x.value = "";
    }

    function hide2() {
        var x = document.getElementById("myPass");
        var y = document.getElementById("myPass2")
        x.type = "text";
        y.type = "text";
        x.className = "allInputs";
        y.className = "allInputs";
        x.value = "";
    }
    function checkForm() {
        var myPass = document.getElementById("myPass").value;
        var myPass2 = document.getElementById("myPass2").value;
        if (myPass != "" && myPass == myPass2) {
            if (myPass.length < 6) {
                alert("Error: Password must contain at least six characters!");
                document.getElementById("myPass").focus();
                return false;
            }
            re = /[0-9]/;
            if (!re.test(myPass)) {
                alert("Error: password must contain at least one number (0-9)!");
                document.getElementById("myPass").focus();
                return false;
            }
            re = /[a-z]/;
            if (!re.test(myPass)) {
                alert("Error: password must contain at least one character (a-z)!");
                document.getElementById("myPass").focus();
                return false;
            }
        } 
        else {
            alert("Error: Please check that you've confirmed your password!");
            document.getElementById("myPass").focus();
            return false;
        }

        alert("You entered a valid password: " + myPass);
        return true;
    }
</script>
</html>

