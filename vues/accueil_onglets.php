<?php 
function connexion_bdd2(){
	try
	{
    	$bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
    	return $bdd;
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}
}

function afficher_onglets(){
	$bdd=connexion_bdd2();
	$reponse = $bdd->prepare('SELECT nom_salle FROM salle WHERE ID_logement=:ID_logement');
	$reponse->execute(array(
		'ID_logement' => $_SESSION['ID_logement']
		));

	$i=0;
	while ($donnees = $reponse->fetch()){
	    $onglets[$i]= $donnees['nom_salle']; //on met les noms de pièces dans un tableau $onglets 
	    $i++; 
	}
	return $onglets;
}
