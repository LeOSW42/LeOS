<?

include ('common/session.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Cat&eacute;gorie - <? echo $titrepage; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
	<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
	<link href="common/categorie.css" rel="stylesheet" type="text/css" media="screen" />
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
<? $page="cat".$_GET['catid']; $admin="non"; include 'common/gauche.php'; ?>

<div id="corps">
	<? include 'common/nav.php'; ?>
	<div id="content">
<? // ************************************************************************************************************* ?>

<? // Calcul de la categorie a traiter...

$id = $_GET['catid'];
if ($id==5) { $cat = '5 OR categorie=500 AND invisible=0 OR categorie=501 AND invisible=0 OR categorie=502 AND invisible=0 OR categorie=503 AND invisible=0 OR categorie=504 AND invisible=0 OR categorie=505 AND invisible=0 OR categorie=506'; $cattitre = 'Graphisme'; }
else if ($id==6) { $cat = '6 OR categorie=600 AND invisible=0 OR categorie=601 AND invisible=0 OR categorie=602 AND invisible=0 OR categorie=603'; $cattitre = 'Internet'; }
else if ($id==7) { $cat = '7 OR categorie=700 AND invisible=0 OR categorie=701 AND invisible=0 OR categorie=702 AND invisible=0 OR categorie=703 AND invisible=0 OR categorie=704 AND invisible=0 OR categorie=705 AND invisible=0 OR categorie=706'; $cattitre = 'Jeux'; }
else if ($id==9) { $cat = '9 OR categorie=900 AND invisible=0 OR categorie=901 AND invisible=0 OR categorie=902 AND invisible=0 OR categorie=903 AND invisible=0 OR categorie=904 AND invisible=0 OR categorie=905 AND invisible=0 OR categorie=906 AND invisible=0 OR categorie=907 AND invisible=0 OR categorie=908 AND invisible=0 OR categorie=909'; $cattitre = 'Science & ing&eacute;nierie'; }
else if ($id==12) { $cat = '12 AND invisible=0 OR categorie=1200 AND invisible=0 OR categorie=1201 AND invisible=0 OR categorie=1202 AND invisible=0 OR categorie=1203 AND invisible=0 OR categorie=1204 AND invisible=0 OR categorie=1205 AND invisible=0 OR categorie=1206 AND invisible=0 OR categorie=1207 AND invisible=0 OR categorie=1208 AND invisible=0 OR categorie=1209 AND invisible=0 OR categorie=1210 AND invisible=0 OR categorie=1211 AND invisible=0 OR categorie=1212 AND invisible=0 OR categorie=1213 AND invisible=0 OR categorie=1214 AND invisible=0 OR categorie=1215'; $cattitre = 'Outils pour d&eacute;veloppeurs'; }
else { $cat = $id; }

// On affiche les sous-catégories

if ($id==5) { ?>
	<div id="categorie"><div id="cat_titre">Graphisme</div>
		<a href="categorie.php?catid=500" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/3D.png" alt="" /><br />3D</a>
		<a href="categorie.php?catid=501" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/afficheurs.png" alt="" /><br />Afficheurs</a>
		<a href="categorie.php?catid=502" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/dessin.png" alt="" /><br />Dessin</a>
		<a href="categorie.php?catid=503" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/graphisme_.png" alt="" /><br />Graphisme</a>
		<a href="categorie.php?catid=504" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/numerisation-&-reconnaissance-optique-des-caracteres.png" alt="" /><br />Num&eacute;risation & reconnaissance optiques des caract&egrave;res</a>
		<a href="categorie.php?catid=505" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/photographie.png" alt="" /><br />Photographie</a>
		<a href="categorie.php?catid=506" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/publication.png" alt="" /><br />Publication</a>
	<div style="clear: both;"></div>
	</div>
	<div id="creditimage"><? echo _('icones-par');?> <? include 'icons-pack/'.$iconspack.'/credits'; ?></div>
	<hr />
<? }
else if ($id==6) { ?>
	<div id="categorie"><div id="cat_titre">Internet</div>
		<a href="categorie.php?catid=600" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/courriel.png" alt="" /><br />Courriel</a>
		<a href="categorie.php?catid=601" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/messagerie-instantanee.png" alt="" /><br />Messagerie Instantan&eacute;e</a>
		<a href="categorie.php?catid=602" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/navigateurs-web.png" alt="" /><br />Navigateurs Web</a>
		<a href="categorie.php?catid=603" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/partage-de-fichiers.png" alt="" /><br />Partage de fichiers</a>
	<div style="clear: both;"></div>
	</div>
	<div id="creditimage"><? echo _('icones-par');?> <? include 'icons-pack/'.$iconspack.'/credits'; ?></div>
	<hr />
<? }
else if ($id==7) { ?>
	<div id="categorie"><div id="cat_titre">Jeux</div>
		<a href="categorie.php?catid=700" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/casse-tetes.png" alt="" /><br />Casse-t&ecirc;tes</a>
		<a href="categorie.php?catid=701" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/none.png" alt="" /><br />Jeux d'arcade</a>
		<a href="categorie.php?catid=702" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/jeux-de-cartes.png" alt="" /><br />Jeux de cartes</a>
		<a href="categorie.php?catid=703" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/jeux-de-plateau.png" alt="" /><br />Jeux de plateau</a>
		<a href="categorie.php?catid=704" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/jeux-de-roles.png" alt="" /><br />Jeux de r&ocirc;les</a>
		<a href="categorie.php?catid=705" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/simulation.png" alt="" /><br />Simulation</a>
		<a href="categorie.php?catid=706" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/sports.png" alt="" /><br />Sports</a>
	<div style="clear: both;"></div>
	</div>
	<div id="creditimage"><? echo _('icones-par');?> <? include 'icons-pack/'.$iconspack.'/credits'; ?></div>
	<hr />
<? }
else if ($id==9) { ?>
	<div id="categorie"><div id="cat_titre">Science & ing&eacute;nierie</div>
		<a href="categorie.php?catid=900" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/astronomie.png" alt="" /><br />Astronomie</a>
		<a href="categorie.php?catid=901" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/biologie.png" alt="" /><br />Biologie</a>
		<a href="categorie.php?catid=902" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/chimie.png" alt="" /><br />Chimie</a>
		<a href="categorie.php?catid=903" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/electronique.png" alt="" /><br />&Eacute;lectronique</a>
		<a href="categorie.php?catid=904" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/geographie.png" alt="" /><br />G&eacute;ographie</a>
		<a href="categorie.php?catid=905" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/geologie.png" alt="" /><br />G&eacute;ologie</a>
		<a href="categorie.php?catid=906" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/informatique-&-robotique.png" alt="" /><br />Informatique & robotique</a>
		<a href="categorie.php?catid=907" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/ingenierie.png" alt="" /><br />Ing&eacute;nierie</a>
		<a href="categorie.php?catid=908" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/mathematiques.png" alt="" /><br />Math&eacute;matiques</a>
		<a href="categorie.php?catid=909" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/physique.png" alt="" /><br />Physique</a>
	<div style="clear: both;"></div>
	</div>
	<div id="creditimage"><? echo _('icones-par');?> <? include 'icons-pack/'.$iconspack.'/credits'; ?></div>
	<hr />
<? }else if ($id==12) { ?>
	<div id="categorie"><div id="cat_titre">Outils pour d&eacute;veloppeurs</div>
		<a href="categorie.php?catid=1200" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/none.png" alt="" /><br />Analyse</a>
		<a href="categorie.php?catid=1201" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/none.png" alt="" /><br />Biblioth&egrave;ques</a>
		<a href="categorie.php?catid=1202" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/conception-d-interfaces-graphiques.png" alt="" /><br />Conception d'intefaces graphiques</a>
		<a href="categorie.php?catid=1203" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/none.png" alt="" /><br />Contr&ocirc;le de version</a>
		<a href="categorie.php?catid=1204" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/debogage.png" alt="" /><br />D&eacute;bogage</a>
		<a href="categorie.php?catid=1205" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/developpement-web.png" alt="" /><br />D&eacute;veloppement Web</a>
		<a href="categorie.php?catid=1206" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/none.png" alt="" /><br />EDI</a>
		<a href="categorie.php?catid=1207" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/haskell.png" alt="" /><br />Haskell</a>
		<a href="categorie.php?catid=1208" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/java.png" alt="" /><br />Java</a>
		<a href="categorie.php?catid=1209" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/none.png" alt="" /><br />Lisp</a>
		<a href="categorie.php?catid=1210" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/mono-CLI.png" alt="" /><br />Mono/CLI</a>
		<a href="categorie.php?catid=1211" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/none.png" alt="" /><br />OCalm</a>
		<a href="categorie.php?catid=1212" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/none.png" alt="" /><br />Perl</a>
		<a href="categorie.php?catid=1213" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/python.png" alt="" /><br />Python</a>
		<a href="categorie.php?catid=1214" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/ruby.png" alt="" /><br />Ruby</a>
		<a href="categorie.php?catid=1215" class="categorie"><img src="icons-pack/<? echo $iconspack; ?>/traduction.png" alt="" /><br />Traduction</a>
	<div style="clear: both;"></div>
	</div>
	<div id="creditimage"><? echo _('icones-par');?> <? include 'icons-pack/'.$iconspack.'/credits'; ?></div>
	<hr />
<? }

// On cherche dans le SQL la liste des applications

include("common/config.inc.php");
$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base, $connect);

	// Nombre de lignes
	$retour = mysql_query("SELECT * FROM ".$prefixe."fiche_soft WHERE categorie=".$cat." AND invisible=0");
	$nblignes = mysql_num_rows($retour);
  
