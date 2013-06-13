<?

include ('common/session.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Applications phares - OpenSourceSoft</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
	<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
	<link href="common/applications-phare.css" rel="stylesheet" type="text/css" media="screen" />
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
<h1>Applications phares</h1>
<hr />
	<a href="fiche.php?id=libreoffice" class="liste"><table style="width: 100%";><tbody><tr><td style="width: 32px;"><img alt="" src="softs/phpthumb/phpThumb.php?src=../../icones/libreoffice.png&amp;w=32&amp;f=png" class="img_liste"></td><td><p class="nom_liste">LibreOffice</p><p class="short_desc_liste">Le fork ind&eacute;pendant de Oracle de openoffice.org</p></td><td style="width: 20px; text-align: center; font-family: impact, courrier, ubuntu; font-weight: bold;">1</td></tr></tbody></table></a>
	<a href="fiche.php?id=firefox" class="liste"><table style="width: 100%";><tbody><tr><td style="width: 32px;"><img alt="" src="softs/phpthumb/phpThumb.php?src=../../icones/firefox.png&amp;w=32&amp;f=png" class="img_liste"></td><td><p class="nom_liste">Firefox</p><p class="short_desc_liste">Le navigateur web.</p></td><td style="width: 20px; text-align: center; font-family: impact, courrier, ubuntu; font-weight: bold;">2</td></tr></tbody></table></a>
	<a href="fiche.php?id=7-zip" class="liste"><table style="width: 100%";><tbody><tr><td style="width: 32px;"><img alt="" src="softs/phpthumb/phpThumb.php?src=../../icones/7zip.png&amp;w=32&amp;f=png" class="img_liste"></td><td><p class="nom_liste">7-Zip</p><p class="short_desc_liste">Un gestionnaire surpuissant d'archives</p></td><td style="width: 20px; text-align: center; font-family: impact, courrier, ubuntu; font-weight: bold;">3</td></tr></tbody></table></a>
	<a href="fiche.php?id=blender" class="liste"><table style="width: 100%";><tbody><tr><td style="width: 32px;"><img alt="" src="softs/phpthumb/phpThumb.php?src=../../icones/blender.png&amp;w=32&amp;f=png" class="img_liste"></td><td><p class="nom_liste">Blender</p><p class="short_desc_liste">Cr&eacute;er ou modifier des animations ou des objets en 3D</p></td><td style="width: 20px; text-align: center; font-family: impact, courrier, ubuntu; font-weight: bold;">4</td></tr></tbody></table></a>
	<a href="fiche.php?id=audacity" class="liste"><table style="width: 100%";><tbody><tr><td style="width: 32px;"><img alt="" src="softs/phpthumb/phpThumb.php?src=../../icones/audacity.png&amp;w=32&amp;f=png" class="img_liste"></td><td><p class="nom_liste">Audacity</p><p class="short_desc_liste">Enregistrer et modifier des fichiers audio</p></td><td style="width: 20px; text-align: center; font-family: impact, courrier, ubuntu; font-weight: bold;">5</td></tr></tbody></table></a>
<hr />
<p class="explication">Voici une liste des logiciel que l'&eacute;quipe d'OpenSourceSoft consid&egrave;re comme indispensables. Contactez-nous si vous n'&ecirc;tes pas d'accord.</p>

<? // ************************************************************************************************************* ?>
	</div>
</div>

<? include 'common/bottom.php'; ?>
</body>
</html>
