<?php
	//variable contenant le code à afficher
	$menu_html = "";
	//dossier ou sont les pages de l'application
	$pages_dir = "inc/pages";
	//mettre le contenu de ce dossier dans un tableau
	$dir_cont = scandir($pages_dir);
	//créer la variable correspondant à la liste des pages (nom + lien)
	$menu_links = array();
	foreach($dir_cont as $key => $value)	{
		//ne rien faire si la valeur correspond à l'un des 2 premiers résultat vides
		if($value == "." || $value == "..")	{
		}
		//faire quand c'est égale à quelquechose
		else	{
			//mettre le texte du lien à afficher dans un tableau
			$menu_links[substr($value, 0, 2)]['name'] = str_replace("_", " ", substr($value, 3, -4));
			//mettre la valeur du lien dans un tableau
			$menu_links[substr($value, 0, 2)]['link'] = substr($value, 3, -4);
		}
	}
	//pour chaque entré du tableau menu_links créer un élément de liste avec un lien
	foreach($menu_links as $key => $value)	{
		//formatage code source
		$menu_html .= "\t\t\t";
		//contenu html
		$menu_html .= "<li><a href='" . $value['link'] . "'>" . $value['name'] . "</a></li>";
		//formatage code source
		$menu_html .= "\n";
	}
	//encadrer la liste
	$menu_html = "\t\t<ul>\n" . $menu_html . "\t\t</ul>\n";
	
	//aficher le code html du menu
	echo $menu_html;
	
	//si une page est demandé
	if(isset($_GET['page']))	{
		//afficher le titre de la page
		$title = $menu_links[substr($_GET['page'],0 ,2)]['name'];
		//mettre en capital les premières lettres
		$title = ucwords($title);
		//mettre en titre html
		$title = "<h2>" . $title . "</h2>";
		//formatage code source
		$title = "\t\t" . $title . "\n";
		echo $title;
		//inclure la page demandée
		include 'inc/pages/' . $_GET['page'];
	}
	
	
?>