// On affiche la liste des applications

include("common/fonctions.php");

for($i=0; $i<$nblignes; $i++) {
	$ip = $i + 1;
	$retour = mysql_query("SELECT id, nom, short_desc FROM ".$prefixe."fiche_soft WHERE categorie=".$cat." AND invisible=0 ORDER BY nom ASC LIMIT ".$i.", ".$ip);
	$contenu = mysql_fetch_array($retour);

	echo '<a class="liste" href="fiche.php?id='.$contenu[0].'">';
	echo '<table style="width: 100%;"><tbody><tr><td style="width: 32px;"><img class="img_liste" src="'.icon($contenu[0], $iconspack).'" alt="" /></td>';
	echo '<td><p class="nom_liste">'.$contenu[1].'</p>';
	echo '<p class="short_desc_liste">'.$contenu[2].'</p></td>';
	echo '<td style="width: 20px; text-align: center; font-family: impact, courrier, ubuntu; font-weight: bold;">'.$ip.'</td></tr></tbody></table>';
	echo '</a>';
}

if($nblignes == 0) {
	echo '<a class="liste" href="#">';
	echo '<table><tbody><tr><td><img class="img_liste" src="'.icon('opensourcesoft', $iconspack).'" alt="" /></td>';
	echo '<td><p class="nom_liste">Il n\' y a aucun logiciel dans cette cat&eacute;gorie.</p>';
	echo '<p class="short_desc_liste">Contribuez et ajoutez un logiciel, allez dans Aide pour plus d\'informations.</p></td></tr></tbody></table>';
	echo '</a>';
}

// On affiche le bouton pour afficher la suite et l'alphabet


mysql_close();

?>

<? // ************************************************************************************************************* ?>
	</div>
</div>

<? include 'common/bottom.php'; ?>
</body>
</html>
