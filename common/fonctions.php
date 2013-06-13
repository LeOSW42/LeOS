<?

// Fonction de detection de presence de l'icone

function icon($id, $iconspack) {
	$filename='icones/'.$id.'.png';
	if (file_exists($filename)) {
	    return 'softs/phpthumb/phpThumb.php?src=../../icones/'.$id.'.png&w=32&h=32&f=png';
	} else {
	    return 'softs/phpthumb/phpThumb.php?src=../../icons-pack/'.$iconspack.'/aucun.png&w=32&h=32&f=png';
	}
}

function icon64($id, $iconspack) {
	$filename='icones/'.$id.'.png';
	if (file_exists($filename)) {
	    return 'softs/phpthumb/phpThumb.php?src=../../icones/'.$id.'.png&w=64&h=64&f=png';
	} else {
	    return 'softs/phpthumb/phpThumb.php?src=../../icons-pack/'.$iconspack.'/aucun.png&w=64&h=64&f=png';
	}
}


?>
