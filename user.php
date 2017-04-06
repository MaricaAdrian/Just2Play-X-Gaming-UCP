<?php if (session_id() == '') {

session_start();

}


//Functii & Configurare

#####################################################

require_once "includes/configurare.php";

require_once "includes/functii.php";

#####################################################

if(!isset($_SESSION['userucp']))

{

header("location: login.php");

}
#####################################################

$acc_id = mysql_fetch_array(mysql_query("SELECT id from xgm_plaj_z where Name='$username'"));

$acc_id = $acc_id[0];

$level = mysql_fetch_array(mysql_query("SELECT PlayerLevel from xgm_plaj_z where Name='$username'"));

$level = $level[0];

$next_level = $level+1;

$status = mysql_fetch_array(mysql_query("SELECT Status from xgm_plaj_z where Name='$username'"));

$status = $status[0];

$respect = mysql_fetch_array(mysql_query("SELECT Respect from xgm_plaj_z where Name='$username'"));

$respect = $respect[0];

if ($level=="1")

{

$total_respect_level = $level*6;

}

else

{

$total_respect_level = $level*3+3;

}

//Ultima logare

$last_login = mysql_fetch_array(mysql_query("SELECT UltLog from xgm_plaj_z where Name='$username'"));

$last_login = $last_login[0];

$hours = mysql_fetch_array(mysql_query("SELECT ConnectedTime from xgm_plaj_z where Name='$username'"));

$hours = $hours[0];

//Admin

$admin_level = mysql_fetch_array(mysql_query("SELECT AdminLevel from xgm_plaj_z where Name='$username'"));

$admin_level = $admin_level[0];

//Wanted

$wantedlevel = mysql_fetch_array(mysql_query("SELECT WantedLevel from xgm_plaj_z where Name='$username'"));

$wantedlevel = $wantedlevel[0];

//Mod advanced

$modadvanced = mysql_fetch_array(mysql_query("SELECT DonateRank from xgm_plaj_z where Name='$username'"));

$modadvanced = $modadvanced[0];

//Skinuri

$skinid = mysql_fetch_array(mysql_query("SELECT Chara from xgm_plaj_z where Name='$username'"));

$skinid = $skinid[0];





if(isset($_POST['skin'])){

	

	$query = mysql_query("UPDATE xgm_plaj_z SET Chara=".$_POST['alege']." WHERE Name='$username'");

    header("Location: index.php");

}



if($modadvanced == 1){

	$jucator_avansatv = "Da";

	$jucator_avansat = "VIP Bronze";

	$culoare_vip = "#cd7f32";}

else if($modadvanced == 2)

{

	$jucator_avansatv = "Da";

	$jucator_avansat = "VIP Silver";

	$culoare_vip = "#C0C0C0";

}

else if($modadvanced >= 3)

{

	$jucator_avansatv = "Da";

	$jucator_avansat = "VIP Gold";

	$culoare_vip = "#FFD700";

}

//Ora Staff

$premium = mysql_fetch_array(mysql_query("SELECT DonateRank from xgm_plaj_z where Name='$username'"));

$premium = $premium[0];

$warnings = mysql_fetch_array(mysql_query("SELECT Warnings from xgm_plaj_z where Name='$username'"));

$warnings = $warnings[0];

$phone_nr = mysql_fetch_array(mysql_query("SELECT PhoneNr from xgm_plaj_z where Name='$username'"));

$phone_nr = $phone_nr[0];

$age = mysql_fetch_array(mysql_query("SELECT Age from xgm_plaj_z where Name='$username'"));

$age = $age[0];

$email = mysql_fetch_array(mysql_query("SELECT Email from xgm_plaj_z where Name='$username'"));

$email = htmlspecialchars($email[0]);

#####################################################

$cash = mysql_fetch_array(mysql_query("SELECT Money from xgm_plaj_z where Name='$username'"));

$cash = $cash[0];

$bank_account = mysql_fetch_array(mysql_query("SELECT Bank from xgm_plaj_z where Name='$username'"));

