<?

include ('common/session.php');

?>

<? if ($_GET['option'] == 'tests') { ?>

	<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Tests - <? echo $titrepage; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
		<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
		<link href="common/fiche.css" rel="stylesheet" type="text/css" media="screen" />
		<link rel="icon" type="image/png" href="icons-pack/<? echo $iconspack; ?>/oss.png" />
		<script language="JavaScript" type="text/javascript">
		window.onload = function() { 
			initHeader();
		}
		</script>
		<script language="JavaScript" type="text/javascript" src="softs/shadowbox/shadowbox.js"></script>
		<link href="softs/shadowbox/shadowbox.css" rel="stylesheet" type="text/css" media="screen" />
		<script type='text/javascript'> // Configuration de Shadowbox
			Shadowbox.init({
				language:   'fr',
				players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
				});
		</script>
		<script type="text/javascript" language="javascript" src="softs/ajaxstarrater/js/behavior.js"></script>
		<script type="text/javascript" language="javascript" src="softs/ajaxstarrater/js/rating.js"></script>
		<link rel="stylesheet" type="text/css" href="softs/ajaxstarrater/css/rating.css" />
	</head>
	<body>
	<? include 'common/header.php'; ?>
	<? $page="fiche"; $admin="non"; include 'common/gauche.php'; ?>

	<div id="corps">
		<? include 'common/nav.php'; ?>
		<div id="content">
	<? // ************************************************************************************************************* 

	$id = $_GET['id'];

	/* Partie PHP de recuperation de donnees par SQL */

	include 'common/config.inc.php';

	$connect = mysql_connect($hote, $user, $password);
	mysql_select_db($base, $connect);

	$requete = mysql_query("SELECT * FROM `".$prefixe."tests` WHERE id='$id'");
	$tests = mysql_fetch_array($requete);
	$requete = mysql_query("SELECT * FROM `".$prefixe."fiche_soft` WHERE id='$id'");
	$logiciel = mysql_fetch_array($requete);

	mysql_close($connect); 

	require('softs/ajaxstarrater/_drawrating.php');
	include 'common/fonctions.php';
	?>

		<img style="float: right;" src="<? echo icon64($logiciel['id'], $iconspack); ?>" />
		<h3 class="nom"><? echo $logiciel['nom']; ?></h3>
		<p class="short_desc"><? echo $logiciel['short_desc']; ?></p>

		<div class="note"><?php echo rating_bar($logiciel['id'],'5'); ?></div>

		<ul id="tabnav">
		     <li><a href="fiche.php?id=<? echo $id; ?>">Fiche <? echo $titrepage; ?></a></li>
		     <li class="active"><a href="#">Tests</a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=framasoft">Fiche Framasoft</a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=diaspora">Discussions Diaspora*</a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=wikipedia">Page Wikipedia</a></li>
		</ul>


		<h3 class="titre">Tests<span style="float: right;"><a class="a_img" href="admin.php?id=delete&value=<? echo $id; ?>"><img src="icons-pack/<? echo $iconspack; ?>/page_delete.png" alt="delete" /></a> <a class="a_img" href="admin.php?id=edit&idsoft=<? echo $id; ?>"><img src="icons-pack/<? echo $iconspack; ?>/page_edit.png" alt="edit" /></a>&nbsp;</span></h3><hr />

		<table style="width: 100%; margin-top: 30px;" id="table_tests"><tbody>
			<tr>
				<th>Syst&egrave;me d'exploitation</th>
				<th>Remarques</th>
				<th>Conclusion</th>
			</tr>
			<tr>
				<th><img src="common/images/OS/CentOS.png" alt="centos" title="CentOS" /> - CentOS</th>
				<td><? echo $tests['centosr']; ?></td>
				<td class="<? if ($tests['centosc'] == 1) { echo "r"; } else if ($tests['centosc'] == 2) { echo "b"; } else if ($tests['centosc'] == 3) { echo "o"; } else if ($tests['centosc'] == 4) { echo "vc"; } else if ($tests['centosc'] == 5) { echo "vf"; } ?>"><? echo $tests['centosc']; ?></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Debian.png" alt="debian" title="Debian" /> - Debian</th>
				<td><? echo $tests['debianr']; ?></td>
				<td class="<? if ($tests['debianc'] == 1) { echo "r"; } else if ($tests['debianc'] == 2) { echo "b"; } else if ($tests['debianc'] == 3) { echo "o"; } else if ($tests['debianc'] == 4) { echo "vc"; } else if ($tests['debianc'] == 5) { echo "vf"; } ?>"><? echo $tests['debianc']; ?></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Fedora.png" alt="fedora" title="Fedora" /> - Fedora</th>
				<td><? echo $tests['fedorar']; ?></td>
				<td class="<? if ($tests['fedorac'] == 1) { echo "r"; } else if ($tests['fedorac'] == 2) { echo "b"; } else if ($tests['fedorac'] == 3) { echo "o"; } else if ($tests['fedorac'] == 4) { echo "vc"; } else if ($tests['fedorac'] == 5) { echo "vf"; } ?>"><? echo $tests['fedorac']; ?></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Kubuntu.png" alt="kubuntu" title="Kubuntu" /> - Kubuntu</th>
				<td><? echo $tests['kubuntur']; ?></td>
				<td class="<? if ($tests['kubuntuc'] == 1) { echo "r"; } else if ($tests['kubuntuc'] == 2) { echo "b"; } else if ($tests['kubuntuc'] == 3) { echo "o"; } else if ($tests['kubuntuc'] == 4) { echo "vc"; } else if ($tests['kubuntuc'] == 5) { echo "vf"; } ?>"><? echo $tests['kubuntuc']; ?></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Linux_Mint.png" alt="linux_mint" title="Linux Mint" /> - Linux Mint</th>
				<td><? echo $tests['linuxmintr']; ?></td>
				<td class="<? if ($tests['linuxmintc'] == 1) { echo "r"; } else if ($tests['linuxmintc'] == 2) { echo "b"; } else if ($tests['linuxmintc'] == 3) { echo "o"; } else if ($tests['linuxmintc'] == 4) { echo "vc"; } else if ($tests['linuxmintc'] == 5) { echo "vf"; } ?>"><? echo $tests['linuxmintc']; ?></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/MacOSX.png" alt="mac" title="Mac OS X" /> - Mac OS X</th>
				<td><? echo $tests['macosxr']; ?></td>
				<td class="<? if ($tests['macosxc'] == 1) { echo "r"; } else if ($tests['macosxc'] == 2) { echo "b"; } else if ($tests['macosxc'] == 3) { echo "o"; } else if ($tests['macosxc'] == 4) { echo "vc"; } else if ($tests['macosxc'] == 5) { echo "vf"; } ?>"><? echo $tests['macosxc']; ?></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Mandriva.png" alt="mandriva" title="Mandriva" /> - Mandriva</th>
				<td><? echo $tests['mandrivar']; ?></td>
				<td class="<? if ($tests['mandrivac'] == 1) { echo "r"; } else if ($tests['mandrivac'] == 2) { echo "b"; } else if ($tests['mandrivac'] == 3) { echo "o"; } else if ($tests['mandrivac'] == 4) { echo "vc"; } else if ($tests['mandrivac'] == 5) { echo "vf"; } ?>"><? echo $tests['mandrivac']; ?></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/OpenSuse.png" alt="opensuse" title="OpenSuse" /> - OpenSuse</th>
				<td><? echo $tests['opensuser']; ?></td>
				<td class="<? if ($tests['opensusec'] == 1) { echo "r"; } else if ($tests['opensusec'] == 2) { echo "b"; } else if ($tests['opensusec'] == 3) { echo "o"; } else if ($tests['opensusec'] == 4) { echo "vc"; } else if ($tests['opensusec'] == 5) { echo "vf"; } ?>"><? echo $tests['opensusec']; ?></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/PCLinuxOS.png" alt="pclinuxos" title="PCLinuxOS" /> - PCLinuxOS</th>
				<td><? echo $tests['pclinuxosr']; ?></td>
				<td class="<? if ($tests['pclinuxosc'] == 1) { echo "r"; } else if ($tests['pclinuxosc'] == 2) { echo "b"; } else if ($tests['pclinuxosc'] == 3) { echo "o"; } else if ($tests['pclinuxosc'] == 4) { echo "vc"; } else if ($tests['pclinuxosc'] == 5) { echo "vf"; } ?>"><? echo $tests['pclinuxosc']; ?></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/RedHat.png" alt="redhat" title="RedHat" /> - RedHat</th>
				<td><? echo $tests['redhatr']; ?></td>
				<td class="<? if ($tests['redhatc'] == 1) { echo "r"; } else if ($tests['redhatc'] == 2) { echo "b"; } else if ($tests['redhatc'] == 3) { echo "o"; } else if ($tests['redhatc'] == 4) { echo "vc"; } else if ($tests['redhatc'] == 5) { echo "vf"; } ?>"><? echo $tests['redhatc']; ?></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Ubuntu.png" alt="ubuntu" title="Ubuntu" /> - Ubuntu</th>
				<td><? echo $tests['ubuntur']; ?></td>
				<td class="<? if ($tests['ubuntuc'] == 1) { echo "r"; } else if ($tests['ubuntuc'] == 2) { echo "b"; } else if ($tests['ubuntuc'] == 3) { echo "o"; } else if ($tests['ubuntuc'] == 4) { echo "vc"; } else if ($tests['ubuntuc'] == 5) { echo "vf"; } ?>"><? echo $tests['ubuntuc']; ?></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Windows_XP.png" alt="windows_xp" title="Windows XP" /> - Windows XP</th>
				<td><? echo $tests['windowsxpr']; ?></td>
				<td class="<? if ($tests['windowsxpc'] == 1) { echo "r"; } else if ($tests['windowsxpc'] == 2) { echo "b"; } else if ($tests['windowsxpc'] == 3) { echo "o"; } else if ($tests['windowsxpc'] == 4) { echo "vc"; } else if ($tests['windowsxpc'] == 5) { echo "vf"; } ?>"><? echo $tests['windowsxpc']; ?></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Windows_Vista.png" alt="windows_vista" title="Windows Vista" /> - Windows Vista</th>
				<td><? echo $tests['windowsvistar']; ?></td>
				<td class="<? if ($tests['windowsvistac'] == 1) { echo "r"; } else if ($tests['windowsvistac'] == 2) { echo "b"; } else if ($tests['windowsvistac'] == 3) { echo "o"; } else if ($tests['windowsvistac'] == 4) { echo "vc"; } else if ($tests['windowsvistac'] == 5) { echo "vf"; } ?>"><? echo $tests['windowsvistac']; ?></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Windows_7.png" alt="windows_7" title="Windows 7" /> - Windows 7</th>
				<td><? echo $tests['windows7r']; ?></td>
				<td class="<? if ($tests['windows7c'] == 1) { echo "r"; } else if ($tests['windows7c'] == 2) { echo "b"; } else if ($tests['windows7c'] == 3) { echo "o"; } else if ($tests['windows7c'] == 4) { echo "vc"; } else if ($tests['windows7c'] == 5) { echo "vf"; } ?>"><? echo $tests['windows7c']; ?></td>
			</tr>
		</tbody></table>

		<p><small><i>L&eacute;gende: <b>1</b> correspond &agrave; une impossibilit&eacute;. <b>2</b> correspond &agrave; une ignorance. <b>3</b> correspond &agrave; une utilisation avanc&eacute;e. <b>4</b> correspond &agrave; une utilisation th&eacute;orique. <b>5</b> correspond &agrave; un test qui s'est bien d&eacute;roul&eacute;.</i></small></p>

		</div>
	</div>

	<? include 'common/bottom.php'; ?>
	</body>
	</html>

<? }

