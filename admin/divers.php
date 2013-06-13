<? // Page speciale de gestion des fichiers, partie admin...

session_start();

?>

<body style="background: white;">
<br />
<center style="font-family: ubuntu, arial; border: 10px solid #777777; -moz-border-radius: 20px; width: 350px; margin: auto;">
<form id="form" method="get" enctype="multipart/form-data" action="">

<p>Merci d'entrer le code que vous voyez...</p>
<img src="../common/captcha.php" onclick="document.images.captcha.src='../common/captcha.php?id='+Math.round(Math.random(0)*1000)+1" alt="Captcha" id="captcha" title="Cliquez sur l'image pour la recharger" /><br /><br />
<input name="userCode" id="userCode" type="text" title="Entrez le code, insensible &agrave; la casse.<br />Cliquez sur l'image pour la recharger." /><br /><br /><br />

<input type="hidden" value="<? echo $_GET['action']; ?>" name="action"/>
<input type="hidden" value="<? echo $_GET['id']; ?>" name="id"/>
<input type="hidden" value="<? echo $_GET['nb']; ?>" name="nb"/>

<input name='soumettre' type='submit' value='Envoyer' />

</form>
</center>

<?

/* Si l'utilisateur a bien entré un code */
if (!empty($_REQUEST['userCode']))
{
	/* Conversion en majuscules */
	$userCode = strtoupper($_REQUEST['userCode']);

	/* Cryptage et comparaison avec la valeur stockée dans $_SESSION['captcha'] */
	if( md5($userCode) == $_SESSION['captcha'] ) {


		if ($_GET["action"] == 'delete_icon') {
			$file = '../icones/'.$_GET['id'].'.png';
			if (file_exists($file)) { unlink($file); }
		}

		if ($_GET["action"] == 'delete_screen') {
	
			// Suppression de l'image
	
			$file = '../screen/'.$_GET["id"].'_'.$_GET["nb"].'.png';
			if (file_exists($file)) { unlink($file); }
	
			// Nouveau noms de screen
	
			if ($_GET["nb"] < 1 AND file_exists('../screen/'.$_GET["id"].'_1.png')) { rename('../screen/'.$_GET["id"].'_1.png', '../screen/'.$_GET["id"].'_0.png'); }
			if ($_GET["nb"] < 2 AND file_exists('../screen/'.$_GET["id"].'_2.png')) { rename('../screen/'.$_GET["id"].'_2.png', '../screen/'.$_GET["id"].'_1.png'); }
			if ($_GET["nb"] < 3 AND file_exists('../screen/'.$_GET["id"].'_3.png')) { rename('../screen/'.$_GET["id"].'_3.png', '../screen/'.$_GET["id"].'_2.png'); }
			if ($_GET["nb"] < 4 AND file_exists('../screen/'.$_GET["id"].'_4.png')) { rename('../screen/'.$_GET["id"].'_4.png', '../screen/'.$_GET["id"].'_3.png'); }
			if ($_GET["nb"] < 5 AND file_exists('../screen/'.$_GET["id"].'_5.png')) { rename('../screen/'.$_GET["id"].'_5.png', '../screen/'.$_GET["id"].'_4.png'); }

			// Changement du SQL

			include "../common/config.inc.php";

			$connect = mysql_connect($hote, $user, $password);
			mysql_select_db($base, $connect);

			$requete = mysql_query("SELECT screen FROM fiche_soft WHERE id='".$_GET['id']."'");
			$logiciel = mysql_fetch_array($requete);

			// Calcul du nombre de screen :

			$chaine = $logiciel['screen'];

			foreach (count_chars($chaine, 1) as $i => $val) {
				if (chr($i) == "|") {
					$nb_screen = $val + 1;
				}
			}
			if ($chaine == NULL) {
				$nb_screen = 0;
			}
			if ($chaine != NULL AND $nb_screen == NULL) {
				$nb_screen = 1;
			}

			if ($nb_screen != 0) {
				$attributs = explode('|', $logiciel['screen']);
				$attributs['0'] = $attributs['0'].'|';
				$attributs['1'] = $attributs['1'].'|';
				$attributs['2'] = $attributs['2'].'|';
				$attributs['3'] = $attributs['3'].'|';
				$attributs['4'] = $attributs['4'].'|';

				for ($i = 0; $i < $nb_screen; $i++) { 
					if ($attributs[$i] != NULL AND $i != $_GET["nb"]) {
						$screen = $screen.$attributs[$i];
					}
				}
			}

			$screen = substr($screen,0,strlen($screen)-1);

			$requete = "UPDATE fiche_soft SET screen='".$screen."' WHERE id='".$_GET['id']."'";
			mysql_query($requete) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	
			mysql_close($connect); 
		}

		echo '<br /><center style="font-family: ubuntu, arial;">Vous avez fini, vous pouvez fermer cette fen&ecirc;tre...</center>'; // Le code est erroné


	}
	else echo '<br /><center style="font-family: ubuntu, arial;"><a href="javascript:history.back()">Erreur dans le code, merci de recommencer</a></center>'; // Le code est erroné
}


?>

</body>
