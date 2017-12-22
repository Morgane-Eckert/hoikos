<?php

include ('./modeles/m_connexion.php');

function verification2($email,$password){

	$affectedLines = verification($email,$password);

	if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?target=compte&action=connecte');
    }
}

function accueil(){
	include ('vues/v_accueil.php');
}
?>