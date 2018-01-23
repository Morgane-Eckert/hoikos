<?php 
include ('modeles/m_inscription.php');

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

function verif_cond_utilisateur(){
    if ((!(isset($count)))&&(isset($_SESSION["count"]))&&($_SESSION["count"]==5))
            {
                $_SESSION["mailcheck"]=0;
                $_SESSION["mdpmatch"]=0;
                $_SESSION["respectcriteres"]=0;
            }    
}

function verif_cond_logement(){
    if (!(isset($_SESSION["cemac_check"])))
            {
                $_SESSION["cemac_check"]=0;
            }    
}

function verif_mail(){
    if (isset($_SESSION["mailcheck"]) && $_SESSION["mailcheck"]==1)
        {
    ?>
        <span class='verif'>Adresse mail déjà existante. Veuillez entrer une adresse différente.</span><br/><br/>
    <?php 
        }  
        $_SESSION["mailcheck"]=0;
}

function verif_mdp(){
            if (isset($_SESSION["mdpmatch"]) && $_SESSION["mdpmatch"]==1)
            {   
        ?>
            <span class='verif'>Le mot de passe et la confirmation du mot de passe doivent être identiques.</span><br/><br/>
        <?php 
            }
            if (isset($_SESSION["respectcriteres"]) && $_SESSION["respectcriteres"]==1)
            {
        ?>
            <span class='verif'>Les mots de passe doivent contenir au moins 8 caractères dont une majuscule, une minuscule, un chiffre et un caractère spécial.</span><br/><br/>
        <?php 
            }
            else
            {
        ?>
            <span class="NB2">Le mot de passe doit contenir au moins 8 caractères dont une majuscule, une miniscule, un chiffre et un caractère spécial.</span><br/><br/>
        <?php
            }
            $_SESSION["respectcriteres"]=0;
            $_SESSION["mdpmatch"]=0;
}

function verif_cemac(){
    if ((isset($_SESSION["cemac_check"])) && ($_SESSION["cemac_check"]==1)){
        ?>
        <span class='verif'>CEMAC non existant. Veuillez entrer un identifiant de CEMAC valide.</span><br/><br/>
    <?php 
        }  
}


function inscription_utilisateur(){
    include ('vues/v_ajout_utilisateur.php');
}

function ajout_utilisateur2($type_utilisateur,$nom_utilisateur,$prenom_utilisateur,$telephone_1_utilisateur,$date_de_naissance_utilisateur,$adresse_mail_utilisateur,$mot_de_passe_utilisateur){
    $affectedLines = ajout_utilisateur($type_utilisateur,$nom_utilisateur,$prenom_utilisateur,$telephone_1_utilisateur,$date_de_naissance_utilisateur,$adresse_mail_utilisateur,$mot_de_passe_utilisateur);
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        if ($affectedLines==0){
            header('Location: index.php?target=inscription&action=logement');}
        else{
            header('Location: index.php?target=inscription&action=utilisateur');}
    }
}

function inscription_logement(){
    include ('vues/v_ajout_logement.php');
}

function ajout_logement2($type_logement,$telephone_fixe,$numero_rue_logement,$nom_rue_logement,$code_postale_logement,$ville_logement,$pays_logement){
    $affectedLines = ajout_logement($type_logement,$telephone_fixe,$numero_rue_logement,$nom_rue_logement,$code_postale_logement,$ville_logement,$pays_logement);
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        if ($affectedLines==2){
            header('Location: index.php?target=inscription&action=utilisateurs_secondaires');}
        else{
            header('Location: index.php?target=inscription&action=logement');}
        ;
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