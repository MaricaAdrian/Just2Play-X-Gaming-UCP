<?php session_start();
//Functii & Configurare
#####################################################
require_once "includes/configurare.php";
require_once "includes/functii.php";
#####################################################
if(isset($_POST['id'])){
	$likeid = $_POST['id'];
}
$likeq = mysql_query("SELECT * FROM upgrades WHERE id='$likeid'");
while($row=mysql_fetch_array($likeq)){
	$id = $row['id'];
	$Nume = $row['Nume'];
	$Likes = $row['Likes'];
	$Time = $row['Time'];
	$gnume = explode(" ", $Nume);
    $gcookie= $gnume[0] . $Time . $id;
	
	
}
if(isset($_POST['op']) && $_POST['op']=="like" && !isset($_COOKIE[$gcookie])){
	$Likes = $Likes + 1;
	setcookie($gcookie, "liked", time()+3600*24, '/');
	$query = mysql_query("UPDATE upgrades SET Likes='$Likes' WHERE id='$id'");
	echo 1;
	exit();
	
}
?>