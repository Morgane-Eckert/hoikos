<?php

function nouveau_type_de_salle($nom_nouveau_type_de_salle){
	$bdd=connexion_bdd();
	$reponse0 = $bdd->prepare('SELECT COUNT(*) AS nombre_type_de_salle FROM type_de_salle WHERE nom_type_de_salle=:nom_type_de_salle');
	$reponse0->execute(array(
		'nom_type_de_salle' => $nom_nouveau_type_de_salle
		));
	$donnees0 = $reponse0->fetch();
	if ($donnees0['nombre_type_de_salle']==0){/*Si le nouveau nom de type de salle n'existe pas deja, on l'ajoute bien dans la base de donnee*/
		$requete = $bdd->prepare("INSERT INTO type_de_salle (nom_type_de_salle) VALUES (:nom_type_de_salle)");
		$requete->execute(array(
			'nom_type_de_salle' => $nom_nouveau_type_de_salle
		    ));
	} else {
		$nom_deja_existant='oui';
		return $nom_deja_existant;
	}
}

function nouveau_type_de_capteur($nom_nouveau_type_de_capteur){
	$bdd=connexion_bdd();
	$nom_nouveau_type_de_capteur[0] = strtoupper($nom_nouveau_type_de_capteur[0]);
	$reponse0 = $bdd->prepare('SELECT COUNT(*) AS nombre_type_de_capteur FROM type_de_capteur WHERE nom_type_de_capteur=:nom_type_de_capteur');
	$reponse0->execute(array(
		'nom_type_de_capteur' => $nom_nouveau_type_de_capteur
		));
	$donnees0 = $reponse0->fetch();
	if ($donnees0['nombre_type_de_capteur']==0){/*Si le nouveau nom de type de capteur n'existe pas deja, on l'ajoute bien dans la base de donnee*/
		$requete = $bdd->prepare("INSERT INTO type_de_capteur (nom_type_de_capteur) VALUES (:nom_type_de_capteur)");
		$requete->execute(array(
			'nom_type_de_capteur' => $nom_nouveau_type_de_capteur
		    ));
	} else {
		$nom_deja_existant='oui';
		return $nom_deja_existant;
	}
}
?>