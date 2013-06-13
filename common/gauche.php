<script language="JavaScript" src="common/konami.js" type="text/javascript"></script>

<div id="gauche" style="background: url('icons-pack/<? echo $iconspack; ?>/BackGauche.png') center bottom no-repeat white;">
<ul>
	<li><a href="obtenir-des-logiciels.php" <? if($page=='obtenirdeslogiciels') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/dico.png" /> <? echo _('obtenir-des-logiciels'); ?></a>
	<ul>
		<li><a href="categorie.php?catid=1" <? if($page=='cat1') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/accessoires_16.png" /> <? echo _('accessoires'); ?></a></li>
		<li><a href="categorie.php?catid=2" <? if($page=='cat2') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/acces-universel_16.png" /> <? echo _('acces-universel'); ?></a></li>
		<li><a href="categorie.php?catid=3" <? if($page=='cat3') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/bureautique_16.png" /> <? echo _('bureautique'); ?></a></li>
		<li><a href="categorie.php?catid=4" <? if($page=='cat4') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/education_16.png" /> <? echo _('education'); ?></a></li>
		<li><a href="categorie.php?catid=5" <? if($page=='cat5') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/graphisme_16.png" /> <? echo _('graphisme'); ?></a></li>
		<li><a href="categorie.php?catid=6" <? if($page=='cat6') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/internet_16.png" /> <? echo _('internet'); ?></a></li>
		<li><a href="categorie.php?catid=7" <? if($page=='cat7') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/jeux_16.png" /> <? echo _('jeux'); ?></a></li>
		<li><a href="categorie.php?catid=8" <? if($page=='cat8') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/polices-de-caracteres_16.png" /> <? echo _('polices-de-caracteres'); ?></a></li>
		<li><a href="categorie.php?catid=9" <? if($page=='cat9') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/science-&amp;-ingenierie_16.png" /> <? echo _('science-ingenierie'); ?></a></li>
		<li><a href="categorie.php?catid=10" <? if($page=='cat10') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/son-et-video_16.png" /> <? echo _('son-et-video'); ?></a></li>
		<li><a href="categorie.php?catid=11" <? if($page=='cat11') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/themes-&amp;-optimisations_16.png" /> <? echo _('themes-optimisations'); ?></a></li>
		<li><a href="categorie.php?catid=12" <? if($page=='cat12') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/outils-pour-developpeurs_16.png" /> <? echo _('outils-pour-developpeurs'); ?></a></li>
		<li><a href="categorie.php?catid=13" <? if($page=='cat13') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/systeme_16.png" /> <? echo _('systeme'); ?></a></li>
	</ul></li>
	<li><br /></li>
<!--	<li><a href="telecharger-un-logiciel.php" <? if($page=='telechargerunlogiciel') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src=icons-pack/<? echo $iconspack; ?>/telecharger.png" /> <? echo _('telecharger-un-logiciel'); ?></a></li>
	<li><br /></li> -->
	<li><a href="#"><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/add.png" /> <? echo _('divers'); ?></a>
	<ul>
		<li><a href="aide.php" <? if($page=='aide') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/help.png" /> <? echo _('aide'); ?></a></li>
		<li><a href="contact.php" <? if($page=='contact') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/email.png" /> <? echo _('contact'); ?></a></li>
		<li><hr /></li>
<!--		<li><a href="http://twitter.com/OSProj" target="_blank"><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/twitter.png" /> Twitter</a></li>
		<li><a href="http://diasp.eu/tags/OpenSourceSoft" target="_blank"><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/diaspora.png" /> Diaspora*</a></li> -->
		<li><a href="RSS.php"><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/rss.png" /> RSS</a></li>
		<li><hr /></li>
		<li><a href="partenaires.php" <? if($page=='partenaires') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/user.png" /> <? echo _('partenaires'); ?></a></li>
		<li><a href="api.php" <? if($page=='api') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/world.png" /> <? echo _('webmaster'); ?></a></li>
		<li><a href="http://codingteam.net/project/leos" target="_blank"><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/dev.png" /> <? echo _('centre-de-developpement'); ?></a></li>
	</ul></li>
	<li><br /></li>
	<li id="konami" <? if($admin != 'oui') { echo 'style="display: none;"'; } ?>><a href="admin.php" <? if($page=='admin') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/key.png" /> <? echo _('administration'); ?></a>
	<ul>
		<li><a href="admin.php?id=new" <? if($page=='adminnew') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/page_add.png" /> <? echo _('ajout-d-un-logiciel'); ?></a></li>
		<li><a href="admin.php?id=edit" <? if($page=='adminedit') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/page_edit.png" /> <? echo _('modification-d-un-logiciel'); ?></a></li>
		<li><a href="admin.php?id=delete" <? if($page=='admindelete') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/page_delete.png" /> <? echo _('suppression-d-un-logiciel'); ?></a></li>
<!--		<li><a href="admin.php?id=newdl" <? if($page=='adminnewdl') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/package_add.png" /> <? echo _('ajout-d-un-telechargement'); ?></a></li>
		<li><a href="admin.php?id=editdl" <? if($page=='admineditdl') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/package_edit.png" /> <? echo _('modification-d-un-telechargement'); ?></a></li>
		<li><a href="admin.php?id=deletedl" <? if($page=='admindeletedl') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/package_delete.png" /> <? echo _('suppression-d-un-telechargement'); ?></a></li> -->
		<li><a href="admin.php?id=log" <? if($page=='adminlog') { echo 'id="gauche_selected"'; } ?>><img style="vertical-align: middle;" alt="" src="icons-pack/<? echo $iconspack; ?>/eye.png" /> <? echo _('voir-les-logs'); ?></a></li>
	</ul></li>
</ul>
</div>
