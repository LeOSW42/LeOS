<?

include ('common/session.php');

if ($_GET['action'] == 'iconspack') {

	$_SESSION['icons-pack'] = $_GET['theme'];
	header ("Location: ".$_SERVER['HTTP_REFERER']);
	echo '<a href="javascript:history.go(-1)">P</a>';

}

if ($_GET['action'] == 'langue') {

	$_SESSION['langue'] = $_GET['locale'];
	header ("Location: ".$_SERVER['HTTP_REFERER']);
	echo '<a href="javascript:history.go(-1)">P</a>';

}

if ($_GET['action'] == 'connecter') { ?>

	<head>
		<title>Connexion</title>
	</head>
	<body>
		<? if ($_GET['erreur'] == 1) { echo "<center><b style='color: red;'>Erreur lors de la tentative de connexion...</b></center>" ; } ?>
		<fieldset style="width: 500px; height: 160px; position: absolute; top: 50%; left: 50%; margin: -80px 0 0 -250px;">
			<legend>Se connecter :</legend>
			<form style="margin: 20px;" method="post" enctype="multipart/form-data" action="user.php?action=valid_connect">
				<label for="pseudo" style="float: left; line-height: 30px;">Pseudo :</label>
				<input name="pseudo" id="pseudo" type="text" style="width: 300px; float: right; height: 30px;" />
				<br /><br />
				<label for="motdepasse" style="float: left; line-height: 30px;">Mot de passe :</label>
				<input name="motdepasse" id="motdepasse" type="password" style="width: 300px; float: right; height: 30px;" />
				<br /><br />
				<input name="valider" id="valider" type="submit" value="Valider" style="width: 100px; float: left; height: 30px;" />
				<input name="annuler" id="annuler" type="reset" value="Annuler" style="width: 100px; float: right; height: 30px;" />
				<input name="page" id="page" type="hidden" value="<? if ($_GET['page'] == NULL) { echo $_SERVER['HTTP_REFERER']; } else { echo $_GET['page']; } ?>" />
			</form>
		</fieldset>
	</body>

<? }

if ($_GET['action'] == 'valid_connect') {

	include 'common/config.inc.php';

	$connect = mysql_connect($hote, $user, $password);
	mysql_select_db($base_users, $connect);

	$requete = mysql_query("SELECT * FROM users WHERE pseudo='".strtolower($_POST['pseudo'])."'");
	$utilisateur = mysql_fetch_array($requete);

	if (($utilisateur['id'] != NULL) AND ($utilisateur['motdepasse'] == sha1($_POST['motdepasse']))) {
		$_SESSION['pseudo'] = $utilisateur['nom'];
		$_SESSION['mail'] = $utilisateur['mail'];
		$_SESSION['connecter'] = 'oui';
		header ("Location: ".$_POST['page']);
		exit;
	}

	header ("Location: user.php?action=connecter&erreur=1&page=".$_POST['page']);

}

if ($_GET['action'] == 'deconnecter') { 

	session_destroy();
	header ("Location: ".$_SERVER['HTTP_REFERER']);
	echo '<a href="javascript:history.go(-1)">P</a>';

}

?>
