<?php
if(session_id() == '')
{
	session_start();
}
if(isset($_SESSION['userucp']))
{
header("Location: user.php");
die();
}
else{
header("Location: login.php");
die();
}
?>