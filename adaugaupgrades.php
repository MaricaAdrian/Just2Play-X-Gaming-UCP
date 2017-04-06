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
mysql_query("SET NAMES utf8", $my_conn); 
header('Content-type: text/html; charset=utf-8');
if(isset($_POST['upgrades'])){
	$Nume = mysql_real_escape_string($_POST['Nume']);
	$Tip = mysql_real_escape_string($_POST['Tip']);
	$Versiune = mysql_real_escape_string($_POST['Versiune']);
	$textarea = mysql_real_escape_string(nl2br($_POST['Modificari']));
	$Modificari = htmlspecialchars($textarea, ENT_QUOTES, "UTF-8");
	$Adaugatde = mysql_real_escape_string($_SESSION['userucp']);
	$Time = time() + (24 * 60 * 60);
	$Data = date('d-m-Y G:i A');
	$query = mysql_query("INSERT INTO upgrades SET 
	Nume='$Nume',
	Tip='$Tip',
	Versiune='$Versiune',
	Modificari='$Modificari',
	Adaugatde='$Adaugatde',
	Data='$Data',
	Time='$Time'
	");
	if($query){
		$ok=1;
		$mesaj = "Upgrade-ul a fost adăugat cu succes.";
	}
	else{
		$ok=0;
		$mesaj = "S-a produs o eroare la inserarea în baza de date.";
	}
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
			    <div class="col-sm-12 text-center cenetred">
	<div class="jumbotron">
		<h1>Adaugă Upgrades.</h1>
		<form method="post" action="adaugaupgrades.php">
			<div class="form-group">
			<label for="Nume">Nume:</label>
			<input type="text" class="form-control" name="Nume">
			<label for="Tip">Tip:</label>
			<select class="form-control" name="Tip">
				<option value="Server">Server</option>
				<option value="UCP">UCP</option>
			</select>
			<label for="Versiune">Versiune</label>
			<input type="text" class="form-control" name="Versiune">
			<label for="Modificari">Modificari:</label>
            <textarea class="form-control" rows="5" id="Modificari" name="Modificari">- S-a adăugat ...
- S-a modificat ...
            </textarea>
			</div>
			<input type="submit" class="btn btn-primary" name="upgrades" value="Trimiteți"> <a href="admin_logs.php" class="btn btn-primary">Înapoi</a>
		</form>
		<p><span class="label label-<?php if($ok){echo "success";}else{echo "danger";} ?>"><?php  if(isset($ok)){ echo $mesaj . " <span class=\"glyphicon glyphicon-saved\"></span>"; } ?></span></p>
	</div>
	</div>
        </div>
      </div>
    </div>
   	    <?php require_once 'includes/scripturi.php'; ?>
  </body>
</html>
