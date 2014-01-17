		<h3>Ajouter un nouveau Joueur</h3>
		<form action="" method="post">
			<label>Nom :</label>
			<input type="text" name="nom_joueur">
			<input type="submit" name="ajouter_joueur">
		</form>
		<h3>Liste des joueurs</h3>
<?php
	//si un formulaire a été posté
	if(isset($_POST) && !empty($_POST)) 	{
		//si le formulaire d'ajout a été soumis
		if(isset($_POST['ajouter_joueur']))	{
			//Requête de la liste de joueurs
			$result = mysql_query("SELECT * FROM `joueurs` WHERE 1 LIMIT 0, 30 ");
			// Mettre les résultats dans un tableau
			for($i = 0; $array[$i] = mysql_fetch_assoc($result); $i++) ;
			// supprimer la dernière ligne vide
			array_pop($array);
			//construire la requete d'ajout de joueur
			$sql = "INSERT INTO `pingpong`.`joueurs` (`id`, `pseudo`) VALUES (NULL, '" . strtolower($_POST['nom_joueur']) . "')";
			//executer la requete
			mysql_query($sql);
		}
	}
	
	//Liste des joueurs
	//Requête de la liste de joueurs
	$result = mysql_query("SELECT * FROM `joueurs` WHERE 1 LIMIT 0, 30 ");
	// Mettre les résultats dans un tableau
	for($i = 0; $array[$i] = mysql_fetch_assoc($result); $i++) ;
	// supprimer la dernière ligne vide
	array_pop($array);
	//créer la liste html
	$joueur_list_html = "";
	foreach($array as $key => $value)	{
		//formatga
		$joueur_list_html .= "\t\t\t";
		$joueur_list_html .= "<li>";
		$joueur_list_html .= "<a href=''>";
		$joueur_list_html .= ucwords($value['pseudo']);
		$joueur_list_html .= "</a>";
		$joueur_list_html .= " - ";
		$joueur_list_html .= "<a href=''>";
		$joueur_list_html .= "supprimer";
		$joueur_list_html .= "</a>";
		$joueur_list_html .= "</li>\n";
	}
	$joueur_list_html = "\t\t<ul>\n" . $joueur_list_html . "\t\t</ul>";
	echo $joueur_list_html;
?>