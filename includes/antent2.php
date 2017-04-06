 <nav class="navbar navbar-default navbar-fixed-side">

            <div class="container">

              <div class="navbar-header">

                <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">

				

                  <span class="sr-only">Navigatie</span>

                  <span class="icon-bar"></span>

                  <span class="icon-bar"></span>

                  <span class="icon-bar"></span>

                </button>

                <a class="navbar-brand" href="http://x-gaming.ro"><font color="red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;X</font>-<font color="blue">Gaming.Ro</font></a>

              </div>

              <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav">

						<li><a href="index.php">Logat ca, <em><font color="red"><?php session_start(); echo $_SESSION['userucp'];  ?>&nbsp;&nbsp;<img src="images/fete/<?php echo $skinid; ?>.png" alt="<?php echo $_SESSION['userucp'];  ?>" class="img-circle" height="35px"></font></em></a></li>

						<li><a href="user.php"><span class="glyphicon glyphicon-home"></span> Acasă</a></li>

						<li><a href="staff.php"><span class="glyphicon glyphicon-user"></span> Staff</a></li>

						<li><a href="user_list.php"><span class="glyphicon glyphicon-info-sign"></span> Jucători</a></li>

						<li><a href="leader_list.php"><span class="glyphicon glyphicon-exclamation-sign"></span> Lideri facțiuni</a></li>

                  <li class="dropdown "><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sancțiuni<b class="caret"></b></a>

					  <ul class="dropdown-menu">

							<li><a href="ban_list.php?afisare=ban"><span class="glyphicon glyphicon-ban-circle"></span>  Ban List</a></li>

							<li><a href="ban_list.php?afisare=black"><span class="glyphicon glyphicon-minus-sign"></span> Black List</a></li>

					  </ul>

				  </li>

<?php      $leaderfact = mysql_fetch_array(mysql_query("SELECT Leader FROM xgm_plaj_z where Name='".$_SESSION['userucp']."'"));

           $leaderfact = $leaderfact[0];

           $nfactleader = mysql_fetch_array(mysql_query("SELECT nume from lista_factiuni where id='$leaderfact'"));

           $nfactleader = $nfactleader[0];

		   $idfactleader = mysql_fetch_array(mysql_query("SELECT id from lista_factiuni where name='$nfactleader"));

           $idfactleader = $idfactleader[0]; 

           $memberfact = mysql_fetch_array(mysql_query("SELECT Member FROM xgm_plaj_z where Name='".$_SESSION['userucp']."'"));

		   $memberfact = $memberfact[0];

           $nfactmember = mysql_fetch_array(mysql_query("SELECT nume from lista_factiuni where id='$memberfact'"));

           $nfactmember = $nfactmember[0]; 

		   $idfactmember = mysql_fetch_array(mysql_query("SELECT id from lista_factiuni where name='$nfactmember"));

           $idfactmember = $idfactmember[0]; 

           if($memberfact!=0 || $leaderfact!=0){ ?>

           <li class="dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Facțiune<span class="caret"></span></a>

              <ul class="dropdown-menu" role="menu">

			  <li><a href="factiune.php"><span class="glyphicon glyphicon-ok-circle"></span> Membrii</a></li>

			  <li><a href="factiunelog.php"><span class="glyphicon glyphicon-calendar"></span> Log</a></li>

			  </ul>

			</li>

          <?php }?>

		  <li class="dropdown">

		   <?php 

		   $maxid = mysql_fetch_array(mysql_query("SELECT max(id) FROM upgrades"));

           $maxid = $maxid[0];

		   $gettime = mysql_query("SELECT * FROM upgrades WHERE id='$maxid'"); 

		   while($row=mysql_fetch_array($gettime)){

		     $id = $row['id'];

		     $nume = $row['Nume'];

			 $time = $row['Time'];

			 $gnume = explode(" ", $nume);

			 $gcookie= $gnume[0] . $id;

			 $current = time();

			 $Tip = $row['Tip'];

			 

		   }

		   ?>

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> 

			  <?php if($current<$time && !isset($_COOKIE[$gcookie])){echo "<font color=\"red\">";} ?>

			  Upgrades

			  <?php if($current<$time && !isset($_COOKIE[$gcookie])){echo "</font>";}  ?>

			  <span class="caret"></span></a>

              <ul class="dropdown-menu" role="menu">

                <li><a href="upgrades.php?afisare=Server"><span class="glyphicon glyphicon-hdd"></span>Server

				<?php if($current<$time && !isset($_COOKIE[$gcookie]) && $Tip=="Server"){ ?>  

				<?php if($current<$time && !isset($_COOKIE[$gcookie])){echo "<font color=\"red\">";} ?>

				<span class="glyphicon glyphicon-bell"></span>

				<?php if($current<$time && !isset($_COOKIE[$gcookie])){echo "</font>";}  ?><?php } ?>

				</a></li>

				<li><a href="upgrades.php?afisare=UCP"><span class="glyphicon glyphicon-credit-card"></span>UCP

				<?php if($current<$time && !isset($_COOKIE[$gcookie]) && $Tip=="UCP"){ ?>

				<?php if($current<$time && !isset($_COOKIE[$gcookie])){echo "<font color=\"red\">";} ?>

				<span class="glyphicon glyphicon-bell"></span>

				<?php if($current<$time && !isset($_COOKIE[$gcookie])){echo "</font>";}  ?>

				<?php } ?>

				</a></li>

			</ul>

			</li>

			<?php if($culoarel>=5){ ?>

	          <li class="dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin<span class="caret"></span></a>

              <ul class="dropdown-menu" role="menu">

              	<li><a href="admin_logs.php">Admin Logs</a></li>

                <li><a href="anunt.php">Modifică Anunț</a></li>

				<li><a href="adaugaupgrades.php">Adaugă Upgrades</a></li>

				<li><a href="modificaupgrades.php">Șterge/Modifică Upgrades</a></li>

				<li><a href="referalsadmin.php">Referals(Nefunctinal)</a></li>
				<li><a href="ipfilter.php">IP Filter(nefunctional)</a></li>

			</ul>

			 </li>

			<?php } ?>

			<li><a href="logout.php">Logout</a></li>

                </ul>

                <!-- <button class="btn btn-default navbar-btn">Schimbă stil.</button> -->

                <p class="navbar-text">

                  @ X-Gaming 2016 by

                  <a href="http://adrian.e-solution.ro">Marica Adrian</a>

                </p>

              </div>

            </div>

          </nav>