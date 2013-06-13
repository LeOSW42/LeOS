<?php
	include("config.inc.php");
	$connect = mysql_connect($hote, $user, $password);
	mysql_select_db($base, $connect);

	$retour = mysql_query("SELECT * FROM ".$prefixe."fiche_soft WHERE invisible=0");
	$donnees = mysql_num_rows($retour);
	  
	echo '<div id="bottom">'.$donnees.' ';
	echo _('elements-disponibles');

	echo '<span style="float: right;">';
	echo _('mis-a-jour-le');
	echo ' '.$maj.'&nbsp;</span>';

	echo'</div>';
	
	mysql_close($connect);
?>

<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://leo-serre.legtux.org/Stats/" : "http://leo-serre.legtux.org/Stats/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 5);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://leo-serre.legtux.org/Stats/piwik.php?idsite=5" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->
