	<script language="JavaScript" type="text/javascript" src="common/jquery.tools.min.js"></script>

	<h3 class="nom">Administration</h3>
	<p class="short_desc">Logs de l'activit&eacute; dans la partie administration</p>

	<h3 class="titre">Voici les logs d'administration :</h3><hr />

	<p id="log">

	<? include("common/config.inc.php");
	$connect = mysql_connect($hote, $user, $password);
	mysql_select_db($base, $connect);

		// Nombre de lignes
		$retour = mysql_query("SELECT * FROM logs");
		$nblignes = mysql_num_rows($retour);

		for($i=0; $i<$nblignes; $i++) {
			$ip = $i + 1;
			$retour = mysql_query("SELECT * FROM logs LIMIT ".$i.", ".$ip);
			$contenu = mysql_fetch_array($retour);

			if ($contenu['action'] == 'new') {
				echo '<img style="vertical-align: middle;" src="common/images/page_add.png" alt=""/> Le logiciel portant pour id <a href="fiche.php?id='.$contenu['id'].'">'.$contenu['id'].'</a> &agrave; &eacute;t&eacute; ajout&eacute;. <a href="admin.php?id=superadmin&action=delete&idsoft='.$contenu['id'].'" style="border: none;"><img style="vertical-align: middle;" src="common/images/bin.png" alt="" title="Supprimmer d&eacute;finitivement la fiche."/></a> <a href="admin.php?id=superadmin&action=visible&idsoft='.$contenu['id'].'" style="border: none;"><img style="vertical-align: middle;" src="common/images/accept.png" alt="" title="Rendre visible la fiche"/></a><br />';
			}
			if ($contenu['action'] == 'edit') {
				echo '<img style="vertical-align: middle;" src="common/images/page_edit.png" alt=""/> Le logiciel portant pour id <a href="fiche.php?id='.$contenu['id'].'">'.$contenu['id'].'</a> &agrave; &eacute;t&eacute; &eacute;dit&eacute;. <a href="admin.php?id=superadmin&action=delete&idsoft='.$contenu['id'].'" style="border: none;"><img style="vertical-align: middle;" src="common/images/bin.png" alt="" title="Supprimmer d&eacute;finitivement la fiche."/></a> <a href="admin.php?id=superadmin&action=visible&idsoft='.$contenu['id'].'" style="border: none;"><img style="vertical-align: middle;" src="common/images/accept.png" alt="" title="Rendre visible la fiche"/></a><br />';
			}
			if ($contenu['action'] == 'delete') {
				echo '<img style="vertical-align: middle;" src="common/images/page_delete.png" alt=""/> Le logiciel portant pour id <a href="fiche.php?id='.$contenu['id'].'">'.$contenu['id'].'</a> &agrave; &eacute;t&eacute; supprim&eacute;. <a href="admin.php?id=superadmin&action=delete&idsoft='.$contenu['id'].'" style="border: none;"><img style="vertical-align: middle;" src="common/images/bin.png" alt="" title="Supprimmer d&eacute;finitivement la fiche."/></a> <a href="admin.php?id=superadmin&action=visible&idsoft='.$contenu['id'].'" style="border: none;"><img style="vertical-align: middle;" src="common/images/accept.png" alt="" title="Rendre visible la fiche"/></a><br />';
			}
		}

	mysql_close($connect);
	?>
	</p>
