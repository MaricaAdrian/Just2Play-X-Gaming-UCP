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

    	<?php ?><h2>IP Filter</h2>

  <p>Aici poți să vizionezi toți jucătorii care joacă de pe mai multe conturi.</p>            

  <table class="table table-striped table-condensed">

    <thead>

      <tr>

        <th>ID</th>

        <th>Conturi:</th>

        <th>Status:</th>

        <th>Numar conturi:</th>

        <th>IP:</th>

      </tr>

    </thead>

    <tbody>

    	

    	<?php

		$arrayg = array("Nimeni","Statul");

		$arrayc = array(); 

		for($i=1;$i<=2;$i++){

    	$queryt = mysql_query("SELECT Name,ip FROM xgm_plaj_z WHERE Name NOT IN ('" . implode($arrayg, "', '") . "') ORDER BY id DESC");

		while($cautp=mysql_fetch_array($queryt)){

			$ipt = $cautp['ip'];

			$Numet = $cautp['Name'];

			array_push($arrayc, $Numet);

			$cauts = mysql_query("SELECT Name FROM xgm_plaj_z WHERE ip='$ipt' AND Name!='$Numet'");

			if(mysql_num_rows($cauts)>0){

				while($gasits=mysql_fetch_array($cauts)){

					$Numeg = $gasits['Name'];

					if(in_array($Numeg, $arrayc)){

					array_push($arrayg, $Numeg);

					}

				}

			}

		}

		}

    	$query = mysql_query("SELECT id,Name,Status,ip FROM xgm_plaj_z WHERE Name NOT IN ('" . implode($arrayg, "', '") . "')");

		while($row=mysql_fetch_array($query)){

             $nrcont = 1;

			 $Nume = $row['Name'];

			 $id = $row['id'];

			 $status = $row['Status'];

			 $ip = $row['ip'];

             $searchf = mysql_query("SELECT id,ip,Name,Status FROM xgm_plaj_z WHERE (ip='$ip' AND ip!='0') AND Name!='$Nume'");

			 if(mysql_num_rows($searchf)>0){

             

             

             

			 

		 ?>

      <tr>

        <td><?php echo $id; ?></td>

        <td><a href="details.php?id=<?php echo $id; ?>"><?php echo $Nume; ?></a><br/><?php while($rows=mysql_fetch_array($searchf)){ $idc=$rows['id']; ?><a href="details.php?id=<?php echo $idc; ?>"> <?php  $nrcont++; $Numec = $rows['Name'];  echo $Numec."<br/>"; ?></a> <?php  } ?></td>

        <td><span class="label label-<?php if($status){echo "success";}else{echo "danger";} ?>"> <?php if($status){echo "ONLINE";}else{echo "OFFLINE";} ?>

		</span>

		<?php 

		$searchm = mysql_query("SELECT Status FROM xgm_plaj_z WHERE (ip='$ip' AND ip!='0') AND Name!='$Nume'");

		while($rowm=mysql_fetch_array($searchm)){ $statusc = $rowm['Status'];  ?>

		<span class="label label-<?php if($statusc){echo "success";}else{echo "danger";} ?>"> <?php if($statusc){echo "<br/>ONLINE";}else{echo "</br>OFFLINE";} ?>

		</span>	

			<?php } ?>

		</td>

        <td><?php echo $nrcont; ?></td>

        <td><?php echo $ip; ?></td>

      </tr>

      <?php } } if(!$query){die(mysql_error());} 

	  ?>

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