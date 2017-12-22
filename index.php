<?php
session_start();

if (isset($_GET['target'])) {
	if ($_GET['target']=='inscription'){	//inscription
		include('controleurs/c_inscription.php');
		if (isset($_GET['action'])){
    		if ($_GET['action']=='inscription_utilisateur') {
        		ajout_utilisateur2("1",$_POST["nom"],$_POST["prenom"],$_POST["telephone1"], $_POST["date_naissance"],$_POST["adresse_mail"],$_POST["mot_de_passe"]);
    		} elseif ($_GET['action']=='inscription_logement') {
    			echo "inscription logement";
    		}
    	} else {
				inscription_utilisateur();
		}
	} elseif ($_GET['target']=='decouverte'){	//decouverte
		include ('controleurs/c_decouverte.php');
		decouverte();
	} elseif ($_GET['target']=='compte'){	//connexion
		include('controleurs/c_connexion.php');
		if (isset($_GET['action'])){
			if ($_GET['action']=='connecte') {
				accueil();
			}
		} else{
			verification2($_POST["adressemail"],$_POST["mot_de_passe"]);
		}
			
	} elseif ($_GET['target']=='deconnexion'){
		include('controleurs/c_deconnexion.php');
		deconnexion();

	} elseif ($_GET['target']=='conditions_generales'){
		include('controleurs/c_conditions_generales.php');
		conditions_generales();

	} elseif ($_GET['target']=='mentions_legales'){
		include('controleurs/c_mentions_legales.php');
		mentions_legales();

	} elseif ($_GET['target']=='aide'){
		include('controleurs/c_aide.php');
		aide();
	}
} else {
	include('controleurs/c_premiere_page.php');
	afficher_premiere_page();
}

?>