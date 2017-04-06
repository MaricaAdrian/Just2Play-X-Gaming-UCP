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

<h1>Liderii factiunilor X-Gaming</h1>

</div>

       <div class="col-sm-12">

			 <div class="table-responsive">

             <table class="table table-striped table-condensed">

      <thead>

      	<?php $query = mysql_query("SELECT id,nume FROM lista_factiuni WHERE RecOn != 2"); ?>

        <tr>

		  <th>ID</th>

          <th>Nume</th>

		  <th>Lider</th>

		  <th>Optiuni</th>

        </tr>

      </thead>

      <tbody>

      	<?php while($row=mysql_fetch_array($query)){

      		$are = 0; 
		$b++;
      		$id = $row['id'];

			$numefact= $row['nume'];

      		$lider = mysql_query("SELECT id,Name,Leader FROM xgm_plaj_z where Leader!='0'");

      		while($lid=mysql_fetch_array($lider)){

      			$idjucator = $lid['id'];

				$numelider = $lid['Name'];

				$idlider = $lid['Leader'];

      	

			

			if($id==$idlider){

				$are = 1;	

				$nume = $numelider;

			    $idnume = $idjucator;}

				}

			?>

        <tr>

		  <td><?php echo $b; ?></td>

          <td><?php echo $numefact; ?></td>

          <td><?php if($are==1){echo $nume;}else{echo"<span class=\"label label-success\">Disponibil</span>";} ?></td>

		  <td><a href="<?php if($are==1){  echo "details.php?id=" . $idnume;}else{echo "http:\/\/X-Gaming.ro/forum/index.php?/forum/138-factiuni/";}?>"><?php if($are==1){ echo "Detalii";} else {echo "*";}?></a></td>

        </tr>

        <?php } ?>

      </tbody>

    </table>

	<div class="text-center">

	<span class="label label-info">* Daca in coloana Lider apare Disponibil poti aplica pentru lider pe forum !</span>

	</div>		 

	</div>

	   </div>

        </div>

      </div>

    </div>

   	    <?php require_once 'includes/scripturi.php'; ?>

  </body>

</html>