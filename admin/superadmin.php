	<script language="JavaScript" type="text/javascript" src="common/jquery.tools.min.js"></script>

	<h3 class="nom">Super Administration</h3>
	<p class="short_desc">Cette page n&eacute;c&eacute;ssite un mot de passe.</p>

	<? 
	if ($_GET['action'] == 'delete') {
	
		if ($_POST['username'] == NULL) { 
		?>
			<h3 class="titre">Valider la suppression d'une fiche logicielle :</h3><hr />

			<p>Ce choix va entrainer de la perte de tous les fichiers (ic&ocirc;nes, screens...) ainsi que du contenu de la base de donn&eacute;. Merci de faire attention...</p><br />

			<fieldset>
				<legend>Veuillez vous identifier</legend>
				<form id="form_mdp" method="POST" action="admin.php?id=superadmin&action=delete&idsoft=<? echo $_GET['idsoft']; ?>">
				<label for="username">Pseudo : </label><input type="text" name="username" id="username" /><br />
				<label for="mdp">Mot de passe : </label><input type="password" name="mdp" id="mdp" /><br />
				<input type="submit" value="Continuer" />
				</form>
			</fieldset>
		<?
		}

		else { 
		
			$id = $_GET['idsoft'];
			$username = $_POST['username'];

			include 'common/config.inc.php';

			$connect = mysql_connect($hote, $user, $password);
			mysql_select_db($base, $connect);

			//Partie SQL
			$requete = mysql_query("SELECT mdp FROM users WHERE username='".strtolower($username)."'");
			$mdp = mysql_fetch_array($requete);
			$mdp = $mdp['mdp'];

			mysql_close($connect);

			if ($mdp == sha1($_POST['mdp'])) { ?>
				<h3 class="titre">Valider la suppression d'une fiche logicielle :</h3><hr />

				<p>En cours de suppression...</p><br />

					<?
					$id = $_GET['idsoft'];

					include 'common/config.inc.php';

					$connect = mysql_connect($hote, $user, $password);
					mysql_select_db($base, $connect);

					//Partie SQL
					$requete = "DELETE FROM fiche_soft WHERE id='".$id."'";
					mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
					$requete = "DELETE FROM tests WHERE id='".$id."'";
					mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
					//Partie SQL
					$requete = "DELETE FROM logs WHERE id='".$id."'";
					mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

					mysql_close($connect);

					if (file_exists('icones/'.$id.'.png')) { unlink('icones/'.$id.'.png'); }
					if (file_exists('screen/'.$id.'_0.png')) { unlink('screen/'.$id.'_0.png'); }
					if (file_exists('screen/'.$id.'_1.png')) { unlink('screen/'.$id.'_1.png'); }
					if (file_exists('screen/'.$id.'_2.png')) { unlink('screen/'.$id.'_2.png'); }
					if (file_exists('screen/'.$id.'_3.png')) { unlink('screen/'.$id.'_3.png'); }
					if (file_exists('screen/'.$id.'_4.png')) { unlink('screen/'.$id.'_4.png'); }
					if (file_exists('cache/framasoft/'.$id.'.txt')) { unlink('cache/framasoft/'.$id.'.txt'); }

					?>

				<p>Supprimm&eacute;.</p>
			<? }
			else { ?>
				<h3 class="titre">Mot de passe incorrect.</h3><hr />
			<? }
		}
	}
	?>

	<? 
	if ($_GET['action'] == 'visible') {

		if ($_POST['username'] == NULL) { 
		?>
			<h3 class="titre">Valider la mise en public d'une fiche logicielle :</h3><hr />

			<p>Ce choix va rendre visible la fiche logicielle. Merci de faire attention...</p><br />

			<fieldset>
				<legend>Veuillez vous identifier</legend>
				<form id="form_mdp" method="POST" action="admin.php?id=superadmin&action=visible&idsoft=<? echo $_GET['idsoft']; ?>">
				<label for="username">Pseudo : </label><input type="text" name="username" id="username" /><br />
				<label for="mdp">Mot de passe : </label><input type="password" name="mdp" id="mdp" /><br />
				<input type="submit" value="Continuer" />
				</form>
			</fieldset>
		<?
		}

		else { 
		
			$id = $_GET['idsoft'];
			$username = $_POST['username'];

			include 'common/config.inc.php';

			$connect = mysql_connect($hote, $user, $password);
			mysql_select_db($base, $connect);

			//Partie SQL
			$requete = mysql_query("SELECT mdp FROM users WHERE username='".strtolower($username)."'");
			$mdp = mysql_fetch_array($requete);
			$mdp = $mdp['mdp'];

			mysql_close($connect);

			if ($mdp == sha1($_POST['mdp'])) { ?>
				<h3 class="titre">Valider la publication d'une fiche logicielle :</h3><hr />

				<p>En cours de publication...</p>

				<p>Mise &agrave; jour du flux RSS...</p>
					<?
					include 'common/config.inc.php';

					$connect = mysql_connect($hote, $user, $password);
					mysql_select_db($base, $connect);
					$requete = mysql_query("SELECT action FROM logs WHERE id='$id'");
					$action = mysql_fetch_array($requete);
					$action = $action['action'];

					$requete = mysql_query("SELECT * FROM fiche_soft WHERE id='$id'");
					$logiciel = mysql_fetch_array($requete);

					$name = addslashes($logiciel['nom']);
					$description = addslashes($logiciel['description']);
					$date = date("r");

					if ($action == 'new') {
						$titre = "Ajout $name";
					}
					else {
						$titre = "Mise a jour $name";
					}				

					if ($action != 'delete') {
						$requete = "INSERT INTO rss VALUES ('','$date','$titre','$description')";
						mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
					}

					mysql_close($connect);

					?>

				<p>Mise &agrave; l'attribut <i>visible</i> de la fiche...</p>

					<?
					// ********************************************

					$id = $_GET['idsoft'];

					include 'common/config.inc.php';

					$connect = mysql_connect($hote, $user, $password);
					mysql_select_db($base, $connect);

					//Partie SQL
					$requete = "UPDATE fiche_soft SET invisible='0' WHERE id='".$id."'";
					mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
					//Partie SQL
					$requete = "DELETE FROM logs WHERE id='".$id."'";
					mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

					mysql_close($connect);
					?>

				<p>Publi&eacute;e.</p>
			<? }
			else { ?>
				<h3 class="titre">Mot de passe incorrect.</h3><hr />
			<? }
		}
	}
	?>
