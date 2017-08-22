<?php
session_start();
$_SESSION=array();
session_destroy();
setcookie('u', '', time()-20);
setcookie('p', '', time()-20);
header('location: login.php');
?>