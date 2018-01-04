<?php

include ('/modeles/m_connexion.php');

function verification2($email,$password){

	$affectedLines = verification($email,$password);

	if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?target=compte&action=' . $_SESSION["action"]);
    }
}

function accueil(){
	include ('vues/v_accueil.php');
}

function accueil_home(){
    include ('vues/v_accueil_home.php');
}

function formulaire_nouvel_onglet(){
	include ('vues/v_formulaire_nouvel_onglet.php');
}

function ajout_nouvel_onglet2($nom_salle,$superficie_salle){
	$affectedLines = ajout_nouvel_onglet($nom_salle,$superficie_salle);	
	if ($affectedLines === false) {
        die('Impossible d\'ajouter l\'onglet !');
    }
    else {
        header('Location: index.php?target=compte&action=connecte');
    }
}

?>