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
}
if(isset($_POST['upgrades'])){
	$id = mysql_real_escape_string($_GET['modifica']);
	$Nume = mysql_real_escape_string($_POST['Nume']);
	$Tip = mysql_real_escape_string($_POST['Tip']);
	$Versiune = mysql_real_escape_string($_POST['Versiune']);
	$modif = str_replace("<br />","",$_POST['Modificari']);
	$textarea = mysql_real_escape_string(nl2br($modif));
	$Time = time() + (24 * 60 * 60);
	$Modificari = htmlspecialchars($textarea, ENT_QUOTES, "UTF-8");
	$Data = date('d-m-Y G:i A');
	$query = mysql_query("UPDATE upgrades SET 
	Nume='$Nume',
	Tip='$Tip',
	Versiune='$Versiune',
	Modificari='$Modificari',
	Data='$Data',
	Time='$Time' 
	WHERE id='$id'");
	$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." a modificat un articol la Server Upgrades pe data de ".date('d-m-Y G:i A').".";
	$ucp = mysql_query("INSERT INTO admcmdslog (Text) values ('$ucptext')");
	if($query){
		$ok=1;
		$mesaj = "Upgrade-ul a fost modificat cu succes.";
	}
	else{
		$ok=0;
		$mesaj = mysql_error($query);
		//"S-a produs o eroare la inserarea în baza de date.";
		
	}
} 
if(isset($_GET['modifica'])){
	
	$id = mysql_real_escape_string($_GET['modifica']);
	$query = mysql_query("SELECT * from upgrades WHERE id='$id' ORDER BY id DESC");
	while($row=mysql_fetch_array($query)){
		$Nume= $row['Nume'];
		$Adaugatde = $row['Adaugatde'];
		$Tip = $row['Tip'];
		$Data = $row['Data'];
		$Versiune = $row['Versiune'];
		$Modificari = $row['Modificari'];
	}
}
if(isset($_GET['sterge'])){
	
	$sid = mysql_real_escape_string($_GET['sterge']);
	$query = mysql_query("DELETE FROM upgrades where id='$sid'");
	$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." a sters un articol la Server Upgrades pe data de ".date('d-m-Y G:i A').".";
	$ucp = mysql_query("INSERT INTO admcmdslog (Text) values ('$ucptext')");
	if($query){
		$ok = 1;
		$mesaj = "Ati șters cu succes Upgrade-ul cu numărul " . $sid;
	}
	else{
	    $ok=0;
		$mesaj = "S-a produs o eroare la inserarea în baza de date.";
	}
}?>
<!DOCTYPE html>
<html lang="en-gb">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <title>X-Gaming SA:MP UCP</title>
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
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-lg-2">
          			<?php require_once "includes/antent2.php"; ?>
        </div>
        <div class="col-sm-9 col-lg-10">
			<div class="col-sm-12 text-center cenetred">
    	<?php if(!isset($_GET['modifica'])){ ?><h2>Upgrades</h2>
  <p>De aici puteți modifica sau șterge Upgrades.</p>            
  <table class="table table-striped table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nume:</th>
        <th>Adaugat de:</th>
        <th>TIP</th>
        <th>Data:</th>
        <th>Versiune:</th>
        <th>Modifica:</th>
      </tr>
    </thead>
    <tbody>
    	<?php $query = mysql_query("SELECT * FROM upgrades ORDER BY id DESC");
		while($row=mysql_fetch_array($query)){
			$id = $row['id'];
			$Nume= $row['Nume'];
			$Adaugatde = $row['Adaugatde'];
			$Tip = $row['Tip'];
			$Data = $row['Data'];
			$Versiune = $row['Versiune'];
		 ?>
      <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $Nume; ?></td>
        <td><?php echo $Adaugatde; ?></td>
        <td><?php echo $Tip; ?></td>
        <td><?php echo $Data; ?></td>
        <td><?php echo $Versiune; ?></td>
        <td> </a>
        	<a href="modificaupgrades.php?sterge=<?php echo $id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
        	<span class="glyphicon glyphicon-option-vertical"></span>
        	<a href="modificaupgrades.php?modifica=<?php echo $id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
        	 </a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
  <h2><span class="label label-<?php if($ok){echo "success";}else{echo "danger";} ?>"><?php  if(isset($ok)){ echo $mesaj . " <span class=\"glyphicon glyphicon-saved\"></span>"; } ?></span></h2>
  <?php }else{ ?>
  	
  	<div class="jumbotron">
		<h1>Modifică Upgrades.</h1>
		<form method="post" action="modificaupgrades.php?modifica=<?php echo $id ?>">
			<div class="form-group">
			<label for="Nume">Nume:</label>
			<input type="text" class="form-control" name="Nume" value="<?php echo $Nume; ?>">
			<label for="Tip">Tip:</label>
			<select class="form-control" name="Tip">
			<?php if($Tip=="Server"){ ?>	<option value="Server">Server</option>
				<option value="UCP">UCP</option><?php }else{  ?>
				<option value="UCP">UCP</option>
			    <option value="Server">Server</option>
			 <?php } ?>
			</select>
			<label for="Versiune">Versiune</label>
			<input type="text" class="form-control" name="Versiune" value="<?php echo $Versiune; ?>">
			<label for="Modificari">Modificari:</label>
            <textarea class="form-control" rows="5" id="Modificari" name="Modificari"><?php echo $Modificari; ?>
            </textarea>
			</div>
			<input type="submit" class="btn btn-primary" name="upgrades" value="Trimiteți"> <a href="admin_logs.php" class="btn btn-primary">Înapoi</a>
		</form>
		<p><span class="label label-<?php if($ok){echo "success";}else{echo "danger";} ?>"><?php  if(isset($ok)){ echo $mesaj . " <span class=\"glyphicon glyphicon-saved\"></span>"; } ?></span></p>
  	
  	<?php } ?>
    </div>
        </div>
      </div>
    </div>
   	    <?php require_once 'includes/scripturi.php'; ?>
  </body>
</html>