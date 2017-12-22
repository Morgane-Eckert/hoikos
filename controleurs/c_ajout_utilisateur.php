<?php 
include ('/modeles/m_ajout_utilisateur.php');
function ajout_utilisateur2($type_utilisateur,$nom_utilisateur,$prenom_utilisateur,$telephone_1_utilisateur,$date_de_naissance_utilisateur,$adresse_mail_utilisateur,$mot_de_passe_utilisateur){

	$affectedLines = ajout_utilisateur($type_utilisateur,$nom_utilisateur,$prenom_utilisateur,$telephone_1_utilisateur,$date_de_naissance_utilisateur,$adresse_mail_utilisateur,$mot_de_passe_utilisateur);

	if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?target=inscription&action=inscription_logement');
    }
}

function inscription_utilisateur(){
	include ('vues/v_inscription_utilisateur.php');
}
?>
