<?php
session_start();
$cookie_name = "user";
$cookie_value = "library";
setcookie($cookie_name, $cookie_value, time() - 3600);
$_SESSION = array();
session_destroy();
header('location:Login.php');
exit;
?>
