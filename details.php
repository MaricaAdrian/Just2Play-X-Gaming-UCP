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



$acc_id = mysql_real_escape_string($_GET['id']);

$message = mysql_real_escape_string($_GET['message']);

$level = mysql_fetch_array(mysql_query("SELECT PlayerLevel from xgm_plaj_z where id='$acc_id'"));

$level = $level[0];

$banat = mysql_fetch_array(mysql_query("SELECT idd from banuri where idd='$acc_id'"));

$banat = htmlspecialchars($banat[0]);

$Name = mysql_fetch_array(mysql_query("SELECT Name from xgm_plaj_z where id='$acc_id'"));

$Name = htmlspecialchars($Name[0]);

$next_level = $level+1;

$status = mysql_fetch_array(mysql_query("SELECT Status from xgm_plaj_z where id='$acc_id'"));

$status = $status[0];

$respect = mysql_fetch_array(mysql_query("SELECT Respect from xgm_plaj_z where id='$acc_id'"));

$respect = $respect[0];

if ($level=="1")

{

$total_respect_level = $level*6;

}

else

{

$total_respect_level = $level*3+3;

}

$last_login = mysql_fetch_array(mysql_query("SELECT UltLog from xgm_plaj_z where id='$acc_id'"));

$last_login = $last_login[0];

$hours = mysql_fetch_array(mysql_query("SELECT ConnectedTime from xgm_plaj_z where id='$acc_id'"));

$hours = $hours[0];

$admin_level = mysql_fetch_array(mysql_query("SELECT AdminLevel from xgm_plaj_z where id='$acc_id'"));

$admin_level = $admin_level[0];

$admin_level_1 = mysql_fetch_array(mysql_query("SELECT AdminLevel from xgm_plaj_z where Name='$username'"));

$admin_level_1 = $admin_level_1[0];

$premium = mysql_fetch_array(mysql_query("SELECT DonateRank from xgm_plaj_z where id='$acc_id'"));

$premium = $premium[0];

$age = mysql_fetch_array(mysql_query("SELECT Age from xgm_plaj_z where id='$acc_id'"));

$age = $age[0];

$warnings = mysql_fetch_array(mysql_query("SELECT Warnings from xgm_plaj_z where id='$acc_id'"));

$warnings = $warnings[0];

$phone_nr = mysql_fetch_array(mysql_query("SELECT PhoneNr from xgm_plaj_z where id='$acc_id'"));

$phone_nr = $phone_nr[0];

$email = mysql_fetch_array(mysql_query("SELECT Email from xgm_plaj_z where id='$acc_id'"));

$email = htmlspecialchars($email[0]);

$helper = mysql_fetch_array(mysql_query("SELECT Agent from xgm_plaj_z where id='$acc_id'"));

$helper = htmlspecialchars($helper[0]);

//Skin

$skinida = mysql_fetch_array(mysql_query("SELECT Chara from xgm_plaj_z where id='$acc_id'"));

$skinida = $skinida[0];

//Wanted

$wantedlevel = mysql_fetch_array(mysql_query("SELECT WantedLevel from xgm_plaj_z where Name='$username'"));

$wantedlevel = $wantedlevel[0];

#####################################################

$cash = mysql_fetch_array(mysql_query("SELECT Money from xgm_plaj_z where id='$acc_id'"));

$cash = $cash[0];

$bank_account = mysql_fetch_array(mysql_query("SELECT Bank from xgm_plaj_z where id='$acc_id'"));

$bank_account = $bank_account[0];

$forex = mysql_fetch_array(mysql_query("SELECT Forex from xgm_plaj_z where id='$acc_id'"));

$forex = $forex[0];

$bussiness = mysql_fetch_array(mysql_query("SELECT Message from bizz where Owner='$Name'"));

$bussiness = $bussiness[0];

$sbussiness = mysql_fetch_array(mysql_query("SELECT Message from sbizz where Owner='$Name'"));

$sbussiness = $sbussiness[0];

$casa = mysql_fetch_array(mysql_query("SELECT Discription from houses where Owner='$Name'"));

$casa = $casa[0];

#####################################################

$user_leader = mysql_fetch_array(mysql_query("SELECT Leader from xgm_plaj_z where Name='$username'"));

$user_leader = $user_leader[0];

$leader = mysql_fetch_array(mysql_query("SELECT Leader from xgm_plaj_z where id='$acc_id'"));

$leader = $leader[0];

$nume_factiune_leader = mysql_fetch_array(mysql_query("SELECT nume from lista_factiuni where id='$leader'"));

$nume_factiune_leader = $nume_factiune_leader[0];

$member = mysql_fetch_array(mysql_query("SELECT Member from xgm_plaj_z where id='$acc_id'"));

$member = $member[0];

$nume_factiune_member = mysql_fetch_array(mysql_query("SELECT nume from lista_factiuni where id='$member'"));

$nume_factiune_member = $nume_factiune_member[0];

$f_warnings = mysql_fetch_array(mysql_query("SELECT FWarns from xgm_plaj_z where id='$acc_id'"));

$f_warnings = $f_warnings[0];

$f_punish = mysql_fetch_array(mysql_query("SELECT Fpunish from xgm_plaj_z where id='$acc_id'"));

$f_punish = $f_punish[0];

$job = mysql_fetch_array(mysql_query("SELECT Job from xgm_plaj_z where id='$acc_id'"));

$job = $job[0];

$nume_job_member = mysql_fetch_array(mysql_query("SELECT nume from lista_jobs where id='$job'"));

$nume_job_member = $nume_job_member[0];

$data = time();

$ziua = date('j',$data);

$luna = date('n',$data);

$anul = date('Y',$data);

//Mod Advanced

$modadvanced = mysql_fetch_array(mysql_query("SELECT DonateRank from xgm_plaj_z where id='$acc_id'"));

$modadvanced = $modadvanced[0];

/*if($modadvanced > 0){

	$jucator_avansatv = "Da";

	$jucator_avansat = "Detineti Mod Advanced";}

else{

	if($level>=10){$jucator_avansat = "Puteti depune cerere pentru Mod Advanced pe forum";}

}

*/

