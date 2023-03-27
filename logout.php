<?php
session_start();
$_SESSION['score'] = 0;
unset($_SESSION['username']);
session_destroy();
header("location:login.php");
exit;
?>