elseif ($_GET['option'] == 'wikipedia') { ?>

	<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Page Wikipedia - <? echo $titrepage; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
		<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
		<link href="common/fiche.css" rel="stylesheet" type="text/css" media="screen" />
		<link rel="icon" type="image/png" href="icons-pack/<? echo $iconspack; ?>/oss.png" />
		<script language="JavaScript" type="text/javascript">
		window.onload = function() { 
			initHeader();
		}
		</script>
		<script language="JavaScript" type="text/javascript" src="softs/shadowbox/shadowbox.js"></script>
		<link href="softs/shadowbox/shadowbox.css" rel="stylesheet" type="text/css" media="screen" />
		<script type='text/javascript'> // Configuration de Shadowbox
			Shadowbox.init({
				language:   'fr',
				players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
				});
		</script>
		<script type="text/javascript" language="javascript" src="softs/ajaxstarrater/js/behavior.js"></script>
		<script type="text/javascript" language="javascript" src="softs/ajaxstarrater/js/rating.js"></script>
		<link rel="stylesheet" type="text/css" href="softs/ajaxstarrater/css/rating.css" />
	</head>
	<body>
	<? include 'common/header.php'; ?>
	<? $page="fiche"; $admin="non"; include 'common/gauche.php'; ?>

	<div id="corps">
		<? include 'common/nav.php'; ?>
		<div id="content">
	<? // ************************************************************************************************************* 

	$id = $_GET['id'];

	/* Partie PHP de recuperation de donnees par SQL */

	include 'common/config.inc.php';

	$connect = mysql_connect($hote, $user, $password);
	mysql_select_db($base, $connect);

	$requete = mysql_query("SELECT * FROM ".$prefixe."fiche_soft WHERE id='$id'");
	$logiciel = mysql_fetch_array($requete);

	mysql_close($connect); 

	require('softs/ajaxstarrater/_drawrating.php');
	include 'common/fonctions.php';

	?>

		<img style="float: right;" src="<? echo icon64($logiciel['id'], $iconspack); ?>" />
		<h3 class="nom"><? echo $logiciel['nom']; ?></h3>
		<p class="short_desc"><? echo $logiciel['short_desc']; ?></p>

		<div class="note"><?php echo rating_bar($logiciel['id'],'5'); ?></div>

		<ul id="tabnav">
		     <li><a href="fiche.php?id=<? echo $id; ?>">Fiche <? echo $titrepage; ?></a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=tests">Tests</a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=framasoft">Fiche Framasoft</a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=diaspora">Discussions Diaspora*</a></li>
		     <li class="active"><a href="#">Page Wikipedia</a></li>
		</ul>


		<h3 class="titre">Voici le contenu de la page Wikipedia<span style="float: right;"><a class="a_img" href="admin.php?id=delete&value=<? echo $id; ?>"><img src="icons-pack/<? echo $iconspack; ?>/page_delete.png" alt="delete" /></a> <a class="a_img" href="admin.php?id=edit&idsoft=<? echo $id; ?>"><img src="icons-pack/<? echo $iconspack; ?>/page_edit.png" alt="edit" /></a>&nbsp;</span></h3><hr />

		<br /><br />

		<div class="attention"><p>Cette fonctionalit&eacute; n'est pas encore disponible...<br />
		Nous travaillons actuellement dessus, veuillez nous en excuser.</p></div>

		</div>
	</div>

	<? include 'common/bottom.php'; ?>
	</body>
	</html>

<? }

