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
$maxid = mysql_fetch_array(mysql_query("SELECT max(id) FROM upgrades"));
$maxid = $maxid[0];
$gettime = mysql_query("SELECT * FROM upgrades WHERE id='$maxid'"); 
while($row=mysql_fetch_array($gettime)){
$gid = $row['id'];	
$gnume = $row['Nume'];
$gtime = $row['Time'];
$gnume = explode(" ", $gnume);
$gcookie= $gnume[0] . $gid;
$gcurrent = time();
$gTip = $row['Tip'];	 
	}
if($gTip==$_GET['afisare'] && $gcurrent<$gtime && !isset($_COOKIE[$gcookie])){
	
	setcookie($gcookie,'1',time()+24*60*60,'/');
	
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
			<h1 class="text-center">Upgrades</h1>
    	<p class="text-center">Toate upgradeurile la server se vor afișa aici.</p>
    	<?php 
    	if(isset($_GET['afisare'])){
    		$afisare = mysql_real_escape_string($_GET['afisare']);
    	}
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
        if($afisare==Server){
        $start_from = $page-1;
		$nrget = 1;}else{
		$start_from = ($page-1) * 2;
		$nrget = 2;
		}
		
    	$query = mysql_query("SELECT * FROM upgrades WHERE Tip='$afisare' ORDER BY id DESC LIMIT $start_from,$nrget");
		while($row=mysql_fetch_array($query)){
			$id = $row['id'];
			$Nume= $row['Nume'];
			$Adaugatde = $row['Adaugatde'];
			$Tip = $row['Tip'];
			$Data = $row['Data'];
			$Versiune = $row['Versiune'];
			$Modificari = $row['Modificari'];
			$Likes = $row['Likes'];
		 ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title text-center"><strong><?php echo $Nume; ?></strong></h3>
        </div>
        <div class="panel-body">
        	 <ul class="list-group">
        	 	<li class="list-group-item"><strong>Adaugat de:</strong> <?php echo $Adaugatde; ?></li>
        	 	<li class="list-group-item"><strong>Data:</strong> <?php echo $Data; ?></li>
        	 	<li class="list-group-item"><strong>Versiune:</strong> <?php echo $Versiune; ?></li>
        	 	<li class="list-group-item"><strong>Tip:</strong> <?php echo $Tip; ?></li>
        	 	<li class="list-group-item"><strong>
        	 		<div class="mare">
        	 		<div id="aratalike<?php echo $id; ?>">Like: <?php echo $Likes; ?></div>
        	    <span class="label label-success" id="status<?php echo $id; ?>"></span> 
        	    <button class="btn btn-primary" id="<?php echo $id; ?>" value="<?php echo $Likes; ?>">
        	    	<span class="glyphicon glyphicon-thumbs-up"></span> Like
        	    </button>
        	    </div>
        	    	<br>
        	 	</li>
        	 	<li class="list-group-item"><strong>Modificari:</strong><Br/> <?php echo html_entity_decode($Modificari); ?></strong></li>
        	 	
        	</ul></div>
    </div>
    <?php } ?>
    <div class="text-center centered">
    <?php $nrid=0;
          $pagini = mysql_query("SELECT id FROM upgrades WHERE Tip='$afisare'");
	      while($row=mysql_fetch_array($pagini)){
	      	$nrid++;
	      }
		  $nrpag = ceil($nrid / $nrget); 
		  for ($i=1; $i<=$nrpag; $i++) { 
            echo "<a href='upgrades.php?afisare=$afisare&page=".$i."' class=\"btn btn-primary\">".$i."</a> "; 
}; 



?>
</div>
        </div>
      </div>
    </div>
   	    <?php require_once 'includes/scripturi.php'; ?>
  <script>
  
  	$('.mare').click(function(e)
    {
        var val = parseInt($(".btn",this).attr("value"),10);
        var id = $(".btn",this).attr("id");
        $.post("likes.php", {op:"like",id:id},function(data)
        {
            if(data==1)
            {
                $("#status"+id).html("Ai dat like cu success !");
                val = val+1;
                $("#aratalike"+id).html("Like: "+val);
                $("#"+id).val(val);
                $("#",+id).attr("disabled", "disabled");
            }
            else
            {
               $("#status"+id).html("Ai dat deja like!");
            }
        })
    });
  </script>
  </body>
</html>