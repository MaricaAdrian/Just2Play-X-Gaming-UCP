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
if($culoarel<5 && $_SESSION['userucp']!="onterra"){
header("Location: index.php");
}
$jucatorp = $_POST['jucator'];
$jucatorg = $_GET['jucator'];

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
			<div class="row row-centered">
<div class="col-xs-12 text-center">
  <h1>Admin Logs</h1>
  <hr>
   <h4 class="text-center">Numar de afisari:</h4>
      
      	<div class="col-md-12 text-center">
      	<a href="admin_logs.php?<?php
      	echo "nrafis=100&"; 
      	if(isset($_GET['tabela'])){echo "tabela=".$_GET['tabela']."&";}
		if(isset($_GET['jucator']) || isset($_POST['jucator'])){ if($jucatorp!=''){ echo "jucator=".$jucatorp;}else{echo "jucator=".$jucatorg;} }
      	?>" class="btn btn-primary">100</a>
      	      	<a href="admin_logs.php?<?php
      	echo "nrafis=300&"; 
		if(isset($_GET['tabela'])){echo "tabela=".$_GET['tabela']."&";}
		if(isset($_GET['jucator']) || isset($_POST['jucator'])){ if($jucatorp!=''){ echo "jucator=".$jucatorp;}else{echo "jucator=".$jucatorg;} }
      	?>" class="btn btn-primary">300</a>
      	      	<a href="admin_logs.php?<?php
      	echo "nrafis=600&"; 
      	if(isset($_GET['tabela'])){echo "tabela=".$_GET['tabela']."&";}
		if(isset($_GET['jucator']) || isset($_POST['jucator'])){ if($jucatorp!=''){ echo "jucator=".$jucatorp;}else{echo "jucator=".$jucatorg;} }
      	?>" class="btn btn-primary">600</a>
		      	<a href="admin_logs.php?<?php
      	echo "nrafis=1200&"; 
      	if(isset($_GET['tabela'])){echo "tabela=".$_GET['tabela']."&";}
		if(isset($_GET['jucator']) || isset($_POST['jucator'])){ if($jucatorp!=''){ echo "jucator=".$jucatorp;}else{echo "jucator=".$jucatorg;} }
      	?>" class="btn btn-primary">1200</a>
		      	<a href="admin_logs.php?<?php
      	echo "nrafis=2400&"; 
      	if(isset($_GET['tabela'])){echo "tabela=".$_GET['tabela']."&";}
		if(isset($_GET['jucator']) || isset($_POST['jucator'])){ if($jucatorp!=''){ echo "jucator=".$jucatorp;}else{echo "jucator=".$jucatorg;} }
      	?>" class="btn btn-primary">2400</a>
      </div>
      	<div class="col-md-12 text-center">
<h4 class="btn btn-default text-center" id="adminlogb">Log-uri de administrare</h4><br/>
<div id="adminlog">
<h4>
<a href="admin_logs.php?tabela=admincmdslog" class="btn btn-primary">Admin CMD Logs</a> 
<a href="admin_logs.php?tabela=adminmoneylog" class="btn btn-primary">Admin Money Log</a>
<a href="admin_logs.php?tabela=paylog" class="btn btn-primary">Money Log</a>  
<a href="admin_logs.php?tabela=advertiseundercoverlog" class="btn btn-primary">Undercover Log</a> 
<a href="admin_logs.php?tabela=bugslog" class="btn btn-primary">Bugs Log</a> 
<a href="admin_logs.php?tabela=gunlog" class="btn btn-primary">Gun Log</a> 
<a href="admin_logs.php?tabela=paylog" class="btn btn-primary">Pay Log</a> 
<a href="admin_logs.php?tabela=propertylog" class="btn btn-primary">Case Log</a> 
<a href="admin_logs.php?tabela=hacklog" class="btn btn-primary">Hack Log</a> 
<a href="admin_logs.php?tabela=killlog" class="btn btn-primary">Kill Log</a>
<br/>
<br/>
<a href="admin_logs.php?tabela=lista_jobs" class="btn btn-primary">Lista Jobs</a> 
<a href="admin_logs.php?tabela=lista_factiuni" class="btn btn-primary">Lista Factiuni</a>
<a href="admin_logs.php?tabela=lista_logs" class="btn btn-primary">Lista Logs</a>
</h4>
</div>
<h4 class="btn btn-default text-center" id="factlogb">Factiuni Log</h4><br/>
<hr>
<div id="factlog">
<h4>
<a href="admin_logs.php?tabela=logpd" class="btn btn-primary">PD Log</a> 
<a href="admin_logs.php?tabela=logfbi" class="btn btn-primary">F.B.I Log</a> 
<a href="admin_logs.php?tabela=logarmy" class="btn btn-primary">Army Log</a> 
<a href="admin_logs.php?tabela=logmedic" class="btn btn-primary">Medic Log</a> 
<a href="admin_logs.php?tabela=loggov" class="btn btn-primary">Guvern Log</a> 
<a href="admin_logs.php?tabela=logtaxi" class="btn btn-primary">Taxi Log</a> 
<a href="admin_logs.php?tabela=loginstructor" class="btn btn-primary">School Instructor</a> 
<a href="admin_logs.php?tabela=logremorcari" class="btn btn-primary">TCC Log</a> 
<a href="admin_logs.php?tabela=logreporter" class="btn btn-primary">News Reporter Log</a> 
<a href="admin_logs.php?tabela=loghitman" class="btn btn-primary">Hitman Log</a> 
<br/>
<br/>
<a href="admin_logs.php?tabela=logykz" class="btn btn-primary">Yakuza Log</a> 
<a href="admin_logs.php?tabela=logcorleone" class="btn btn-primary">Corleone Log</a> 
<a href="admin_logs.php?tabela=logebb" class="btn btn-primary">EBB Log</a> 
<a href="admin_logs.php?tabela=logdvr" class="btn btn-primary">Diablo Log</a> 
<a href="admin_logs.php?tabela=logtriads" class="btn btn-primary">Triads Log</a> 
<a href="admin_logs.php?tabela=loggtt" class="btn btn-primary">GTT Log</a> 
</h4>
<br/><br/>


