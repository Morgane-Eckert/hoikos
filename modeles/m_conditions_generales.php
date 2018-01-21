<?php 

	function connexion_bdd4(){
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

	function afficher_conditions_generales(){
		$bdd=connexion_bdd4();
		$reponse=$bdd->query('SELECT conditions_generales from administration');
		while ($donnees = $reponse->fetch()){
			return $donnees['conditions_generales'];
		}
	}

	function afficher_mentions_legales(){
		$bdd=connexion_bdd4();
		$reponse=$bdd->query('SELECT mentions_legales from administration');
		while ($donnees = $reponse->fetch()){
			return $donnees['mentions_legales'];
		}
	}
?>