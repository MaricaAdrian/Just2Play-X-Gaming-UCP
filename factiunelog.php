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
<h1>Loguri factiune <?php if($nfactleader){echo $nfactleader;}else{echo $nfactmember;} ?></h1>
</div>
       <div class="col-sm-12">
			 <div class="table-responsive text-center">
			 <table class="table table-striped table-condensed">
     <?php 
     if($memberfact == 1 || $leaderfact == 1){$table = "1";}
	 if($memberfact == 2 || $leaderfact == 2){$table = "2";}
	 if($memberfact == 3 || $leaderfact == 3){$table = "3";}
	 if($memberfact == 4 || $leaderfact == 4){$table = "4";}
	 if($memberfact == 5 || $leaderfact == 5){$table = "5";}
	 if($memberfact == 6 || $leaderfact == 6){$table = "6";}
	 if($memberfact == 7 || $leaderfact == 7){$table = "7";}
	 if($memberfact == 8 || $leaderfact == 8){$table = "8";}
	 if($memberfact == 9 || $leaderfact == 9){$table = "9";}
	 if($memberfact == 10 || $leaderfact == 10){$table = "10";}
	 if($memberfact == 11 || $leaderfact == 11){$table = "11";}
	 if($memberfact == 12 || $leaderfact == 12){$table = "12";}
	 if($memberfact == 13 || $leaderfact == 13){$table = "13";}
	 if($memberfact == 14 || $leaderfact == 14){$table = "14";}
	 if($memberfact == 15 || $leaderfact == 15){$table = "15";}
	 if($memberfact == 16 || $leaderfact == 16){$table = "16";}
	 if($memberfact == 17 || $leaderfact == 17){$table = "17";}
	 if($memberfact == 18 || $leaderfact == 18){$table = "18";}
	 if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
     $start_from = ($page-1) * 10;
     $nrget = 10;
	 $query = mysql_query("SELECT * FROM factionslog  WHERE idfact='$table' ORDER BY data DESC LIMIT $start_from,$nrget");
	 while($row=mysql_fetch_array($query))
	 { ?> 
	 	<tr>
	 	<?php
	 	$actiune = $row['actiune'];
		$nume = $row['nume'];
		$data = $row['data'];
		echo "<td>".$nume." ".$actiune." ".$data."</td>";
		
	 }?>
	 </tr>
	 <?php
	 if(!$query){
	 	die(mysql_error());
	 }
     ?>
     <div class="text-center centered">
<?php     $nrid=0;
          $pagini = mysql_query("SELECT id FROM $table");
	      while($row=mysql_fetch_array($pagini)){
	      	$nrid++;
	      }
		  $nrpag = ceil($nrid / $nrget); 
		  for ($i=1; $i<=$nrpag; $i++) { 
            echo "<a href='factiunelog.php?page=".$i."' class=\"btn btn-primary\">".$i."</a> "; 
}; ?></div>
    </table>
	</div>
			 </div>
	      </div>
        </div>
      </div>
    </div>
   	    <?php require_once 'includes/scripturi.php'; ?>
  </body>
</html>