</div>
<form method="post">
<div class="form-group text-center">
	<label for="jucator">Caută jucător:</label>
	<input type="text" class="form-control" name="jucator">
</div>
<input type="submit" class="btn btn-primary" name="submit" value"Caută" />
</form>
<br/>
<?php if(isset($_POST['jucator'])){ echo "<h1>Rezultatele căutării: ".$_POST['jucator'];} ?>
      </div>

<div class="col-md-12">

			 <div class="panel-body">
			 <div class="table-responsive text-center">
			 <table class="table table-striped table-condensed">
<tbody>
  <?php
  if(isset($_GET["nrafis"])) {$nrafis = $_GET["nrafis"]; } else { $nrafis = 100; }
  if(isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
  $start_from = ($page-1) * $nrafis;
  $nrget = $nrafis;
  if(isset($_GET['tabela'])){
  $tabela = mysql_real_escape_string($_GET['tabela']);
  }else{$tabela = "admcmdslog";}
  $testq = mysql_query("SELECT * FROM $tabela");
  while($testrow=mysql_fetch_array($testq)){
  	$erow = $testrow['Text'];
	$erowt = $testrow['text'];
	$erown = $testrow['nume']; 
  }
  if(isset($erow)){ $likerow = "Text";}
  if(isset($erowt)){ $likerow = "text";}
  if(isset($erown)){ $likerow = "nume";}
  if(isset($_POST['jucator'])){
  	$jucator = mysql_real_escape_string($_POST['jucator']);
  	$query=mysql_query("SELECT * FROM $tabela WHERE $likerow LIKE '%$jucator%' ORDER BY id DESC LIMIT $start_from,$nrget");
  }
  elseif(isset($_GET['jucator'])){
  	$jucator = mysql_real_escape_string($_GET['jucator']);
  	$query=mysql_query("SELECT * FROM $tabela WHERE $likerow LIKE '%$jucator%' ORDER BY id DESC LIMIT $start_from,$nrget");
  }
  else{
  $query=mysql_query("SELECT * FROM $tabela ORDER BY id DESC LIMIT $start_from,$nrget");
  }
  if(!$query){die(mysql_error());}
  while($row=mysql_fetch_array($query)){ ?>
  	<tr>
  		<?php 
  $log = $row['Text'];
  $logf = $row['text'];
  $logm = $row['nume'];	  
  ?>
  <?php 
  if(isset($log)){echo " <td>$log</td>";}
  if(isset($logf)){echo " <td>$logf</td>";}
  if(isset($logm)){echo " <td>$logm</td>";}
  ?>
  </tr>
 <?php }  ?>

</tbody>
</table>
	</div>
			 </div>
	      </div>

<div class="text-center centered">
<?php     $nrid=0;
          if(isset($_POST['jucator'])){
  	      $jucator = mysql_real_escape_string($_POST['jucator']);
		  $pagini = mysql_query("SELECT id FROM $tabela WHERE $likerow LIKE '%$jucator%'");
		  }
		  else{
          $pagini = mysql_query("SELECT id FROM $tabela");
		  }
	      while($row=mysql_fetch_array($pagini)){
	      	$nrid++;
	      }
		  $nrpag = ceil($nrid / $nrafis); 
		  for ($i=1; $i<=$nrpag; $i++) { 
               ?>
            <a href="admin_logs.php?<?php 
            if(isset($_GET['tabela'])){echo "tabela=".$tabela."&";} 
            if(isset($_GET['nrafis'])){echo "nrafis=".$nrafis."&";}
			if(isset($_GET['jucator']) || isset($_POST['jucator'])){echo "jucator=".$jucator."&";}
            ?>page=<?php echo $i; ?>" class="btn btn-primary"><?php echo $i; ?></a>
            <?php } ?>
</div>
</div>
</div>
        </div>
      </div>
    </div>
   	    <?php require_once 'includes/scripturi.php'; ?>
		<script>
	var i = 0;
    $("#factlog").hide();
	$("#adminlog").hide();
	$("#factlogb").click(function(){
	if($("#factlog").is(':hidden')){$("#factlog").slideDown(1000);
	}else{
	$("#factlog").slideUp(1000);
	}
	
	});
	$("#adminlogb").click(function(){
	if($("#adminlog").is(':hidden')){$("#adminlog").slideDown(1000);
	}else{
	$("#adminlog").slideUp(1000);
	}
	
	});
	</script>
  </body>
</html>