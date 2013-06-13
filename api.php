<?

include ('common/session.php');

?>

<?

$id = $_GET['id'];
$css = $_GET['css'];
$frame = $_GET['frame'];
$mode = $_GET['mode'];

/* Partie PHP de recuperation de donnees par SQL */

include 'common/config.inc.php';

$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base, $connect);

$requete = mysql_query("SELECT * FROM ".$prefixe."fiche_soft WHERE id='$id'");
$logiciel = mysql_fetch_array($requete);

mysql_close($connect); 

// ********************** Traitement, on choisit ce que l'on va faire ***********

if ($_GET['id'] == $logiciel['id'] AND $_GET['id'] != NULL) {

	include 'common/fonctions.php';

	if ($mode == 'bouton') {

	if ($frame == 'oui') { echo '<html><body style="margin: 0;">'; }
	if ($css != 'no') { echo '<div id="LeOSConteneur" style="font-family: Ubuntu; width: 200px; height: 32px;">'; }

	?>

	<img id="ImageBoutonLeOS" <? if ($css != 'no') { ?>style="float: right;"<? } ?> src="http://<? echo $_SERVER['HTTP_HOST']; ?>/<? echo icon($logiciel['id'], 'faenza'); ?>" />

	<div id="ConteneurBoutonLeOS" <? if ($css != 'no') { ?>style="width: 194px; line-height: 20px; padding: 4px 0 4px 0;"<? } ?>>
		<div id="StyleBoutonLeOS" <? if ($css != 'no') { ?>style="background: url('http://<? echo $_SERVER['HTTP_HOST']; ?>/common/images/BackButtonOrange.png') repeat-x scroll center top white; border: 2px solid #E86205; -moz-border-radius: 8px;"<? } ?>>
			<a id="LienBoutonLeOS" <? if ($css != 'no') { ?>style="text-decoration: none;"<? } ?> href="http://<? echo $_SERVER['HTTP_HOST']; ?>/fiche.php?id=<? echo $logiciel['id']; ?>">
				<p id="TexteBoutonLeOS" <? if ($css != 'no') { ?>style="color: white; padding: 0 0 0 5px; margin: 0; height: 20px; overflow: hidden;"<? } ?>><b><? echo $logiciel['nom']; ?></b> - <? echo $logiciel['version']; ?></p>
			</a>
		</div>
	</div>
	<?

	if ($css != 'no') { echo '</div>'; }
	if ($frame == 'oui') { echo '</body></html>'; }

	}

	else if ($mode == 'inline') {

	if ($css != 'no') { echo '<span id="LeOSConteneur" style="font-family: Ubuntu; width: 200px; height: 32px; margin: 0 15px 0 -36px;">'; }

	?>

	<img id="ImageBoutonLeOS" <? if ($css != 'no') { ?>style="position: relative; left: 150px; top: 10px;"<? } ?> src="http://<? echo $_SERVER['HTTP_HOST']; ?>/<? echo icon($logiciel['id'], 'faenza'); ?>" />

	<span id="ConteneurBoutonLeOS" <? if ($css != 'no') { ?>style="width: 189px; line-height: 20px; padding: 4px 0 4px 0;"<? } ?>>
		<span id="StyleBoutonLeOS" <? if ($css != 'no') { ?>style="background: url('http://<? echo $_SERVER['HTTP_HOST']; ?>/common/images/BackButtonVert.png') repeat-x scroll center top white; border: 2px solid #36AF38; -moz-border-radius: 8px;"<? } ?>>
			<a id="LienBoutonLeOS" <? if ($css != 'no') { ?>style="text-decoration: none;"<? } ?> href="http://<? echo $_SERVER['HTTP_HOST']; ?>/fiche.php?id=<? echo $logiciel['id']; ?>">
				<span id="TexteBoutonLeOS" <? if ($css != 'no') { ?>style="color: white; padding: 0 18px 0 5px; margin: 0; height: 20px; overflow: hidden;"<? } ?>><b><? echo $logiciel['nom']; ?></b> - <? echo $logiciel['version']; ?></span>
			</a>
		</span>
	</span>
	<?
	if ($css != 'no') { echo '</span>'; }
	if ($frame == 'oui') { echo '</body></html>'; }

	}

	else {
		?>
		<h3 style="font-size: 16px;">Mode inconnu</h3>
		<?
	}

}

