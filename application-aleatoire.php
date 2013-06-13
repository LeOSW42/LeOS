<?

include ('common/session.php');

/* Gestion de l'aleatoire */

include("common/config.inc.php");
$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base, $connect);

$retour = mysql_query("SELECT * FROM fiche_soft");
$max = mysql_num_rows($retour);
$min = 1;
  
mysql_close($connect);

srand();
$numero = rand($min, $max);

$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base, $connect);

$requete = mysql_query("SELECT id FROM fiche_soft LIMIT $numero , $numero");
$id_logiciel = mysql_fetch_array($requete);
$id = $id_logiciel['id'];
  
mysql_close($connect);

header ('Location: fiche.php?id='.$id);

?>
