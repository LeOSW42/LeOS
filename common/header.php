<?

include 'config.inc.php';

$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base_users, $connect);

$requete = mysql_query("SELECT * FROM config WHERE valeur='don_pourcent'");
$don_pourcent = mysql_fetch_array($requete);
$don_pourcent = $don_pourcent[2];

mysql_close($connect); 

?>

<script language="JavaScript" src="common/header.js" type="text/javascript"></script>

<header>
	<div id="pop1">
	<span id="item1"><? echo _('le-reseau'); ?></span>
		<div id="msg1" class="msg" style="visibility: hidden;">
			<p>
				<a href="http://opensourcesoft.fr.nf/"><img alt="" src="icons-pack/<? echo $iconspack; ?>/oss.png" />LeOS</a>
			</p>
		</div>
	</div>
	<div id="pop2">
	<span id="item2"><? echo _('aide'); ?></span>
		<div id="css">
			<p><? echo _('veuillez-activer-javascript-pour-afficher-ce-menu'); ?></p>
		</div>
		<div id="msg2" class="msg" style="visibility: hidden;">
			<p>
				<a href="contact.php"><img src="icons-pack/<? echo $iconspack; ?>/email.png" height="16" width="16"  alt="" /><? echo _('contact'); ?></a>
				<a href="aide.php"><img src="icons-pack/<? echo $iconspack; ?>/help.png" alt="" /><? echo _('aide'); ?></a>
				<a href="#" id="about_item"><img src="icons-pack/<? echo $iconspack; ?>/star.png" alt="" /><? echo _('a-propos'); ?></a>
			</p>
		</div>
	</div>

	<? if($barre_progression_dons != 0)
	{ ?>
		<a href="http://opensourcedon.fr.nf/"><div class="bloc_dons"><div class="pourcent_dons" style="width: <? echo $don_pourcent; ?>%;"></div><div class="texte_dons"><? echo $don_pourcent; ?>% <? echo _('de-dons'); ?></div></div></a>
	<? } ?>

	<div class="panel">
		<div id="pop7">
		<span id="item7"><img class="panel-icons" src="icons-pack/<? echo $iconspack; ?>/heure_16.png" alt="" /></span>
			<div id="msg7" class="msg" style="visibility: hidden;">
				<p>
					<span class="head-pas-lien"><object type="image/svg+xml" height="180" width="180" data="common/images/ftclock.svg" id="clock"></object></span>
				</p>
			</div>
		</div>
		<div id="pop6">
		<span id="item6"><img class="panel-icons" src="icons-pack/<? echo $iconspack; ?>/icons-pack_16.png" alt="" /></span>
			<div id="msg6" class="msg" style="visibility: hidden;">
				<p>
					<a href="user.php?action=iconspack&theme=elementary"><img height="16" width="16"  alt="" />Elementary</a>
					<a href="user.php?action=iconspack&theme=faenza"><img height="16" width="16"  alt="" />Faenza</a>
				</p>
			</div>
		</div>
		<div id="pop5">
		<span id="item5"><img class="panel-icons" src="icons-pack/<? echo $iconspack; ?>/langue_16.png" alt="" /></span>
			<div id="msg5" class="msg" style="visibility: hidden;">
				<p>
					<a href="user.php?action=langue&locale=fr"><img height="16" width="16"  alt="" />Fran&ccedil;ais</a>
					<a href="user.php?action=langue&locale=en"><img height="16" width="16"  alt="" />English</a>
					<span  class="head-pas-lien"><img height="16" width="16"  alt="" />Deutsch</span>
					<a href="user.php?action=langue&locale=es"><img height="16" width="16"  alt="" />Espa&ntilde;ol</a>
				</p>
			</div>
		</div>
		<div id="pop4"><span id="item4">
		<img class="panel-icons" src="icons-pack/<? echo $iconspack; ?>/messages_16.png" alt="" /></span>
			<div id="msg4" class="msg" style="visibility: hidden;">
				<p>
					<span class="head-pas-lien"><img height="16" width="16"  alt="" /><? echo _('lire-mes-messages'); ?></span>
					<span class="head-pas-lien"><img height="16" width="16"  alt="" /><? echo _('ecrire-un-message'); ?></span>
					<span class="head-pas-lien"><img height="16" width="16"  alt="" />0 <? echo _('nouveau-x-message-s-'); ?></span>
				</p>
			</div>
		</div>
		<div id="pop3">
		<span id="item3"><img class="panel-icons" src="icons-pack/<? echo $iconspack; ?>/connecter_16.png" alt="" /></span>
			<div id="msg3" class="msg" style="visibility: hidden;">
				<p>
					<? if ($_SESSION['connecter'] == 'oui') { ?>
						<a href="user.php?action=deconnecter"><img height="16" width="16"  alt="" /><? echo _('se-deconnecter'); ?></a>
						<span class="head-pas-lien"><img height="16" width="16"  alt="" /><? echo _('editer-le-profil'); ?></span>
					<? } else { ?>
						<a href="user.php?action=connecter"><img height="16" width="16"  alt="" /><? echo _('se-connecter'); ?></a>
						<span  class="head-pas-lien"><img height="16" width="16"  alt="" /><? echo _('s-inscrire'); ?></span>
					<? } ?>
				</p>
			</div>
		</div>
	</div>

	<div class="username">
		<div>
			<? if ($_SESSION['pseudo'] != '42') { echo $_SESSION['pseudo']; } else { echo _('anonyme'); } ?>
		</div>
	</div> 

