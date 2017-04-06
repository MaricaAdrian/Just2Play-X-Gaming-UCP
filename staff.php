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

$query= mysql_query("SELECT Agent from xgm_plaj_z where Agent='1' AND AdminLevel='0'");

$helpers=0;

while($row=mysql_fetch_array($query)){

	$helpers++;

}

$query= mysql_query("SELECT AdminLevel from xgm_plaj_z where AdminLevel>='1'");

$admini=0;

while($row=mysql_fetch_array($query)){

	$admini++;

$staff = $admini + $helpers;

}

?>

<!DOCTYPE html>

<html lang="en-gb">

  <head>

    <meta charset="utf-8">

    <meta content="width=device-width" name="viewport">

    <meta content="yes" name="apple-mobile-web-app-capable">

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <title>X-Gaming - UCP </title>



  <?php require_once 'includes/css.php'; ?>

  </head>

  <body>

    <div class="container-fluid">

      <div class="row">

        <div class="col-sm-3 col-lg-2">

          <?php require_once 'includes/antent2.php'; ?> 

        </div>

        <div class="col-sm-9 col-lg-10">

          <div id="content">

            <div class="page-header text-center">

<h1>Staff-ul X-Gaming</h1>

<h4>Total Admins: <?php echo $admini; ?>   Total Helpers: <?php echo $helpers; ?>   Total membrii staff: <?php echo $staff; ?></h4>

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

      	 <?php $query = "SELECT id,Name,Status,PhoneNr,AdminLevel,Agent FROM xgm_plaj_z WHERE AdminLevel!='0' or Agent!='0' ORDER BY AdminLevel DESC";

		       $querys = mysql_query($query);

	         while($row=mysql_fetch_array($querys)){

	         	$nume = $row['Name'];

				$id = $row['id'];

				$agent = $row['Agent'];

				$online = $row['Status'];

				$tel = $row['PhoneNr'];

				$admin_level = $row['AdminLevel'];

				$admin_info = "";

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

else{$culoare_admin="FFFFFF";}

	         ?>

        <tr>

      

		  <td><?php echo $id; ?></td>

          <td><?php echo $nume; ?></td>

          <td><span class="label label-<?php if($online==1){echo "success";}else{echo "danger";} ?>"><?php if($online==1){echo "Online";}else{echo "Offline";}?></span></td>

          <td><?php echo $tel; ?></td>

          <td><span class="label label-default" style="background-color: #<?php echo $culoare_admin ?>;"><?php echo $admin_info; ?></span></td>

		  <td><a href="details.php?id=<?php echo $id; ?>">Detalii</a></td>

        </tr>

        <?php }  ?>

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