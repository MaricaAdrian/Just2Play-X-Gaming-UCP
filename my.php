<?php session_start();

//Functii & Configurare

#####################################################

require_once "includes/configurare.php";

require_once "includes/functii.php";

#####################################################

if(!isset($_SESSION['userucp']))

{

header("location:login.php");

}

$email = mysql_fetch_array(mysql_query("SELECT Email from xgm_plaj_z where Name='$username'"));

$email = $email[0];

if(isset($_GET['edit'])){

$adus = mysql_fetch_array(mysql_query("SELECT Referrals FROM xgm_plaj_z WHERE Name='$username'"));

$adus = $adus[0];

if($adus!="Nimeni" && $adus!=""){

header("location:login.php");

}

}

if(isset($_POST['setemail'])){

	$setemail = mysql_real_escape_string($_POST['email']);

	$query = mysql_query("SELECT id FROM xgm_plaj_z WHERE Email = '$setemail'");

	if(mysql_num_rows($query)==1)

	{

		$error = 1;

		$errorM = "Email-ul este deja setat pentru un utilizator.";

	}

	else{

	$query = mysql_query("UPDATE xgm_plaj_z SET Email='$setemail' WHERE Name='$username'");

	$mesaj = "Ti-ai setat email-ul cu succes !";

	}

}



if(isset($_POST['setref'])){

	$setref = mysql_real_escape_string($_POST['ref']);

	if($setref!="$username"){

		$este = mysql_query("SELECT id FROM xgm_plaj_z WHERE Name = '$setref' ");

		if(mysql_num_rows($este) == 0)

		{

			$error = 2;

			$errorM = "Persoana de referinta nu are acest nume !";

		}

		else{

			mysql_query("UPDATE xgm_plaj_z SET Referrals='$setref' WHERE Name='$username' ");

			$mesaj = "Ti-ai setat persoana de referinta cu succes !";

			$isok = 1;

		}

	}else{

		$error = 3;

		$errorM = "Nu poti sa te aduci singur pe server !";

	}





}

?>

<!DOCTYPE html>

<html lang="en-gb">

  <head>

    <meta charset="utf-8">

    <meta content="width=device-width" name="viewport">

    <meta content="yes" name="apple-mobile-web-app-capable">

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <title>X-Gaming SA:MP UCP</title>

          <?php require_once 'includes/css.php'; ?>

  </head>

  <body>

    <div class="container-fluid">

      <div class="row">

        <div class="col-sm-3 col-lg-2">

          			<?php require_once "includes/antent2.php"; ?>

        </div>

        <div class="col-sm-9 col-lg-10">

			<div class="jumbotron text-center">

				<div class="form-group">

				  <?php if(!isset($_GET['edit'])){ ?>

				<h2>Seteza sau modifica email.</h2>

				<form method="post" action="my.php">

					<label for="email">Email:</label>

					<input type="text" name="email" value="<?php if(isset($email)){echo $email;} ?>"><br/>

					<input type="submit" class="btn btn-primary" name="setemail" value="Seteaza Email!">

				</form> 

				</div>

				<?php }else{ ?>

				<h2>Seteză cine te-a adus pe server.</h2>

					<h4>(Atenție poți modifica doar o singura odata! Fi precaut la scrierea numelui.).</h4>

				<form method="post" action="my.php?edit=ref">

					<label for="ref">Cine te-a adus:</label>

					<?php if(!isset($isok)){ ?>

						<input type="text" name="ref" value="Nimeni"><br/>

						<input type="submit" class="btn btn-primary" name="setref" value="Setează!">

					<?php }else{ ?>

						<input type="text" name="ref" value="<?php echo $setref; ?>"><br/>

					<?php }?>

				</form> 

				<?php

				}

				 if(isset($error)){echo $errorM;}else{echo $mesaj;} ?>

			</div>

        </div>

      </div>

    </div>

   	    <?php require_once 'includes/scripturi.php'; ?>

  </body>

</html>