//Blacklist

$blacklist = mysql_fetch_array(mysql_query("SELECT Nume FROM black_list where idd='$acc_id'"));

$blacklist = $blacklist[0];

//Rank

$rank = mysql_fetch_array(mysql_query("SELECT Rank from xgm_plaj_z where id='$acc_id'"));

$rank = $rank[0];

//Helper

$agent = mysql_fetch_array(mysql_query("SELECT Agent from xgm_plaj_z where id='$acc_id'"));

$agent = $agent[0];

//Ip

$ipplayer = mysql_fetch_array(mysql_query("SELECT ip from xgm_plaj_z where id='$acc_id'"));

$ipplayer= $ipplayer[0];

//Reporturi

$reportnr = mysql_fetch_array(mysql_query("SELECT PLA from xgm_plaj_z where id='$acc_id'"));

$reportnr = $reportnr[0];

//Askquri

$askqnr = mysql_fetch_array(mysql_query("SELECT PLA from xgm_plaj_z where id='$acc_id'"));

$askqnr = $askqnr[0];

//Adus de.

$adus = mysql_fetch_array(mysql_query("SELECT Referrals FROM xgm_plaj_z WHERE Name='$Name'"));

$adus = $adus[0];

//Recompensa acordata.

$acordat = mysql_fetch_array(mysql_query("SELECT Refacordat FROM xgm_plaj_z WHERE Name='$Name'"));

$acordat = $acordat[0];

//Verfica admin level pentru details.php

