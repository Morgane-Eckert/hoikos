<?php

include ('/modeles/m_connexion.php');

function firstlettertoupper($input){
    for ($i=0;$i<strlen($input);$i++)   
    {  
        if ((preg_match("/^[A-Z]+$/",$input[$i])==true) && ($input[$i-1]!="-"))
        {
            $input[$i]=strtolower($input[$i]);
        }
        if ($input[$i]=="-")
        {
            $input[$i+1]=strtoupper($input[$i+1]);
        }
    }
    $input[0]=strtoupper($input[0]);
    return $input;
}

function verification2($email,$password){

	$affectedLines = verification($email,$password);

	if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    } else if ($_SESSION["type_utilisateur"]==3){
        echo 'a';
        header('Location: index.php?target=compte&action=connecte&reaction=conditions_generales');
    } else {
        header('Location: index.php?target=compte&action=' . $_SESSION["action"].'&reaction=home');
    }
}

function accueil(){
	include ('vues/v_accueil.php');
}

function accueil_secondaire(){
    include ('vues/v_accueil_secondaire.php');
}

function accueil_home(){
    include ('vues/v_accueil_home.php');
}

function accueil_home_secondaire(){
    include ('vues/v_accueil_home_secondaire.php');
}

function formulaire_nouvel_onglet(){
	include ('vues/v_formulaire_nouvel_onglet.php');
}

function ajout_nouvel_onglet2($nom_salle){
	$affectedLines = ajout_nouvel_onglet($nom_salle);	
	if ($affectedLines === false) {
        die('Impossible d\'ajouter l\'onglet !');
    } elseif ($affectedLines == 'nom déjà existant'){
        header('Location: index.php?target=compte&action=connecte&reaction=nouvel_onglet&anticipation=erreur');
    } else {
        header('Location: index.php?target=compte&action=connecte&reaction='.$_POST['nom_salle']);
    }
}

function formulaire_nouveau_capteur(){
    include ('vues/v_formulaire_nouvelle_fonction.php');
}

function ajout_nouveau_capteur2(){
    $affectedLines = ajout_nouveau_capteur(); 
    if ($affectedLines === false) {
        die('Impossible d\'ajouter la fonction !');
    }
    else {
        header('Location: index.php?target=compte&action=connecte&reaction='.$_GET['anticipation']);
    }
}

function ajout_ordre2(){
    $affectedLines = ajout_ordre(); 
    if ($affectedLines === false) {
        die('Impossible d\'envoyer l\'ordre !');
    } else {
        header('Location: index.php?target=compte&action=connecte&reaction='.$_GET['anticipation']);
    }
}


function accueil_formulaire_suppression(){
    include ('vues/v_accueil_suppression_onglet.php');
}

function accueil_suppression2(){
    $affectedLines = accueil_suppression(); 
    if ($affectedLines === false) {
        die('Impossible de supprimer la pièce !');
    } else {
        header('Location: index.php?target=compte&action=connecte&reaction=home&anticipation=onglet_supprime');
    }
    
}

function accueil_formulaire_suppression_fonction(){
    include ('vues/v_accueil_suppression_fonction.php');
}

function accueil_suppression_fonction2(){
    $affectedLines = accueil_suppression_fonction(); 
    if ($affectedLines === false) {
        die('Impossible de supprimer la fonction !');
    } else {
        header('Location: index.php?target=compte&action=connecte&reaction='.$_GET['reaction'].'&anticipation=fonction_supprimee');
    }
    
}

?>