$bank_account = $bank_account[0];

$bussiness = mysql_fetch_array(mysql_query("SELECT Message from bizz where Owner='$username'"));

$bussiness = $bussiness[0];

$sbussiness = mysql_fetch_array(mysql_query("SELECT Message from sbizz where Owner='$username'"));

$sbussiness = $sbussiness[0];

$casa = mysql_fetch_array(mysql_query("SELECT Discription,Value,Takings from houses where Owner='$username'"));

$casaid = mysql_fetch_array(mysql_query("SELECT id from houses where Owner='$username'"));

$casaid = $casaid[0];

#####################################################

//Nume factiune ca lider

$leader = mysql_fetch_array(mysql_query("SELECT Leader from xgm_plaj_z where Name='$username'"));

$leader = $leader[0];

$nume_factiune_leader = mysql_fetch_array(mysql_query("SELECT nume from lista_factiuni where id='$leader'"));

$nume_factiune_leader = $nume_factiune_leader[0];

//Nume factiune ca membru

$member = mysql_fetch_array(mysql_query("SELECT Member from xgm_plaj_z where Name='$username'"));

$member = $member[0];

$nume_factiune_member = mysql_fetch_array(mysql_query("SELECT nume from lista_factiuni where id='$member'"));

$nume_factiune_member = $nume_factiune_member[0];

//Ore Staff

$nrOreStaff = mysql_fetch_array(mysql_query("SELECT Hadm FROM xgm_plaj_z where Name='$username'"));

$nrOreStaff = $nrOreStaff[0];

//Reporturi

$reportnr = mysql_fetch_array(mysql_query("SELECT PLA from xgm_plaj_z where Name='$username'"));

$reportnr = $reportnr[0];

//Askquri

$askqnr = mysql_fetch_array(mysql_query("SELECT PLA from xgm_plaj_z where Name='$username'"));

$askqnr = $askqnr[0];

//Rank

$rank = mysql_fetch_array(mysql_query("SELECT Rank from xgm_plaj_z where Name='$username'"));

$rank = $rank[0];



$f_warnings = mysql_fetch_array(mysql_query("SELECT FWarns from xgm_plaj_z where Name='$username'"));

$f_warnings = $f_warnings[0];

$f_punish = mysql_fetch_array(mysql_query("SELECT Fpunish from xgm_plaj_z where Name='$username'"));

$f_punish = $f_punish[0];

$job = mysql_fetch_array(mysql_query("SELECT Job from xgm_plaj_z where Name='$username'"));

$job = $job[0];

$nume_job_member = mysql_fetch_array(mysql_query("SELECT nume from lista_jobs where id='$job'"));

$nume_job_member = $nume_job_member[0];

//Total

$maxq= mysql_query("SELECT id from xgm_plaj_z");

$max = mysql_num_rows($maxq);

$cars = mysql_fetch_array(mysql_query("SELECT max(id) from cars"));

$cars = $cars[0];

$case = mysql_fetch_array(mysql_query("SELECT max(id) from houses"));

$case = $case[0];

$biz = mysql_fetch_array(mysql_query("SELECT max(id) from bizz"));

$biz = $biz[0];

$sbiz = mysql_fetch_array(mysql_query("SELECT max(id) from sbizz"));

$sbiz = $sbiz[0];

$nrbiz = $biz + $sbiz;

//Arma ghiozdan

$armag = mysql_fetch_array(mysql_query("SELECT pPutGun, pPutGunAmmo FROM xgm_plaj_z WHERE Name='$username'"));

//Adus de.

$adus = mysql_fetch_array(mysql_query("SELECT Referrals FROM xgm_plaj_z WHERE Name='$username'"));

$adus = $adus[0];

//Recompensa acordata.

$acordat = mysql_fetch_array(mysql_query("SELECT Refacordat FROM xgm_plaj_z WHERE Name='$username'"));

$acordat = $acordat[0];

//Anunt

