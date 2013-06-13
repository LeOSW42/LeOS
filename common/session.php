<?

	session_start();

	include 'config.inc.php';

	$connect = mysql_connect($hote, $user, $password);
	mysql_select_db($base, $connect);

/* Gestion de la session anonymous */

	if ($_SESSION['connecter'] == NULL) {
		$_SESSION['connecter'] = 'non';
		$_SESSION['pseudo'] = '42';
	}

/* Gestion du pack d'icones */

	if ($_SESSION['icons-pack'] == NULL) {
		$requete = mysql_query("SELECT valeur FROM ".$prefixe."config WHERE variable='iconspack'");
		$iconspack = mysql_fetch_array($requete);

		$iconspack = $iconspack['valeur'];
	}

	else {
		$iconspack = $_SESSION['icons-pack'];
	}

/* Gestion des langues */


	if ($_SESSION['langue'] == NULL) {
		$requete = mysql_query("SELECT valeur FROM ".$prefixe."config WHERE variable='langue'");
		$langue = mysql_fetch_array($requete);

		$langue = $langue['valeur'];
	}

	else {
		$langue = $_SESSION['langue'];
	}

	switch ($langue) { // En fonction de la langue, on crée une variable $langage qui contient le code
		case 'fr':
			$langage = 'fr_FR.utf8';
			break;
		case 'en':
			$langage = 'en_US.utf8';
			break;
		case 'es':
			$langage = 'es_ES.utf8';
			break;
		default:
			$langage = 'fr_FR.utf8';
			break;
	}

	putenv("LANG=$langage"); // On modifie la variable d'environnement
	putenv("LC_ALL=$langage");
	putenv("LANGUAGE=$langage");
	setlocale(LC_ALL, $langage); // On modifie les informations de localisation en fonction de la langue
	
	$nomDesFichiersDeLangue = 'leos'; // Le nom de nos fichiers .mo
	
	bindtextdomain($nomDesFichiersDeLangue, "./locale"); // On indique le chemin vers les fichiers .mo
	bind_textdomain_codeset($nomDesFichiersDeLangue, "UTF-8");
	textdomain($nomDesFichiersDeLangue); // Le nom du domaine par defaut
	
	mysql_close($connect); 

?>
