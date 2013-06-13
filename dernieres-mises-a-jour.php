<?

include ('common/session.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Derni&egrave;res mises &agrave; jour - OpenSourceSoft</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
	<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
	<link href="common/dernieres-mises-a-jour.css" rel="stylesheet" type="text/css" media="screen" />
	<link rel="icon" type="image/png" href="icons-pack/<? echo $iconspack; ?>/oss.png" />
	<script language="JavaScript" type="text/javascript">
	window.onload = function() { 
		initHeader();
		initHeight();
	}
	</script>
</head>
<body>
<? include 'common/header.php'; ?>
<? include 'common/gauche.php'; ?>

<div id="corps">
	<? include 'common/nav.php'; ?>
	<div id="content">
<? // ************************************************************************************************************* ?>
<h1>Derni&egrave;res mises &agrave; jour</h1>
<hr />
<?

// On cherche dans le SQL la liste des applications

include("common/config.inc.php");
$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base, $connect);

	// Nombre de lignes
	$retour = mysql_query("SELECT * FROM `fiche_soft` ORDER BY `fiche_soft`.`index` DESC LIMIT 0 , 30");
	$nblignes = mysql_num_rows($retour);
  
// On affiche la liste des applications

include("common/fonctions.php");

for($i=0; $i<$nblignes; $i++) {
	$ip = $i + 1;
	$retour = mysql_query("SELECT id, nom, short_desc FROM `fiche_soft` ORDER BY `fiche_soft`.`index` DESC LIMIT ".$i.", ".$ip);
	$contenu = mysql_fetch_array($retour);

	echo '<a class="liste" href="fiche.php?id='.$contenu[0].'">';
	echo '<table style="width: 100%;"><tbody><tr><td style="width: 32px;"><img class="img_liste" src="'.icon($contenu[0], $iconspack).'" alt="" /></td>';
	echo '<td><p class="nom_liste">'.$contenu[1].'</p>';
	echo '<p class="short_desc_liste">'.$contenu[2].'</p></td>';
	echo '<td style="width: 20px; text-align: center; font-family: impact, courrier, ubuntu; font-weight: bold;">'.$ip.'</td></tr></tbody></table>';
	echo '</a>';
}

mysql_close();

?>
<hr />
<p class="explication">Vous avez devant les yeux la liste des 30 derni&egrave;res fiches &agrave; avoir &eacute;t&eacute; retouch&eacute;es de la plus r&eacute;cente &agrave; la plus vieille.</p>
<? // ************************************************************************************************************* ?>
	</div>
</div>

<? include 'common/bottom.php'; ?>
</body>
</html>