elseif ($_GET['option'] == 'diaspora') { ?>

	<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Discussions Diaspora - <? echo $titrepage; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
		<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
		<link href="common/fiche.css" rel="stylesheet" type="text/css" media="screen" />
		<link rel="icon" type="image/png" href="icons-pack/<? echo $iconspack; ?>/oss.png" />
		<script language="JavaScript" type="text/javascript">
		window.onload = function() { 
			initHeader();
		}
		</script>
		<script language="JavaScript" type="text/javascript" src="softs/shadowbox/shadowbox.js"></script>
		<link href="softs/shadowbox/shadowbox.css" rel="stylesheet" type="text/css" media="screen" />
		<script type='text/javascript'> // Configuration de Shadowbox
			Shadowbox.init({
				language:   'fr',
				players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
				});
		</script>
		<script type="text/javascript" language="javascript" src="softs/ajaxstarrater/js/behavior.js"></script>
		<script type="text/javascript" language="javascript" src="softs/ajaxstarrater/js/rating.js"></script>
		<link rel="stylesheet" type="text/css" href="softs/ajaxstarrater/css/rating.css" />
	</head>
	<body>
	<? include 'common/header.php'; ?>
	<? $page="fiche"; $admin="non"; include 'common/gauche.php'; ?>

	<div id="corps">
		<? include 'common/nav.php'; ?>
		<div id="content">
	<? // ************************************************************************************************************* 

	$id = $_GET['id'];

	/* Partie PHP de recuperation de donnees par SQL */

	include 'common/config.inc.php';

	$connect = mysql_connect($hote, $user, $password);
	mysql_select_db($base, $connect);

	$requete = mysql_query("SELECT * FROM ".$prefixe."fiche_soft WHERE id='$id'");
	$logiciel = mysql_fetch_array($requete);

	mysql_close($connect); 

	require('softs/ajaxstarrater/_drawrating.php');
	include 'common/fonctions.php';

	?>

		<img style="float: right;" src="<? echo icon64($logiciel['id'], $iconspack); ?>" />
		<h3 class="nom"><? echo $logiciel['nom']; ?></h3>
		<p class="short_desc"><? echo $logiciel['short_desc']; ?></p>

		<div class="note"><?php echo rating_bar($logiciel['id'],'5'); ?></div>

		<ul id="tabnav">
		     <li><a href="fiche.php?id=<? echo $id; ?>">Fiche <? echo $titrepage; ?></a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=tests">Tests</a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=framasoft">Fiche Framasoft</a></li>
		     <li class="active"><a href="#">Discussions Diaspora*</a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=wikipedia">Page Wikipedia</a></li>
		</ul>


		<h3 class="titre">Voici des discussions Diaspora* avec le tag #<? echo $id; ?> <span style="float: right;"><a class="a_img" href="admin.php?id=delete&value=<? echo $id; ?>"><img src="icons-pack/<? echo $iconspack; ?>/page_delete.png" alt="delete" /></a> <a class="a_img" href="admin.php?id=edit&idsoft=<? echo $id; ?>"><img src="icons-pack/<? echo $iconspack; ?>/page_edit.png" alt="edit" /></a>&nbsp;</span></h3><hr />

		<br /><br />

		<div class="attention"><p>Cette fonctionalit&eacute; n'est pas encore disponible...<br />
		Nous travaillons actuellement dessus, veuillez nous en excuser.</p></div>

		</div>
	</div>

	<? include 'common/bottom.php'; ?>
	</body>
	</html>

<? }

