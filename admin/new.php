	<script language="JavaScript" type="text/javascript" src="common/jquery.tools.min.js"></script>

	<h3 class="nom">Administration</h3>
	<p class="short_desc">Ajout d'un logiciel</p>

	<h3 class="titre">Merci de remplir le formulaire suivant :</h3><hr />

	<form id="form" method="post" enctype="multipart/form-data" action="admin.php?id=new_valid">

	<input TYPE="hidden" name="MAX_FILE_SIZE" value="512000">
	<label for="id">L'id du logiciel : </label><input id="id" name='id' type='text' size='50' title="Utiliser seulement les caract&egrave;res minuscules de a à z et _.<br /><b>Exemple : amsn</b>" /><br />
	<label for="nom">Le nom du logiciel : </label><input id="nom" name='nom' type='text' size='50' title="Tous les caract&egrave;res sont accept&eacute;s.<br /><b>Exemple : aMSN</b>" /><br />
	<label for="icone">L'ic&ocirc;ne du logiciel : </label><input id="icone" title="Image en .png et de 64x64px, merci." type="file" name="icone"><br />
	<label for="telechargement">Lien t&eacute;l&eacute;chargement : </label><input id="telechargement" name='telechargement' type='text' size='50' title="Adresse de la page de t&eacute;l&eacute;chargement ou du fichier.<br /><b>Exemple : http://www.amsn-project.net/download.php</b>" /><br />
	<label for="version">Version : </label><input id="version" name='version' type='text' size='50' title="La derni&egrave;re version utilis&eacute;e : utiliser des . et alpha, beta...<br /><b>Exemple : 0.98.3</b>" /><br />
	<label for="taille">Taille : </label><input id="taille" name='taille' type='text' size='50' title="Taille au t&eacute;l&eacute;chargement : utiliser des . et Mo, Ko, octets...<br /><b>Exemple : 9.15 Mo</b>"/><br />
	<label>OS : </label><span class="os"><label>Linux <input type="checkbox" name='linux' title="Compatible Linux" /></label></span> <span class="os"><label>Windows <input type="checkbox" name="windows" title="Compatible Windows" /></label></span> <span class="os"><label>MAC <input type="checkbox" name="mac" title="Compatible MAC" /></label></span><br />
	<label for="licence">Licence : </label><input id="licence" name='licence' type='text' size='50' title="Logiciel libre ou Propri&eacute;taire (Licence).<br /><b>Exemple : Logiciel libre (GPL)</b>"/><br />
	<label for="date">Date : </label><input id="date" name='date' type='text' size='50' title="Date de version, mod&egrave;le : JJ/MM/AAAA.<br /><b>Exemple : 31/02/2010</b>"/><br />
	<label for="langue">Langue(s) : </label><input id="langue" name='langue' type='text' size='50' title="Langue(s) : <a href='http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2'>mod&egrave;le</a>, gb pour en, s&eacute;parer par des |.<br /><b>Exemple : fr|gb|...</b>" /><br />
	<label>Screen(s) : </label><input type="file" name="screen_0" title="Les screen &agrave; afficher, format .jpg, .png ou .gif. Pas trop gros. 5 maximum."> <input name='nom_screen_0' type='text' size='30' title="Nom du screen correspondant.<br /><b>Exemple : G&eacute;n&eacute;ral</b>" /><br />
	<label>&nbsp;</label><input type="file" name="screen_1" title="Les screen &agrave; afficher, format .jpg, .png ou .gif. Pas trop gros. 5 maximum."> <input name='nom_screen_1' type='text' size='30' title="Nom du screen correspondant.<br /><b>Exemple : G&eacute;n&eacute;ral</b>" /><br />
	<label>&nbsp;</label><input type="file" name="screen_2" title="Les screen &agrave; afficher, format .jpg, .png ou .gif. Pas trop gros. 5 maximum."> <input name='nom_screen_2' type='text' size='30' title="Nom du screen correspondant.<br /><b>Exemple : G&eacute;n&eacute;ral</b>" /><br />
	<label>&nbsp;</label><input type="file" name="screen_3" title="Les screen &agrave; afficher, format .jpg, .png ou .gif. Pas trop gros. 5 maximum."> <input name='nom_screen_3' type='text' size='30' title="Nom du screen correspondant.<br /><b>Exemple : G&eacute;n&eacute;ral</b>" /><br />
	<label>&nbsp;</label><input type="file" name="screen_4" title="Les screen &agrave; afficher, format .jpg, .png ou .gif. Pas trop gros. 5 maximum."> <input name='nom_screen_4' type='text' size='30' title="Nom du screen correspondant.<br /><b>Exemple : G&eacute;n&eacute;ral</b>" /><br />
	<label for="site">Site : </label><input id="site" name='site' type='text' size='50' title="Site web du logiciel.<br /><b>Exemple : http://www.amsn-project.net/</b>" /><br />
	<label for="short_desc">Description courte : </label><input id="short_desc" value="" name='short_desc' type='text' size='50' title="Courte description du logiciel.<br /><b>Exemple : MSN messenger pour tous OS</b>" /><br />
		<label for="id_framasoft">ID Framasoft : </label><input value="" id="id_framasoft" value="" name='id_framasoft' type='text' size='50' title="L'ID de la fiche logicielle sur Framasoft.<br /><b>Exemple : 1523 car <i>www.framasoft.net/article<u>1523</u>.html</i></b>" /><br />
	<label for="categorie">Cat&eacute;gorie : </label>
		<select id="categorie" name="categorie" title="La cat&eacute;gorie du logiciel. Plus c'est pr&eacute;cis, mieux c'est !">
		<option value="1">Accessoires</option>
		<option value="2">Acces universel</option>
		<option value="3">Bureautique</option>
		<option value="4">Education</option>
		<option value="5">Graphisme</option>
		<option value="500">&nbsp;&nbsp;3D</option>
		<option value="501">&nbsp;&nbsp;Afficheurs</option>
		<option value="502">&nbsp;&nbsp;Dessin</option>
		<option value="503">&nbsp;&nbsp;Graphisme</option>
		<option value="504">&nbsp;&nbsp;Numerisation...</option>
		<option value="505">&nbsp;&nbsp;Photographie</option>
		<option value="506">&nbsp;&nbsp;Publication</option>
		<option value="6">Internet</option>
		<option value="600">&nbsp;&nbsp;Courriel</option>
		<option value="601">&nbsp;&nbsp;Messagerie instantanee</option>
		<option value="602">&nbsp;&nbsp;Navigateurs web</option>
		<option value="603">&nbsp;&nbsp;Partage de fichiers</option>
		<option value="7">Jeux</option>
		<option value="700">&nbsp;&nbsp;Casses-tetes</option>
		<option value="701">&nbsp;&nbsp;Jeux d'arcade</option>
		<option value="702">&nbsp;&nbsp;Jeux de cartes</option>
		<option value="703">&nbsp;&nbsp;Jeux de plateau</option>
		<option value="704">&nbsp;&nbsp;Jeux de roles</option>
		<option value="705">&nbsp;&nbsp;Simulation</option>
		<option value="706">&nbsp;&nbsp;Sports</option>
		<option value="8">Polices...</option>
		<option value="9">Science...</option>
		<option value="900">&nbsp;&nbsp;Astronomie</option>
		<option value="901">&nbsp;&nbsp;Biologie</option>
		<option value="902">&nbsp;&nbsp;Chimie</option>
		<option value="903">&nbsp;&nbsp;Electronique</option>
		<option value="904">&nbsp;&nbsp;Geographie</option>
		<option value="905">&nbsp;&nbsp;Geologie</option>
		<option value="906">&nbsp;&nbsp;Informatique</option>
		<option value="907">&nbsp;&nbsp;Ingenierie</option>
		<option value="908">&nbsp;&nbsp;Mathematiques</option>
		<option value="909">&nbsp;&nbsp;Physique</option>
		<option value="10">Son et video</option>
		<option value="11">Themes...</option>
		<option value="12">Outils developpeur</option>
		<option value="1200">&nbsp;&nbsp;Analyse</option>
		<option value="1201">&nbsp;&nbsp;Bibliotheques</option>
		<option value="1202">&nbsp;&nbsp;Conception d'interfaces...</option>
		<option value="1203">&nbsp;&nbsp;Controle de version</option>
		<option value="1204">&nbsp;&nbsp;Debogage</option>
		<option value="1205">&nbsp;&nbsp;Developpement web</option>
		<option value="1206">&nbsp;&nbsp;EDI</option>
		<option value="1207">&nbsp;&nbsp;Haskell</option>
		<option value="1208">&nbsp;&nbsp;Java</option>
		<option value="1209">&nbsp;&nbsp;Lisp</option>
		<option value="1210">&nbsp;&nbsp;Mono/CLI</option>
		<option value="1211">&nbsp;&nbsp;Ocami</option>
		<option value="1212">&nbsp;&nbsp;Perl</option>
		<option value="1213">&nbsp;&nbsp;Python</option>
		<option value="1214">&nbsp;&nbsp;Ruby</option>
		<option value="1215">&nbsp;&nbsp;Traduction</option>
		<option value="13">Systeme</option>
		</select><br />

	<p>Description :</p> 
	<script type="text/javascript" src="softs/tinyeditor/tinyeditor.js"></script>
	<textarea id="description" name="description" style="width: 100%;" title="La description en HTML pur"></textarea>
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
		content:'<b>Description...</b>', // (optional) set the starting content else it will default to the textarea content
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
				<td><input title="Entrez vos remarques" type="text" size='25' name="centosr" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="centosc"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Debian.png" alt="debian" title="Debian" /> - Debian</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="debianr" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="debianc"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Fedora.png" alt="fedora" title="Fedora" /> - Fedora</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="fedorar" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="fedorac"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Kubuntu.png" alt="kubuntu" title="Kubuntu" /> - Kubuntu</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="kubuntur" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="kubuntuc"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Linux_Mint.png" alt="linux_mint" title="Linux Mint" /> - Linux Mint</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="linuxmintr" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="linuxmintc"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/MacOSX.png" alt="mac" title="Mac OS X" /> - Mac OS X</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="macosxr" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="macosxc"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Mandriva.png" alt="mandriva" title="Mandriva" /> - Mandriva</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="mandrivar" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="mandrivac"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/OpenSuse.png" alt="opensuse" title="OpenSuse" /> - OpenSuse</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="opensuser" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="opensusec"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/PCLinuxOS.png" alt="pclinuxos" title="PCLinuxOS" /> - PCLinuxOS</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="pclinuxosr" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="pclinuxosc"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/RedHat.png" alt="redhat" title="RedHat" /> - RedHat</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="redhatr" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="redhatc"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Ubuntu.png" alt="ubuntu" title="Ubuntu" /> - Ubuntu</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="ubuntur" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="ubuntuc"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Windows_XP.png" alt="windows_xp" title="Windows XP" /> - Windows XP</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="windowsxpr" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="windowsxpc"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Windows_Vista.png" alt="windows_vista" title="Windows Vista" /> - Windows Vista</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="windowsvistar" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="windowsvistac"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
			<tr>
				<th><img src="common/images/OS/Windows_7.png" alt="windows_7" title="Windows 7" /> - Windows 7</th>
				<td><input title="Entrez vos remarques" type="text" size='25' name="windows7r" /></td>
				<td><select title="Entrez votre conclusion. Voir la l&eacute;gende." name="windows7c"><option value="1">1</option><option value="2" selected="selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>
			</tr>
		</tbody></table>
		<p style="text-align: center;"><small><i>L&eacute;gende: <b>1</b> correspond &agrave; une impossibilit&eacute;. <b>2</b> correspond &agrave; une ignorance. <b>3</b> correspond &agrave; une utilisation avanc&eacute;e. <b>4</b> correspond &agrave; une utilisation th&eacute;orique. <b>5</b> correspond &agrave; un test qui s'est bien d&eacute;roul&eacute;.</i></small></p>
		<hr>
		<br /><br />
	</div>

	<div><label><img src="common/captcha.php" onclick="document.images.captcha.src='common/captcha.php?id='+Math.round(Math.random(0)*1000)+1" alt="Captcha" id="captcha" title="Cliquez sur l'image pour la recharger" /></label>
	<input style="margin-top: 12px;" name="userCode" id="userCode" type="text" title="Entrez le code, insensible &agrave; la casse.<br />Cliquez sur l'image pour la recharger." /></div><br /><br />

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

