<?php
/* Si l'utilisateur a bien entré un code */
if (!empty($_REQUEST['userCode']))
{
/* Conversion en majuscules */
$userCode = strtoupper($_REQUEST['userCode']);

/* Cryptage et comparaison avec la valeur stockée dans $_SESSION['captcha'] */
if( md5($userCode) == $_SESSION['captcha'] ) {
?>

	<h3 class="nom">Administration</h3>
	<p class="short_desc">Traitement de l'&eacute;dition d'un logiciel</p>

	<h3 class="titre">Voici un log du d&eacute;roulement de l'ajout des modifications :</h3><hr />

	<p id="log">

		<?
		// on teste si le formulaire a été soumis
		if (!isset($_POST['soumettre']))
		{
			// formulaire non envoyé
			echo '<span class="erreur">Erreur dans la validation de votre formulaire, veuillez recommencer...<br />Nous n\'avons pas d&eacute;tect&eacute; l\'appui sur le bouton Envoyer, Allez &agrave; la page pr&eacute;c&eacute;dente et renvoyez le formulaire.</span><br />';
		}

		else
		{

			$erreur = NULL;

			// formulaire envoyé, on récupère tous les champs.
			$id     = addslashes($_POST['id']);
			$nom     = addslashes($_POST['nom']);
			$icone     = addslashes($_POST['icone']);
			$telechargement     = addslashes($_POST['telechargement']);
			$version     = addslashes($_POST['version']);
			$taille     = addslashes($_POST['taille']);
			$linux     = addslashes($_POST['linux']);
			$windows     = addslashes($_POST['windows']);
			$mac     = addslashes($_POST['mac']);
			$licence     = addslashes($_POST['licence']);
			$date     = addslashes($_POST['date']);
			$langue     = addslashes($_POST['langue']);
			$screen_0     = addslashes($_POST['screen_0']);
			$nom_screen_0     = addslashes($_POST['nom_screen_0']);
			$screen_1     = addslashes($_POST['screen_1']);
			$nom_screen_1     = addslashes($_POST['nom_screen_1']);
			$screen_2     = addslashes($_POST['screen_2']);
			$nom_screen_2     = addslashes($_POST['nom_screen_2']);
			$screen_3     = addslashes($_POST['screen_3']);
			$nom_screen_3     = addslashes($_POST['nom_screen_3']);
			$screen_4     = addslashes($_POST['screen_4']);
			$nom_screen_4     = addslashes($_POST['nom_screen_4']);
			$site     = addslashes($_POST['site']);
			$short_desc     = addslashes($_POST['short_desc']);
			$categorie     = addslashes($_POST['categorie']);
			$description     = addslashes($_POST['description']);
			$id_framasoft     = addslashes($_POST['id_framasoft']);

			echo 'R&eacute;cup&eacute;ration des variables effectu&eacute;.<br />';

			include 'common/config.inc.php';

			$connect = mysql_connect($hote, $user, $password);
			mysql_select_db($base, $connect);

			echo 'Connexion &agrave; la base de donn&eacute;e.<br />';

			// On cree la chaine des screen a mettre dans le SQL
			if ($nom_screen_0 != NULL) {
				$screen = $nom_screen_0;
			}
			if ($nom_screen_1 != NULL) {
				$screen = "$screen|$nom_screen_1";
			}
			if ($nom_screen_2 != NULL) {
				$screen = "$screen|$nom_screen_2";
			}
			if ($nom_screen_3 != NULL) {
				$screen = "$screen|$nom_screen_3";
			}
			if ($nom_screen_4 != NULL) {
				$screen = "$screen|$nom_screen_4";
			}
			if ($nom_screen_5 != NULL) {
				$screen = "$screen|$nom_screen_5";
			}
			
			echo 'Mise en place des noms pour les screens.<br />';

			// On cree la chaine des os a mettre dans le SQL
			if ($linux != NULL AND $windows != NULL AND $mac != NULL) { $os = 'linux|windows|mac'; }
			else if ($linux != NULL AND $windows != NULL) { $os = 'linux|windows'; }
			else if ($linux != NULL AND $mac != NULL) { $os = 'linux|mac'; }
			else if ($windows != NULL AND $mac != NULL) { $os = 'windows|mac'; }
			else if ($linux != NULL) { $os = 'linux'; }
			else if ($windows != NULL) { $os = 'windows'; }
			else if ($mac != NULL) { $os = 'mac'; }


			echo 'Mise en place de la liste des OS compatibles.<br />';

			// On verifie que les champs requis sont remplis
			if ($id == NULL OR $nom == NULL) {
				$erreur .= 'Erreur : V&eacute;rifiez que tous le nom et l\'id sont bien renseign&eacute;s...<br />';
			}

			if ($erreur == NULL) {

				//Partie SQL
				$requete = mysql_query("SELECT * FROM fiche_soft WHERE id='$id'");
				$logiciel = mysql_fetch_array($requete);
				$requete = "DELETE FROM fiche_soft WHERE id = '".$id."'";
				mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
				$requete = "INSERT INTO fiche_soft VALUES ('','$id','$nom','','$telechargement','$version','$taille','$os','$licence','$date','$langue','$screen','$description','$short_desc','$site','".$logiciel['total_value']."','".$logiciel['total_votes']."','".$logiciel['used_ips']."','$categorie', '$id_framasoft', '1')";
				mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

				echo 'Ajout des informations &agrave; la base de donn&eacute;e.<br />';

				$requete = "INSERT INTO logs VALUES ('','edit','$id')";
				mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
				echo 'Mise &agrave; des logs.<br />';

				// Partie upload de fichiers

				// Upload de l'icone

				if (1) {
					$poids_max = 512000; // Poids max de l'image en octets (1Ko = 1024 octets)
					$repertoire = 'icones/'; // Repertoire d'upload
					if (isset($_FILES['icone']))
					{
						// On vérifit le type du fichier
						if ($_FILES['icone']['type'] != 'image/png')
						{
						$erreurUp = 'Le fichier doit &ecirc;tre au format *.png .';
						}
						// On vérifit le poids de l'image
						elseif ($_FILES['icone']['size'] > $poids_max)
						{
						$erreurUp = 'L\'image doit &ecirc;tre inf&eacute;rieur &agrave; ' . $poids_max/1024 . 'Ko.';
						}
						// On vérifit si le répertoire d'upload existe
						elseif (!file_exists($repertoire))
						{
						$erreurUp = 'Erreur, le dossier d\'upload n\'existe pas.';
						}
						// Si il y a une erreur on l'affiche sinon on peut uploader
						if(isset($erreurUp))
						{
						echo '<span class="erreur">' . $erreurUp . '</span><br />';
						}
						else
						{

							// On définit l'extention du fichier puis on le nomme par le timestamp actuel
							if ($_FILES['icone']['type'] == 'image/png') { $extention = '.png'; }
							$nom_fichier = $id;

							// On upload le fichier sur le serveur.
							if (move_uploaded_file($_FILES['icone']['tmp_name'], $repertoire.$nom_fichier.'.png'))
							{
							echo 'Upload de l\'ic&ocirc;ne<br />';
							}
							else
							{
							echo '<span class="erreur">L\'icone n\'a pas pu être uploadée sur le serveur.</span><br />';
							}

						}

					}
				}

				// Calcul du nombre de screen :

				foreach (count_chars($screen, 1) as $i => $val) {
					if (chr($i) == "|") {
						$nb_screen = $val + 1;
					}
				}
				if ($screen == NULL) {
					$nb_screen = 0;
				}


				for ($j=0; $j<$nb_screen; $j++) {
					$travail_screen = 'screen_'.$j;
					// Upload des screen
					$poids_max = 512000; // Poids max de l'image en octets (1Ko = 1024 octets)
					$repertoire = 'screen/'; // Repertoire d'upload
					if (isset($_FILES["$travail_screen"]))
					{
						// On vérifit le type du fichier
						if ($_FILES["$travail_screen"]['type'] != 'image/png')
						{
						$erreurUp = 'Le fichier doit $ecirc;tre au format *.png .';
						}
						// On vérifit le poids de l'image
						elseif ($_FILES["$travail_screen"]['size'] > $poids_max)
						{
						$erreurUp = 'L\'image doit &ecirc;tre inf&eacute;rieur &agrave; ' . $poids_max/1024 . 'Ko.';
						}
						// On vérifit si le répertoire d'upload existe
						elseif (!file_exists($repertoire))
						{
						$erreurUp = 'Erreur, le dossier d\'upload n\'existe pas.';
						}
						// Si il y a une erreur on l'affiche sinon on peut uploader
						if(isset($erreurUp))
						{
						echo '<span class="erreur">' . $erreurUp . '</span><br />';
						}
						else
						{

							// On définit l'extention du fichier puis on le nomme par le timestamp actuel
							if ($_FILES["$travail_screen"]['type'] == 'image/png') { $extention = '.png'; }
							$nom_fichier = $id.'_'.$j;

							// On upload le fichier sur le serveur.
							if (move_uploaded_file($_FILES["$travail_screen"]['tmp_name'], $repertoire.$nom_fichier.'.png'))
							{
						echo 'Upload d\'un screen<br />';
							}
							else
							{
							echo '<span class="erreur">Le(s) screen(s) n\'a(ont) pas pu être uploadé(s) sur le serveur.</span><br />';
							}

						} // Fin du else
					} // Fin du if isset
				} // Fin du for

				$centosr     = addslashes($_POST['centosr']);
				$debianr     = addslashes($_POST['debianr']);
				$fedorar     = addslashes($_POST['fedorar']);
				$kubuntur     = addslashes($_POST['kubuntur']);
				$linuxmintr     = addslashes($_POST['linuxmintr']);
				$macosxr     = addslashes($_POST['macosxr']);
				$mandrivar     = addslashes($_POST['mandrivar']);
				$opensuser     = addslashes($_POST['opensuser']);
				$pclinuxosr     = addslashes($_POST['pclinuxosr']);
				$redhatr     = addslashes($_POST['redhatr']);
				$ubuntur     = addslashes($_POST['ubuntur']);
				$windowsxpr     = addslashes($_POST['windowsxpr']);
				$windowsvistar     = addslashes($_POST['windowsvistar']);
				$windows7r     = addslashes($_POST['windows7r']);

				$centosc     = addslashes($_POST['centosc']);
				$debianc     = addslashes($_POST['debianc']);
				$fedorac     = addslashes($_POST['fedorac']);
				$kubuntuc     = addslashes($_POST['kubuntuc']);
				$linuxmintc     = addslashes($_POST['linuxmintc']);
				$macosxc     = addslashes($_POST['macosxc']);
				$mandrivac     = addslashes($_POST['mandrivac']);
				$opensusec     = addslashes($_POST['opensusec']);
				$pclinuxosc     = addslashes($_POST['pclinuxosc']);
				$redhatc     = addslashes($_POST['redhatc']);
				$ubuntuc     = addslashes($_POST['ubuntuc']);
				$windowsxpc     = addslashes($_POST['windowsxpc']);
				$windowsvistac     = addslashes($_POST['windowsvistac']);
				$windows7c     = addslashes($_POST['windows7c']);

				echo 'R&eacute;cup&eacute;ration des variables de tests<br />';

				$requete = "DELETE FROM tests WHERE id = '".$id."'";
				mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
				$requete = "INSERT INTO tests VALUES ('','$id','$centosr','$centosc','$debianr','$debianc','$fedorar','$fedorac','$kubuntur','$kubuntuc','$linuxmintr','$linuxmintc','$macosxr','$macosxc','$mandrivar','$mandrivac','$opensuser','$opensusec','$pclinuxosr','$pclinuxosc','$redhatr','$redhatc','$ubuntur','$ubuntuc','$windowsxpr','$windowsxpc','$windowsvistar','$windowsvistac','$windows7r','$windows7c')";
				mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

				echo 'Envoi des tests dans la base de donn&eacute;e<br />';

				mysql_close($connect);

				echo '<b>Fini !!</b><br />';

			}
			else {
				echo '<span class="erreur">'.$erreur.'</span><br />';
			}		
		
		}

		?>


	</p>

<?
}
else echo '<a href="javascript:history.back()">Erreur dans le code, merci de recommencer</a>'; // Le code est erroné
}

else echo '<a href="javascript:history.back()">Erreur dans le code, merci de recommencer</a>'; // Le code est erroné
?>
