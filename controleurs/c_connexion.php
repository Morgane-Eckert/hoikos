<?php

include ('modeles/m_connexion.php');

function verification2($email,$password){

    $affectedLines = verification($email,$password);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    } else if ($_SESSION["type_utilisateur"]==3){
        header('Location: index.php?target=compte&action=connecte&reaction=conditions_generales');
    } else if ($_SESSION["type_utilisateur"]==4){
        header('Location: index.php?target=compte&action=connecte&reaction=cemac');
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

function routine(){
    include ('vues/v_routine.php');
}

function formulaire_nouvelle_routine_erreur(){
    if ($_GET['reaction']=='nouvelle_routine_salle_rempli') {
        header('Location: index.php?target=compte&action=connecte&reaction=nouvelle_routine_salle&comprehension=erreur&anticipation='.$_GET['anticipation']);
    }elseif ($_GET['reaction']=='nouvelle_routine_capteur_rempli') {
        header('Location: index.php?target=compte&action=connecte&reaction=nouvelle_routine_capteur&comprehension=erreur&anticipation='.$_GET['anticipation']);
    }elseif ($_GET['reaction']=='nouvelle_routine_consigne_rempli') {
        header('Location: index.php?target=compte&action=connecte&reaction=nouvelle_routine_consigne&comprehension=erreur&anticipation='.$_GET['anticipation']);
    }elseif ($_GET['reaction']=='nouvelle_routine_horaire_rempli') {
        header('Location: index.php?target=compte&action=connecte&reaction=nouvelle_routine_horaire&comprehension=erreur&anticipation='.$_GET['anticipation']);
    }elseif ($_GET['reaction']=='nouvelle_routine_nom_rempli') {
        header('Location: index.php?target=compte&action=connecte&reaction=nouvelle_routine_nom&comprehension=erreur&anticipation='.$_GET['anticipation']);
    }
}

function formulaire_nouvelle_routine_salle(){
    include ('vues/v_formulaire_nouvelle_routine_salle.php');
}

function ajout_salle_routine2($salles){
    $affectedLines = ajout_salle_routine($salles);    
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        if(isset($_GET['comprehension'])){
            header('Location: index.php?target=compte&action=connecte&reaction=routine&anticipation='.$_GET['anticipation']);
        }else  { 
            header('Location: index.php?target=compte&action=connecte&reaction=nouvelle_routine_capteur&anticipation='.$_GET['anticipation']);
        }  
    }
}

function formulaire_nouvelle_routine_capteur(){
    include ('vues/v_formulaire_nouvelle_routine_capteur.php');
}

function ajout_capteur_routine2($capteurs){
    $affectedLines = ajout_capteur_routine($capteurs);    
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        if(isset($_GET['comprehension'])){
            header('Location: index.php?target=compte&action=connecte&reaction=routine&anticipation='.$_GET['anticipation']);
        }else  { 
        header('Location: index.php?target=compte&action=connecte&reaction=nouvelle_routine_consigne&anticipation='.$_GET['anticipation']);
        } 
    }
}

function formulaire_nouvelle_routine_consigne(){
    include ('vues/v_formulaire_nouvelle_routine_consigne.php');
}

function ajout_consigne_routine2($consignes){
    $affectedLines = ajout_consigne_routine($consignes);    
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        if(isset($_GET['comprehension'])){
        header('Location: index.php?target=compte&action=connecte&reaction=routine&anticipation='.$_GET['anticipation']);
        }else  { 
        header('Location: index.php?target=compte&action=connecte&reaction=nouvelle_routine_horaire&anticipation='.$_GET['anticipation']);
        } 
    }
}

function formulaire_nouvelle_routine_horaire(){
    include ('vues/v_formulaire_nouvelle_routine_horaire.php');
}

function ajout_horaire_routine2($jours, $debut, $fin){
    $affectedLines = ajout_horaire_routine($jours,$debut,$fin);    
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        if(isset($_GET['comprehension'])){
        header('Location: index.php?target=compte&action=connecte&reaction=routine&anticipation='.$_GET['anticipation']);
        }else  { 
        header('Location: index.php?target=compte&action=connecte&reaction=nouvelle_routine_nom&anticipation='.$_GET['anticipation']);
        }
    }
}

function formulaire_nouvelle_routine_nom(){
    include ('vues/v_formulaire_nouvelle_routine_nom.php');
}

function ajout_nom_routine2($nom){
    $affectedLines = ajout_nom_routine($nom);    
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }elseif ($affectedLines == 'nom déjà existant'){
        header('Location: index.php?target=compte&action=connecte&reaction=nouvelle_routine_nom&comprehension=erreur2&anticipation='.$_GET['anticipation']);
    }else {
        header('Location: index.php?target=compte&action=connecte&reaction=routine&anticipation='.$_GET['anticipation']);
    }
}

function effacer_routine2(){
    $affectedLines = effacer_routine();    
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?target=compte&action=connecte&reaction=routine&anticipation='.$_GET['anticipation']);
    }
}

function suppression_routine2(){
    include ('vues/v_suppression_routine.php');
}

function suppression_routine_confirme2(){
    $affectedLines = suppression_routine_confirme(); 
    if ($affectedLines === false) {
        die('Impossible de supprimer la pièce !');
    } else {
        header('Location: index.php?target=compte&action=connecte&reaction=routine&comprehension=confirme&anticipation='.$_GET['anticipation']);
    }
    
}
?>
