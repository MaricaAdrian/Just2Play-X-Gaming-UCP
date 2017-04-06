<?php

session_start();

//Functii & Configurare

#####################################################

require_once "includes/configurare.php";

require_once "includes/functii.php";

#####################################################

if(isset($_SESSION['userucp'])){

	header("Location: index.php");

}

$email = htmlspecialchars($_GET['email']);

$code_1 = htmlspecialchars($_GET['code']);

$code = "RESETATA-$code_1";

#####################################################

$euser = mysql_fetch_array(mysql_query("SELECT id from xgm_plaj_z where email='$email'"));

$db_code = mysql_fetch_array(mysql_query("SELECT Password from xgm_plaj_z where email='$email'"));

$db_code = $db_code[0];

if (!$euser[0] || $code!==$db_code)

{

$gresit = "<span class=\"label label-danger\">E-mailul sau codul introdus este incorect !</span>";

}

if(isset($_POST['recuperare'])){

	

$parola = htmlspecialchars($_POST['parola']);

$parola_2 = htmlspecialchars($_POST['rparola']);

if ($parola!==$parola_2)

{

$gresit= "<span class=\"label label-danger\">Parola introdusa nu este la fel in ambele casute !</span>";

}

else if(!$euser[0] || $code!==$db_code)

{

$gresit = "<span class=\"label label-danger\">E-mailul sau codul introdus este incorect!</span>";

}

else{

mysql_query("UPDATE xgm_plaj_z SET password='$parola_2' where email='$email'");

$corect = "<span class=\"label label-success\">Parola a fost schimbata cu success.<br/><br/>

Acum va puteti <a href=\"login.php\">autentifica</a> cu noua parola.</span>";

}





}

 ?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>X-Gaming SA:MP UCP </title>





    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/fixareantet.css" rel="stylesheet">



    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

  </head>

  <body>

    <div class="container">

	  <img src="images/banner/2.png" alt="x-gaming Community" class="img-thumbnail center-block">

	  <div class="col-sm-12 text-center">

	  	<div class="col-sm-6">

	  <p><span class="glyphicon glyphicon-eye-open"></span> Jucatori online: <?php echo $online; ?></p>

	  </div>

	  <p><span class="glyphicon glyphicon-hdd"></span> Adresa Server: rpg.x-gaming.ro</p>

	  </div>

	  <div class="col-sm-6 col-sm-offset-3 text-center cenetred">

	  <form method="post" action="resetare.php?email=<?php echo $_GET['email']?>&code=<?php echo $_GET['code']; ?>">

	  	<div class="form-group center-block">

	  	<label for="email">Email</label>

	  	<input type="text" class="form-control" name="email"  value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>" readonly>

	  	</div>

	  	<div class="form-group center-block">

	  	<label for="parola">Parola Noua</label>

	  	<input type="text" class="form-control" name="parola">

	  	</div>

		  <div class="form-group center-block">

	  	<label for="rparola">Repetare Parola Noua</label>

	  	<input type="text" class="form-control" name="rparola">

	  	</div>

	  	<input type="submit" class="btn btn-default" name="recuperare" value="Recupereaza Parola">

	  	<a href="<?php echo $adresa."/login.php"; ?>" class="btn btn-default">Inapoi</a>

	  </form>

	  <?php if(isset($gresit)){echo $gresit;}

	        if(isset($corect)){echo $corect;} ?>

    </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

  </body>

  </html>