$anuntq = mysql_query("SELECT * FROM motd ORDER BY id DESC LIMIT 0,1");

while($row=mysql_fetch_array($anuntq))

{

	$Anunt = $row['Anunt'];

	$Online = $row['Online']; 

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

        <div class="col-sm-9 col-lg-10 ">

          <div id="content">

		  <?php if($Online=="On"){?>

    	<div class="text-center">

    	<h1><span class="label label-danger">Anunț important:</span></h1>

    	<h3 style="color:red;"><?php echo html_entity_decode($Anunt); ?></h3>

        </div>

        <?php } ?>

					<div class="panel panel-primary">

            <div class="panel-heading text-center" style="color: #1d2a44;">

              <h3 class="panel-title"  ><div class="btn-group" role="group" aria-label="Butoane">

  <button type="button" class="btn btn-info"  id="generaleb">Informatii Generale</button>

  <button type="button" class="btn btn-info"  id="financiareb">Informatii Financiare</button>

  <button type="button" class="btn btn-info"  id="carierab">Informatii Cariera</button>

  <button type="button" class="btn btn-info"  id="referalsb">Referals</button>

</div></h3>

            </div>

            <div class="panel-body ">

            <div id="generale">

            <div class="col-sm-12">

            	

            	<div class="col-sm-4">

             <ul class="list-group text-center">

             	         

             	    		<li class="list-group-item">Caracter: <br/><img width="120px" height="380px" id="skinimg" src="images/skins/<?php echo $skinid; ?>.png">

			   	<br/>Skin ID: <?php echo $skinid; ?> <br/>

				<?php if(!$status){ ?>

			   	<form method="post" action="index.php">

			   		<select class="sub" name="alege">

			   			<option class="sub" value="<?php echo $skinid; ?>"><?php echo $skinid; ?></option>

			   			<?php 

						    $array = array("293","165","287","70","228","187","294","59","113","120","175","292","116","208");

							for($i=0;$i<=299;$i++){

			   				if($leader!=0){

							echo "<option class=\"sub\" value=\"".$i."\">".$i."</option>";

							}elseif(!in_array($i,$array)){

							echo "<option value=\"".$i."\">".$i."</option>";

							}

			   			} ?>

			   		</select>

			   	<input class="btn btn-primary" type="submit" name="skin" value="Alege">

				<?php }else{echo "Trebuie să fi <span class=\"label label-danger\">Offline</span> pentru ați schimba skinul.";} ?></li>

		        </ul>

		        </div>

		       <div class="col-sm-8 col-sm-offset-0">

		       	 <ul class="list-group">

               <li class="list-group-item">Level: <span class="label label-info"><?php echo $level; ?></span>

			   <?php 

				if(isset($jucator_avansatv))

				{

					echo " - <span class='label label-default' style='background-color:".$culoare_vip.";'>".$jucator_avansat."</span>";

				} 

			   ?></li>

               <li class="list-group-item">Varsta: <span class="label label-info"><?php echo $age; ?></span></li>

               <li class="list-group-item">Nivel wanted: <span class="label label-info"><?php echo $wantedlevel; ?></span></li>

               <li class="list-group-item">ID Jucator: <span class="label label-info"><?php echo $acc_id; ?></span></li>

               <li class="list-group-item">Status: <span class="label label-<?php if($status=="1"){echo "success";}else{echo "danger";}?>">

               	<?php if($status=="1"){echo "ONLINE";}else{echo "OFFLINE";}?></span></li>

               <li class="list-group-item">Respect Points: <span class="label label-<?php if($respect>=$total_respect_level){ echo "success"; }else{echo "info";} ?>"><?php echo $respect . "/" . $total_respect_level; ?></span><?php if($respect>=$total_respect_level){ echo "<strong><br>- Felicitari aveti destule RespectPoints pentru a trece la nivelul urmator.<br/>- Tastati in joc /buylevel pentru a cumpara nivelul.</strong>"; }?></li>

               <li class="list-group-item">Ore jucate: <span class="label label-info"><?php echo $hours; ?></span></li>

			   <?php if($culoare_admin > 0 || $helper==1){ ?>

					<li class="list-group-item">Admin: <span class="label label-default" style="background-color:#<?php echo $culoare_admin; ?>;"><?php if(isset($admin_detin)){echo $admin_detin;}if(isset($admin_info)){echo $admin_info;}else{echo "Nu";}?></span></li>

			   <?php } ?>

			   <li class="list-group-item">Avertismente: <span class="label label-<?php if($warnings==2){echo "warning";}else{echo "info";} ?>"><?php echo $warnings . "/3";?></span><?php if($warnings==2){echo "<br/><strong>- Sunteti in pericol de a fi banat pentru prea multe avertismente, te rog sa fii mai atent.</strong>";}?></li>

			   <li class="list-group-item">Numar de Telefon: <span class="label label-info"><?php echo $phone_nr; ?></span></li>

			   <li class="list-group-item">Arma in ghiozdan: <?php if($armag[0] == 0){echo "Nici o arma in ghiozdan.";}else{ ?> <img src="images/arme/50px-Weapon-<?php echo $armag[0] ?>-hd.png">(Munitie: <?php  echo $armag[1]; ?> )<?php } ?>

			   <li class="list-group-item">E-mail: <span class="label label-<?php if($email=='Niciunul'){echo "danger";} else{echo "info";}?>"><?php if($email=='Niciunul'){echo "Nu v-ati setat emailul.

			   <br/>Va rugam sa va setati emailul in cel mai scurt timp posibil.";}else{echo $email;} ?></span> <a href="my.php"><span class="glyphicon glyphicon-pencil"></span></a></li>

			   <li class="list-group-item">Ultima activitate: <span class="label label-info"><?php echo $last_login; ?></span></li>

			   <?php if($culoarel>0 || $helper==1){ ?><li class="list-group-item"><?php if($culoarel>0){?>Reporturi preluate:<?php }elseif($helper==1){ ?>Askquri preluate:<?php } ?><span class="label label-info"><?php if($culoarel>0){ echo $reportnr; }elseif($helper==1){ echo $askqnr; } ?></span></li><?php } ?>

              </div>

             

             </ul>

          </div>

            

            </div>

            



             <ul class="list-group" id="financiare">

                <li class="list-group-item">Bani cash: <strong><?php echo $cash; ?></strong><font color="green">$</font></li>

			    <li class="list-group-item">Cont Bancar: <strong><?php echo $bank_account; ?></strong><font color="green">$</font></li>

				<li class="list-group-item">Biz: <strong><?php if($bussiness){echo $bussiness;}elseif($sbussiness){echo $sbussiness;}else{echo "Nu detineti nici-un Biz.";}  ?></strong></li>

				<li class="list-group-item">Resedinta: <strong><?php if($casa[0]){echo "<br/>-".$casa[0]."<br/>- Valoare: ".$casa[1]."<font color=\"green\">$</font><br/>- Seif: ".$casa[2]."<font color=\"green\">$</font>";}else{echo "Nu detineti nici-o resedinta.";} ?></strong></li>

				<li class="list-group-item">Vehicule: <?php $masiniq = mysql_query("SELECT * FROM cars where Owner='".$_SESSION['userucp']."'");

				$nr = mysql_num_rows($masiniq); ?><?php if($nr==0){echo "<strong>Nu detineti masini<br/></strong>";}else{

					echo "<strong>". $nr . "</strong><br/>";

				    ?> <ul class="list-group row">

				    <?php while($row=mysql_fetch_array($masiniq)){

					$masina = $row['Model'];

					$numemasina = $row['Description'];

					$kilo = $row['KM'];

					$value = $row['Value'];

					$schimbulei = $row['Ulei'];

					?>

					<li class="list-group-item col-xs-6">

					<?php echo "<img src=\"images/masini/Vehicle_".$masina.".jpg\" class=\"img-thumbnail\"><br/> - Model: ".$numemasina."<br/> - Kilometrii: ".$kilo."<br/> - Valoare: <strong>".$value."</strong><font color=\"green\">$</font><br/>- Schimb ulei la:"; if(!esteBike($masina)){echo $schimbulei." KM";}else{echo "Nu este nevoie!";}?>

					</li>

					

				<?php } ?></ul> 

				<?php } ?>

			   </li></ul>

			 <ul class="list-group" id="cariera">

				<li class="list-group-item">Membru: <strong><?php if($nume_factiune_leader){echo $nume_factiune_leader;}else if($nume_factiune_member){echo $nume_factiune_member;}else{echo "Civil";} ?></strong>

                <li class="list-group-item">Rank: <strong><?php if($leader!='0'){echo "Lider(CU COMENZI)";}elseif($rank>="6"){echo "Lider(".$rank.")";}elseif($rank==5){echo "Sub-lider(".$rank.")";}elseif($rank!=0){echo $rank;}else{echo "Fara factiune";} ?></strong></li>

			    <li class="list-group-item">Faction Warn: <font color="<?php if($f_warnings==0){echo "green";}else if($f_warnings==3){echo "red";}else{echo "orange";}?>"><?php echo $f_warnings . "/3"; if($f_warnings==2){echo "<br/><strong>- Sunteti in pericol de a iesii din factiune, te rog sa fi mai prudent.</strong>";} ?></font></li>

				<li class="list-group-item">Faction Punish: <font color="green"><?php echo $f_punish . "/72"; ?></font></li>

				<li class="list-group-item">Job: <strong><?php if($job>0){echo $nume_job_member;}else{echo "Somer";} ?></strong></li>

			   </ul>

			   <ul class="list-group" id="referals">

			   	<li class="list-group-item">

			   		Ai fost adus de : <?php echo $adus; 

			   		if($adus=="Nimeni" || $adus==""){ ?> 

			   			<a href="my.php?edit=ref"><span class="glyphicon glyphicon-pencil"></span></a>

			   			<?php } ?>

			   	</li>

			   	<li class="list-group-item">

			   		Ai adus pe : <br/><?php 

			   		                   $nrref = 0;

			   		                   $adusq = mysql_query("SELECT id,PlayerLevel,Name FROM xgm_plaj_z WHERE Referrals='$username'");

					                   if(mysql_num_rows($adusq)>0){

					                   	while($row=mysql_fetch_array($adusq)){

					                   		$idq = $row['id'];

											$levelq = $row['PlayerLevel'];

											$nameq = $row['Name'];

											if($levelq>=5){

											$nrref++;

											}

					                   	 ?>

										<br/><strong><?php echo $nameq; ?>, level: <?php echo $levelq."/5"; ?></strong>

											<br/>

										

					                <?php }  }else{ echo "Nimeni";}

					                 ?>

			   	</li>

			   	<li class="list-group-item">Recompensă:<br/><?php

	            if($nrref>=5 && $nrref<=9){

			   		$recompensa = 400000;

			   	}

				if($nrref>=10 && $nrref<=29){

				 	$recompensa = 500000;

				}

			   	if($nrref>=30 && $nrref<=49){

			   		$recompensa = 600000;

			   	}

				if($nrref>=50){

					$recompensa = 700000;

				}

				if($nrref<5){

			   	    $nrramas = 5 - $nrref;

			   	    echo "<br/>Mai ai nevoie de $nrramas referrals pentru următoarea recompensă.";

				}

			   	if($nrref>=5 && $nrref<=9){

			   		$nrramas = 10 - $nrref;

			   		if($acordat==0){echo "Esti eligibil pentru a primii <strong>" . $recompensa . "</strong> <font color=\"green\">$</font>.";}

					else{echo "Ți-ai primit recompensa pentru <strong>$nrref</strong> referale.";}

					echo "<br/>Mai ai nevoie de <strong>$nrramas</strong> referale pentru următoarea recompensă.";

			   	}

		        if($nrref>=10 && $nrref<=29){

			   		$nrramas = 30 - $nrref;

			   		if($acordat==1){echo "Esti eligibil pentru a primii <strong>" . $recompensa . "</strong> <font color=\"green\">$</font>.";}

					else{echo "Ți-ai primit recompensa pentru <strong>$nrref</strong> referale.";}

					echo "<br/>Mai ai nevoie de <strong>$nrramas</strong> referale pentru următoarea recompensă.";

			   	}

				if($nrref>=30 && $nrref<=49){

					$nrramas = 50 - $nrref;

			   		if($acordat==2){echo "Esti eligibil pentru a primii <strong>" . $recompensa . "</strong> <font color=\"green\">$</font>.";}

					else{echo "Ți-ai primit recompensa pentru <strong>$nrref</strong> referale.";}

					echo "<br/>Mai ai nevoie de <strong>$nrramas</strong> referale pentru următoarea recompensă.";

			   	}

				if($nrref>=50){

			   		if($acordat==3){echo "Esti eligibil pentru a primii <strong>" . $recompensa . "</strong> <font color=\"green\">$</font>.";}

					else{echo "Ți-ai primit recompensa pentru <strong>$nrref</strong> referale.";}

					echo "<br/>A ajuns la numărul maxim de $ pe care îi poate primii din referrals , dacă continui să aduci jucători contactează un Owner pentru a le urmării activitatea.";

			   	}

				if($nrref>=5){echo "<strong><br/>Conctactează un Owner pentru ați acorda recompensele.</strong>";}

				 ?>

				</li>

	

			   </ul>

		

	                  </div>

          </div>

		  </div>

	    </div>

          </div>

        </div>

      </div>

    </div>

	    <?php require_once 'includes/scripturi.php'; ?>

			<script>

					$("#financiare").hide();

    	$("#cariera").hide();

    	$("#referals").hide();

    	$("#financiareb").click(function(){

    		if($("#generale").is(':visible')){

    			$("#generale").slideUp(1000);

    		}

    		if($("#cariera").is(':visible')){

    			$("#cariera").slideUp(1000);

    		}

    		if($("#referals").is(':visible')){

    			$("#referals").slideUp(1000);

    		}

            $("#financiare").slideDown(1000);

    	});

    	$("#carierab").click(function(){

    		if($("#generale").is(':visible')){

    			$("#generale").slideUp(1000);

    		}

    		if($("#financiare").is(':visible')){

    			$("#financiare").slideUp(1000);

    		}

    		if($("#referals").is(':visible')){

    			$("#referals").slideUp(1000);

    		}

            $("#cariera").slideDown(1000);

    	});

    	 $("#generaleb").click(function(){

    		if($("#cariera").is(':visible')){

    			$("#cariera").slideUp(1000);

    		}

    		if($("#financiare").is(':visible')){

    			$("#financiare").slideUp(1000);

    		}

    		if($("#referals").is(':visible')){

    			$("#referals").slideUp(1000);

    		}

            $("#generale").slideDown(1000);

    	});

    	$("#referalsb").click(function(){

    		if($("#cariera").is(':visible')){

    		   $("#cariera").slideUp(1000);

    		}

    		if($("#financiare").is(':visible')){

    		   $("#financiare").slideUp(1000);

    		}

    		if($("#generale").is(':visible')){

    		   $("#generale").slideUp(1000);

    		}

    		$("#referals").slideDown(1000);

    		

    	});

         

$('.show').on({

    mouseenter: function(){

        $('img',this).animate({width: '64px', height: '64px', top: '-=15px', left: '-=15px'}, 500);

    },

    mouseleave: function(){

        $('img',this).animate({width: '32px', height: '32px', top: '+=15px', left: '+=15px'}, 500);

    }

});

    	$('select').on('change', function (e) {

         var optionSelected = $("option:selected", this);

         var valueSelected = this.value;

         $("#skinimg").attr("src","images/skins/"+valueSelected+".png")

        });

			</script>

  </body>

</html>