if($admin_level>0){



	$admin_detin = "Da - ";

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

else{$culoare_admin="FFFFFF";

$admin_info = "Nu";

unset($admin_detin);}

//Levelup 1

if(isset($_POST['levelup']) && $culoarel>=1){

	if($respect>=$total_respect_level){

		

		$setresp = $respect - $total_respect_level;

		$setlevel = $level+1;

		$query = mysql_query("UPDATE xgm_plaj_z SET PlayerLevel='$setlevel',Respect='$setresp' WHERE id='$acc_id'");

		$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." l-a fortat pe " . $Name . " sa dea LevelUp pe data de ".date('d-m-Y G:i A');

		$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

		if($query){

			header("Location: details.php?id=$acc_id&mesaj=1");

		}

		

	}

		

	

}

//Seteaza Admin 2

if(isset($_POST['adminlevel']) && $culoarel>=6){



		

        $setadmin = $_POST['alegeadminlevel'];

		$query = mysql_query("UPDATE xgm_plaj_z SET AdminLevel='$setadmin' WHERE id='$acc_id'");

		$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." i-a setat Admin Level lui " . $Name . " la " . $setadmin . " pe data de ".date('d-m-Y G:i A');

		$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

		if($query){

			header("Location: details.php?id=$acc_id&mesaj=2");

		}

		

		

	

}

//Seteaza Warn 3

if(isset($_POST['playerwarn']) && $culoarel>=4){



		

        $setwarn = $_POST['alegewarn'];

		$query = mysql_query("UPDATE xgm_plaj_z SET Warnings='$setwarn' WHERE id='$acc_id'");

		$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." i-a setat avertismentele lui " . $Name . " la " . $setwarn . "/3 pe data de ".date('d-m-Y G:i A');

		$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

		if($query){

			header("Location: details.php?id=$acc_id&mesaj=3");

		}

		

		

	

}

//Adauga player la factiune 4

if(isset($_POST['playerfactiune']) && $culoarel>=5){



		

        $setmember = $_POST['adugaplayerfactiune'];

	    $setrank = 1;

		$setfp = 0;

		$setfw = 0;

		$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." l-a adaugat pe " . $Name . " in factiunea cu numarul " . $setmember." pe data de ".date('d-m-Y G:i A');

		$query = mysql_query("UPDATE xgm_plaj_z SET Member='$setmember',Rank='$setrank',Fpunish='$setfp',Fwarns='$setfw' WHERE id='$acc_id'");

		$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

		if($query&&$ucp){

			header("Location: details.php?id=$acc_id&mesaj=4");

		}

		

		

	

}

//Scoate din factiune 5

if(isset($_POST['facta'])){

if($culoarel>=5 || $user_leader==$member){

		if($member==0 && $leader!="0"){

			$factnume = $nume_factiune_leader;

		}elseif($member!=0 && $leader==0){

			$factnume = $nume_factiune_member;

		}elseif($member!=0 && $leader !=0){

			$factnume = $nume_factiune_leader;

		}

      if($_POST['facta'] == "Uninvite"){  $setmember = 0;

	    $setrank = 0;

	    $setleader = 0;

		$setfp = 0;

		$setfw = 0;

	    }elseif($_POST['facta'] == "Fpunish"){

	    	$setmember = 0;

			$setlader = 0;

			$setrank = 0;

			$setfp = 72;

			$setfw = 0;

	    }elseif($_POST['facta']=="Promoveza ca Lider"){

	    	$setmember = 0;

			$setleader = $member;

			$setrank = 0;

			$setfp = 0;

			$setfw = 0;

	    }

		if($_POST['facta']=="Promoveza ca Lider"){

			$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." l-a promovat pe " . $Name . " lider la factiunea ".$factnume."";

		}else{$ucptext= "UCP: Admin Level ". $culoarel . "/Leader ".$_SESSION['userucp']." l-a scos pe " . $Name . " din factiunea ".$factnume." cu " . $_POST['facta']." pe data de ".date('d-m-Y G:i A');}

		$query = mysql_query("UPDATE xgm_plaj_z SET Member='$setmember',Rank='$setrank',Leader='$setleader',Fpunish='$setfp',Fwarns='$setfw' WHERE id='$acc_id'");

		$ucp = mysql_query("INSERT INTO admcmdslog (Text) values ('$ucptext')");

		if($query&&$ucp){

			header("Location: details.php?id=$acc_id&mesaj=5");

		}

		

		

}

}

//Seteaza Faction warn 6

if(isset($_POST['fwarn']) && $culoarel>=4){

        $setfw = $_POST['seteazafwarn'];

		$query = mysql_query("UPDATE xgm_plaj_z SET FWarns='$setfw' WHERE id='$acc_id'");

		$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." i-a setat lui " . $Name . " Faction Warns la " . $setfw . "/3 pe data de ".date('d-m-Y G:i A');;

		$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

		if($query){

			header("Location: details.php?id=$acc_id&mesaj=6");

		}

}

//Seteaza Faction Punish 7

if(isset($_POST['fpunish']) && $culoarel>=4){

        $setfp = $_POST['seteazafpunish'];

		$query = mysql_query("UPDATE xgm_plaj_z SET FPunish='$setfp' WHERE id='$acc_id'");

		$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." i-a setat lui " . $Name . " Faction Punish la " . $setfp . "/72 pe data de ".date('d-m-Y G:i A');

		$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

		if($query){

			header("Location: details.php?id=$acc_id&mesaj=7");

		}

}

//Baneaza Jucator Permanent 8

if(isset($_POST['banp']) && $culoarel>=4){

        $nume= $Name;

        $id = $acc_id;

		if($_POST['motiv']!=''){$motiv = mysql_real_escape_string($_POST['motiv']);}

        else{header("Location: details.php?id=$acc_id&eroare=1");}

		$ipban = $ipplayer;

		$adminban = $_SESSION['userucp'];

		$query = mysql_query("INSERT INTO banuri (idd,Nume,AdminBan,BanReason,PlayerIP) values ('$id','$nume','$adminban','$motiv','$ipban')");

		$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." la banat pe " . $Name . " PERMANENT pe data de ".date('d-m-Y G:i A');

		$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

		if($query){

			header("Location: details.php?id=$acc_id&mesaj=8");

		}

}

//Baneaza Jucator Temporar 9

if(isset($_POST['bant']) && $culoarel>=4){

        $nume= mysql_real_escape_string($Name);

        $id = $acc_id;

		if($_POST['motiv']!=''){$motiv = mysql_real_escape_string($_POST['motiv']);}

		else{header("Location: details.php?id=$acc_id&eroare=1");}

		$ipban = $ipplayer;

		$adminban = mysql_real_escape_string($_SESSION['userucp']);

		$ziua = mysql_real_escape_string($_POST['zi']);

		$luna = mysql_real_escape_string($_POST['luna']);

		$an = mysql_real_escape_string($_POST['an']);

		$ora = mysql_real_escape_string($_POST['ora']);

		$minut = mysql_real_escape_string($_POST['minut']);

		echo $zi."/".$luna."/".$an." ".$ora.":".$minut;

		$query = mysql_query("INSERT INTO banuri SET idd='$id',

		Nume='$nume',

		AdminBan='$adminban',

		BanReason='$motiv',

		PlayerIP='$ipban',

		BanzP='$ziua',

		BanlP='$luna',

		BanaP='$an',

		BanoP='$ora',

		BanmP='$minut',

		BanzD='$ziua',

		BanlD='$luna',

		BanaD='$an',

		BanoD='$ora',

		BanmD='$minut'");

		$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." la banat pe " . $Name . " TEMPORAR pana pe data de " .$ziua."/".$luna."/".$an." ".$ora.":".$minut;

		$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

		if($query){

			header("Location: details.php?id=$acc_id&mesaj=9");

		}else{echo mysql_error();}

}

//Debaneaza Jucator 10

if(isset($_POST['unban']) && $culoarel>=6){

	$query = mysql_query("DELETE FROM banuri WHERE idd='$acc_id'");

	$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." l-a debanat pe " . $Name . " pe data de ".date('d-m-Y G:i A');

	$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

	if($query){

		header("Location: details.php?id=$acc_id&mesaj=10");

	}

}

//Blacklist 11

if(isset($_POST['blacklist']) && $culoarel>=6){

	$adminban = mysql_real_escape_string($_SESSION['userucp']);

	$motiv = mysql_real_escape_string($_POST['motiv']);

	$tipbl = $_POST['alegeblacklist'];

	$query = mysql_query("INSERT INTO black_list SET idd='$acc_id',Nume='$Name',AdminBan='$adminban',BanReason='$motiv',TIP='$tipbl' ");

	$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." l-a daugat pe " . $Name . " la Black List pe data de ".date('d-m-Y G:i A');

	$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

	if($query){

		header("Location: details.php?id=$acc_id&mesaj=11");

	}

}

//Unblacklist 12

if(isset($_POST['unbl']) && $culoarel>=6){

	$query = mysql_query("DELETE FROM black_list WHERE idd='$acc_id'");

	$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." i-a dat UNBL lui " . $Name . " pe data de ".date('d-m-Y G:i A');

	$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

	if($query){

		header("Location: details.php?id=$acc_id&mesaj=12");

	}

}

//Seteaza Helper 13

if(isset($_POST['sethelper']) && $culoarel>=6){



		

        $sethelper = $_POST['seteazahelper'];

		$query = mysql_query("UPDATE xgm_plaj_z SET Agent='$sethelper' WHERE id='$acc_id'");

		$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." i-a setat Helper lui " . $Name . " pe data de ".date('d-m-Y G:i A');

		$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

		if($query){

			header("Location: details.php?id=$acc_id&mesaj=13");

		}

		

		

	

}

//Seteaza Mod Advanced 14

if(isset($_POST['modadv']) && $culoarel>=3){



		

        $setadv = "100";

		$query = mysql_query("UPDATE xgm_plaj_z SET DonateRank='$setadv' WHERE id='$acc_id'");

		$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." i-a setat Mod Advanced lui " . $Name . " pe data de ".date('d-m-Y G:i A');

		$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

		if($query){

			header("Location: details.php?id=$acc_id&mesaj=14");

		}

		

		

	

}

//Deseteaza Mod Advanced 15

if(isset($_POST['unmodadv']) && $culoarel>=3){



		

        $setadv = "0";

		$query = mysql_query("UPDATE xgm_plaj_z SET DonateRank='$setadv' WHERE id='$acc_id'");

		$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." i-a retras Mod Advanced lui " . $Name . " pe data de ".date('d-m-Y G:i A');

		$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

		if($query){

			header("Location: details.php?id=$acc_id&mesaj=15");

		}

		

		

	

}

//Seteaza Skin 16

if(isset($_POST['skin']) && $culoarel>=2){

	

	$query = mysql_query("UPDATE xgm_plaj_z SET Chara=".$_POST['alegeskin']." WHERE id='$acc_id'");

	$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." i-a setat skin id ".$_POST['alegeskin']." lui " . $Name . " pe data de ".date('d-m-Y G:i A');

	$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

	if($query){
			header("Location: details.php?id=$acc_id&mesaj=16");

		}

}

//Acordă recompensă 17

if(isset($_POST['acordaref']) && $culoarel>=6){

	$valoare = $_POST['acordaref'];

	$forexj = mysql_fetch_array(mysql_query("SELECT Forex from xgm_plaj_z where Name='$Name'"));

    $forexj = $forexj[0];

	$nforex = $forexj + $valoare;

	$acordatj = mysql_fetch_array(mysql_query("SELECT Refacordat from xgm_plaj_z where Name='$Name'"));

    $acordatj = $acordatj[0];

	$acordatj = $acordat + 1;

	$ucptext= "UCP: Admin Level ". $culoarel . " ".$_SESSION['userucp']." i-a acordat ".$valoare." GB lui " . $Name . " pentru referale pe data de ".date('d-m-Y G:i A');

	$ucp = mysql_query("INSERT INTO admincmdslog (Text) values ('$ucptext')");

	$query = mysql_query("UPDATE xgm_plaj_z SET Forex='$nforex',Refacordat='$acordatj' WHERE Name='$Name'");

	if($query){

			header("Location: details.php?id=$acc_id&mesaj=17");

	}

}

//Mesaj

if(isset($_GET['mesaj'])){

	$vermesajnr = $_GET['mesaj'];

	if($vermesajnr==1){

		$mesajlevel = "<h3><span class=\"label label-info\">I-ati acordat jucatorului ".$Name." LevelUp din RespectPoints-urile lui.</span></h3>";

	}

	if($vermesajnr==2){

		if(isset($admin_detin)){$mesajadmin = "<h3><span class=\"label label-info\">I-ati setat jucatorului ".$Name." ".$admin_info."</span></h3>";}

		else{$mesajadmin = "<h3><span class=\"label label-info\">I-ati scos adminul jucatorului ".$Name." </span></h3>";}

	}

	if($vermesajnr==3){

		$mesajwarn = "<h3><span class=\"label label-info\">I-ati setat jucatorului ".$Name." avertismentele la ".$warnings."/3.</span></h3>";

	}

	if($vermesajnr==4){

		$mesajadaugaplayerfactiune = "<h3><span class=\"label label-success\">L-ai adaugat pe ".$Name." la factiunea <br/>".$nume_factiune_member.".</span></h3>";

	}

	if($vermesajnr==5){

		$mesajscoatedinfactiune = "<h3><span class=\"label label-danger\">Actiunea asupra lui ".$Name." s-a efectuat cu success.</span></h3>";

	}

	if($vermesajnr==6){

	    $mesajfwarns = "<h3><span class=\"label label-danger\">I-ati setat lui ".$Name." Faction Warns la ".$f_warnings.".</span></h3>";

	}

	if($vermesajnr==7){

	    $mesajfpunish = "<h3><span class=\"label label-danger\">I-ati setat lui ".$Name." Faction Punish la ".$f_punish.".</span></h3>";

	}

	if($vermesajnr==8){

	    $mesajbanp = "<h3 class=\"text-center\"><span class=\"label label-danger\">L-ai banat pe ".$Name." PERMANENT.</span></h3>";

	}

	if($vermesajnr==9){

	    $mesajbant = "<h3 class=\"text-center\"><span class=\"label label-danger\">L-ai banat pe ".$Name." TEMPORAR.</span></h3>";

	}

	if($vermesajnr==10){

	    $mesajunban = "<h3 class=\"text-center\"><span class=\"label label-info\">L-ai debanat pe ".$Name.".</span></h3>";

	}

	if($vermesajnr==11){

	    $mesajblacklist = "<h3 class=\"text-center\"><span class=\"label label-danger\">L-ai adaugat pe ".$Name." la Black List.</span></h3>";

	}

	if($vermesajnr==12){

	    $mesajunblacklist = "<h3 class=\"text-center\"><span class=\"label label-info\">L-ai sters pe ".$Name." de la Black List.</span></h3>";

	}

	if($vermesajnr==13){

	    if($agent){$mesajhelper = "<h3 class=\"text-center\"><span class=\"label label-success\">I-ati setat lui ".$Name." Helper.</span></h3>";}

		else{$mesajhelper = "<h3 class=\"text-center\"><span class=\"label label-success\">I-ati scos lui ".$Name." Helperul.</span></h3>";}

	}

    if($vermesajnr==14){

	    $mesajmodadv = "<h3 class=\"text-center\"><span class=\"label label-info\">I-ati setat lui ".$Name." VIP.</span></h3>";

	}

	if($vermesajnr==15){

	    $mesajunmodadv = "<h3 class=\"text-center\"><span class=\"label label-info\">I-ati retras lui ".$Name." VIP.</span></h3>";

	}

	if($vermesajnr==16){

	    $mesajsetskin = "I-ati setat lui ".$Name." skin id ".$skinida.".";

	}

  //  if($vermesajnr==17){

	  //  $mesajref = "<h3 class=\"text-center\"><span class=\"label label-info\">I-ati acordat lui ".$Name." recompensă pentru referale.</span></h3>";

	//}

}

if(isset($_GET['eroare'])){

	$vareroarenr = $_GET['eroare'];

	if($vareroarenr==1){

		$eroareban = "<h3><span class=\"label label-danger\">Trebuia sa ai un motiv pentru al bana pe ".$Name.".</span></h3>";

	}

	

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

<h1>Profil jucator: <?php echo $Name; if($banat){echo " - <span class=\"label label-danger\">BANAT</span>";}  ?></h1>

</div>	  

	  <div class="row row-centered">

        <div class="col-sm-10 col-sm-offset-1">

        

          <div class="panel panel-primary">

            <div class="panel-heading text-center">

              <h3 class="panel-title text-center"><div class="btn-group" role="group" aria-label="Butoane">

  <button type="button" class="btn btn-info" id="generaleb">Informatii Generale</button>

  <button type="button" class="btn btn-info" id="financiareb">Informatii Financiare</button>

  <button type="button" class="btn btn-info" id="carierab">Informatii Cariera</button>

  <button type="button" class="btn btn-info" id="referalsb">Referals</button>

  <?php if($culoarel>0){echo "<button type=\"button\" class=\"btn btn-info\" id=\"adminb\">Administreaza Cont</button>";} ?>

</div></h3>

            </div>

            <div class="panel-body">

             <div id="generale">

              <div class="col-sm-12">

              	

              	 <div class="col-sm-3 col-sm-offset-1">

            	<ul class="list-group">

            		<li class="list-group-item">Skin: <img width="127px" height="400px" src="images/skins/<?php echo $skinida; ?>.png">

			   	<br/>Skin ID: <?php echo $skinida; ?> <br/>

				<?php if(!$status && $culoarel>=2){ ?>

			   	<form method="post" action="details.php?id=<?php echo $acc_id;?>&">

			   		<select class="sub" name="alegeskin">

			   			<option value="<?php echo $skinida; ?>"><?php echo $skinida; ?></option>

			   			<?php 

							for($i=0;$i<299;$i++){

							echo "<option value=\"".$i."\">".$i."</option>";

			   			} ?>

			   		</select>

			   	<input class="btn btn-primary" type="submit" name="skin" value="Alege">

			   	</form>

				<?php }

				if(isset($mesajsetskin)){echo $mesajsetskin;}

				 ?></li>

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

			   ?>

			   

			   </li>

               <li class="list-group-item">Varsta: <span class="label label-info"><?php echo $age; ?></span></li>

               <li class="list-group-item">Nivel wanted: <span class="label label-info"><?php echo $wantedlevel; ?></span></li>

               <li class="list-group-item">ID Jucator: <span class="label label-info"><?php echo $acc_id; ?></span></li>

               <li class="list-group-item">Status: <span class="label label-<?php if($status=="1"){echo "success";}else{echo "danger";}?>">

               	<?php if($status=="1"){echo "ONLINE";}else{echo "OFFLINE";}?></span></li>

               <li class="list-group-item">Respect Points: <span class="label label-<?php if($respect>=$total_respect_level){ echo "success"; }else{echo "info";} ?>"><?php echo $respect . "/" . $total_respect_level; ?></span><?php if($respect>=$total_respect_level){ echo "<strong><br>- Jucatorul detine destule RespectPoints pentru a da levelup<br/></strong>"; }?>

               </li>

               <li class="list-group-item">Ore jucate: <span class="label label-info"><?php echo $hours; ?></span></li>

			   <li class="list-group-item">Admin: <span class="label label-default" style="background-color:#<?php if(isset($admin_detin)){echo $culoare_admin;}else{ echo "FF0000";} ?>;"><?php if(isset($admin_detin)){echo $admin_detin;}if(isset($admin_info)){echo $admin_info;}elseif($admin_level==0){echo "Nu";}?></span>

			   <?php if($_SESSION['userucp'] != $Name && $culoarel>=9){ ?>

			   	<br/><h4>Seteaza nivel Admin:<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

			   		     <select class="sub" name="alegeadminlevel">

			   		     <?php	if($admin_level == 5){echo "<option value=\"".$admin_level."\">Lead Admin</option>";}

								elseif($admin_level == 6){echo "<option value=\"".$admin_level."\">Head Admin</option>";}

								elseif($admin_level == 7){echo "<option value=\"".$admin_level."\">Administrator</option>";}

								elseif($admin_level == 8){echo "<option value=\"".$admin_level."\">Co-Owner</option>";}

								else {echo "<option value=\"".$adminlevel."\">Admin Level: ".$admin_level."</option>";} ?>

			   		     	<?php for($i=0;$i<=8;$i++){

			   		     		if($i == 5 && $i != $admin_level){echo "<option value=\"".$i."\">Lead Admin</option>";}

								elseif($i == 6 && $i != $admin_level){echo "<option value=\"".$i."\">Head Admin</option>";}

								elseif($i == 7 && $i != $admin_level){echo "<option value=\"".$i."\">Administrator</option>";}

								elseif($i == 8 && $i != $admin_level){echo "<option value=\"".$i."\">Co-Owner</option>";}

								elseif($i != $admin_level){echo "<option value=\"".$i."\">Admin Level: ".$i."</option>";} 

			   		     	} ?>

			   		     </select>

               			<input class="btn btn-primary" type="submit" name="adminlevel" value="Seteaza">

       </form><br/><?php if($_SESSION['userucp'] != $Name && $culoarel>=6 && $admin_level!=7){ ?>Seteaza Helper:

               		<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

               			<select class="sub" name="seteazahelper">

               			<?php for($i=0;$i<=1;$i++){

               				if($i!=$agent){

               					echo "<option value=\"".$i."\">".$i."</option>";

               				}

               			} } ?>

               			</select>

               		<input type="submit" class="btn btn-primary" name="sethelper" value="Seteaza Helper">

               		</form>

               		</h4>

			   	<?php if(isset($mesajadmin)){echo $mesajadmin;}

				      if(isset($mesajhelper)){echo $mesajhelper;} ?>

			   	<?php } ?>	

			   </li>

			   <li class="list-group-item">Avertismente: <span class="label label-<?php if($warnings==2){echo "warning";}else{echo "info";} ?>"><?php echo $warnings . "/3";?></span><?php if($warnings==2){echo "<br/><strong>- Jucatorul este pericol de a fi banat pentru prea multe avertismente.</strong>";}?>

			   	<?php if($culoarel >= 4){ ?>

			   	<br/><h4>Seteaza avertismente:

			   		<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

			   		     <select class="sub" name="alegewarn">

			   		     	<?php for($i=0;$i<=3;$i++){

			   		     		if($i != $warnings){echo "<option value=\"".$i."\">".$i."/3</option> ";}

			   		     	} ?>

			   		     </select>

			   		<input class="btn btn-primary" type="submit" name="playerwarn" value="Seteaza">

			   		</form>

			   		<?php if(isset($mesajwarn)){echo $mesajwarn;} ?>

			   	</h4>

			   <?php } ?>

			   </li>

			   <li class="list-group-item">Numar de Telefon: <span class="label label-info"><?php echo $phone_nr; ?></span></li>

			   <li class="list-group-item">E-mail: <span class="label label-<?php if($email=='Niciunul'){echo "danger";} else{echo "info";}?>"><?php if($email=='Niciunul'){echo "Jucatorul nu si-a setat emailul.";}elseif($culoarel>=1){echo $email;}else{echo "Informatie Privata";} ?></span></li>

			   <li class="list-group-item">Ultima activitate: <span class="label label-info"><?php echo $last_login; ?></span></li>

             <?php if($culoarel>0){ ?><li class="list-group-item"><?php if($admin_level>0){?>Reporturi preluate:<?php }elseif($agent==1){ ?>Askquri preluate:<?php } ?><span class="label label-info"><?php if($admin_level>0){ echo $reportnr; }elseif($agent==1){ echo $askqnr; } ?></span></li><?php } ?>

			 </ul>

			 </div>

			 </div>

			

			

             </div>

              <ul class="list-group" id="financiare">

              	<?php if($admin_level>=1&&$culoarel>=1){ ?>

               <li class="list-group-item">Bani cash: <strong><?php echo $cash; ?></strong><font color="green"> $</font></li>

			    <li class="list-group-item">Cont Bancar: <strong><?php echo $bank_account; ?></strong><font color="green"> $</font></li>

				<li class="list-group-item">Biz: <strong><?php if($bussiness){echo $bussiness;}elseif($sbussiness){echo $sbussiness;}else{echo "Nu detineti nici-un Biz.";}  ?></strong></li>

				<li class="list-group-item">Resedinta: <strong><?php if($casa){echo $casa;}else{echo "Nu detineti nici-o resedinta.";} ?></strong></li>

				<li class="list-group-item">Vehicule: <?php $masiniq = mysql_query("SELECT * FROM cars where Owner='$Name'");

				$nr = mysql_num_rows($masiniq); ?><?php if($nr==0){echo "<strong>Nu detineti vehicule<br/></strong>";}else{

					echo "<strong>". $nr . "</strong><br/>";

				 ?> <ul class="list-group row">

				    <?php while($row=mysql_fetch_array($masiniq)){

					$masina = $row['Model'];

					$numemasina = $row['Description'];

					$kilo = $row['Kilo'];

					$value = $row['Value'];

					?>

					<li class="list-group-item col-xs-6">

					<?php echo "<img src=\"images/masini/Vehicle_".$masina.".jpg\" class=\"img-thumbnail\"><br/> - Model: ".$numemasina."<br/> - Kilometrii: ".$kilo."<br/> - Valoare: <strong>".$value."</strong><font color=\"green\">$</font>"; ?>

					</li>

					

				<?php } ?></ul> 

				<?php } ?>

				</li>

				<?php }elseif($admin_level>=1 && $culoarel==0){echo "<li class=\"list-group-item\"><h1>Informații Private</h1></li>";}

elseif($admin_level==0){ ?>

	            <li class="list-group-item">Bani cash: <strong><?php echo $cash; ?></strong><font color="green"> $</font></li>

			    <li class="list-group-item">Cont Bancar: <strong><?php echo $bank_account; ?></strong><font color="green"> $</font></li>

				<li class="list-group-item">Biz: <strong><?php if($bussiness){echo $bussiness;}elseif($sbussiness){echo $sbussiness;}else{echo "Nu detine nici-un Biz.";}  ?></strong></li>

				<li class="list-group-item">Resedinta: <strong><?php if($casa){echo $casa;}else{echo "Nu detine nici-o resedinta.";} ?></strong></li>

				<li class="list-group-item">Vehicule: <?php $masiniq = mysql_query("SELECT * FROM cars where Owner='$Name'");

				$nr = mysql_num_rows($masiniq); ?><?php if($nr==0){echo "<strong>Nu detinete vehicule<br/></strong>";}else{

					echo "<strong>". $nr . "</strong><br/>";

				 ?> <ul class="list-group row">

				    <?php while($row=mysql_fetch_array($masiniq)){

					$masina = $row['Model'];

					$numemasina = $row['Description'];

					$kilo = $row['Kilo'];

					$value = $row['Value'];

					?>

					<li class="list-group-item col-xs-6">

					<?php echo "<img src=\"images/masini/Vehicle_".$masina.".jpg\" class=\"img-thumbnail\"><br/> - Model: ".$numemasina."<br/> - Kilometrii: ".$kilo."<br/> - Valoare: <strong>".$value."</strong><font color=\"green\">$</font>"; ?>

					</li>

					

				<?php } ?></ul> </li>

	<?php } } ?>

			   </ul>

              <ul class="list-group" id="cariera">

              <li class="list-group-item">Membru: <strong><?php if($nume_factiune_leader){echo $nume_factiune_leader;}else if($nume_factiune_member){echo $nume_factiune_member;}else{echo "Fara factiune";} ?></strong>

                <?php

                if($culoarel>=5 || $user_leader==$member){

                	if($member==0 && $leader==0){

                		if($user_leader!=0){

                 ?>

                </br><h4>Adauga in factiune:<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

			   		     <select name="adugaplayerfactiune">

			   		     	       <?php 

					$factiuni = mysql_query("SELECT * FROM lista_factiuni");

					while($row=mysql_fetch_array($factiuni)){

						

						echo "<option value=\"".$row['id']."\">".$row['nume']."</option>";

						

					}

					

					

					

				   ?>

				  

				  </select>

				  <input class="btn btn-primary" type="submit" name="playerfactiune" value="Adauga">

                  </form>

                  <?php  ?>

                  </h4>

                   <?php } }

					else if($member!=0 || $leader!=0){

						 ?>

					<br/>

					<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

						<?php if($user_leader!=0 || $culoarel>=5){

							if($user_leader==$member || $culoarel>=5){ ?>

							<input class="btn btn-primary" type="submit" name="facta" value="Uninvite">

						<input class="btn btn-primary" type="submit" name="facta" value="Fpunish"><?php } } ?>

						<?php if($leader==0 && $culoarel>=5) {?><input class="btn btn-primary" type="submit" name="facta" value="Promoveza ca Lider"><?php } ?>

				   </form>

					<?php }

				

                    }

                  if(isset($mesajadaugaplayerfactiune)){echo $mesajadaugaplayerfactiune;}

				  if(isset($mesajscoatedinfactiune)){echo $mesajscoatedinfactiune;}  ?>

				  </li>

                <li class="list-group-item">Rank: <strong><?php if($leader!='0'){echo "Lider(CU COMENZI)";}elseif($rank>="6"){echo "Lider(".$rank.")";}elseif($rank==5){echo "Sub-lider(".$rank.")";}elseif($rank!=0){echo $rank;}else{echo "Fara factiune";} ?></strong></li>

			    <li class="list-group-item">Faction Warn: <font color="<?php if($f_warnings==0){echo "green";}else if($f_warnings==3){echo "red";}else{echo "orange";}?>"><?php echo $f_warnings . "/3"; if($f_warnings==2){echo "<br/><strong>- Acest player este pericol de a iesii din factiune.</strong>";} ?></font>

			    	<?php if($culoarel>=6){ ?>

			    	<br/>Seteaza Faction Warn:

			    	<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

			    		<select class="sub" name="seteazafwarn">

			    			<?php

			    			for($i=0;$i<=3;$i++)

							{

							if($i != $f_warnings){	

							echo "<option value=\"".$i."\">".$i."/3</option>";

							}

							}

			    			 ?>

			    		</select>

			    	<input class="btn btn-primary" type="submit" name="fwarn" value="Seteaza">

			    	</form>

						

			   <?php   if(isset($mesajfwarns)){echo $mesajfwarns;} 

			    	} ?>

			    </li>

				<li class="list-group-item">Faction Punish: <font color="green"><?php echo $f_punish . "/30"; ?></font>

					<?php if($culoarel>=6){ ?>

			    	<br/>Seteaza Faction Punish:

			    	<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

			    		<select class="sub" name="seteazafpunish">

			    			<?php

			    			for($i=0;$i<=72;$i=$i+3)

							{

							if($i != $f_punish){	

							echo "<option value=\"".$i."\">".$i."/30</option>";

							}

							}

			    			 ?>

			    		</select>

			    	<input class="btn btn-primary" type="submit" name="fpunish" value="Seteaza">

			    	</form>

						

			   <?php   if(isset($mesajfpunish)){echo $mesajfpunish;} 

			    	} ?>

					

				</li>

				<li class="list-group-item">Job: <strong><?php if($job>0){echo $nume_job_member;}else{echo "Somer";} ?></strong></li>

              </ul>

              <ul class="list-group" id="referals">

			   	<li class="list-group-item">

			   		A fost adus de : <?php echo $adus; ?>

			   	</li>

			   	<li class="list-group-item">

			   		A adus pe : <br/><?php 

			   		                   $nrref = 0;

			   		                   $adusq = mysql_query("SELECT id,PlayerLevel,Name FROM xgm_plaj_z WHERE Referrals='$Name'");

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

			   	<li class="list-group-item">Recompensă:<br/> <?php

			   	if($nrref>=5 && $nrref<=9){

			   		$recompensa = 25;

			   	}

				if($nrref>=10 && $nrref<=29){

				 	$recompensa = 100;

				}

			   	if($nrref>=30 && $nrref<=49){

			   		$recompensa = 300;

			   	}

				if($nrref>=50){

					$recompensa = 600;

				}

			   	if($nrref<5){

			   	$nrramas = 5 - $nrref;

			   	echo "<br/>Mai are nevoie de $nrramas referrals pentru următoarea recompensă.";

			   	}

			   	if($nrref>=5 && $nrref<=9){

			   		$nrramas = 10 - $nrref;

			   		if($acordat==0){echo "Este eligibil pentru a primii <strong>" . $recompensa . "</strong> <font color=\"green\">GB</font>.";}

					else{echo "Și-a primit recompensa pentru <strong>$nrref</strong> referale.";}

					echo "<br/>Mai are nevoie de <strong>$nrramas</strong> referrals pentru următoarea recompensă.";

			   	}

		        if($nrref>=10 && $nrref<=29){

			   		$nrramas = 30 - $nrref;

			   		if($acordat==1){echo "Este eligibil pentru a primii <strong>" . $recompensa . "</strong> <font color=\"green\">GB</font>.";}

					else{echo "Și-a primit recompensa pentru <strong>$nrref</strong> referale.";}

					echo "<br/>Mai are nevoie de <strong>$nrramas</strong> referrals pentru următoarea recompensă.";

			   	}

				if($nrref>=30 && $nrref<=49){

					$nrramas = 50 - $nrref;

			   		if($acordat==2){echo "Este eligibil pentru a primii <strong>" . $recompensa . "</strong> <font color=\"green\">GB</font>.";}

					else{echo "Și-a primit recompensa pentru <strong>$nrref</strong> referale.";}

					echo "<br/>Mai are nevoie de <strong>$nrramas</strong> referrals pentru următoarea recompensă.";

			   	}

				if($nrref>=50){

			   		if($acordat==3){echo "Este eligibil pentru a primii <strong>" . $recompensa . "</strong> <font color=\"green\">GB</font>.";}

					else{echo "Și-a primit recompensa pentru <strong>$nrref</strong> referale.";}

					echo "<br/>A ajuns la numărul maxim de GB pe care îi pote primii din referrals , dacă continui să aduca jucători contactează un Owner pentru ai urmării activitatea.";

			   	}

		if($culoarel>=6){

				if($acordat==0){

					if($nrref>=5){

						?> 

						<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

						<br/>Acordă recompensă: <input type="submit" class="btn btn-primary" value="25" name="acordaref"> GB.

						</form>

					<?php }

				}

				if($acordat==1){

					if($nrref>=10){ ?>

						<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

						<br/>Acordă recompensă: <input type="submit" class="btn btn-primary" value="100" name="acordaref"> GB.

						</form>

					<?php }

				}

				if($acordat==2){

					if($nrref>=30){ ?>

						<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

						<br/>Acordă recompensă: <input type="submit" class="btn btn-primary" value="300" name="acordaref"> GB.

						</form>

					<?php }

				}

				if($acordat==3){

					if($nrref>=50){ ?>

						<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

						<br/>Acordă recompensă: <input type="submit" class="btn btn-primary" value="500" name="acordaref"> GB.

						</form>

					<?php }

				}

		}

				if(isset($mesajref)){echo $mesajref;} ?>

				 </li>

			   </ul>

              <ul class="list-group" id="admin">

              	<li class="list-group-item"><?php if(!$banat && $Name!=$_SESSION['userucp']){

	  	

	  	if($culoarel>=5){ ?>

	  		<div class="form-group">

	<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

	  			<h4>Baneaza Permanent:</h4>

	 <label for="motiv">Motiv:</label>

	 <input class="sub" type="text" name="motiv">

	 <input type="submit" class="btn btn-primary" name="banp" value="Baneaza Permanent">

	</form>

	

	  		</div>

	  		<div class="form-group">

	<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

	  			<h4>Baneaza Temporar:</h4>

    <label for="zi">Zi:</label>

	<select class="sub" name="zi">

		<?php for($i=1;$i<=31;$i++){

			echo "<option value=\"".$i."\">".$i."</option>";

		} ?>

	</select>

	 <label for="luna">Luna:</label>

	<select class="sub" name="luna">

		<?php for($i=1;$i<=12;$i++){

			echo "<option value=\"".$i."\">".$i."</option>";

		} ?>

	</select>

	<label for="an">An:</label>

	<select class="sub" name="an">

		<?php for($i=2014;$i<=2020;$i++){

			echo "<option value=\"".$i."\">".$i."</option>";

		} ?>

	</select>

	<label for="ora">Ora:</label>

	<select class="sub" name="ora">

		<?php for($i=0;$i<=24;$i++){

			echo "<option value=\"".$i."\">".$i."</option>";

		} ?>

	</select>

	<label for="minut">Minut:</label>

	<select class="sub" name="minut">

		<?php for($i=0;$i<=60;$i++){

			echo "<option value=\"".$i."\">".$i."</option>";

		} ?>

	</select>

	<br/>

	<label for="motiv">Motiv:</label>

	<input class="sub" type="text" name="motiv">

	



    <input type="submit" class="btn btn-primary" name="bant" value="Baneaza Temporar">

     <?php

	       if(isset($eroareban)){echo $eroareban;}?>

      </div>

	 

  </form>



       

    <?php } }elseif($banat){

    	if($culoarel>=6){ ?>

    		<div class="form-group text-center">

	<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

	<input class="btn btn-primary" type="submit" name="unban" value="Debaneaza">

	</form>

	  		

	       </div>

	  	    

    	<?php } }  ?>

    	<?php if(isset($mesajbant)){echo $mesajbant;}

    	      if(isset($mesajbanp)){echo $mesajbanp;} 

    	      if(isset($mesajunban)){echo $mesajunban;} ?>

    	      </li>

    	      <li class="list-group-item">

    	<?php

    	if(!$blacklist && $Name!=$_SESSION['userucp']){

    	 if($culoarel>=6 && $admin_level<=5){ ?>

    	    

	<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

	  			<h4>Adauga la Blacklist:</h4>

	  			<label for="motiv">Motiv:</label>

	  			<input class="sub" type="text" name="motiv">

	  			<br/>

	  			<select class="sub" name="alegeblacklist">

	  				<option value="1">PERMANENT</option>

	  				<option value="2">WIPE</option>

	  			</select>

	  			<input class="btn btn-primary" type="submit" name="blacklist" value="Adauga la Blacklist">

	</form>

	  		<?php if(isset($mesajblacklist)){echo $mesajblacklist;} ?>



	       <?php } }elseif($blacklist){

	       	if($culoarel>=6) { ?>

	       		<div class="form-group text-center">

	       		<form method="post" action="details.php?id=<?php echo $acc_id;?>&" enctype="multipart/form-data">

	       		<h4>Sterge de pe blacklist:</h4>

	       		<input class="btn btn-primary" type="submit" name="unbl" value="Sterge de pe blacklist">

	       		</form>

				</div>

<?php  }   } ?>

    	<?php if(isset($mesajunblacklist)){echo $mesajunblacklist;} ?></li>

              </ul>

            </div>

          </div>

		  </div>

        </div>

      </div>

    </div>

   	    <?php require_once 'includes/scripturi.php'; ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/evidentameniu.js"></script>

    <script>

    	$("#financiare").hide();

    	$("#cariera").hide();

    	$("#admin").hide();

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

    		if($("#admin").is(':visible')){

    		    $("#admin").slideUp(1000);

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

    		if($("#admin").is(':visible')){

    		    $("#admin").slideUp(1000);

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

    		if($("#admin").is(':visible')){

    		    $("#admin").slideUp(1000);

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

    		if($("#admin").is(':visible')){

    		   $("#admin").slideUp(1000);

    		}

    		$("#referals").slideDown(1000);

    		

    	});

    	  $("#adminb").click(function(){

    		if($("#cariera").is(':visible')){

    			$("#cariera").slideUp(1000);

    		}

    		if($("#financiare").is(':visible')){

    			$("#financiare").slideUp(1000);

    		}

    		if($("#generale").is(':visible')){

    			$("#generale").slideUp(1000);

    		}

    		if($("#referals").is(':visible')){

    			$("#referals").slideUp(1000);

    		}

            $("#admin").slideDown(1000);

    	});

    </script>

  </body>

</html>



