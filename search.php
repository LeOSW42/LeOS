<?

include ('common/session.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Recherche - OpenSourceSoft</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
	<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
	<link href="common/recherche.css" rel="stylesheet" type="text/css" media="screen" />
	<link rel="icon" type="image/png" href="icons-pack/<? echo $iconspack; ?>/oss.png" />
	<script language="JavaScript" type="text/javascript">
	window.onload = function() { 
		initHeader();
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
<img style="float: right;" src="icones/64/help.png" />
<h1 class='nom'>Recherche</h3>
<p class="short_desc">Recherche au sein du site OpenSourceSoft...</p>

<hr />
<?php
	require_once('softs/search/search.class.php'); //Modifier éventuellement le chemin.

	$query = $_GET['q']; //Ce sont les mots clé de la recherche.
	$site = 'http://opensourcesoft.fr.nf'; //C'est le site concerné par la recherche.
	$s = new Search($site, $query, 10); //10 c'est le nombre de résultats par page (si le moteur le gère).
	echo $s->getHTML(); //On récupère le code HTML.
?>

<div style="color: #B8A98F; float: right; font-size: 12px; margin-top: 3px;" id="creditrecherche">R&eacute;sultats fournis par <a style="text-decoration: none;" href="http://www.seeks-project.info/site/">Seeks</a></div>

<? // ************************************************************************************************************* ?>
	</div>
</div>

<? include 'common/bottom.php'; ?>
</body>
</html>
