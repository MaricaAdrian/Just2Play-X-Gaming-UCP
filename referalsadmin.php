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

if($_SESSION['userucp']!="onterra"){

if($culoarel<6){

header("Location: index.php");

}

}?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Just2Play - UCP </title>





  <?php require_once 'includes/css.php'; ?>

    <!-- Fix pentru tabel -->

    <style>

    	.table td {

        text-align: center;   

       }

        .table th {

        text-align: center;   

       }

    </style>

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

  </head>

  <body>

  <?php require_once 'includes/antent.php'; ?>

<div class="container">

    <div class="col-sm-12 text-center cenetred">

    	<?php ?><h2>Referals</h2>

  <p>Aici poți să vizionezi toți jucătorii care au luat referals sau sunt eligibili pentru a primii.</p>            

  <table class="table table-striped table-condensed">

    <thead>

      <tr>

        <th>ID</th>

        <th>Nume:</th>

        <th>Status:</th>

        <th>A primit:</th>

        <th>Eligibil:</th>

        <th>Detalii:</th>

      </tr>

    </thead>

    <tbody>

    	<?php $query = mysql_query("SELECT id,Name,Status,Referrals,Refacordat FROM xgm_plaj_z");

		while($row=mysql_fetch_array($query)){

			 $nrref = 0;

			 $Nume = $row['Name'];

			 $id = $row['id'];

			 $status = $row['Status'];

			 $Referrals = $row['Referrals'];

			 $Acordat = $row['Refacordat'];

             $searchf = mysql_query("SELECT id,PlayerLevel FROM xgm_plaj_z WHERE Referrals='$Nume'");

             while($rows=mysql_fetch_array($searchf)){

             		$level = $rows['PlayerLevel'];

				 if($level>=5){

             	$nrref++;

					 }

             }if(!$searchf){die(mysql_error());} 

			 if($nrref>=5){

		 ?>

      <tr>

        <td><?php echo $id; ?></td>

        <td><?php echo $Nume; ?></td>

        <td><span class="label label-<?php if($status){echo "success";}else{echo "danger";} ?>"> <?php if($status){echo "ONLINE";}else{echo "OFFLINE";} ?></span></td>

        <td><?php if($Acordat==1){echo "25 GB";}

		          if($Acordat==2){echo "125 GB";}

				  if($Acordat==3){echo "425 GB";}

				  if($Acordat==4){echo "1025 GB";} ?></td>

        <td><?php if($nrref >= 5 && $Acordat == 0){echo "Da";}

				  elseif($nrref >= 10 && $Acordat == 1){echo "Da";}

				  elseif($nrref >= 30 && $Acordat == 2){echo "Da";}

				  elseif($nrref >= 50 && $Acordat == 3){echo "Da";}

                  else{ echo "Nu";} ?></td>

	    <td><a href="details.php?id=<?php echo $id; ?>">Detalii</a></td>

      </tr>

      <?php } } if(!$query){die(mysql_error());} ?>

    </tbody>

  </table>

    </div>

</div>

 <?php require_once 'includes/subsol.php'; ?>

 </div>

      	<!-- Scripturi -->

    <?php require_once 'includes/scripturi.php'; ?>	

</body>

</html>