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

$banuri= mysql_query("SELECT id from banuri");

$ban = mysql_num_rows($banuri);

$blacklist= mysql_query("SELECT id from black_list");

$bl = mysql_num_rows($blacklist);

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

			<?php if(isset($_GET['afisare']) && $_GET['afisare']=='ban'){ ?>

<div class="page-header text-center">

<h1>Ban List X-Gaming</h1>

<h3>Jucatori Banati: <?php echo $ban; ?></p></h3>

</div>

       <div class="col-sm-12">

			 	<div class="table-responsive">

			    <table class="table table-striped table-condensed">

      <thead>

        <tr>

		  <th>ID</th>

          <th>Nume</th>

          <th>Motiv</th>

          <th>Banat de</th>

		  <th>Tip</th>

		  <th>Expira la</th>

		  <th>Optiuni</th>

		  <?php if($culoarel>=2){echo "<th>IP</th>";} ?>

        </tr>

      </thead>

      <tbody>

      	<?php 

      	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 

        $start_from = ($page-1) * 10;

      	$query = mysql_query("SELECT * from banuri ORDER BY id DESC LIMIT $start_from,10");

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

	if($admin_level==1){$admin_info = "Trial Admin";

	                    $culoare_admin = "DFE200";}

	if($admin_level==2){$admin_info = "Regular Admin";

	                    $culoare_admin = "006BF6";}

	if($admin_level==3){$admin_info = "Premium Admin";

	                    $culoare_admin = "796600";}

	if($admin_level==4){$admin_info = "Super Admin";

	                    $culoare_admin = "C3F6B3";}

	if($admin_level==5){$admin_info = "Lead Admin";

	                    $culoare_admin = "F81414";}

	if($admin_level==6){$admin_info = "Head Admin";

	                    $culoare_admin = "00FF00";}

	if($admin_level==7){$admin_info = "Administrator";

	                    $culoare_admin = "6BD700";}

	if($admin_level==8){$admin_info = "Co-Owner";

	                    $culoare_admin = "339999";}

	if($admin_level==9){$admin_info = "Owner";

	                    $culoare_admin = "33CCFF";}

	if($admin_level > 9){$admin_info = "Scripter";

	                    $culoare_admin = "33CCFF";}

}else if($agent==1){$admin_info = "Helper";

                     $culoare_admin = "FF6633";}

else{$culoare_admin="FFFFFF";}  ?>

        <tr>

		  <td><?php echo $id; ?></td>

          <td><?php echo $nume ?></td>

          <td><strong><?php echo $motiv; ?></strong></td>

          <td><span class="label label-default" style="background-color: #<?php echo $culoare_admin ?>;"><?php echo $banat_de . " - " . $admin_info ?></span></td>

          <td><?php echo $tip; ?></td>

		  <td><?php if(!$ziua && !$luna && !$anul){echo "<strong>Permanent</strong>";}else{ echo "<em>".$ziua."/".$luna."/".$anul." ".$ora.":".$minut."</em>";  } ?></td>

		  <td><a href="details.php?id=<?php echo $id; ?>">Detalii</a></td>

		  <?php if($admin_level>=2){echo "<td>".$ip."</td>";} ?>

	

        </tr>

        <?php  } ?>

      </tbody>



    </table>



    </div>

    <div class="text-center centered">

         <?php $pagini = mysql_fetch_array(mysql_query("SELECT count(id) FROM banuri"));

	      $pagini = $pagini[0];

		  $nrpag = ceil($pagini / 10); 

		  for ($i=1; $i<=$nrpag; $i++) { 

            echo "<a href='ban_list.php?afisare=ban&page=".$i."' class=\"btn btn-primary\">".$i."</a> "; 

}; ?>

</div>



	      

	   </div> <?php }

elseif(isset($_GET['afisare']) && $_GET['afisare']=='black'){ ?>

	   

	   <div class="page-header text-center">

<h1>Black List X-Gaming</h1>

<h3>Jucatori aflati in BlackList: <?php echo $bl; ?></h3>

</div>

       <div class="col-sm-12">

          <div class="table-responsive">

          <table class="table table-striped table-condensed">

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

      <form method="post" action="ban_list.php?afisare=black">

      	<div class="col-md-12 text-center">

      	<input class="btn btn-primary" type="submit" value="10" name="numar">

      	<input class="btn btn-primary" type="submit" value="50" name="numar">

      	<input class="btn btn-primary" type="submit" value="100" name="numar">

      </div>

      </div>

      

      </form>

	<div class="text-center">

	<p class="label label-primary"><strong>* Daca te aflii pe aceasta lista trebuie sa sti ca BL este de 2 Tipuri: PERMANENT sau WIPE</strong></p><br/>

    <p class="label label-warning"><strong>* WIPE: daca te afli pe lista neagra cu acest TIP, nu vei mai putea juca pe serverul nostru pana la urmatorul WIPE</strong></p><br/>

	<p class="label label-danger"><strong>* PERMANENT: daca te afli pe lista neagra cu acest TIP, nu vei mai juca niciodata pe serverul nostru !</strong></p><br/>

			 </div>

	      </div>

	      <?php } ?>

        </div>

      </div>

    </div>

   	    <?php require_once 'includes/scripturi.php'; ?>

  </body>

</html>