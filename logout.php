<?php
session_start();
session_destroy();
$past = time() - 100; 
setcookie("userucp", "gone", $past);
setcookie("passucp", "gone", $past); 
header("location:login.php");
?>