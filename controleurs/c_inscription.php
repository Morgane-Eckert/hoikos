<?php 

include ('modeles/m_inscription.php');

function inscription_utilisateur(){
	include ('vues/v_ajout_utilisateur.php');
}

function ajout_utilisateur2($type_utilisateur,$nom_utilisateur,$prenom_utilisateur,$telephone_1_utilisateur,$date_de_naissance_utilisateur,$adresse_mail_utilisateur,$mot_de_passe_utilisateur){

	$affectedLines = ajout_utilisateur($type_utilisateur,$nom_utilisateur,$prenom_utilisateur,$telephone_1_utilisateur,$date_de_naissance_utilisateur,$adresse_mail_utilisateur,$mot_de_passe_utilisateur);

	if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?target=inscription&action=logement');
        $_SESSION["connect"] = true;
        $_SESSION["ID_utilisateur"] = $account["ID_utilisateur"];
        $_SESSION["nom_utilisateur"] = $account["nom_utilisateur"];
        $_SESSION["prenom_utilisateur"] = $account["prenom_utilisateur"];
        $_SESSION["adresse_mail_utilisateur"] = $account["adresse_mail_utilisateur"];
        $_SESSION["type_utilisateur"] = $account["type_utilisateur"];

    }
}

function inscription_logement(){
	include ('vues/v_ajout_logement.php');
}

function ajout_logement2($superficie_totale_logement,$type_logement,$telephone_fixe,$numero_rue_logement,$nom_rue_logement,$code_postale_logement,$ville_logement,$pays_logement){
	$affectedLines = ajout_logement($superficie_totale_logement,$type_logement,$telephone_fixe,$numero_rue_logement,$nom_rue_logement,$code_postale_logement,$ville_logement,$pays_logement);
	if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?target=inscription&action=utilisateurs_secondaires');
    }
}

function inscription_utilisateurs_secondaires(){
	include ('vues/v_ajout_utilisateurs_secondaires.php');
}

function ajout_utilisateurs_secondaires2($type_utilisateur,$nom_utilisateur,$prenom_utilisateur,$telephone_1_utilisateur,$date_de_naissance_utilisateur,$adresse_mail_utilisateur,$mot_de_passe_utilisateur){

	$affectedLines = ajout_utilisateurs_secondaires($type_utilisateur,$nom_utilisateur,$prenom_utilisateur,$telephone_1_utilisateur,$date_de_naissance_utilisateur,$adresse_mail_utilisateur,$mot_de_passe_utilisateur);

	if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?target=inscription&action=autres_utilisateurs_secondaires');
    }
}

function inscription_autres_utilisateurs_secondaires(){
	include ('vues/v_ajout_autres_utilisateurs_secondaires.php');
}
?>