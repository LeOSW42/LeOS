<?

include ('common/session.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Contact - <? echo $titrepage; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
	<link href="common/common.css" rel="stylesheet" type="text/css" media="screen" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="common/common-ie6.css" /><![endif]-->
	<link href="common/contact.css" rel="stylesheet" type="text/css" media="screen" />
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
<? $page='contact'; $admin="non"; include 'common/gauche.php'; ?>

<div id="corps">
	<? include 'common/nav.php'; ?>
	<div id="content">
<? // ************************************************************************************************************* ?>
<img style="float: right;" src="icones/64/help.png" />
<h1 class='nom'>Contact</h1>
<p class="short_desc">Contactez l'&eacute;quipe du site.</p>

<?php
	function post($index) {
		return isset($_POST[$index]) ? $_POST[$index] : '';
	}
	
	foreach($_POST as $index => $post) $_POST[$index] = htmlentities($_POST[$index]);
	$send = true;
	$emails = array('leosw' => 'leo-serre@legtux.org');
	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	$headers .= 'From: ' . post('email') . "\n";
	$output = 'Message envoyé depuis le site http://opensourcesoft.fr.nf par ' . post('name') . '<br/><hr><br /><br />' . str_replace("\n", "<br />", stripslashes(post('message')));
	if(isset($_POST['submit'])) {
		if(post('ns') == '') {
			if(post('name') == '') {
				echo '<p class="error">Vous devez indiquer un nom ou un pseudo.</p>';
				$send = false;
			}
			if(post('subject') == '') {
				echo '<p class="error">Vous devez indiquer un sujet.</p>';
				$send = false;
			}
			if(post('email') == '') {
				echo '<p class="error">Vous devez indiquer un email.</p>';
				$send = false;
			}
			if(post('message') == '') {
				echo '<p class="error">Vous devez écrire un message.</p>';
				$send = false;
			}
			if($send) {
				if(mail($emails[post('dest')], post('subject'), strtr($output, array_flip(get_html_translation_table(HTML_ENTITIES))), $headers)) {
					echo '<p class="ok">Envoi du message réussi.</p>';
				} else {
					echo '<p class="error">Impossible d\'envoyer le message.</p>';
				}
			}
		}
	}
?>

<form id="contact" method="post" action="">
	<p>
		<label for="name">Nom / Pseudo :</label>
		<input name="name" id="name" type="text" value="<?php echo post('name'); ?>"/><br/>
		<label for="email">E-mail :</label>
		<input id="email" name="email" type="text" value="<?php echo post('email'); ?>"/><br/>
		<label for="subject">Sujet :</label>
		<input id="subject" name="subject" type="text" value="<?php echo post('subject'); ?>"/><br/>
		<label for="dest">Destinataire :</label>
		<select id="dest" name="dest">
			<option value="osw" <?php echo post('leosw') == 'leosw' ? ' selected="selected" ' : ' '; ?>>LéOSW</option>
		</select><br/>
		<label for="message">Message :</label>
		<textarea id="message" name="message" rows="8" cols="90"><?php echo post('message'); ?></textarea>
	</p>
	<p class="submit">
		<input type="submit" name="submit" value="Envoyer"/>
		<input type="reset" name="reset" value="Annuler"/>
		<input type="hidden" name="ns" value="<?php echo post('ns'); ?>"/>
	</p>
</form>

<? // ************************************************************************************************************* ?>
	</div>
</div>

<? include 'common/bottom.php'; ?>
</body>
</html>
