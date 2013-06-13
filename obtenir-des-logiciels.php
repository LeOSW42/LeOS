<? include ('common/session.php'); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Obtenir des logiciels - <? echo $titrepage; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
	<link href="common/obtenir-des-logiciels.css" rel="stylesheet" type="text/css" media="screen" />
	<link rel="icon" type="image/png" href="icons-pack/<? echo $iconspack; ?>/oss.png" />
	<script language="JavaScript" type="text/javascript">
	window.onload = function() { 
		initHeader();
	}
	</script>
</head>
<body>
<? include 'common/header.php'; ?>
<? $page='obtenirdeslogiciels'; $admin='non'; include 'common/gauche.php'; ?>

<div id="corps">
	<? include 'common/nav.php'; ?>
	<div id="content">
<? // ************************************************************************************************************* ?>
<h1><? echo _('Logithèque LeOS'); ?></h1><br />
<p><a href="applications-phares.php" class="button buttonOrange"><? echo _('Applications Phares'); ?></a><a href="application-aleatoire.php" class="button buttonVert"><? echo _('Application Aléatoire'); ?></a><a href="dernieres-mises-a-jour.php" class="button buttonBleu"><? echo _('Dernières mises à jour'); ?></a></p>
<br />
<div id="categorie"><div id="cat_titre">Cat&eacute;gories</div>
	<a href="categorie.php?catid=1" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/accessoires.png" alt="" /><br /><? echo _('accessoires'); ?></a>
	<a href="categorie.php?catid=2" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/acces-universel.png" alt="" /><br /><? echo _('acces-universel'); ?></a>
	<a href="categorie.php?catid=3" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/bureautique.png" alt="" /><br /><? echo _('bureautique'); ?></a>
	<a href="categorie.php?catid=4" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/education.png" alt="" /><br /><? echo _('education'); ?></a>
	<a href="categorie.php?catid=5" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/graphisme.png" alt="" /><br /><? echo _('graphisme'); ?></a>
	<a href="categorie.php?catid=6" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/internet.png" alt="" /><br /><? echo _('internet'); ?></a>
	<a href="categorie.php?catid=7" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/jeux.png" alt="" /><br /><? echo _('jeux'); ?></a>
	<a href="categorie.php?catid=8" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/polices-de-caracteres.png" alt="" /><br /><? echo _('polices-de-caracteres'); ?></a>
	<a href="categorie.php?catid=9" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/science-&amp;-ingenierie.png" alt="" /><br /><? echo _('science-ingenierie'); ?></a>
	<a href="categorie.php?catid=10" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/son-et-video.png" alt="" /><br /><? echo _('son-et-video'); ?></a>
	<a href="categorie.php?catid=11" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/themes-&amp;-optimisations.png" alt="" /><br /><? echo _('themes-optimisations'); ?></a>
	<a href="categorie.php?catid=12" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/outils-pour-developpeurs.png" alt="" /><br /><? echo _('outils-pour-developpeurs'); ?></a>
	<a href="categorie.php?catid=13" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/systeme.png" alt="" /><br /><? echo _('systeme'); ?></a>
<div style="clear: both;"></div>
</div>
<div id="creditimage"><? echo _('icones-par');?> <? include 'icons-pack/'.$iconspack.'/credits'; ?></div>
<? // ************************************************************************************************************* ?>
	</div>
</div>

<? include 'common/bottom.php'; ?>
</body>
</html>
