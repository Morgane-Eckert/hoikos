<?php


function afficher_consommation_eau(){
	$bdd=connexion_bdd();
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
	$bdd=connexion_bdd();
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

function type_utilisateur(){
	$bdd = connexion_bdd();
	$reponse = $bdd->prepare('SELECT type_utilisateur FROM utilisateur WHERE adresse_mail_utilisateur = :adresse');
	$reponse->execute(array(
		'adresse' => $_SESSION['adresse_mail_utilisateur']
	));

	$donnees = $reponse->fetch();
	return $donnees['type_utilisateur'];
}

//$reponse=$bdd->prepare('SELECT donnee_recue_capteur from capteur where ID_logement= :ID_logement and ID_type_de_capteur =7');
//	$reponse->execute(array(
	//	'ID_logment' => $_SESSION['ID_logement']
	//	));
?>
