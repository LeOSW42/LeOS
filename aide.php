<?

include ('common/session.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Aide - <? echo $titrepage; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
	<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
	<link href="common/aide.css" rel="stylesheet" type="text/css" media="screen" />
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
<? $page='aide'; $admin="non"; include 'common/gauche.php'; ?>

<div id="corps">
	<? include 'common/nav.php'; ?>
	<div id="content">
<? // ************************************************************************************************************* ?>
<img style="float: right;" src="icones/64/help.png" />
<h1 class='nom'>Aide</h3>
<p class="short_desc">L'aide du site <? echo $titrepage; ?></p>

<div class="sommaire"><p class="sommaire_titre">Sommaire</p>
	<ul><li><a href="#presentation">Pr&eacute;sentation</a></li>
	<li><a href="#navigation">Navigation au sein du site</a></li>
	<li>Administration</li>
		<ul><li><a href="#ajout_log">Ajouter un logiciel</a></li>
		<li><a href="#editer_log">&Eacute;diter un logiciel</a></li>
		<li><a href="#supprimer_log">Supprimer un logiciel</a></li>
		</ul>
	</ul>
</div>

<h3 class="titre" id="presentation">Pr&eacute;sentation</h3><hr />
	<p><? echo $titrepage; ?> est un site web bas&eacute; sur le design de la logith&egrave;que d'Ubuntu de Michael Vogt.<br />
	Il a pour but de pr&eacute;senter les logiciels libres au plus de monde que possible, c'est-&agrave;-dire aux utilisateurs de tous les <acronym title="Operating System">OS</acronym>, de tous les niveaux dans le domaine de l'informatique, et de toutes les utilisations possibles...<br />
	<b>Ce site web est ouvert &agrave; tous</b> : tout le monde peux visiter, t&eacute;l&eacute;charger, ajouter, &eacute;diter, supprimer des applications (bien qu'une &eacute;quipe de mod&eacute;ration passe par derri&egrave;re dans le seul but de v&eacute;rifier que vous ne d&eacute;truisiez pas le travail des autres).</p>

<h3 class="titre" id="navigation">Navigation au sein du site</h3><hr />
	<p>Le site est compos&eacute; d'une multitude de pages, voici une liste sommaire qui vous explique comment les utiliser :
		<ul><li><b>L'accueil</b> - Vous avez acc&egrave;s &agrave; toutes les pages du site, aux cat&eacute;gories, au pages sp&eacute;ciales, au t&eacute;l&eacute;chargement, au r&eacute;seau et aux pages d'administration.</li>
		<li><b>Les cat&eacute;gories</b> - Elles vous permettent de choisir votre page en fonction de la cat&eacute;gorie du logiciel recherch&eacute;.</li>
		<li><b>La recherche</b> - Elle est r&eacute;alis&eacute;e par un moteur de recherche externe au site le temps qu'un interne soit implant&eacute;, vous y avez acc&egrave;s depuis le haut de la partie de droite. Nous remercions l'équipe derrière <a href="http://seeks.fr/">seeks</a> pour leur moteur de recherche.</li>
		<li><b>Les fiches logicielles</b> - C'est le contenu pr&eacute;cieux du site, les fiches contiennent tous les logiciels qui vont sont propos&eacute;s. <i>Note : vous pouvez savoir leur nombre sur le bas de la page.</i></li>
		<li><b>L'aide</b> - Vous y &ecirc;tes dessus, alors je vous laisse la d&eacute;couvrir.</li>
		<li><b>Les applications phare</b> - Ce sont les applications que l'&eacute;quipe du site vous propose, elles peuvent changer de temps &agrave; autres.</li>
		<li><b>Le logiciel al&eacute;atoire</b> - Cette page affiche une fiche logicielle au hazard parmis notre base de donn&eacute;e.</li>
		<li><b>Les derni&egrave;res mises &agrave; jour</b> - Ce sont les derni&egrave;res applications a avoir &eacute;t&eacute; mise &agrave; jour ou cr&eacute;&eacute;. Elles sont class&eacute;es par la date de version et non la date de postage de la fiche.</li>
		<li><b>Le t&eacute;l&eacute;chargement</b> - Une cat&eacute;gorie &agrave; part qui vous permet de t&eacute;l&eacute;charger et d'installer une applications sur votre ordinateur en toute simplicit&eacute;.</li>
		<li><b>L'administration</b> - Cette page est ouverte &agrave; tous, une partie compl&egrave;te de cette page y est d&eacute;di&eacute;e.</li>
		</ul>
	Nous vous souhaitons une bonne navigation au sein du site !</p><br /><br />

<h3 class="titre" id="ajout_log">Ajouter un logiciel</h3><hr />
	<p>La partie d'administration est cach&eacute;e mais elle est ouverte &agrave; tous, il vous suffit de taper le konami code :</p>
	<p style="text-align: center;"><img src="common/images/konami.png" alt="konami"/></p>
	<p>Vous avez alors une partie qui s'est ajout&eacute;e &agrave; gauche (dans le menu). Il vous suffit de cliquer sur "Ajouter un logiciel" pour avoir le formulaire devant vos yeux.<br />
	<br /><b>Je vais maintenant vous expliquer comment remplir chaque question pas &agrave; pas :</b>
	<ul><li>L'id du logiciel - C'est un mot compos&eacute; des caract&egrave;res allant de a &agrave; z (minuscules uniquement) et du caract&egrave;re _. Il servira pour rep&eacute;rer le logiciel dans la partie interne du site. Cet id doit &ecirc;tre en rapport avec le nom du logiciel.</li>
	<li>Le nom du logiciel - C'est le nom du logiciel qui apparaitra au visiteurs, tous les caract&egrave;res sont permis sauf les '.</li>
	<li>L'ic&ocirc;ne du logiciel - C'est l'ic&ocirc;ne du logiciel, merci d'y mettre une image en .png 24 bits de pr&eacute;f&eacute;rence et en 64&times;64 pixels c'est le mieux.</li>
	<li>Lien t&eacute;l&eacute;chargement - Le lien vers la page du site web du developpeur qui contient la liste des t&eacute;l&eacute;chargements disponible (Si cette page n'existe pas, un lien vers le fichier est aussi tol&eacute;r&eacute;e). Doit &ecirc;tre de la forme : <i>http://example.org/</i>. Les ' ne sont pas admis.</li>
	<li>Version - C'est la derni&egrave;re version du logiciel. Merci d'utiliser des . et les termes <i>beta, alpha, realise candidate...</i>. Les ' ne passerons pas l'&eacute;tape de la validation.</li>
	<li>Taille - C'est la taille de l'archive au t&eacute;l&eacute;chargement. Veuillez utiliser des <i>Mo, Ko, octets...</i> et des ., merci. Toujours pareil, les ' ne seront pas accept&eacute;s.</li>
	<li>OS - Merci de cocher les OS compatibles, si des pr&eacute;cautions sont &agrave; prendre merci de les mettres dans la description.</li>
	<li>Licence - C'est la licence du logiciel. Elle est forc&eacute;ment libre, donc elle aura la forme <i>Logiciel libre (licence)</i>. Remplacez "licence" par GPL, LGPL, MPL... Le caract&egrave;re ' n'est pas accept&eacute;.</li>
	<li>Date - La date de sortie de la version mentionn&eacute;e plus haut. Doit &ecirc;tre de la forme JJ/MM/AAAA.</li>
	<li>Langue(s) - Les langues du logiciel. Chaque langue est remplac&eacute; par le drapeau correspondant. Chaque langue doit &ecirc;tre s&eacute;par&eacute;e par un | (AltGr + 6). La liste des langues disponibles se trouvent <a href="drapeaux/">ici</a>. Si vous n'avez pas le courage de finir, vous pouvez finir sur un |... qui ne sera pas remplac&eacute; par un drapeau.
	<li>Screen(s) - Chaque screen doit &ecirc;tre suivi de son nom sinon il ne sera pas ajout&eacute;. Les screen doivent &ecirc;tre en .png, aucune restriction de taille. La description ne doit pas contenir de '.</li>
	<li>Site - Le site du logiciel de la forme <i>http://example.org/</i>. Pas de ' merci.</li>
	<li>Description courte - Quelques mots (5 ou 6) d&eacute;crivant le logiciel. Les ' feront tout planter et annulerons l'ajout.</li>
	<li>Cat&eacute;gorie - Merci de choisir la cat&eacute;gorie dans laquelle s'inscrit le logiciel. Le plus pr&eacute;cis est le mieux.</li>
	<li>Description - Une description compl&egrave;te du logiciel, la plus belle que possible. Le HTML et CSS seront accept&eacute;s. Le PHP ne passe pas. Les ' serons automatiquement remplac&eacute;s par des ".</li>
	</ul>
	Une fois tous les champs remplis cliquez sur "Envoyer". L'ajout est ensuite trait&eacute;. Si vous voyez des erreurs lors du traitement merci de me contacter. Les erreurs provenant de l'ic&ocirc;ne sont normaux si vous n'en avez pas choisi. Ne vous inqui&eacute;tez pas ;).<br /><br />
	<b>Merci de votre participation</b><br /><br /></p>

<h3 class="titre" id="editer_log">&Eacute;diter un logiciel</h3><hr />
	<p>Tapez le konami code indiqu&eacute; ci-dessus.<br />
	Vous avez alors une partie qui s'est ajout&eacute;e &agrave; gauche (dans le menu). Il vous suffit de cliquer sur "Modification d'un logiciel" pour avoir le formulaire devant vos yeux.<br />
	Une unique champ s'affiche, il demande un id, l'id d'un logiciel se retrouve dans l'URL de la fiche, <u>exemple :</u> http://<? echo $_SERVER["HTTP_HOST"]; ?>/fiche.php?id=<b>firefox</b>. Entrez donc cet id dans le champ et envoyez le formulaire. Un second formulaire s'affiche.<br /><br />
	<b>Ce formulaire est pr&eacute;rempli. Il vous suffit de remplir comme indiqu&eacute; dans la partie pr&eacute;c&eacute;dente.</b><br />
	La manipulation diff&egrave;re de l'ajout pour la gestion des images :
	<ul><li>Enlever un image : Cliquez sur l'ic&ocirc;ne rouge "sans interdit" pour enlever l'ic&ocirc;ne. Attention, cette action enl&egrave;ve les donn&eacute;es entr&eacute;es pr&eacute;c&eacute;demment et non enregistr&eacute;es.</li>
	<li>Ajouter une image : Rentrez l'adresse vers l'image dans le champ pr&eacute;vu &agrave; cet effet. Pour les screenshots, rentrez aussi une description sinon l'ajout sera annul&eacute;. L'ajout sera r&eacute;lis&eacute; lors de l'envoi du formulaire.</li></ul>
	&Eacute;ditez ensuite chaque champs puis envoyez le formulaire. La fiche est alors rendue invisible, elle n'est pas incluse dans l'anuaire avant validation d'un mod&eacute;rateur. Mais elle existe toujours et vous pouvez la visionner &agrave; http://<? echo $_SERVER["HTTP_HOST"]; ?>/fiche.php?id=MONID. Remplacez MONID par l'id du logiciel.<br />
	<br /><b>Merci de votre participation</b><br /><br /></p>

<h3 class="titre" id="supprimer_log">Supprimer un logiciel</h3><hr />
	<p>Tapez le konami code indiqu&eacute; ci-dessus.<br />
	Vous avez alors une partie qui s'est ajout&eacute;e &agrave; gauche (dans le menu). Il vous suffit de cliquer sur "Suppression d'un logiciel" pour avoir le formulaire devant vos yeux.<br />
	Une unique champ s'affiche, il demande un id, l'id d'un logiciel se retrouve dans l'URL de la fiche, <u>exemple :</u> http://<? echo $_SERVER["HTTP_HOST"]; ?>/fiche.php?id=<b>firefox</b>. Entrez donc cet id dans le champ et envoyez le formulaire. La suppression est ensuite trait&eacute;e.<br /><br />
	La fiche est alors rendue invisible, elle n'est pas incluse dans l'anuaire avant validation d'un mod&eacute;rateur. Mais elle existe toujours et vous pouvez la visionner &agrave; http://<? echo $_SERVER["HTTP_HOST"]; ?>/fiche.php?id=MONID. Remplacez MONID par l'id du logiciel.<br />
	<br /><b>Merci de ne pas abuser de cette page.</b><br /><br /></p>

<? // ************************************************************************************************************* ?>
	</div>
</div>

<? include 'common/bottom.php'; ?>
</body>
</html>
