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
if($culoarel<5){
header("Location: index.php");
}
}
header('Content-type: text/html; charset=utf-8');
$select = mysql_query("SELECT id,Anunt FROM motd");
$maxid = mysql_fetch_array(mysql_query("SELECT max(id) FROM motd"));
$maxid = $maxid[0];
if(isset($_POST['motd'])){
	
	
	$modif = str_replace("<br />","",$_POST['Anunt']);
	$textarea = mysql_real_escape_string(nl2br($modif));
	$Anunt = htmlspecialchars($textarea, ENT_QUOTES, "UTF-8");
	$Adaugatde = mysql_real_escape_string($_SESSION['user']);
	$online = $_POST['On'];
	$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['user']." a setat un anunț pe data de ".date('d-m-Y G:i A')." cu mesajul \"$Anunt\"";
	$ucp = mysql_query("INSERT INTO admcmdslog (Text) values ('$ucptext')");
	if(mysql_num_rows($select)>0){
	$query = mysql_query("UPDATE motd SET Anunt='$Anunt',Online='$online',Adaugatde='$Adaugatde' WHERE id='$maxid'");
	$select = mysql_query("SELECT id,Anunt FROM motd");
	
	}else{
		$query = mysql_query("INSERT INTO motd (Anunt,Online,Adaugatde) VALUES ('$Anunt','$online','$Adaugatde')");
		$select = mysql_query("SELECT id,Anunt FROM motd");
	}
	if($query){
		$ok=1;
		$mesaj = "Anunțul a fost modificat cu succes.";
	}
	else{
		$ok=0;
		$mesaj = "S-a produs o eroare la inserarea în baza de date.";
		echo mysql_error();
	}
}
while($row=mysql_fetch_array($select)){
			$afisanunt = $row['Anunt'];
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
	<h1>Setează anunț.</h1>
	<hr>
    <form method="post" action="anunt.php">
			<div class="form-group">
			<label for="Anunt">Anunț:</label>
            <textarea class="form-control" rows="5" id="Anunt" name="Anunt"><?php if(isset($afisanunt)){ echo $afisanunt; } ?></textarea>
            <label for="On">On/Off:</label>
			<select class="form-control" name="On">
				<option value="On">On</option>
				<option value="Off">Off</option>
			</select>
			</div>
			<input type="submit" class="btn btn-primary" name="motd" value="Setează"> <a href="admin_logs.php" class="btn btn-primary">Înapoi</a>
			</div>
	</form>
	<p><span class="label label-<?php if($ok){echo "success";}else{echo "danger";} ?>"><?php  if(isset($ok)){ echo $mesaj . " <span class=\"glyphicon glyphicon-saved\"></span>"; } ?></span></p>
	</div>
        </div>
      </div>
    </div>
   	    <?php require_once 'includes/scripturi.php'; ?>
  </body>
</html>