elseif ($_GET['option'] == 'framasoft') { ?>

	<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Fiche Framasoft - <? echo $titrepage; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
		<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
		<link href="common/fiche.css" rel="stylesheet" type="text/css" media="screen" />
		<link rel="icon" type="image/png" href="icons-pack/<? echo $iconspack; ?>/oss.png" />
		<script language="JavaScript" type="text/javascript">
		window.onload = function() { 
			initHeader();
		}
		</script>
		<script language="JavaScript" type="text/javascript" src="softs/shadowbox/shadowbox.js"></script>
		<link href="softs/shadowbox/shadowbox.css" rel="stylesheet" type="text/css" media="screen" />
		<script type='text/javascript'> // Configuration de Shadowbox
			Shadowbox.init({
				language:   'fr',
				players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
				});
		</script>
		<script type="text/javascript" language="javascript" src="softs/ajaxstarrater/js/behavior.js"></script>
		<script type="text/javascript" language="javascript" src="softs/ajaxstarrater/js/rating.js"></script>
		<link rel="stylesheet" type="text/css" href="softs/ajaxstarrater/css/rating.css" />
		<style>
		.meta-out {
			text-align: right;
			list-style: none;
			font-size: 20px;
		}
		#a-notes {
			border-top: 1px dashed grey;
			border-bottom: 2px solid grey;
		}
		</style>
	</head>
	<body>
	<? include 'common/header.php'; ?>
	<? $page="fiche"; $admin="non"; include 'common/gauche.php'; ?>

	<div id="corps">
		<? include 'common/nav.php'; ?>
		<div id="content">
	<? // ************************************************************************************************************* 

	$id = $_GET['id'];

	/* Partie PHP de recuperation de donnees par SQL */

	include 'common/config.inc.php';

	$connect = mysql_connect($hote, $user, $password);
	mysql_select_db($base, $connect);

	$requete = mysql_query("SELECT * FROM ".$prefixe."fiche_soft WHERE id='$id'");
	$logiciel = mysql_fetch_array($requete);

	mysql_close($connect); 

	require('softs/ajaxstarrater/_drawrating.php');
	include 'common/fonctions.php';

	?>

		<img style="float: right;" src="<? echo icon64($logiciel['id'], $iconspack); ?>" />
		<h3 class="nom"><? echo $logiciel['nom']; ?></h3>
		<p class="short_desc"><? echo $logiciel['short_desc']; ?></p>

		<div class="note"><?php echo rating_bar($logiciel['id'],'5'); ?></div>

		<ul id="tabnav">
		     <li><a href="fiche.php?id=<? echo $id; ?>">Fiche <? echo $titrepage; ?></a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=tests">Tests</a></li>
		     <li class="active"><a href="#">Fiche Framasoft</a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=diaspora">Discussions Diaspora*</a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=wikipedia">Page Wikipedia</a></li>
		</ul>


		<h3 class="titre">Voici le contenu de la fiche Framasoft<span style="float: right;"><a class="a_img" href="cache/framasoft.php?id=<? echo $id.'&id_framasoft='.$logiciel['id_framasoft']; ?>"><img src="icons-pack/<? echo $iconspack; ?>/reload.png" alt="reload" /></a> <a class="a_img" href="admin.php?id=delete&value=<? echo $id; ?>"><img src="icons-pack/<? echo $iconspack; ?>/page_delete.png" alt="delete" /></a> <a class="a_img" href="admin.php?id=edit&idsoft=<? echo $id; ?>"><img src="icons-pack/<? echo $iconspack; ?>/page_edit.png" alt="edit" /></a>&nbsp;</span></h3><hr />

		<br />

