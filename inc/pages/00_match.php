<?php
	//initialisation de la variable pour le code de saisie de match
	$match_form = "";
	//Requête de la liste de joueurs
	$result = mysql_query("SELECT * FROM `joueurs` WHERE 1 LIMIT 0, 30 ");
	// Mettre les résultats dans un tableau
	for($i = 0; $array[$i] = mysql_fetch_assoc($result); $i++) ;
	// supprimer la dernière ligne vide
	array_pop($array);
	
	//création du code de sélection de joueur
	$joueur_sel = "";
	foreach($array as $key => $value)	{
		$joueur_sel .= "<option>";
		$joueur_sel .= $value['pseudo'];
		$joueur_sel .= "</option>";
	}
	
	$joueur_sel = "<select>" . $joueur_sel . "</select>";

	//création du code de saisie de vainqueur de chaque set
	$code_match = "";
	for($i = 0; $i <= 4; $i++)	{
		$code_match .= "<tr>";
		$code_match .= "<td>";
		$code_match .= '<input type="radio" name="set' . $i . '" value="Joueur1">';
		$code_match .= "</td>";
		$code_match .= "<td>";
		$code_match .= '<input type="radio" name="set' . $i . '" value="Joueur2">';
		$code_match .= "</td>";
		$code_match .= "</tr>";
	}
	//ajout de la ligne de selection des joueurs
	$code_match = "<tr><td>" . $joueur_sel . "</td><td>" . $joueur_sel . "</td></tr>" . $code_match;
	//ajout de la ligne de validation du match
	$code_match .= '<tr><td COLSPAN="2" class="match_submit"><input type="submit"></td></tr>';
	$code_match = "<table border>" . $code_match . "</table>";
	
	echo htmLawed($code_match, array('tidy'=>4))
?>