</header>
<div id="about" style="display: none;">
	<p class="title"><? echo _('a-propos-d-oss-website'); ?></p>
	<p class="contenu"><br /><img alt="OSS logo" src="icons-pack/<? echo $iconspack; ?>/OSS.png" /><br /><br />
	<b>OpenSourceSoft Website 1.2</b><br /><br />
	<? echo _('opensourcesoft-website-est-l-encyclopedie-des-logiciels-libres-sur-le-web'); ?><br /><br />
	<a href="http://opensourcesoft.fr.nf/">http://opensourcesoft.fr.nf/</a><br /><br />
	<input style="float: left;" type="button" id="credits_button" value="<? echo _('credits'); ?>" /><input style="float: right;" type="button" value="<? echo _('fermer'); ?>" id="about_off_button"/><br /><br />
	</p>
	<p class="bottom"></p>
</div>
<div id="credit" style="display: none;">
	<p class="title"><? echo _('credits'); ?></p>
	<p class="contenu"><br /><? echo _('nous-remercions'); ?><br /><br />
	<span class="readonly"><? echo _('developpeurs'); ?><br /><br />
	OpenSourceWay - opensourceway@laposte.net - <? echo _('developpement-graphisme-moderation'); ?><br />
	Mcc - <a href="http://mhm.fr.nf/">http://mhm.fr.nf/</a> - <? echo _('developpement-de-dieu'); ?><br />
	McPeter - <? echo _('mise-en-page-sans-javascript-sans-tableaux-et-sans-frame'); ?><br />
	<br /><? echo _('graphistes'); ?><br /><br />
	Enki - e.enki@caramail.com - <? echo _('creatrice-du-magnifique-logo-d-oss'); ?><br />
	<!-- <br /><? echo _('moderateurs'); ?><br /><br />
	Toto<br /> -->
	<br /><? echo _('contributions-diverses'); ?><br /><br />
	<a href="http://xishan1.deviantart.com/art/Background-79612218?q=boost%3Apopular%20background&qo=1"><? echo _('fond-de-la-page-d-accueil-honteusement-trouve-ici'); ?></a><br />
	<a href="http://anomaly.org">Anomaly.org</a> - <? echo _('l-horloge'); ?><br />
	Faenza Team - <a href="http://tiheum.deviantart.com/art/Faenza-Icons-173323228">http://tiheum.deviantart.com/art/Faenza-Icons-173323228</a> - <? echo _('tous-les-icones-de-la-suite-faenza-places-sous-gnu-gpl'); ?><br />
	Elementary Team - <a href="https://launchpad.net/~elementaryart">https://launchpad.net/~elementaryart</a> - <? echo _('tous-les-icones-de-la-suite-humanity-places-sous-gnu-gpl-v2'); ?><br />
	FamFamFam - <? echo _('icones-aide-et-a-propos'); ?></span><br />
	<input style="float: right;" type="button" value="<? echo _('fermer'); ?>" id="credits_off_button" /><br /><br />
	</p>
	<p class="bottom"></p>
</div>
