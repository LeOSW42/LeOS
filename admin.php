<?

include ('common/session.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Administration - OpenSourceSoft</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
	<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
	<link href="common/admin.css" rel="stylesheet" type="text/css" media="screen" />
	<link rel="icon" type="image/png" href="icons-pack/<? echo $iconspack; ?>/oss.png" />
	<link rel="stylesheet" href="softs/tinyeditor/style.css" />
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
</head>
<body>
<? include 'common/header.php'; ?>
<? $admin='oui'; $page="admin".$_GET['id']; include 'common/gauche.php'; ?>

<div id="corps">
	<? include 'common/nav.php'; ?>
	<div id="content">
<? // ************************************************************************************************************* 

$id = $_GET['id'];

if ($id == 'new') { include 'admin/new.php'; }
else if ($id == 'new_valid') { include 'admin/new_valid.php'; }
else if ($id == 'edit') { include 'admin/edit.php'; }
else if ($id == 'edit_valid') { include 'admin/edit_valid.php'; }
else if ($id == 'delete') { include 'admin/delete.php'; }
else if ($id == 'log') { include 'admin/logs.php'; }
else if ($id == 'superadmin') { include 'admin/superadmin.php'; }

else {
	?>

	<h3 class="nom">Administration</h3>
	<p class="short_desc">Accueil de l'administration</p>

	<h3 class="titre">Diff&eacute;rentes t&acirc;ches disponibles</h3><hr />

	<ul style="list-style-type: none;"><li><b><a href="admin.php?id=new">Ajout d'un logiciel</a></b> - Ouvre le formulaire pour ajouter un logiciel</li>
	<li><b><a href="admin.php?id=edit">Modification d'un logiciel</a></b> - Ouvre le m&ecirc;me formulaire pr&eacute;rempli pour l'&eacute;dition</li>
	<li><b><a href="admin.php?id=delete">Suppression d'un logiciel</a></b> - Supprimme un logiciel (mot de passe requis)</li>
<!--	<li><b><a href="admin.php?id=newdl">Ajout d'un t&eacute;l&eacute;chargement</a></b> - Ouvre le formulaire pour ajouter un t&eacute;l&eacute;chargement</li>
	<li><b><a href="admin.php?id=editdl">Modification d'un t&eacute;l&eacute;chargement</a></b> - Ouvre le m&ecirc;me formulaire pr&eacute;rempli pour l'&eacute;dition</li>
	<li><b><a href="admin.php?id=deletedl">Suppression d'un t&eacute;l&eacute;chargement</a></b> - Supprimme un t&eacute;l&eacute;chargement (mot de passe requis)</li> -->
	<li><b><a href="admin.php?id=log">Voir les logs</a></b> - Affiche les logs d'administration</li>
	</ul>

<? }


// ************************************************************************************************************* ?>
	</div>
</div>

<? include 'common/bottom.php'; ?>
</body>
</html>
