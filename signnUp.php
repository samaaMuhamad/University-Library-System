<?php
$conn = mysqli_connect("localhost", "samaa", "12345", "librarysystem");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    if ((empty($_POST["firstname"])) or (empty($_POST["lastname"])) or (empty($_POST["email"])) or (empty($_POST['password'])) or (empty($_POST["type"])) )
    {
     echo '<script type="text/javascript"> alert("Required fields are empty. PLease make sure you entered all the fields.."); </script>';
    }
    else
    {
        $firstname=$_POST["firstname"];
        $lastname=$_POST["lastname"];
        $email=$_POST["email"];
        $passwordd=$_POST['password'];
        $type=$_POST["type"];

        $queryEmail = mysqli_query($conn, "SELECT email from users where email = '". $email . "'") or die("Invalid query");
        echo (mysqli_affected_rows($conn));
        if(mysqli_affected_rows($conn)!=0)
        {
            echo '<script type="text/javascript"> alert("This email is ALREADY REGISTERED.. Sign Up with a new email."); </script>';
        }
        else
        {
            $query = mysqli_query($conn, "INSERT INTO users (firstName, lastName, email, pasword,typee) 
            VALUES ('$firstname', '$lastname', '$email', '$passwordd', '$type')");
            if (!$query) {
                die('Invalid query: ' . mysql_error());
            }
            else{ echo '<script type="text/javascript"> alert("You SUCCESSFULLY signed up."); </script>'; }
        }
    }
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" type="text/css" href="homePages.css">

<body align="center">
    
    <table align="center">
        <tr>
            <td align="left">
                <img src="logo.png" style="width: 200px; height: 200px;">
            </td>
            <td align="left">
                <h2 style="color: brown; font-weight: 700;">Welcome to <br><small>The University Library
                        Management</small></h2>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <form name="signUpForm" action= "signnUp.php" method="POST" onsubmit="return checkForm()" align="center">
                    <label class="txt">Create New Account</label><br>
                    <input type="text" placeholder="First name" class="allInputs" id="firstname" name="firstname" style="margin-top: 40px;"><br>
                    <input type="text" placeholder="Last name" class="allInputs" id="lastname" name="lastname"><br>
                    <input type="text" placeholder="Email" class="allInputs" id="email" name="email"><br>
                    <input type="password" placeholder="Password" class="allInputs" id="myPass" name="password"><br>
                    <input type="password" placeholder="Confirm Password" class="allInputs" id="myPass2"><br>
                    <input type="checkbox" onclick="showPassword()"
                        style="margin-left: -130px; margin-bottom: 15px;">Show Password<br>
                    <label style="font-size: 20px;">Account Type</label><br>
                    <input type="radio" id="admin" name="type" value="admin">Admin
                    <input type="radio" id="student" name="type" value="student" style="margin-top: 10px;">Student<br>
                    <input type="submit" name="submit" value= "Sign Up" class="d12" ><br>
                </form>
            </td>
        </tr>
    </table>
</body>

<script>
    function showPassword() {
        var x = document.getElementById("myPass");
        var y = document.getElementById("myPass2");
        if (x.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }
        
    function checkForm() {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var firstname = document.getElementById("firstname").value;
        var lastname = document.getElementById("lastname").value;
        var email = document.getElementById("email").value;
        var myPass = document.getElementById("myPass").value;
        var myPass2 = document.getElementById("myPass2").value;
        var type = document.getElementsByName('type');
        var typeValue=false;
        for(var i=0; i<type.length;i++)
        {
            if(type[i].checked == true)
            {
                typeValue = true;    
            }
        }
        if(!typeValue)
        {
            alert("Please Choose the type");
            return false;
        }
            
        if (firstname == "" ||lastname == "" ) {
            alert("Error: Names cannot be blank!");
            document.getElementById("firstname").focus();
            document.getElementById("lastname").focus();
            return false;
        }
        
     

        if (email == "") {
            alert("Error: Email cannot be blank!");
            document.getElementById("email").focus();
            return false;
        }
        if(!email.match(mailformat))
        {
            alert("You have entered an invalid email address!");
            document.signUpForm.email.focus();
            return false;
        }
        
        if (myPass != "" && myPass == myPass2) {
            if (myPass.length < 6) {
                alert("Error: Password must contain at least six characters!");
                document.getElementById("myPass").focus();
                return false;
            }
            if (myPass == firstname || myPass == lastname) {
                alert("Error: Password must be different from names!");
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
        } else {
            alert("Error: Please check that you've entered and confirmed your password!");
            document.getElementById("myPass").focus();
            return false;
        }

        alert("You entered a valid password: " + myPass);
        return true;
    }
</script>


</html>

