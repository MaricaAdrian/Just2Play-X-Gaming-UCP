<?php session_start();
//Functii & Configurare
#####################################################
require_once "includes/configurare.php";
require_once "includes/functii.php";
#####################################################
if(isset($_SESSION['userucp'])){
	header("Location: user.php");
}
if(isset($_POST['login'])){
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$captcha = mysql_real_escape_string($_POST['captcha']);
$euser = mysql_fetch_array(mysql_query("SELECT id from xgm_plaj_z where Name='$username'"));
$euser = $euser[0];
$parola = mysql_fetch_array(mysql_query("SELECT Password from xgm_plaj_z where Name='$username'"));
$parola = $parola[0];

if(!$euser[0]){

$error = "1";	
	
 }
else if ($parola!==md5($password)){
	
$error = "1";	
}
else if	(empty($_SESSION['captcha']) || strtolower(trim($_REQUEST['captcha'])) != $_SESSION['captcha']){
$error = "2";	
}

else{
	
$user_db = mysql_fetch_array(mysql_query("SELECT Name from xgm_plaj_z where id='$euser'"));
$user_db = $user_db[0];
setcookie ("userucp",$user_db,time()+3600*24*60);
setcookie ("passucp",$password,time()+3600*24*60);
$_SESSION['userucp'] = $user_db;
header("Location: user.php");
}
unset($_SESSION['captcha']);
}

$query= mysql_query("SELECT Status from xgm_plaj_z where Status='1'");
$online=0;
while($row=mysql_fetch_array($query)){
	$online++;
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>X-Gaming SA:MP UCP</title>


    <?php require_once 'includes/css.php'; ?>
<style>
body {
  padding-top: 70px;
    background-image: url("images/bg/bg6.png");
	background-repeat: no-repeat;
     background-attachment: fixed;
	 background-size:cover;
	background-position:center; 
}
</style>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
	  <img src="images/banner/2.png" alt="Just2Play Community" class="img-thumbnail center-block">
	  <div class="col-sm-12 text-center">
	  	<div class="col-sm-6">
	  <p style="color: white;"><span class="glyphicon glyphicon-eye-open"></span> Jucatori online: <?php echo $online; ?></p>
	  </div>
	  <p style="color: white;"><span class="glyphicon glyphicon-hdd"></span> Adresa Server: rpg.x-gaming.ro</p>
	  </div>
  
	  <br/>
	  <br/>
	  <br/>
	  <br/>
	  <div class="col-sm-6 col-sm-offset-3 text-center cenetred">
<form method="post" action="login.php">
    <div class="form-group">
    <label for="user" style="color: white;">Nume de utilizator</label>
    <input type="text" class="form-control" id="user" placeholder="Introdu numele de utilizator" name="username">
  </div>
  <div class="form-group">
    <label for="parola" style="color: white;">Parola</label>
    <input type="password" class="form-control" id="parola" placeholder="Parola" name ="password">
  </div>
  <div class="form-group">
    <label for="code" style="color: white;">Cod de securitate:</label>
    <input type="text" class="form-control" id="code" placeholder="Codul captcha" name ="captcha">
    <?php echo "<img src=\"includes/captcha.php?$data\" alt=\"cod securitare\"><br>\n"; ?>
  </div>
  <input type="submit" class="btn btn-default" name="login" value="Autentificare">
  <a href="recover.php" class="btn btn-default">Recuperare Parola</a>
  <?php if(isset($error)){
  	if($error=="1"){
  		echo "<br/><h1><span class=\"label label-danger\">Nume sau parola incorecte !</span><br/></h1>";
  	}
	else if($error=="2"){	echo "<br/><h1><span class=\".\label label-warning\">Cod de securitate incorect !</span><br/></h1>";}
  } ?>

</form>
	  </div>
	
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>