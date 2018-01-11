<?php
session_start();

if (isset($_GET['target'])) {
	if ($_GET['target']=='inscription'){
		include('controleurs/c_inscription.php');
		if (isset($_GET['action'])){
    		if ($_GET['action']=='utilisateur') {
    			if (isset($_GET['reaction'])){
    				if ($_GET['reaction']=='rempli') {
        				ajout_utilisateur2("1",$_POST["nom"],$_POST["prenom"],$_POST["telephone1"], $_POST["date_naissance"],$_POST["adresse_mail"],$_POST["mot_de_passe"]);
                            $count=0;
        			}
        		} else {
        			inscription_utilisateur();
        		}
    		} elseif ($_GET['action']=='logement') {
    			if (isset($_GET['reaction'])){
    				if ($_GET['reaction']=='rempli') {
        				ajout_logement2($_POST["superficie"],$_SESSION['type_logement'],$_POST["telephone_fixe"],$_POST["numero_rue_logement"],$_POST["nom_rue_logement"],$_POST["code_postale_logement"],$_POST["ville_logement"],$_POST["pays_logement"]);
        			}
        		} else {
        			inscription_logement();
        		}
    		} elseif ($_GET['action']=='utilisateurs_secondaires') {
    			if (isset($_GET['reaction'])){
    				if ($_GET['reaction']=='rempli') {
    					ajout_utilisateurs_secondaires2("2",$_POST["nom"],$_POST["prenom"],$_POST["telephone1"], $_POST["date_naissance"],$_POST["adresse_mail"],$_POST["mot_de_passe"]);
        			}
        		} else {
        			inscription_utilisateurs_secondaires();
        		}
        	} elseif ($_GET['action']=='autres_utilisateurs_secondaires') {
    			if (isset($_GET['reaction'])){
    				if ($_GET['reaction']=='rempli') {
    					ajout_utilisateurs_secondaires2("2",$_POST["nom"],$_POST["prenom"],$_POST["telephone1"], $_POST["date_naissance"],$_POST["adresse_mail"],$_POST["mot_de_passe"]);
        			}
        		} else {
        			inscription_autres_utilisateurs_secondaires();
        		}
        	}
    	}
	} elseif ($_GET['target']=='decouverte'){	//decouverte
		include ('controleurs/c_decouverte.php');
		decouverte();
	} elseif ($_GET['target']=='compte'){	//connexion
		include('controleurs/c_connexion.php');
		if (isset($_GET['action'])){
			if ($_GET['action']=='connecte') {//L'adresse mail et le mot de passe sont corrects
                if (isset($_GET['reaction'])){
                    if ($_GET['reaction']=='nouvel_onglet') {
                        formulaire_nouvel_onglet();
                    } else if ($_GET['reaction']=='nouvel_onglet_rempli') {
                        ajout_nouvel_onglet2($_POST["nom_salle"],$_POST["superficie_salle"]);
                    } else if ($_GET['reaction']=='home') {
                        accueil_home();
                    } else if ($_GET['reaction']=='nouvelle_fonction') {
                        formulaire_nouveau_capteur();
                    } else if ($_GET['reaction']=='nouvelle_fonction_rempli') {
                        ajout_nouveau_capteur2();
                    } else {
                        accueil();
                    }
                } else {
                    accueil_home();
                }
			} elseif ($_GET['action']=='mot_de_passe_incorrect' or $_GET['action']=='adresse_mail_inconnue'){//L'adresse mail et/ou le mot de passe sont incorrects, on renvoie vers la page d'accueil
                include('controleurs/c_premiere_page.php');
                afficher_premiere_page();
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
	} elseif ($_GET['target']=='mot_de_passe_oublié'){
        include('controleurs/c_mail_reset.php');
    }
} else {
	include('controleurs/c_premiere_page.php');
	afficher_premiere_page();
}

?>
