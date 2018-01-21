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
                        ajout_logement2($_SESSION['type_logement'],$_POST["telephone_fixe"],$_POST["numero_rue_logement"],$_POST["nom_rue_logement"],$_POST["code_postale_logement"],$_POST["ville_logement"],$_POST["pays_logement"]);
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
    } elseif ($_GET['target']=='decouverte'){   //decouverte
        include ('controleurs/c_decouverte.php');
        decouverte();
    }  elseif ($_GET['target']=='compte'){  //connexion
        include('controleurs/c_connexion.php');
        if (isset($_GET['action'])){
            if ($_GET['action']=='connecte') {//L'adresse mail et le mot de passe sont corrects
                if ($_SESSION["type_utilisateur"]==1){ //Si l'utilisateur est utilisateur principal
                    if (isset($_GET['reaction'])){
                        if ($_GET['reaction']=='nouvel_onglet') {
                            formulaire_nouvel_onglet();
                        } else if ($_GET['reaction']=='nouvel_onglet_rempli') {
                            ajout_nouvel_onglet2($_POST["nom_salle"]);
                        } else if ($_GET['reaction']=='home') {
                            accueil_home();
                        } else if ($_GET['reaction']=='nouvelle_fonction') {
                            formulaire_nouveau_capteur();
                        } else if ($_GET['reaction']=='nouvelle_fonction_rempli') {
                            ajout_nouveau_capteur2();
                        } else if ($_GET['reaction']=='nouvel_ordre') {
                            ajout_ordre2();
                        } else if (isset($_GET['anticipation'])) {
                            if ($_GET['anticipation']=='suppression_onglet') {
                                accueil_formulaire_suppression();
                            } else if ($_GET['anticipation']=='suppression_onglet_confirme') {
                                accueil_suppression2();
                            } else if ($_GET['anticipation']=='suppression_fonction') {
                                accueil_formulaire_suppression_fonction();
                            } else if ($_GET['anticipation']=='suppression_fonction_confirme') {
                                accueil_suppression_fonction2();
                            } if ($_GET['anticipation']=='fonction_supprimee') {
                                accueil();
                            }
                        }  else if ($_GET['reaction']=='profil'){
                            include ('controleurs/c_profil.php');
                            if(isset($_GET['rempli'])){
                                if($_GET['rempli']=='compte'){
                                    profil_editer_utilisateur_principal($_SESSION['ID_utilisateur'],$_POST['nom'],$_POST['prenom'],$_POST['telephone1'],$_POST['adresse_mail'],$_POST['date_naissance']);
                                } else if($_GET['rempli']=='adresse'){
                                    profil_editer_adresse($_SESSION['ID_utilisateur'],$_POST['nom_rue_logement'],$_POST['ville_logement'],$_POST['numero_rue_logement'],$_POST['code_postale_logement'],$_POST['telephone_fixe']);                              
                                } else if($_GET['rempli']=='secondaire'){
                                    profil_editer_utilisateur_secondaire();
                                }
                            } else {
                                profil();   
                            }
    
                        } else {
                            accueil();
                        }
                    } else {
                        accueil_home();
                    }
                } else if ($_SESSION["type_utilisateur"]==2){//Si l'utilisateur est utilisateur secondaire
                    if (isset($_GET['reaction'])){
                        if ($_GET['reaction']=='home') {
                            accueil_home_secondaire();
                        } else {
                        accueil_secondaire();
                    }
                    } else {
                        accueil_home_secondaire();
                    
                    }
                } else if ($_SESSION["type_utilisateur"]==3){//Si l'utilisateur est administrateur
                    include ('controleurs/c_administrateur.php');
                    if (isset($_GET['reaction'])){
                        if ($_GET['reaction']=='conditions_generales') {
                            if(isset($_GET['rempli'])){ 
                                if ($_GET['rempli']=='OK'){     
                                    update_cgu($_POST["conditions_generales"]);
                                } else if ($_GET['rempli']=='administrateur'){     
                                    administrateur_conditions_generales();
                                }

                            }
                            else {
                                administrateur_conditions_generales();
                            }
                        } else if ($_GET['reaction']=='mentions_legales'){
                            if(isset($_GET['rempli'])){ 
                                if ($_GET['rempli']=='OK'){     
                                    update_mentions_legales($_POST["mentions_legales"]);
                                } else if ($_GET['rempli']=='administrateur'){     
                                    administrateur_mentions_legales();
                                }
                            }
                            else {
                                administrateur_mentions_legales();
                            }
                        } else if ($_GET['reaction']=='slogan'){
                            if(isset($_GET['rempli'])){ 
                                if ($_GET['rempli']=='OK'){     
                                    update_slogan();
                                } else if ($_GET['rempli']=='administrateur'){     
                                    administrateur_slogan();
                                }
                            }
                            else {
                                administrateur_slogan();
                            }
                        } else if ($_GET['reaction']=='types'){
                            administrateur_types();
                        } else if ($_GET['reaction']=='nouveau_type_de_salle'){
                            nouveau_type_de_salle2($_POST['nom_nouveau_type_de_salle']);
                        } else if ($_GET['reaction']=='nouveau_type_de_capteur'){
                            nouveau_type_de_capteur2($_POST['nom_nouveau_type_de_capteur']);
                        } else if ($_GET['reaction']=='FAQ'){
                            if(isset($_GET['rempli'])){ 
                                if ($_GET['rempli']=='OK_edit'){
                                    update_faq_edit();
                                } else if ($_GET['rempli']=='OK_add'){
                                    update_faq_add();
                                }else {     
                                    administrateur_faq();
                                }
                            }else{
                                administrateur_faq();
                            }
                        }
                    }
                }
            } elseif ($_GET['action']=='mot_de_passe_incorrect' or $_GET['action']=='adresse_mail_inconnue'){//L'adresse mail et/ou le mot de passe sont incorrects, on renvoie vers la page d'accueil
                include('controleurs/c_premiere_page.php');
                afficher_premiere_page();
            }
        }  else{
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
        
    } elseif ($_GET['target']=='aide_message'){
        include('controleurs/c_aide.php');
        
        } elseif ($_GET['target']=='aide_message_envoyé'){
        include('controleurs/c_aide.php');
        aide();
        
        } elseif ($_GET['target']=='aide_message_bug'){
        include('controleurs/c_aide.php');
        aide();
        
    } elseif ($_GET['target']=='mot_de_passe_oublié'){
        include('controleurs/c_mail_reset.php');
        
    } elseif ($_GET['target']=='mail_non_exist'){
        include('controleurs/c_mail_reset.php');    
    
     } elseif ($_GET['target']=='mail_sent'){
        include('controleurs/c_mail_reset.php');    
    } 
} else {
    include('controleurs/c_premiere_page.php');
    afficher_premiere_page();
    deconnexion();
}
?>
