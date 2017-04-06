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

			<div class="page-header text-center">

<h1>Membrii factiunii <?php if($nfactleader){echo $nfactleader;}else{echo $nfactmember;} ?></h1>

</div>

       <div class="col-sm-12">

			 <div class="table-responsive">

			 <table class="table table-striped table-condensed">

      <thead>

        <tr>

        

		  <th>ID</th>

          <th>Nume</th>

          <th>Status</th>

          <th>Telefon</th>

		  <th>Functie</th>

		  <th>Optiuni</th>

        </tr>

      </thead>

      <tbody>

      	 <?php 

      	     if($leaderfact==0 && $memberfact==0){

      	     	header("location:index.php");

      	     }

      	     if($memberfact==0){

      	     	unset($memberfact);

      	     }

			 if($leaderfact==0){

			 	unset($leaderfact);

			 }

			 if($leaderfact !=0 || $memberfact !=0 ){

			 	if($leaderfact!=0){

			 	$leaderq = mysql_query("SELECT Name FROM xgm_plaj_z WHERE Leader='$leaderfact'");

			 	}

				elseif($memberfact!=0){

				$leaderq = mysql_query("SELECT Name FROM xgm_plaj_z WHERE Leader='$memberfact'");	

				}

				while($leaderrow=mysql_fetch_array($leaderq)){

					$numelider = $leaderrow['Name'];

			 	$query = mysql_query("SELECT id,Name,Status,PhoneNr,Member,Leader,Rank FROM xgm_plaj_z WHERE Name='$numelider'");

			 

			 while($row=mysql_fetch_array($query)){

	         	$nume = $row['Name'];

				$id = $row['id'];

				$agent = $row['Agent'];

				$online = $row['Status'];

				$tel = $row['PhoneNr'];

                $rank = $row['Rank'];

				$eleader = $row['Leader'];

			?>

		 <tr>

		  <td><?php echo $id; ?></td>

          <td><?php echo $nume; ?></td>

          <td><span class="label label-<?php if($online==1){echo "success";}else{echo "danger";} ?>"><?php if($online==1){echo "Online";}else{echo "Offline";}?></span></td>

          <td><?php echo $tel; ?></td>

          <td><span class="label label-info"><?php if($eleader==$leaderfact){echo "Lider(CU COMENZI)";}else{echo "Rank " . $rank;} ?></span></td>

		  <td><a href="details.php?id=<?php echo $id; ?>">Detalii</a></td>

		 </tr>

			<?php }  } } ?>

			

			<?php

			 if($memberfact !=0 || $leaderfact != 0){

			 if($memberfact !=0){

      	     $query = mysql_query("SELECT id,Name,Status,PhoneNr,Member,Rank FROM xgm_plaj_z WHERE Member='$memberfact' ORDER BY Rank DESC");

			 }

			 elseif($leaderfact !=0){

			  $query = mysql_query("SELECT id,Name,Status,PhoneNr,Member,Rank FROM xgm_plaj_z WHERE Member='$leaderfact' ORDER BY Rank DESC");	

			 }

	         while($row=mysql_fetch_array($query)){

	         	$nume = $row['Name'];

				$id = $row['id'];

				$agent = $row['Agent'];

				$online = $row['Status'];

				$tel = $row['PhoneNr'];

                $rank = $row['Rank'];

				$eleader = $row['Leader'];

	         ?>

        <tr>

      

		  <td><?php echo $id; ?></td>

          <td><?php echo $nume; ?></td>

          <td><span class="label label-<?php if($online==1){echo "success";}else{echo "danger";} ?>"><?php if($online==1){echo "Online";}else{echo "Offline";}?></span></td>

          <td><?php echo $tel; ?></td>

          <td><span class="label label-info"><?php echo "Rank " . $rank; ?></span></td>

		  <td><a href="details.php?id=<?php echo $id; ?>">Detalii</a></td>

        </tr>

        <?php } } ?>

      </tbody>

    </table>

	</div>

	   </div>

        </div>

      </div>

    </div>

   	    <?php require_once 'includes/scripturi.php'; ?>

  </body>

</html>