else {
	?>

	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Faire un lien - <? echo $titrepage; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
		<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
		<link href="common/aide.css" rel="stylesheet" type="text/css" media="screen" />
		<link rel="icon" type="image/png" href="icons-pack/<? echo $iconspack; ?>/LeOS.png" />
		<script language="JavaScript" type="text/javascript">
		window.onload = function() { 
			initHeader();
		}
		</script>
	</head>
	<body>
	<? include 'common/header.php'; ?>
	<? $page='api'; $admin="non"; include 'common/gauche.php'; ?>

	<div id="corps">
		<? include 'common/nav.php'; ?>
		<div id="content">
	<? // ************************************************************************************************************* ?>
	<img style="float: right;" src="icones/64/help.png" />
	<h1 class='nom'>Faire un lien...</h3>
	<p class="short_desc">Des petits gadgets &agrave; int&eacute;grer &agrave; votre site...</p>

	<h3 class="titre">Faire un lien texte vers le site...</h3><hr />
		<p><u>Exemple :</u></p>
		<p><a href="http://<? echo $_SERVER['HTTP_HOST']; ?>/" title="L'encyclop&eacute;die des logiciels libres"><? echo $titrepage; ?></a></p><br />
		<p><u>Code HTML &agrave; ins&eacute;rer :</u></p>
		<p><textarea style="width: 100%;"><a href="http://<? echo $_SERVER['HTTP_HOST']; ?>/" title="L'encyclop&eacute;die des logiciels libres"><? echo $titrepage; ?></a></textarea></p>
		Ce code doit &ecirc;tre ins&eacute;r&eacute; dans une page HTML. Vous pouvez donc l'int&eacute;grer &agrave; votre site web si vous en &ecirc;tes le webmaster, &agrave; votre CMS (WordPress, phpBB...) si vous en &ecirc;tes l'administrateur...</p>
		<br /><br />
	<? /* <h3 class="titre">Utiliser un bouton HTML/CSS vers une application de l'encyclop&eacute;die</h3><hr />
		<p><u>Exemple : </u></p>
		<iframe src="http://<? echo $_SERVER['HTTP_HOST']; ?>/api.php?id=firefox&mode=bouton&frame=oui" width=200 height=32 scrolling=no frameborder=0></iframe>
		<p><u>Code HTML &agrave; ins&eacute;rer :</u></p>
		<p><textarea style="width: 100%;"><iframe src="http://<? echo $_SERVER['HTTP_HOST']; ?>/api.php?id=firefox&mode=bouton&frame=oui" width=200 height=32 scrolling=no frameborder=0></iframe></textarea></p>
		<p>Ici vous avez plein d'option... Voici une liste de ce que vous pouvez faire :</p>
		<ul>
			<li>Choisir le logiciel &agrave; afficher. Il suffit de changer l'id du logiciel dans la ligne du lien.</li>
			<li>Vous &ecirc;tes oblig&eacute; de laisser mode=bouton ou un message d'erreur apparaitra.</li>
			<li>Le frame=oui permet d'inclure les balises html et body. Vous pouvez l'enlever si votre usage est diff&eacute;rent.</li>
			<li>Si l'id n'existe pas alors la pr&eacute;sente page apparaitra.</li>
			<li>Si vous voulez utiliser votre propre CSS, vous pouvez ajouter &css=no. Chaque balise porte un id diff&eacute;rent qui vous permet de personaliser ce bouton.</li>
		</ul> */ ?>

	<h3 class="titre">Utiliser un bouton HTML/CSS vers une application de l'encyclop&eacute;die (via PHP)</h3><hr />
		<p><u>Exemple : </u></p>
		<?

		$id = 'firefox';

		$connect = mysql_connect($hote, $user, $password);
		mysql_select_db($base, $connect);

		$requete = mysql_query("SELECT * FROM ".$prefixe."fiche_soft WHERE id='$id'");
		$logiciel = mysql_fetch_array($requete);

		mysql_close($connect);

		include 'common/fonctions.php';

		if ($frame == 'oui') { echo '<html><body style="margin: 0;">'; }
		if ($css != 'no') { echo '<div id="LeOSConteneur" style="font-family: Ubuntu; width: 200px; height: 32px;">'; }

		?>

		<img id="ImageBoutonLeOS" <? if ($css != 'no') { ?>style="float: right;"<? } ?> src="http://<? echo $_SERVER['HTTP_HOST']; ?>/<? echo icon($logiciel['id'], 'faenza'); ?>" />

		<div id="ConteneurBoutonLeOS" <? if ($css != 'no') { ?>style="width: 194px; line-height: 20px; padding: 4px 0 4px 0;"<? } ?>>
			<div id="StyleBoutonLeOS" <? if ($css != 'no') { ?>style="background: url('http://<? echo $_SERVER['HTTP_HOST']; ?>/common/images/BackButtonOrange.png') repeat-x scroll center top white; border: 2px solid #E86205; -moz-border-radius: 8px;"<? } ?>>
				<a id="LienBoutonLeOS" <? if ($css != 'no') { ?>style="text-decoration: none;"<? } ?> href="http://<? echo $_SERVER['HTTP_HOST']; ?>/fiche.php?id=<? echo $logiciel['id']; ?>">
					<p id="TexteBoutonLeOS" <? if ($css != 'no') { ?>style="color: white; padding: 0 0 0 5px; margin: 0; height: 20px; overflow: hidden;"<? } ?>><b><? echo $logiciel['nom']; ?></b> - <? echo $logiciel['version']; ?></p>
				</a>
			</div>
		</div>
		<?

		if ($css != 'no') { echo '</div>'; }
		if ($frame == 'oui') { echo '</body></html>'; } ?>
		<p><u>Code PHP &agrave; ins&eacute;rer :</u></p>
		<p><textarea style="width: 100%;">&lt;? $boutonLeOS = file_get_contents('http://<? echo $_SERVER['HTTP_HOST']; ?>/api.php?id=firefox&amp;mode=bouton');
	echo $boutonLeOS; ?&gt;</textarea></p>
		<p>Ici vous avez plein d'option... Voici une liste de ce que vous pouvez faire :</p>
		<ul>
			<li>Choisir le logiciel &agrave; afficher. Il suffit de changer l'id du logiciel dans la ligne du lien.</li>
			<li>Vous &ecirc;tes oblig&eacute; de laisser mode=bouton ou un message d'erreur apparaitra.</li>
			<li>Le frame=oui permet d'inclure les balises html et body. Vous pouvez l'ajouter si votre usage est diff&eacute;rent (via un iframe).</li>
			<li>Si l'id n'existe pas alors la pr&eacute;sente page apparaitra.</li>
			<li>Si vous voulez utiliser votre propre CSS, vous pouvez ajouter &amp;css=no. Chaque balise porte un id diff&eacute;rent qui vous permet de personaliser ce bouton.</li>
		</ul>

	<? // ************************************************************************************************************* ?>
		</div>
	</div>

	<? include 'common/bottom.php'; ?>
	</body>
	</html>

	<?
}

// ************************************************************************************************************* ?>
