<?php 
include ('modeles/m_administrateur.php');

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

function administrateur_conditions_generales(){
    include ('vues/v_administrateur_cgu.php');
}

function administrateur_mentions_legales(){
    include ('vues/v_administrateur_mentions_legales.php');
}

function administrateur_slogan(){
    include ('vues/v_administrateur_slogan.php');
}

function administrateur_types(){
    include ('vues/v_administrateur_types.php');
}

function administrateur_faq(){
    include ('vues/v_administrateur_faq.php');
}

function nouveau_type_de_salle2($nom_nouveau_type_de_salle){
    $affectedLines = nouveau_type_de_salle($nom_nouveau_type_de_salle);
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le nouveau nom de type de fonction !');
    } else if ($affectedLines == 'oui') {
        header("Location: index.php?target=compte&action=connecte&reaction=types&anticipation=nouveau_type_de_salle_deja_existant");
    } else{
        header("Location: index.php?target=compte&action=connecte&reaction=types&anticipation=nouveau_type_de_salle_rempli");
    }
}

function nouveau_type_de_capteur2($nom_nouveau_type_de_capteur){
    $affectedLines = nouveau_type_de_capteur($nom_nouveau_type_de_capteur);
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le nouveau nom de type de fonction !');
    } else if ($affectedLines == 'oui') {
        header("Location: index.php?target=compte&action=connecte&reaction=types&anticipation=nouveau_type_de_capteur_deja_existant");
    } else{
        header("Location: index.php?target=compte&action=connecte&reaction=types&anticipation=nouveau_type_de_capteur_rempli");
    }
}
?>