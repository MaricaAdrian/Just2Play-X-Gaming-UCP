<?php

session_start();

//Functii & Configurare

#####################################################

require_once "includes/configurare.php";

require_once "includes/functii.php";

#####################################################

if(!isset($_SESSION['userucp']))

{

header("location:login.php");

}

$blacklist= mysql_query("SELECT id from black_list");

$bl = mysql_num_rows($blacklist);

?>



<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Just2Play - UCP </title>



    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/fixareantet.css" rel="stylesheet">



    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

  </head>

  <body>

  <!-- Antent -->

      <?php require_once 'includes/antent.php'; ?>

	  

    <div class="container">

<div class="page-header text-center">

<h1>Black List Just2Play</h1>

<h3>Jucatori aflati in BlackList: <?php echo $bl; ?></h3>

</div>

       <div class="col-sm-12">

          <div class="panel panel-primary">

			 <div class="panel-body">

			 	<div class="table-responsive">

			 <table class="table table-bordered">

      <thead>

        <tr>

		  <th>ID</th>

          <th>Nume</th>

          <th>Motiv</th>

          <th>Adaugat de</th>

		  <th>Tip</th>

		  <th>Expira la</th>

		  <th>Optiuni</th>

        </tr>

      </thead>

      <tbody>

          	<?php 

      	if(!isset($_POST['numar'])){$nrbanuri = 25;}else{$nrbanuri = $_POST['numar'];}

      	$query = mysql_query("SELECT * from black_list LIMIT 0,$nrbanuri");

		while($row=mysql_fetch_array($query)){

		     $id = $row['idd'];

			 $nume = $row['Nume'];

			 $ziua = $row['BanzP'];

			 $anul = $row['BanaP'];

			 $ip = $row['PlayerIP'];

			 $luna = $row['BanlP'];

			 $motiv = $row['BanReason'];

			 $banat_de = $row['AdminBan'];

			 $ora = $row['BanoP'];

			 $minut =$row['BanmP'];

			 $tip = $row['TIP'];

			 $admin_level = mysql_fetch_array(mysql_query("SELECT AdminLevel from xgm_plaj_z where Name='$banat_de'"));

             $admin_level = $admin_level[0];

			 if($admin_level > 0){

	if($admin_level==1){$admin_info = "Admin Level 1";

	                    $culoare_admin = "primary";}

	if($admin_level==2){$admin_info = "Admin Level 2";

	                    $culoare_admin = "primary";}

	if($admin_level==3){$admin_info = "Admin Level 3";

	                    $culoare_admin = "primary";}

	if($admin_level==4){$admin_info = "Moderator";

	                    $culoare_admin = "warning";}

	if($admin_level==5){$admin_info = "Co-Owner";

	                    $culoare_admin = "success";}

	if($admin_level==6){$admin_info = "Owner";

	                    $culoare_admin = "danger";}

	if($admin_level==7){$admin_info = "Fondator";

	                    $culoare_admin = "info";}

}else if($helper==1){$admin_info = "Helper";

                     $culoare_admin = "primary";}

else{$culoare_admin="default";}  ?>

        <tr>

		  <td><?php echo $id; ?></td>

          <td><?php echo $nume ?></td>

          <td><strong><?php echo $motiv; ?></strong></td>

          <td><span class="label label-<?php echo $culoare_admin ?>"><?php echo $banat_de . " - " . $admin_info ?></span></td>

          <td><?php if($tip==1){echo "<span class=\"label label-danger\">Permanent</span>";}else{echo "<span class=\"label label-warning\">Wipe</span>";} ?></td>

		  <td><?php if($tip==1){echo "<strong>Niciodata</strong>";}else{echo "<strong>Wipe</strong>";}   ?></td>

		  <td><a href="details.php?id=<?php echo $id; ?>">Detalii</a></td>

	

        </tr>

        <?php  } ?>

      </tbody>



    </table>

          <h2 class="text-center">Numar de afisari:</h2>

      <form method="post" action="ban_list.php">

      	<div class="col-md-12 text-center">

      	<input class="btn btn-primary" type="submit" value="10" name="numar">

      	<input class="btn btn-primary" type="submit" value="50" name="numar">

      	<input class="btn btn-primary" type="submit" value="100" name="numar">

      </div>

      </div>

      </div>

      </form>

	<div class="text-center">

	<p class="bg-primary"><strong>* Daca te aflii pe aceasta lista trebuie sa sti ca BL este de 2 Tipuri: PERMANENT sau WIPE</strong></p>

    <p class="bg-warning"><strong>* WIPE: daca te afli pe lista neagra cu acest TIP, nu vei mai putea juca pe serverul nostru pana la urmatorul WIPE</strong></p>

	<p class="bg-danger"><strong>* PERMANENT: daca te afli pe lista neagra cu acest TIP, nu vei mai juca niciodata pe serverul nostru !</strong></p>

			 </div>

			 </div>

	      </div>

	   </div>

	  <!-- Subsol -->

		 <?php require_once 'includes/subsol.php'; ?>





			

	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

  </body>

</html>