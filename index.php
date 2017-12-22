<?php

include('controleurs/c_ajout_utilisateur.php');

if (isset($_GET['target'])) {
	if ($_GET['target']=='inscription'){
		if (isset($_GET['action'])){
    		if ($_GET['action']=='inscription_utilisateur') {
        		ajout_utilisateur2("1",$_POST["nom"],$_POST["prenom"],$_POST["telephone1"], $_POST["date_naissance"],$_POST["adresse_mail"],$_POST["mot_de_passe"]);
    		} elseif ($_GET['action']=='inscription_logement') {
    			echo "inscription logement";
    		}
    	} else {
				inscription_utilisateur();
		}
	}
} else {
	include ('vues/v_connexion.php');
}

?>
