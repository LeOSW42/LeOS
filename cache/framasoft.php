<?

$id = $_GET['id'];
$id_framasoft = $_GET['id_framasoft'];

if (file_exists('framasoft/'.$id.'.txt')) { unlink('framasoft/'.$id.'.txt'); }
$fichier = fopen('framasoft/'.$id.'.txt', 'a+');

include '../softs/simplehtmldom_1_5/simple_html_dom.php';
$framasoft = file_get_html('http://www.framasoft.net/article'.$id_framasoft.'.html');

$auteurs_table = $framasoft->find('ul', 3)->find('li', 1)->find('a');
$auteurs_table[0]->href = '';


$auteurs = $auteurs_table[0];
$i =1;
while ($auteurs_table[$i] != NULL) {
	$auteurs_table[$i]->href = '';
	$auteurs .= ', '.$auteurs_table[$i];
	$i++;
}
$auteurs = str_replace('<a href="">','',$auteurs);
$auteurs = str_replace('</a>','',$auteurs);

$article = split("<!-- texte -->",$framasoft);
$article = split("<!--liste des tags -->",$article[1]);
$article = $article[0]; 

fputs($fichier, $article."\r\n");
fputs($fichier, $auteurs);
 
fclose($fichier);

header ("Location: ".$_SERVER['HTTP_REFERER']);
echo '<a href="javascript:history.go(-1)">P</a>';
 
?>