<?

if ($logiciel['id_framasoft'] == 0) {

?>

			<br /><div class="attention"><p>Aucune fiche Framasoft n'est li&eacute;e &agrave; ce logiciel...</p></div>

<?

}

else if (file_exists('cache/framasoft/'.$id.'.txt')) {

$fichier = fopen('cache/framasoft/'.$id.'.txt', 'r');
$article = fgets($fichier);
$auteurs = fgets($fichier);
fclose($fichier);

?>
			<? echo $article; ?>
			<div style="color: #B8A98F; float: right; font-size: 12px; margin-top: 3px;">Fiche trouv&eacute;e sur <a style="text-decoration: none;" href="http://framasoft.net/">Framasoft</a> et &eacute;crite par <? echo $auteurs; ?>.</div>

<? }

else { ?>

			<br /><div class="attention"><p>Erreur, fiche introuvable, veuillez actualiser en <a href="cache/framasoft.php?id=<? echo $id.'&id_framasoft='.$logiciel['id_framasoft']; ?>">cliquant</a> sur l'ic&ocirc;ne d'actualisation ci-dessus...</p></div>
<? } ?>
		</div>
	</div>

	<? include 'common/bottom.php'; ?>
	</body>
	</html>

<? }

else { ?>

	<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Fiche - <? echo $titrepage; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
		<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
		<link href="common/fiche.css" rel="stylesheet" type="text/css" media="screen" />
		<link rel="icon" type="image/png" href="icons-pack/<? echo $iconspack; ?>/oss.png" />
		<script language="JavaScript" type="text/javascript">
		window.onload = function() { 
			initHeader();
		}
		</script>
		<script language="JavaScript" type="text/javascript" src="softs/shadowbox/shadowbox.js"></script>
		<link href="softs/shadowbox/shadowbox.css" rel="stylesheet" type="text/css" media="screen" />
		<script type='text/javascript'> // Configuration de Shadowbox
			Shadowbox.init({
				language:   'fr',
				players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
				});
		</script>
		<script type="text/javascript" language="javascript" src="softs/ajaxstarrater/js/behavior.js"></script>
		<script type="text/javascript" language="javascript" src="softs/ajaxstarrater/js/rating.js"></script>
		<link rel="stylesheet" type="text/css" href="softs/ajaxstarrater/css/rating.css" />
	</head>
	<body>
	<? include 'common/header.php'; ?>
	<? $page="fiche"; $admin="non"; include 'common/gauche.php'; ?>

	<div id="corps">
		<? include 'common/nav.php'; ?>
		<div id="content">
	<? // ************************************************************************************************************* 

	$id = $_GET['id'];

	/* Partie PHP de recuperation de donnees par SQL */

	include 'common/config.inc.php';

	$connect = mysql_connect($hote, $user, $password);
	mysql_select_db($base, $connect);

	$requete = mysql_query("SELECT nom FROM ".$prefixe."fiche_soft WHERE id='$id'");
	$nom_logiciel = mysql_fetch_array($requete);
	$requete = mysql_query("SELECT * FROM ".$prefixe."fiche_soft WHERE id='$id'");
	$logiciel = mysql_fetch_array($requete);

	// Calcul du nombre de screen :

	$chaine = $logiciel['screen'];

	foreach (count_chars($chaine, 1) as $i => $val) {
		if (chr($i) == "|") {
			$nb_screen = $val + 1;
		}
	}
	if ($chaine == NULL) {
		$nb_screen = 0;
	}
	if ($chaine != NULL AND $nb_screen == NULL) {
		$nb_screen = 1;
	}

	// Calcul du nombre de langues :

	$chaine = $logiciel['langue'];

	foreach (count_chars($chaine, 1) as $i => $val) {
		if (chr($i) == "|") {
			$nb_langue = $val + 1;
		}
	}
	if ($chaine == NULL) {
		$nb_langue = 0;
	}
	if ($chaine != NULL AND $nb_langue == NULL) {
		$nb_langue = 1;
	}

	// Calcul du nombre d'os :

	$chaine = $logiciel['os'];

	foreach (count_chars($chaine, 1) as $i => $val) {
		if (chr($i) == "|") {
			$nb_os = $val + 1;
		}
	}
	if ($chaine == NULL) {
		$nb_os = 0;
	}
	if ($chaine != NULL AND $nb_os == NULL) {
		$nb_os = 1;
	}

	mysql_close($connect); 

	// ********************** Traitement, on choisit ce que l'on va faire ***********

	if ($_GET['id'] == $logiciel['id'] AND $_GET['id'] != NULL) {

		require('softs/ajaxstarrater/_drawrating.php');
		include 'common/fonctions.php';
		?>

		<?
		if ($logiciel['invisible'] == 1) { ?>
		
		<div class="attention"><p>Cette notice n'est pas encore index&eacute;e car elle n'as pas &eacute;t&eacute; valid&eacute;e par un administrateur d'<? echo $titrepage; ?>. Nous vous conseillons de v&eacute;rifier le contenu...</p></div>

		<? } ?>

		<img style="float: right;" src="<? echo icon64($logiciel['id'], $iconspack); ?>" />
		<h3 class="nom"><? echo $nom_logiciel['nom']; ?></h3>
		<p class="short_desc"><? echo $logiciel['short_desc']; ?></p>

		<div class="note"><?php echo rating_bar($logiciel['id'],'5'); ?></div>

		<ul id="tabnav">
		     <li class="active"><a href="#">Fiche <? echo $titrepage; ?></a></li>
		     <li><a href="fiche.php?option=tests&id=<? echo $id; ?>">Tests</a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=framasoft">Fiche Framasoft</a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=diaspora">Discussions Diaspora*</a></li>
		     <li><a href="fiche.php?id=<? echo $id; ?>&option=wikipedia">Page Wikipedia</a></li>
		</ul>


		<h3 class="titre">D&eacute;tails<span style="float: right;"><a class="a_img" href="admin.php?id=delete&value=<? echo $id; ?>"><img src="icons-pack/<? echo $iconspack; ?>/page_delete.png" alt="delete" /></a> <a class="a_img" href="admin.php?id=edit&idsoft=<? echo $id; ?>"><img src="icons-pack/<? echo $iconspack; ?>/page_edit.png" alt="edit" /></a>&nbsp;</span></h3><hr />

		<!-- ******** Affichage des Screen ******** -->

		<? if ($nb_screen != 0) { ?>
			<div class="screen">
			<p style="margin: 0; padding: 0;">
			<? for ($i = 0; $i < $nb_screen; $i++) { 
				$attributs = explode('|', $logiciel['screen']);
				?>
				<a class="screen_img" title="<? echo $nom_logiciel['nom'].' - '.$attributs[$i]; ?>" rel="shadowbox['screen']" href="./screen/<? echo $logiciel['id'].'_'.$i; ?>.png">
				<img src="softs/phpthumb/phpThumb.php?src=../../screen/<? echo $logiciel['id'].'_'.$i; ?>.png&h=100&f=png" />
				</a>
			<? } ?>
			</p>
			</div>
		<? } ?>


		<ul style="list-style-type: none;"><li><b>Version :</b> <? echo $logiciel['version']; ?></li>
		<li><b>Taille :</b> <? echo $logiciel['taille']; ?></li>
		<li><b>Site officiel :</b> <a href="<? echo $logiciel['site']; ?>"><? echo $logiciel['site']; ?></a></li>
		<li><b>Licence :</b> <? echo $logiciel['licence']; ?></li>
		<li><b><acronym title="Operating System">OS</acronym> :</b>
			<? for ($i = 0; $i < $nb_os; $i++) { 
			$attributs = explode('|', $logiciel['os']);
			echo '<img src="common/images/'.$attributs[$i].'.gif" alt="'.$attributs[$i].'" /> '; 
			} ?></li>
		<li><b>Date :</b> <? echo $logiciel['date']; ?></li>
		<li><b>Langue(s) :</b>
			<? for ($i = 0; $i < $nb_langue; $i++) { 
			$attributs = explode('|', $logiciel['langue']);
			if ($attributs[$i] != '...') {
				echo '<img src="drapeaux/'.$attributs[$i].'.png" alt="'.$attributs[$i].'" /> '; 
			}
			else { echo '...'; }
			}
			?></li>
		</ul>

		<h3 class="titre">Description</h3><hr />

		<p>
		<? echo $logiciel['description']; ?>
		</p>

		<br /><div><br /><p><a class="button buttonOrange" href="<? echo $logiciel['telecharger']; ?>" >T&eacute;l&eacute;charger</a><br /><br /><br /><br /></p></div>

		<?

	}

	else {
		?>
		<h3 class="nom">Erreur</h3>
		<p class="short_desc">La fiche recherch&eacute;e n'existe pas.</p>
		<?
	}

	// ************************************************************************************************************* ?>
		</div>
	</div>

	<? include 'common/bottom.php'; ?>
	</body>
	</html>

<? } ?>