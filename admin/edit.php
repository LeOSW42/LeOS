	<script language="JavaScript" type="text/javascript" src="common/jquery.tools.min.js"></script>

	<h3 class="nom">Administration</h3>
	<p class="short_desc">&Eacute;dition d'un logiciel</p>

	<? $id = $_GET['idsoft'];

	if ($id != NULL) { ?>

		<h3 class="titre">Merci de corriger le formulaire suivant :</h3><hr />

		<? include 'common/config.inc.php';

		$connect = mysql_connect($hote, $user, $password);
		mysql_select_db($base, $connect);

		$requete = mysql_query("SELECT nom FROM fiche_soft WHERE id='$id'");
		$nom_logiciel = mysql_fetch_array($requete);
		$requete = mysql_query("SELECT * FROM fiche_soft WHERE id='$id'");
		$logiciel = mysql_fetch_array($requete);
		$requete = mysql_query("SELECT * FROM tests WHERE id='$id'");
		$tests = mysql_fetch_array($requete);

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

		mysql_close($connect); ?>

		<? if($logiciel['id'] == NULL) { echo '<p style="font-weight: bold; color: red;">ERREUR : ID invalide</p>'; } ?>

		<form id="form" method="post" enctype="multipart/form-data" action="admin.php?id=edit_valid">

		<input TYPE="hidden" name="MAX_FILE_SIZE" value="512000">
		<label for="id">L'id du logiciel : </label><input value="<? echo $logiciel['id']; ?>" readonly id="id" name='id' type='text' size='50' title="Utiliser seulement les caract&egrave;res minuscules de a à z et _.<br /><b>Exemple : amsn</b>" /><br />
		<label for="nom">Le nom du logiciel : </label><input value="<? echo $logiciel['nom']; ?>" id="nom" name='nom' type='text' size='50' title="Tous les caract&egrave;res sont accept&eacute;s.<br /><b>Exemple : aMSN</b>" /><br />

		<? if (file_exists("icones/".$logiciel['id'].".png")) { echo '<label for="icone">L\'ic&ocirc;ne du logiciel : </label><img style="vertical-align: middle;" src="icones/'.$logiciel['id'].'.png"/> <a rel="shadowbox;height=350;width=400;" style="border: none;" href="admin/divers.php?action=delete_icon&id='.$logiciel['id'].'" title="supprimer" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer cet icone ?\'));"><img style="vertical-align: middle;" src="common/images/delete.png" /></a><br /><br />'; } 
		else { echo '<label for="icone">L\'ic&ocirc;ne du logiciel : </label><input id="icone" title="Image en .png et de 64x64px, merci." type="file" name="icone"><br />'; } ?>


		<label for="telechargement">Lien t&eacute;l&eacute;chargement : </label><input value="<? echo $logiciel['telecharger']; ?>" id="telechargement" name='telechargement' type='text' size='50' title="Adresse de la page de t&eacute;l&eacute;chargement ou du fichier.<br /><b>Exemple : http://www.amsn-project.net/download.php</b>" /><br />
		<label for="version">Version : </label><input value="<? echo $logiciel['version']; ?>" id="version" name='version' type='text' size='50' title="La derni&egrave;re version utilis&eacute;e : utiliser des . et alpha, beta...<br /><b>Exemple : 0.98.3</b>" /><br />
		<label for="taille">Taille : </label><input value="<? echo $logiciel['taille']; ?>" id="taille" name='taille' type='text' size='50' title="Taille au t&eacute;l&eacute;chargement : utiliser des . et Mo, Ko, octets...<br /><b>Exemple : 9.15 Mo</b>"/><br />
		<label>OS : </label><span class="os"><label>Linux <input <? if (preg_match("/linux/", $logiciel['os'])) { echo 'checked="checked"'; } ?> type="checkbox" name='linux' title="Compatible Linux" /></label></span> <span class="os"><label>Windows <input <? if (preg_match("/windows/", $logiciel['os'])) { echo 'checked="checked"'; } ?> type="checkbox" name="windows" title="Compatible Windows" /></label></span> <span class="os"><label>MAC <input <? if (preg_match("/mac/", $logiciel['os'])) { echo 'checked="checked"'; } ?> type="checkbox" name="mac" title="Compatible MAC" /></label></span><br />
		<label for="licence">Licence : </label><input value="<? echo $logiciel['licence']; ?>" id="licence" name='licence' type='text' size='50' title="Logiciel libre ou Propri&eacute;taire (Licence).<br /><b>Exemple : Logiciel libre (GPL)</b>"/><br />
		<label for="date">Date : </label><input value="<? echo $logiciel['date']; ?>" id="date" name='date' type='text' size='50' title="Date de version, mod&egrave;le : JJ/MM/AAAA.<br /><b>Exemple : 31/02/2010</b>"/><br />
		<label for="langue">Langue(s) : </label><input value="<? echo $logiciel['langue']; ?>" id="langue" name='langue' type='text' size='50' title="Langue(s) : <a href='http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2'>mod&egrave;le</a>, gb pour en, s&eacute;parer par des |.<br /><b>Exemple : fr|gb|...</b>" /><br />
		<label>Screen(s) : </label>

		<? if ($nb_screen != 0) { ?>
			<br />
			<? for ($i = 0; $i < $nb_screen; $i++) { 
				$attributs = explode('|', $logiciel['screen']);
				?>
				<label>&nbsp;</label>
				<a style="border: none;" href="./screen/<? echo $logiciel['id'].'_'.$i; ?>.png">
				<img style="vertical-align: middle;" src="softs/phpthumb/phpThumb.php?src=../../screen/<? echo $logiciel['id'].'_'.$i; ?>.png&h=100&f=png" />
				</a>
				<span style="vertical-align: middle;"><? echo $attributs[$i]; ?></span>
				<a rel="shadowbox;height=350;width=400;" style="border: none;" href="admin/divers.php?action=delete_screen&id=<? echo $logiciel['id']; ?>&nb=<? echo $i; ?>" title="supprimer" onclick="return(confirm('Etes-vous sur de vouloir supprimer ce screen ?'));"><img style="vertical-align: middle;" src="common/images/delete.png" /></a>
				<input type="hidden" name="nom_screen_<? echo $i; ?>" id="nom_screen_<? echo $i; ?>" value="<? echo $attributs[$i]; ?>" />
				<br />
			<? }
		} 

		echo '<br />';

		$nb_pas_screen = 5 - $nb_screen; 
		$no_champ = $nb_screen;
		for ($i = 0; $i < $nb_pas_screen; $i++) { ?>
			<label>&nbsp;</label><input type="file" name="screen_<? echo $no_champ; ?>" title="Les screen &agrave; afficher, format .jpg, .png ou .gif. Pas trop gros. 5 maximum."> <input name='nom_screen_<? echo $no_champ; ?>' type='text' size='30' title="Nom du screen correspondant.<br /><b>Exemple : G&eacute;n&eacute;ral</b>" /><br />
			<? $no_champ = $no_champ + 1;
		} ?>

		<label for="site">Site : </label><input value="<? echo $logiciel['site']; ?>" id="site" name='site' type='text' size='50' title="Site web du logiciel.<br /><b>Exemple : http://www.amsn-project.net/</b>" /><br />
		<label for="short_desc">Description courte : </label><input value="<? echo $logiciel['short_desc']; ?>" id="short_desc" value="" name='short_desc' type='text' size='50' title="Courte description du logiciel.<br /><b>Exemple : MSN messenger pour tous OS</b>" /><br />
		<label for="id_framasoft">ID Framasoft : </label><input value="<? echo $logiciel['id_framasoft']; ?>" id="id_framasoft" value="" name='id_framasoft' type='text' size='50' title="L'ID de la fiche logicielle sur Framasoft.<br /><b>Exemple : 1523 car <i>www.framasoft.net/article<u>1523</u>.html</i></b>" /><br />
		<label for="categorie">Cat&eacute;gorie : </label>
			<select id="categorie" selected="500" name="categorie" title="La cat&eacute;gorie du logiciel. Plus c'est pr&eacute;cis, mieux c'est !">
			<option <? if ($logiciel['categorie']==1) { echo 'selected="selected"'; } ?> value="1">Accessoires</option>
			<option <? if ($logiciel['categorie']==2) { echo 'selected="selected"'; } ?> value="2">Acces universel</option>
			<option <? if ($logiciel['categorie']==3) { echo 'selected="selected"'; } ?> value="3">Bureautique</option>
			<option <? if ($logiciel['categorie']==4) { echo 'selected="selected"'; } ?> value="4">Education</option>
			<option <? if ($logiciel['categorie']==5) { echo 'selected="selected"'; } ?> value="5">Graphisme</option>
			<option <? if ($logiciel['categorie']==500) { echo 'selected="selected"'; } ?> value="500">&nbsp;&nbsp;3D</option>
			<option <? if ($logiciel['categorie']==501) { echo 'selected="selected"'; } ?> value="501">&nbsp;&nbsp;Afficheurs</option>
			<option <? if ($logiciel['categorie']==502) { echo 'selected="selected"'; } ?> value="502">&nbsp;&nbsp;Dessin</option>
			<option <? if ($logiciel['categorie']==503) { echo 'selected="selected"'; } ?> value="503">&nbsp;&nbsp;Graphisme</option>
			<option <? if ($logiciel['categorie']==504) { echo 'selected="selected"'; } ?> value="504">&nbsp;&nbsp;Numerisation...</option>
			<option <? if ($logiciel['categorie']==505) { echo 'selected="selected"'; } ?> value="505">&nbsp;&nbsp;Photographie</option>
			<option <? if ($logiciel['categorie']==506) { echo 'selected="selected"'; } ?> value="506">&nbsp;&nbsp;Publication</option>
			<option <? if ($logiciel['categorie']==6) { echo 'selected="selected"'; } ?> value="6">Internet</option>
			<option <? if ($logiciel['categorie']==600) { echo 'selected="selected"'; } ?> value="600">&nbsp;&nbsp;Courriel</option>
			<option <? if ($logiciel['categorie']==601) { echo 'selected="selected"'; } ?> value="601">&nbsp;&nbsp;Messagerie instantanee</option>
			<option <? if ($logiciel['categorie']==602) { echo 'selected="selected"'; } ?> value="602">&nbsp;&nbsp;Navigateurs web</option>
			<option <? if ($logiciel['categorie']==603) { echo 'selected="selected"'; } ?> value="603">&nbsp;&nbsp;Partage de fichiers</option>
			<option <? if ($logiciel['categorie']==7) { echo 'selected="selected"'; } ?> value="7">Jeux</option>
			<option <? if ($logiciel['categorie']==700) { echo 'selected="selected"'; } ?> value="700">&nbsp;&nbsp;Casses-tetes</option>
			<option <? if ($logiciel['categorie']==701) { echo 'selected="selected"'; } ?> value="701">&nbsp;&nbsp;Jeux d'arcade</option>
			<option <? if ($logiciel['categorie']==702) { echo 'selected="selected"'; } ?> value="702">&nbsp;&nbsp;Jeux de cartes</option>
			<option <? if ($logiciel['categorie']==703) { echo 'selected="selected"'; } ?> value="703">&nbsp;&nbsp;Jeux de plateau</option>
			<option <? if ($logiciel['categorie']==704) { echo 'selected="selected"'; } ?> value="704">&nbsp;&nbsp;Jeux de roles</option>
			<option <? if ($logiciel['categorie']==704) { echo 'selected="selected"'; } ?> value="705">&nbsp;&nbsp;Simulation</option>
			<option <? if ($logiciel['categorie']==705) { echo 'selected="selected"'; } ?> value="706">&nbsp;&nbsp;Sports</option>
			<option <? if ($logiciel['categorie']==8) { echo 'selected="selected"'; } ?> value="8">Polices...</option>
			<option <? if ($logiciel['categorie']==9) { echo 'selected="selected"'; } ?> value="9">Science...</option>
			<option <? if ($logiciel['categorie']==900) { echo 'selected="selected"'; } ?> value="900">&nbsp;&nbsp;Astronomie</option>
			<option <? if ($logiciel['categorie']==901) { echo 'selected="selected"'; } ?> value="901">&nbsp;&nbsp;Biologie</option>
			<option <? if ($logiciel['categorie']==902) { echo 'selected="selected"'; } ?> value="902">&nbsp;&nbsp;Chimie</option>
			<option <? if ($logiciel['categorie']==903) { echo 'selected="selected"'; } ?> value="903">&nbsp;&nbsp;Electronique</option>
			<option <? if ($logiciel['categorie']==904) { echo 'selected="selected"'; } ?> value="904">&nbsp;&nbsp;Geographie</option>
			<option <? if ($logiciel['categorie']==905) { echo 'selected="selected"'; } ?> value="905">&nbsp;&nbsp;Geologie</option>
			<option <? if ($logiciel['categorie']==906) { echo 'selected="selected"'; } ?> value="906">&nbsp;&nbsp;Informatique</option>
			<option <? if ($logiciel['categorie']==907) { echo 'selected="selected"'; } ?> value="907">&nbsp;&nbsp;Ingenierie</option>
			<option <? if ($logiciel['categorie']==908) { echo 'selected="selected"'; } ?> value="908">&nbsp;&nbsp;Mathematiques</option>
			<option <? if ($logiciel['categorie']==909) { echo 'selected="selected"'; } ?> value="909">&nbsp;&nbsp;Physique</option>
			<option <? if ($logiciel['categorie']==10) { echo 'selected="selected"'; } ?> value="10">Son et video</option>
			<option <? if ($logiciel['categorie']==11) { echo 'selected="selected"'; } ?> value="11">Themes...</option>
			<option <? if ($logiciel['categorie']==12) { echo 'selected="selected"'; } ?> value="12">Outils developpeur</option>
			<option <? if ($logiciel['categorie']==1200) { echo 'selected="selected"'; } ?> value="1200">&nbsp;&nbsp;Analyse</option>
			<option <? if ($logiciel['categorie']==1201) { echo 'selected="selected"'; } ?> value="1201">&nbsp;&nbsp;Bibliotheques</option>
			<option <? if ($logiciel['categorie']==1202) { echo 'selected="selected"'; } ?> value="1202">&nbsp;&nbsp;Conception d'interfaces...</option>
			<option <? if ($logiciel['categorie']==1203) { echo 'selected="selected"'; } ?> value="1203">&nbsp;&nbsp;Controle de version</option>
			<option <? if ($logiciel['categorie']==1204) { echo 'selected="selected"'; } ?> value="1204">&nbsp;&nbsp;Debogage</option>
			<option <? if ($logiciel['categorie']==1205) { echo 'selected="selected"'; } ?> value="1205">&nbsp;&nbsp;Developpement web</option>
			<option <? if ($logiciel['categorie']==1206) { echo 'selected="selected"'; } ?> value="1206">&nbsp;&nbsp;EDI</option>
			<option <? if ($logiciel['categorie']==1207) { echo 'selected="selected"'; } ?> value="1207">&nbsp;&nbsp;Haskell</option>
			<option <? if ($logiciel['categorie']==1208) { echo 'selected="selected"'; } ?> value="1208">&nbsp;&nbsp;Java</option>
			<option <? if ($logiciel['categorie']==1209) { echo 'selected="selected"'; } ?> value="1209">&nbsp;&nbsp;Lisp</option>
			<option <? if ($logiciel['categorie']==1210) { echo 'selected="selected"'; } ?> value="1210">&nbsp;&nbsp;Mono/CLI</option>
			<option <? if ($logiciel['categorie']==1211) { echo 'selected="selected"'; } ?> value="1211">&nbsp;&nbsp;Ocami</option>
			<option <? if ($logiciel['categorie']==1212) { echo 'selected="selected"'; } ?> value="1212">&nbsp;&nbsp;Perl</option>
			<option <? if ($logiciel['categorie']==1213) { echo 'selected="selected"'; } ?> value="1213">&nbsp;&nbsp;Python</option>
			<option <? if ($logiciel['categorie']==1214) { echo 'selected="selected"'; } ?> value="1214">&nbsp;&nbsp;Ruby</option>
			<option <? if ($logiciel['categorie']==1215) { echo 'selected="selected"'; } ?> value="1215">&nbsp;&nbsp;Traduction</option>
			<option <? if ($logiciel['categorie']==13) { echo 'selected="selected"'; } ?> value="13">Systeme</option>
			</select><br />

		<p>Description :</p> 
		<script type="text/javascript" src="softs/tinyeditor/tinyeditor.js"></script>
		<textarea id="description" name="description" style="width: 100%;" title="La description en HTML pur"><? echo $logiciel['description']; ?></textarea>
		<script type="text/javascript">
		new TINY.editor.edit('editor',{
			id:'description', // (required) ID of the textarea
			cssclass:'te', // (optional) CSS class of the editor
			controlclass:'tecontrol', // (optional) CSS class of the buttons
			rowclass:'teheader', // (optional) CSS class of the button rows
			dividerclass:'tedivider', // (optional) CSS class of the button diviers
			controls:['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|', 'orderedlist', 'unorderedlist', '|' ,'outdent' ,'indent', '|', 'leftalign', 'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n', 'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'cut', 'copy', 'paste'], // (required) options you want available, a '|' represents a divider and an 'n' represents a new row
			footer:true, // (optional) show the footer
			fonts:['Verdana','Arial','Georgia','Trebuchet MS'],  // (optional) array of fonts to display
			xhtml:true, // (optional) generate XHTML vs HTML
			cssfile:'common/editor.css', // (optional) attach an external CSS file to the editor
			css:'body{background-color:#fff}', // (optional) attach CSS to the editor
			bodyid:'editor', // (optional) attach an ID to the editor body
			toggle:{text:'source',activetext:'wysiwyg',cssclass:'toggle'},
			footerclass:'tefooter', // (optional) CSS class of the footer
			resize:{cssclass:'resize'} // (optional) display options for the editor resize
		});
		</script><br />

	<div style="float: left; width: 180px; height: 20px;">Tests : </div><a href="#" onclick="document.getElementById('tests').style.display='inherit'">Cliquez ici pour ajouter des tests (JavaScript requis)</a><br /><br />

	<div style="display: none;" id="tests">
		<table style="margin: auto; border-collapse: collapse;" border="1" id="table_tests"><tbody>
			<tr>
				<th>Syst&egrave;me d'exploitation</th>
				<th>Remarques</th>
				<th>Conclusion</th>
			</tr>
			<tr>
				<th><img src="common/images/OS/CentOS.png" alt="centos" title="CentOS" /> - CentOS</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="centosr" value="<? echo $tests['centosr']; ?>"/></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="centosc">
					<option <? if ($tests['centosc']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['centosc']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['centosc']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['centosc']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['centosc']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Debian.png" alt="debian" title="Debian" /> - Debian</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="debianr" value="<? echo $tests['debianr']; ?>" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="debianc">
					<option <? if ($tests['debianc']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['debianc']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['debianc']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['debianc']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['debianc']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Fedora.png" alt="fedora" title="Fedora" /> - Fedora</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="fedorar" value="<? echo $tests['fedorar']; ?>" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="fedorac">
					<option <? if ($tests['fedorac']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['fedorac']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['fedorac']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['fedorac']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['fedorac']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Kubuntu.png" alt="kubuntu" title="Kubuntu" /> - Kubuntu</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="kubuntur" value="<? echo $tests['kubuntur']; ?>" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="kubuntuc">
					<option <? if ($tests['kubuntuc']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['kubuntuc']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['kubuntuc']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['kubuntuc']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['kubuntuc']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Linux_Mint.png" alt="linux_mint" title="Linux Mint" /> - Linux Mint</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="linuxmintr" value="<? echo $tests['linuxmintr']; ?>" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="linuxmintc">
					<option <? if ($tests['linuxmintc']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['linuxmintc']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['linuxmintc']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['linuxmintc']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['linuxmintc']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/MacOSX.png" alt="mac" title="Mac OS X" /> - Mac OS X</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="macosxr" value="<? echo $tests['macosxr']; ?>" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="macosxc">
					<option <? if ($tests['macosxc']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['macosxc']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['macosxc']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['macosxc']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['macosxc']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Mandriva.png" alt="mandriva" title="Mandriva" /> - Mandriva</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="mandrivar" value="<? echo $tests['mandrivar']; ?>" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="mandrivac">
					<option <? if ($tests['mandrivac']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['mandrivac']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['mandrivac']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['mandrivac']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['mandrivac']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/OpenSuse.png" alt="opensuse" title="OpenSuse" /> - OpenSuse</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="opensuser" value="<? echo $tests['opensuser']; ?>" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="opensusec">
					<option <? if ($tests['opensusec']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['opensusec']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['opensusec']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['opensusec']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['opensusec']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/PCLinuxOS.png" alt="pclinuxos" title="PCLinuxOS" /> - PCLinuxOS</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="pclinuxosr" value="<? echo $tests['pclinuxosr']; ?>" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="pclinuxosc">
					<option <? if ($tests['pclinuxosc']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['pclinuxosc']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['pclinuxosc']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['pclinuxosc']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['pclinuxosc']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/RedHat.png" alt="redhat" title="RedHat" /> - RedHat</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="redhatr" value="<? echo $tests['redhatr']; ?>" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="redhatc">
					<option <? if ($tests['redhatc']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['redhatc']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['redhatc']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['redhatc']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['redhatc']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Ubuntu.png" alt="ubuntu" title="Ubuntu" /> - Ubuntu</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="ubuntur" value="<? echo $tests['ubuntur']; ?>" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="ubuntuc">
					<option <? if ($tests['ubuntuc']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['ubuntuc']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['ubuntuc']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['ubuntuc']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['ubuntuc']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Windows_XP.png" alt="windows_xp" title="Windows XP" /> - Windows XP</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="windowsxpr" value="<? echo $tests['windowsxpr']; ?>" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="windowsxpc">
					<option <? if ($tests['windowsxpc']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['windowsxpc']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['windowsxpc']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['windowsxpc']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['windowsxpc']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Windows_Vista.png" alt="windows_vista" title="Windows Vista" /> - Windows Vista</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="windowsvistar" value="<? echo $tests['windowsvistar']; ?>" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="windowsvistac">
					<option <? if ($tests['windowsvistac']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['windowsvistac']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['windowsvistac']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['windowsvistac']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['windowsvistac']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Windows_7.png" alt="windows_7" title="Windows 7" /> - Windows 7</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="windows7r" value="<? echo $tests['windows7r']; ?>" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="windows7c">
					<option <? if ($tests['windows7c']==1) { echo 'selected="selected"'; } ?> value="1">1</option>
					<option <? if ($tests['windows7c']==2) { echo 'selected="selected"'; } ?> value="2">2</option>
					<option <? if ($tests['windows7c']==3) { echo 'selected="selected"'; } ?> value="3">3</option>
					<option <? if ($tests['windows7c']==4) { echo 'selected="selected"'; } ?> value="4">4</option>
					<option <? if ($tests['windows7c']==5) { echo 'selected="selected"'; } ?> value="5">5</option>
				</select></td>
			</tr>
		</tbody></table>
		<p style="text-align: center;"><small><i>L&eacute;gende: <b>1</b> correspond &agrave; une impossibilit&eacute;. <b>2</b> correspond &agrave; une ignorance. <b>3</b> correspond &agrave; une utilisation avanc&eacute;e. <b>4</b> correspond &agrave; une utilisation th&eacute;orique. <b>5</b> correspond &agrave; un test qui s'est bien d&eacute;roul&eacute;.</i></small></p>
		<hr>
		<br /><br />
	</div>

		<div><label><img src="common/captcha.php" onclick="document.images.captcha.src='common/captcha.php?id='+Math.round(Math.random(0)*1000)+1" alt="Captcha" id="captcha" title="Cliquez sur l'image pour la recharger" /></label>
		<br /><input name="userCode" id="userCode" type="text" title="Entrez le code, insensible &agrave; la casse.<br />Cliquez sur l'image pour la recharger." /></div><br /><br />

		<input onclick="editor.post();" name='soumettre' type='submit' value='Envoyer' title="Publier cette fiche" /> <input name='annuler' type='reset' value='Annuler' title="Vous avez tout remis &agrave; z&eacute;ro" />

		</form>

		<script>
		// execute your scripts when the DOM is ready. this is a good habit
		$(function() {



		// select all desired input fields and attach tooltips to them
		$("#form :input").tooltip({

			// place tooltip on the right edge
			position: "center right",

			// a little tweaking of the position
			offset: [-2, 10],

			// use the built-in fadeIn/fadeOut effect
			effect: "fade",

			// custom opacity setting
			opacity: 0.9

		});
		});
		</script>

	<? } 

	else { ?>

		<form id="form" method="get" enctype="multipart/form-data" action="admin.php">

		<p>Merci d'entrer ci-dessous l'id du logiciel &agrave; &eacute;diter : </p>
		<input id="id" name='id' type='hidden' value='edit' />
		<input id="idsoft" name='idsoft' type='text' size='50' title="Utiliser seulement les caract&egrave;res minuscules de a à z et _." /><br />
		<input name='soumettre' type='submit' value='Envoyer' title="Publier cette fiche" />

		</form>


	<? } ?>
