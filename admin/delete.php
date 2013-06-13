	<script language="JavaScript" type="text/javascript" src="common/jquery.tools.min.js"></script>

	<h3 class="nom">Administration</h3>
	<p class="short_desc">&Eacute;dition d'un logiciel</p>

	<? $id = $_GET['idsoft'];

	if ($id != NULL) { ?>

		<?php
		/* Si l'utilisateur a bien entré un code */
		if (!empty($_REQUEST['userCode']))
		{
		/* Conversion en majuscules */
		$userCode = strtoupper($_REQUEST['userCode']);

		/* Cryptage et comparaison avec la valeur stockée dans $_SESSION['captcha'] */
		if( md5($userCode) == $_SESSION['captcha'] ) {
		?>

		<h3 class="titre">Voici un log du d&eacute;roulement de l'ajout des modifications :</h3><hr />

		<p id="log">

			<?
			// on teste si le formulaire a été soumis
			if (!isset($_GET['soumettre']))
			{
				// formulaire non envoyé
				echo '<span class="erreur">Erreur dans la validation de votre formulaire, veuillez recommencer...<br />Nous n\'avons pas d&eacute;tect&eacute; l\'appui sur le bouton Envoyer, Allez &agrave; la page pr&eacute;c&eacute;dente et renvoyez le formulaire.</span><br />';
			}

			else
			{

				// formulaire envoyé, on récupère tous les champs.
				$id     = $_GET['idsoft'];

				echo 'R&eacute;cup&eacute;ration de l\'id du logiciel effectu&eacute;.<br />';

				include 'common/config.inc.php';

				$connect = mysql_connect($hote, $user, $password);
				mysql_select_db($base, $connect);

				echo 'Connexion &agrave; la base de donn&eacute;e.<br />';

				//Partie SQL
				$requete = "UPDATE fiche_soft SET invisible='1' WHERE id='".$id."'";
				mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

				echo 'La fiche est maintenant invisible.<br />';

				$requete = "INSERT INTO logs VALUES ('','delete','$id')";
				mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

				mysql_close($connect);
		
			}
			?>


		</p>

		<?
		}
		else echo '<a href="javascript:history.back()">Erreur dans le code, merci de recommencer</a>'; // Le code est erroné
		}

		else echo '<a href="javascript:history.back()">Erreur dans le code, merci de recommencer</a>'; // Le code est erroné
		?>

	<? } 

	else { ?>

		<form id="form" method="get" enctype="multipart/form-data" action="admin.php">

		<p>Merci d'entrer ci-dessous l'id du logiciel &agrave; supprimmer : </p>
		<input id="id" name='id' type='hidden' value='delete' />
		<input id="idsoft" name='idsoft' type='text' value="<? echo $_GET['value']; ?>" size='50' title="Utiliser seulement les caract&egrave;res minuscules de a à z et _." /><br />
		<p>Merci d'entrer le code que vous voyez...</p>
		<label><img src="common/captcha.php" onclick="document.images.captcha.src='common/captcha.php?id='+Math.round(Math.random(0)*1000)+1" alt="Captcha" id="captcha" title="Cliquez sur l'image pour la recharger" /></label>
		<input name="userCode" id="userCode" type="text" title="Entrez le code, insensible &agrave; la casse.<br />Cliquez sur l'image pour la recharger." /><br /><br /><br />

		<input name='soumettre' type='submit' value='Envoyer' title="Publier cette fiche" />

		</form>


	<? } ?>
