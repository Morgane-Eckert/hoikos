<?php 

	function afficher_conditions_generales(){
		$bdd=connexion_bdd();
		$reponse=$bdd->query('SELECT conditions_generales from administration');
		while ($donnees = $reponse->fetch()){
			return $donnees['conditions_generales'];
		}
	}

	function afficher_mentions_legales(){
		$bdd=connexion_bdd();
		$reponse=$bdd->query('SELECT mentions_legales from administration');
		while ($donnees = $reponse->fetch()){
			return $donnees['mentions_legales'];
		}
	}
?>