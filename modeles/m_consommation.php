<?php

function connexion_bdd2(){
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

function afficher_consommation_eau(){
	$bdd=connexion_bdd2();
	$reponse=$bdd->prepare('SELECT donnee_recue_capteur from capteur where ID_logement= :ID_logement and ID_type_de_capteur =12');
	$reponse->execute(array(
		'ID_logement' => $_SESSION['ID_logement']
		));
	
	$i=0;
	while ($donnees = $reponse->fetch()){
	    $consommation_eau[$i]= $donnees['donnee_recue_capteur']; 
	    $i++; 
	}
		
	if($i==0){
		return array($i,NULL);

	}
	else{
		return array($i,$consommation_eau);
			
	}
}
function afficher_consommation_elec(){
	$bdd=connexion_bdd2();
	$reponse=$bdd->prepare('SELECT donnee_recue_capteur from capteur where ID_logement= :ID_logement and ID_type_de_capteur =11');
	$reponse->execute(array(
		'ID_logement' => $_SESSION['ID_logement']
		));
	$i=0;
	while ($donnees = $reponse->fetch()){
	    $consommation_elec[$i]= $donnees['donnee_recue_capteur']; 
	    $i++; 
	}
	if($i==0){
		return array($i,NULL);
	}
	else{
		return array($i,$consommation_elec);
	}
	
}


//$reponse=$bdd->prepare('SELECT donnee_recue_capteur from capteur where ID_logement= :ID_logement and ID_type_de_capteur =7');
//	$reponse->execute(array(
	//	'ID_logment' => $_SESSION['ID_logement']
	//	));
?>
