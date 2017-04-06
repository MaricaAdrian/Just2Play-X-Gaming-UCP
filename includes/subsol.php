
 <footer class="footer">
      <div class="text-center">
        <p class="text-muted">&copy;2016 X-Gaming.Ro.<br/>
		<?php
		$ucpv = mysql_fetch_array(mysql_query("SELECT Versiune FROM upgrades WHERE Tip='UCP' ORDER BY id DESC LIMIT 0,1"));
		$ucpv = $ucpv[0];
		$serverv = mysql_fetch_array(mysql_query("SELECT Versiune FROM upgrades WHERE Tip='Server' ORDER BY id DESC LIMIT 0,1"));
		$serverv = $serverv[0];
		 ?>
		Versiune Panel <?php echo $ucpv ?> | Versiune Server <?php echo $serverv; ?><br/>
	<a href="mailto:marica.adrian@yahoo.com?Subject=Raporteaza BUG" class="suba">Raporteaza BUG</a><br/>
Front/Back End by <a href="http://adrian.e-solution.ro" class="suba">Marica Adrian</a></p><br/>
      </div>
 </footer>