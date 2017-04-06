<?php 


if(isset($_COOKIE['stil'])){setcookie('stil', '', time() - 3600, '/'); $stil=0; }
else if(!isset($_COOKIE['stil'])){
$stil=1;
setcookie("stil", $stil, time()+3600 , '/');}


header('Location: ' . $_SERVER['HTTP_REFERER']);
?>