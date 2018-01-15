<?php
function connexion_bdd3(){
	try
	{
    	$bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
    	return $bdd;
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}
}

function donnees_utilisateur($id_utilisateur){
    $bdd = connexion_bdd3();
    $reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE ID_utilisateur=:id');
    $reponse->execute(array(
    'id'=> $id_utilisateur,
    ));
    
    while ($donnees = $reponse->fetch()){
    $ID_logement = $donnees['ID_logement'];
    $nom = $donnees['nom_utilisateur'];
    $prenom = $donnees['prenom_utilisateur'];
    $telephone = $donnees['telephone_1_utilisateur'];
    $adresse_mail = $donnees['adresse_mail_utilisateur'];
    $date_de_naissance = $donnees['date_de_naissance_utilisateur'];
    $date_d_ajout = $donnees['date_de_naissance_utilisateur'];
    }
    $reponse->closeCursor();
	
	return array($ID_logement,$nom,$prenom,$telephone,$adresse_mail,$date_de_naissance,$date_d_ajout);
}

function donnees_logement($ID_logement){
    $bdd = connexion_bdd3();
	$reponse = $bdd->prepare('SELECT * FROM logement WHERE ID_logement=:id');
    $reponse->execute(array(
    'id'=> $ID_logement,
    ));
	
	while ($donnees = $reponse->fetch()){
    $nomrue = $donnees['nom_rue_logement'];
    $numerorue = $donnees['numero_rue_logement']; 
    $codepostal = $donnees['code_postale_logement'];
    $ville = $donnees['ville_logement'];
    $pays = $donnees['pays_logement'];
    $telephonelogement = $donnees['telephone_logement'];
    }
	
    $reponse->closeCursor();
	
	return array($numerorue,$nomrue,$codepostal,$ville,$pays,$telephonelogement);

}

function donnees_utilisateur_secondaire($ID_logement,$ID_utilisateur){
    $bdd = connexion_bdd3();
	$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE ID_logement=:id_logement');
	$reponse->execute(array(
	'id_logement'=> $ID_logement,
	));
	
	$i=0;
	while ($donnees = $reponse->fetch()){
	if ($donnees['ID_utilisateur']==$ID_utilisateur){
	}  else {
		list($nom,$prenom,$i) = utilisateur_secondaire($ID_logement,$ID_utilisateur);
	}
	}
	
    $reponse->closeCursor();
	
	return array($i,$nom,$prenom);
}

function utilisateur_secondaire($ID_logement,$ID_utilisateur){
    $bdd = connexion_bdd3();
	$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE ID_logement=:id_logement');
	$reponse->execute(array(
	'id_logement'=> $ID_logement,
	));
	
	$i = 0;
	$nom = array();
	$prenom = array();
	while ($donnees = $reponse->fetch()){
	if ($donnees['ID_utilisateur']==$ID_utilisateur){
	}  else {
		$i = $i + 1;
		$nom[] = $donnees['prenom_utilisateur'];
		$prenom[] = $donnees['nom_utilisateur'];
	}
	}
	
	$reponse->closeCursor();
	
	return array($nom,$prenom,$i);
}



function editer_utilisateur_secondaire(){
	
}

?>