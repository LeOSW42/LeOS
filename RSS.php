<?

include ('common/session.php');
include ('common/config.inc.php');

// édition du début du fichier XML
$xml = '<?xml version="1.0" encoding="iso-8859-1"?><?xml-stylesheet type="text/xsl" href="common/updates.xslt" ?>';
$xml .= '<rss version="2.0">';
$xml .= '<channel>'; 
$xml .= '<title>'.$titrepage.'</title>';
$xml .= '<link>http://'.$_SERVER['HTTP_HOST'].'/</link>';
$xml .= '<description>'.$titrepage.' : L\'encyclopedie du logiciel libre...</description>';
$xml .= '<language>fr</language>';
$xml .= '<image>';
$xml .= '<url>http://'.$_SERVER['HTTP_HOST'].'/icons-pack/'.$iconspack.'/OSS.png</url>';
$xml .= '<title>'.$titrepage.' Icon</title>';
$xml .= '<link>http://'.$_SERVER['HTTP_HOST'].'/</link>';
$xml .= '<height>140</height>';
$xml .= '<width>140</width>';
$xml .= '</image>';

// connexion a la base
@mysql_connect($hote, $user, $password) or die("Connexion impossible");
@mysql_select_db($base) or die("Echec de selection de la base");

// selection des 10 dernieres news
$res=mysql_query("SELECT * FROM rss ORDER BY id DESC LIMIT 10");

// extraction des informations et ajout au contenu
while($tab = mysql_fetch_array($res)){   
	$titre=$tab['titre'];
	$lien='http://'.$_SERVER['HTTP_HOST'].'/';
	$description=$tab['description'];
	$date=$tab['date'];

	$xml .= '<item>';
	$xml .= '<title>'.$titre.'</title>';
	$xml .= '<link>'.$lien.'</link>';
	$xml .= '<pubDate>'.$date.' GMT</pubDate>'; 
	$xml .= '<description><![CDATA['.$description.']]></description>';
	$xml .= '</item>';	
}

// édition de la fin du fichier XML
$xml .= '</channel>';
$xml .= '</rss>';

// affichage
echo $xml;

?>
