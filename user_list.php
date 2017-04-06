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

#####################################################



$query= mysql_query("SELECT Status from xgm_plaj_z where Status='1'");

$online=0;

while($row=mysql_fetch_array($query)){

	$online++;

} ?>

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

   <h1>Cauta un jucator</h1>

   </div>

   <form action="user_list.php" method="POST">

  <div class="form-group text-center">

    <label for="nume">Nume jucator:</label>

	<input type="text" class="form-control" name="nume">

  </div>

    <input type="submit" class="btn btn-primary center-block" name="jucator" value="Cautare">

	<br>

  </form>

  <div class="row">

 <?php  if(!isset($_POST['jucator'])){ ?>  <div class="page-header text-center">

   <h1>Lista jucatorilor online:</p></h1>

   <h3>Jucatori Online: <?php echo $online;?></h3>

   </div>

   <?php }?>

   <?php

     if(!isset($_POST['jucator'])){ ?>

	 <div class="col-sm-12">

			 <div class="table-responsive">



	 <?php

     	  

     for($j=0;$j<=16;$j++){

     $numefact = mysql_fetch_array(mysql_query("SELECT nume FROM lista_factiuni WHERE id='$j'"));

	 $numefact = $numefact[0];

	 if($j==0){

		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 

        $start_from = ($page-1) * 10;

		$nrget = 10;

     $query = mysql_query("SELECT id,Name,Status,PhoneNr FROM xgm_plaj_z WHERE Leader='$j' AND Member='$j' AND Status!='0' LIMIT $start_from,$nrget");

	 }else{$query = mysql_query("SELECT id,Name,Status,PhoneNr FROM xgm_plaj_z WHERE Status='1' AND (Leader='$j' or Member='$j')");}

	 if(mysql_num_rows($query)>0){

     if(!$numefact){echo "<h3 style=\"color:white;\" class=\"text-center\">Lista civili online:</h3>";}else{echo "<h3 style=\"color:white;\" class=\"text-center\">Lista membrii " . $numefact . " online:</h3>";}

	

 ?>

       <table class="table table-striped table-condensed"> 

      <thead>

        <tr>

		  <th>ID</th>

          <th>Nume</th>

          <th>Status</th>

          <th>Telefon</th>

		  <th>Optiuni</th>

        </tr>

      </thead>

      <tbody>

	 <?php   while($row=mysql_fetch_array($query)){ 

	   $nume = $row['Name'];

	   $id = $row['id'];

	   $tel = $row['PhoneNr'];

	   $status = $row['Status'];

	 ?>

        <tr>

		  <td><?php echo $id; ?></td>

          <td><?php echo $nume; ?></td>

          <td><span class="label label-<?php if($status){echo "success";}else{echo "danger";} ?>"> <?php if($status){echo "ONLINE";}else{echo "OFFLINE";} ?></span></td>

          <td><?php echo $tel; ?></td>

		  <td><a href="details.php?id=<?php echo $id; ?>">Detalii</a></td>

        </tr>

		<?php  } ?>

      </tbody>

	     </table>

	<?php    }

if($i==0){ ?>

	 <div class="text-center centered">

<?php     $nrid=0;

          $pagini = mysql_query("SELECT id FROM xgm_plaj_z WHERE Leader='$j' AND Member='$j' AND Status!='0'");

	      while($row=mysql_fetch_array($pagini)){

	      	$nrid++;

	      }

		  $nrpag = ceil($nrid / $nrget); 

		  for ($i=1; $i<=$nrpag; $i++) { 

            echo "<a href='user_list.php?page=".$i."' class=\"btn btn-primary\">".$i."</a> "; 

}; ?></div>

<?php } } } ?>

	 <table class="table table-bordered">

	 <thead>

	 </thead>

	 <tbody>

	 	 <?php

		 if(isset($_POST['jucator'])){

		 $jucator = mysql_real_escape_string($_POST['nume']);

		 $query = mysql_query("SELECT id,Name,Status,PhoneNr FROM xgm_plaj_z WHERE Name LIKE '".$jucator."%' ");

		 if(mysql_num_rows($query)>0){

		 while($row=mysql_fetch_array($query)){

		 $nume = $row['Name'];

	     $id = $row['id'];

	     $online = $row['Status'];

	     $tel = $row['PhoneNr'];

		  ?>

		<tr>

		  <th>ID</th>

          <th>Nume</th>

          <th>Status</th>

          <th>Telefon</th>

		  <th>Optiuni</th>

        </tr>

		<tr>

		  <td><?php echo $id; ?></td>

          <td><?php echo $nume; ?></td>

          <td><span class="label label-<?php if($online==1){echo "success";}else{echo "danger";} ?>"><?php if($online==1){echo "Online";}else{echo "Offline";}?></span></td>

          <td><?php echo $tel; ?></td>

		  <td><a href="details.php?id=<?php echo $id; ?>">Detalii</a></td>

        </tr>

		 <?php } } else {echo "<h3 class=\"text-center\"><span class=\"label label-danger\">Jucatorul ".$jucator." nu a fost gasit</span></h3>";} }  ?>

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