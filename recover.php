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

if(isset($_POST['recuperare'])){

	$username = mysql_real_escape_string($_POST['username']);

	$email  = mysql_real_escape_string($_POST['email']);

	$query = mysql_query("SELECT id,Email FROM xgm_plaj_z WHERE Name='$username' AND Email='$email'");

	while($row=mysql_fetch_array($query)){

		$id = $row['id'];

		$emailv = $row['Email'];

	}

	if(!$id || !$email){$gresit = "<span class=\"label label-danger\">Nume sau Email incorecte.</span><br/><br/><span class=\"label label-info\">Daca intampini probleme in continuare te rugam sa apelezi la fondatorii serverului</span>";}

 if(!isset($gresit)){

$subiect = "Resetare parola RPG.X-GAMING.RO";

$time = time();

$str = "X-GAMING.RO-$email-$time";

$code = md5($str);

$mesaj = "Salut <b>$username</b><br>Pentru a reseta parola contului tau , acceseaza link-ul urmator : <a href=\"resetare.php?email=$email&code=$code\">resetare.php?email=$email&code=$code</a> .<br>Iti dorim o zi placuta !";

mysql_query("UPDATE xgm_plaj_z SET password='RESETATA-$code' where Name='$username'");

send_email($emailv,$subiect,$mesaj);

$ok = "<span class=\"label label-success\">A fost trimis catre e-mailul tau un link pentru recuperare.</span>";	

	

 }



} ?>

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

	  <img src="images/banner/2.png" alt="Just2Play Community" class="img-thumbnail center-block">

	  <div class="col-sm-12 text-center">

	  	<div class="col-sm-6">

	  <p><span class="glyphicon glyphicon-eye-open"></span> Jucatori online: <?php echo $online; ?></p>

	  </div>

	  <p><span class="glyphicon glyphicon-hdd"></span> Adresa Server: rpg.x-gaming.ro</p>

	  </div>

	  <div class="col-sm-6 col-sm-offset-3 text-center cenetred">

	  <form method="post" action="recover.php">

	  	<div class="form-group center-block">

	  	<label for="username">Nume de Utilizator</label>

	  	<input type="text" class="form-control" name="username">

	  	</div>

	  	<div class="form-group center-block">

	  	<label for="email">Email</label>

	  	<input type="text" class="form-control" name="email">

	  	</div>

	  	<input type="submit" class="btn btn-default" name="recuperare" value="Recuperează parola">

		<a href="index.php" class="btn btn-default" >Înapoi</a>

	  </form>

	  <?php if(isset($gresit)){echo $gresit;}

	        if(isset($ok)){echo $ok;} ?>

    </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

  </body>

  </html>