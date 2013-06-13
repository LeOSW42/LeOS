<?

include ('common/session.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Partenaires - <? echo $titrepage; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
	<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
	<link href="common/aide.css" rel="stylesheet" type="text/css" media="screen" />
	<link rel="icon" type="image/png" href="icons-pack/<? echo $iconspack; ?>/oss.png" />
	<script language="JavaScript" type="text/javascript">
	window.onload = function() { 
		initHeader();
	}
	</script>
</head>
<body>
<? include 'common/header.php'; ?>
<? $page='partenaires'; $admin="non"; include 'common/gauche.php'; ?>

<div id="corps">
	<? include 'common/nav.php'; ?>
	<div id="content">
<? // ************************************************************************************************************* ?>
<img style="float: right;" src="icones/64/help.png" />
<h1 class='nom'>Partenaires</h3>
<p class="short_desc">Pleins de liens ... Yes !</p>

<h3 class="titre">&Eacute;changes de liens</h3><hr />
	<ul>
		<li><b><a href="http://mhm.fr.nf/">Mcc HTML Mapper</a></b> - Un logiciel de cr&eacute;ation de maps HTML.</li>
		<li><b><a href="http://garfieldairlines.net/">Garfieldairlines</a></b> - Le site d'un chat ... d&eacute;jant&eacute;.</li>
		<li style="color: #C8BBA9;"><b>Vous ?</b> - Nous contacter pour faire un &eacute;change de lien</li>
	</ul>

<h3 class="titre">Soutiens</h3><hr />
	<ul>
		<li><b><a href="http://leobaillard.org/">L&eacute;obaillard</a></b> - Un superbe hébergeur !</li>
		<li style="color: #C8BBA9;"><b>Vous ?</b> - Vous avez besoin d'un coup de pouce ? Contactez-nous.</li>
	</ul>

<h3 class="titre">&Agrave; voir :</h3><hr />
	<ul>
		<li><b><a href="http://www.framasoft.net">FramaSoft</a></b> -  Un site tr&egrave;s proche de <? echo $titrepage; ?>. &Agrave; voir !</li>
	</ul>

<? // ************************************************************************************************************* ?>
	</div>
</div>

<? include 'common/bottom.php'; ?>
</body>
</html>
