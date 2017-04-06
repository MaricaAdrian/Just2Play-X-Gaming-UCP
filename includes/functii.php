<?php

#####################################################

require_once "configurare.php";

#####################################################
$username = $_SESSION['userucp'];
$con = mysql_connect("$hostbaza","$userbaza","$parolabaza");

if(!$con) {
echo mysql_error();
echo "<html>\n"; 

echo "<head>\n"; 

echo "<title>Eroare @ $titlu_site</title>\n"; 

echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n"; 

echo "<link rel=\"shortcut icon\" href=\"stylesheet/img/devil-icon.png\">\n"; 

echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"mos-css/mos-style.css\">\n"; 

echo "</head>\n"; 

echo "<body>\n"; 

echo "<div id=\"header\">\n"; 

echo "<div class=\"inHeaderLogin\"></div>\n"; 

echo "</div>\n"; 

echo "<div align=\"center\">\n";

echo "<font color=\"red\">\n";

echo "<h1>Eroare !</h1>\n";

echo "</font>\n";

echo "<font color=\"black\">\n";

echo "UCP-ul a fost oprit pentru mentenanta.<br><br>\n";

echo "</font>\n";

echo "</div>\n"; 

echo "<div align=\"center\">\n";

echo "&copy; 2016 <a href=\"http://x-gaming.ro\">X-Gaming.ro</a><br>\n"; 

echo "</div>\n"; 

echo "</body>\n"; 

echo "</html>\n";

die();

}

$con = mysql_select_db("$numebaza", $con);

if(!$con) {

echo "<html>\n"; 

echo "<head>\n"; 

echo "<title>Eroare @ $titlu_site</title>\n"; 

echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n"; 

echo "<link rel=\"shortcut icon\" href=\"stylesheet/img/devil-icon.png\">\n"; 

echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"mos-css/mos-style.css\">\n"; 

echo "</head>\n"; 

echo "<body>\n"; 

echo "<div id=\"header\">\n"; 

echo "<div class=\"inHeaderLogin\"></div>\n"; 

echo "</div>\n"; 

echo "<div align=\"center\">\n";

echo "<font color=\"red\">\n";

echo "<h1>Eroare !</h1>\n";

echo "</font>\n";

echo "<font color=\"black\">\n";

echo "Sistemul nostru intampina cateva dificultati la conectarea cu baza de date a serverului de joc .<br>\n";

echo "Va rugam sa reveniti in cateva minute .<br><br>\n";

echo "</font>\n";

echo "</div>\n"; 

echo "<div align=\"center\">\n";

echo "&copy; 201 <a href=\"http://x-gaming.ro\">X-Gaming.ro</a><br>\n"; 

echo "</div>\n"; 

echo "</body>\n"; 

echo "</html>\n";

die();

}

#####################################################

//EsteBike

function esteBike($model)

{

	if($model == 481 || $model == 509 || $model == 510)

	{

		return 1;

	}

	return 0;

}

//Skin

$skinid = mysql_fetch_array(mysql_query("SELECT Chara from xgm_plaj_z where Name='$username'"));

$skinid = $skinid[0];

$culoarel = mysql_fetch_array(mysql_query("SELECT AdminLevel from xgm_plaj_z where Name='$username'"));

$culoarel = $culoarel[0];

$helper = mysql_fetch_array(mysql_query("SELECT Agent from xgm_plaj_z where Name='$username'"));

$helper = $helper[0];

if($culoarel>0){



	$admin_detin = "Da - ";

	if($culoarel==1){$admin_info = "Trial Admin";

	                    $culoare_admin = "DFE200";}

	if($culoarel==2){$admin_info = "Regular Admin";

	                    $culoare_admin = "006BF6";}

	if($culoarel==3){$admin_info = "Premium Admin";

	                    $culoare_admin = "796600";}

	if($culoarel==4){$admin_info = "Super Admin";

	                    $culoare_admin = "C3F6B3";}

	if($culoarel==5){$admin_info = "Lead Admin";

	                    $culoare_admin = "F81414";}

	if($culoarel==6){$admin_info = "Head Admin";

	                    $culoare_admin = "00FF00";}

	if($culoarel==7){$admin_info = "Administrator";

	                    $culoare_admin = "6BD700";}

	if($culoarel==8){$admin_info = "Co-Owner";

	                    $culoare_admin = "339999";}

	if($culoarel==9){$admin_info = "Owner";

	                    $culoare_admin = "33CCFF";}

	if($culoarel > 9){$admin_info = "Scripter";

	                    $culoare_admin = "33CCFF";}

}else if($helper==1){$admin_info = "Helper";

                     $culoare_admin = "FF6633";}

else{$culoare_admin="FF0000";}



#####################################################

$guest=0;

$numes = $_COOKIE['userucp'];

$parola = $_COOKIE['passucp'];

if((isset($numes))&&(isset($parola))) {

$userc = $_COOKIE['userucp'];

$passc = $_COOKIE['passucp'];

}

else

{

$guest=1; 

}


#####################################################

function send_email($catre,$subiect,$mesaj)

{

$headere = 'MIME-Version: 1.0' . "\r\n";

$headere .= 'Content-type: text/html; charset=in cautarea-8859-1' . "\r\n";

$headere .= 'From: no-reply@j2p.ro <no-reply@j2p.ro>' . "\r\n";

mail($catre, $subiect, $mesaj, $headere);

}

#####################################################

$admin_level = mysql_fetch_array(mysql_query("SELECT AdminLevel from xgm_plaj_z where Name='$username'"));

$admin_level = $admin_level[0];

if ($admin_level>0)

{

$admin = "da";

}

else

{

$admin = "nu";

}

#####################################################

$admin_level = mysql_fetch_array(mysql_query("SELECT AdminLevel from xgm_plaj_z where Name='$username'"));

$admin_level = $admin_level[0];

$leader = mysql_fetch_array(mysql_query("SELECT Leader from xgm_plaj_z where Name='$username'"));

$leader = $leader[0];

#####################################################

function formateaza_data($tm,$rcs = 0) {

    $cur_tm = time(); $dif = $cur_tm-$tm;

    $pds = array('secunde','minute','ore','zile','saptamani','luni','ani','decades');

    $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);

    for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);

   

    $no = floor($no); if($no <> 1) $pds[$v] .=''; $x=sprintf("%d %s ",$no,$pds[$v]);

    if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);

    return $x;

}

#####################################################

function sidebar_links($username)

{

$leader = mysql_fetch_array(mysql_query("SELECT Leader from xgm_plaj_z where Name='$username'"));

$leader = $leader[0];

$admin_level = mysql_fetch_array(mysql_query("SELECT AdminLevel from xgm_plaj_z where Name='$username'"));

$admin_level = $admin_level[0];

$admin_level = mysql_fetch_array(mysql_query("SELECT AdminLevel from xgm_plaj_z where Name='$username'"));

$admin_level = $admin_level[0];

if ($admin_level>0)

{

$admin = "da";

}

else

{

$admin = "nu";

}	

class CNavigation {

  public static function GenerateMenu($items) {

    $html = "<nav>\n";

    foreach($items as $item) {

      $html .= "<a href='{$item['url']}'>{$item['text']}</a>\n";

    }

    $html .= "</nav>\n";

    return $html;

  }

};

echo "<br><br><br><br><br><li><a href=\"index.php\">Cont</a></li>\n";

echo "<li><a href=\"online_list.php\">Cine este Online ?</a></li>\n";

echo "<li><a href=\"staff.php\">Staff</a></li>\n";

echo "<li><a href=\"user_list.php\">Jucatori</a></li>\n";

echo "<li><a href=\"leader_list.php\">Liderii Factiunilor</a></li>\n";

echo "<li><a href=\"ban_list.php\">Ban List</a></li>\n";

echo "<li><a href=\"black_list.php\">The BlackList</a></li>\n";

echo "<li><a href=\"http://just2play.ro/forum/index.php?/forum/13-rpj2pro7777\" target=\"_blank\">Forum</a></li>\n"; 

if ($leader!=="0")

{

echo "<li><a href=\"lider_factiune.php\">Factiune</a></li>\n";

}

if ($admin=="da")

{

echo "<li><a href=\"logs.php\">Server Logs</a></li>\n";

}

if($admin_level>="6")

{

echo "<li><a href=\"admin_logs.php\">Admin Logs</a></li>\n"; 

}

if($admin_level=="7")

{

echo "<li><a href=\"setari.php\">Mentenanta UCP</a></li>\n"; 

}

echo "<li><a href=\"logout.php\">Deconectare</a></li>\n <br><br><br><br><br><br>"; 

}

#####################################################

function footer()

{

$id_v = mysql_fetch_array(mysql_query("SELECT id from versiuni_panel ORDER BY id DESC"));

$id_v = $id_v[0];

$versiune = mysql_fetch_array(mysql_query("SELECT versiune from versiuni_panel ORDER BY id DESC"));

$versiune = $versiune[0];

$email = mysql_fetch_array(mysql_query("SELECT email from versiuni_panel ORDER BY id DESC"));

$email = $email[0];

echo "<div id=\"footer\">\n"; 

echo "&copy; 2013 <a href=\"http://just2play.ro\">just2play.ro</a><br>\n"; 

echo "Versiune panel <a href=\"changelog.php?id=$id_v\"><b>$versiune</b></a> | <a href=\"mailto:$email?Subject=Raporteaza BUG\">Raporteaza BUG</a>";

echo "</div>\n"; 

}

#####################################################



$mentenanta = mysql_fetch_array(mysql_query("SELECT valoare from setari where nume='mentenanta'"));

$mentenanta = $mentenanta[0];

if (($mentenanta=="da") && ($username!=="X-Gaming"))

{

echo "<html>\n"; 

echo "<head>\n"; 

echo "<title>Schimbare versiune @ $titlu_site</title>\n"; 

echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n"; 

echo "<link rel=\"shortcut icon\" href=\"stylesheet/img/devil-icon.png\">\n"; 

echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"mos-css/mos-style.css\">\n"; 

echo "</head>\n"; 

echo "<body>\n"; 

echo "<div id=\"header\">\n"; 

echo "<div class=\"inHeaderLogin\"></div>\n"; 

echo "</div>\n"; 

echo "<div align=\"center\">\n";

echo "<font color=\"red\">\n";

echo "<h1>Schimbare versiune !</h1>\n";

echo "</font>\n";

echo "<font color=\"black\">\n";

echo "Sistemul nostru trece la o noua versiune .<br>\n";

echo "Va rugam sa reveniti in cateva minute .<br><br>\n";

echo "</font>\n";

echo "</div>\n"; 

echo "<div align=\"center\">\n";

echo "&copy; 2013 <a href=\"http://just2play.ro\">just2play.ro</a><br>\n"; 

echo "</div>\n"; 

echo "</body>\n"; 

echo "</html>\n";

die();

}

?>