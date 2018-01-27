<?php

function token_mdp($email) //Génère un token random et le sotck dans la base de données
{
	$token = md5(uniqid(rand(), true));

	$bdd=connexion_bdd();
	$req = $bdd->prepare("UPDATE utilisateur SET token_mdp = :token WHERE adresse_mail_utilisateur = :mail");
	$req->execute(array(
		'token' => $token,
		'mail' => $email
	));
	return $token;
}

function id_utilisateur($email) //Récupère l'ID de l'utilisateur(à partir du mail)
{
	$bdd=connexion_bdd();
	$req = $bdd->prepare("SELECT ID_utilisateur FROM utilisateur WHERE adresse_mail_utilisateur = :mail");
	$req->execute(array('mail' => $email));
	$donnees = $req->fetch();

	return $donnees['ID_utilisateur'];
}


function donnees_utilisateur($adresse_mail){
    $bdd = connexion_bdd();

		$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE adresse_mail_utilisateur=:adresse');
    $reponse->execute(array(
    'adresse'=> $adresse_mail,
    ));

    $donnees = $reponse->fetch();
    $ID_logement = $donnees['ID_logement'];
    $nom = $donnees['nom_utilisateur'];
    $prenom = $donnees['prenom_utilisateur'];
    $telephone = $donnees['telephone_1_utilisateur'];
    $date_de_naissance = $donnees['date_de_naissance_utilisateur'];
    $date_d_ajout = $donnees['date_d_ajout_utilisateur'];

    $reponse->closeCursor();

	return array($ID_logement,$nom,$prenom,$telephone,$adresse_mail,$date_de_naissance,$date_d_ajout);
}

function donnees_logement($ID_logement){
    $bdd = connexion_bdd();

		$reponse = $bdd->prepare('SELECT * FROM logement WHERE ID_logement=:id');
    $reponse->execute(array(
    'id'=> $ID_logement,
    ));

		$donnees = $reponse->fetch();
    $nomrue = $donnees['nom_rue_logement'];
    $numerorue = $donnees['numero_rue_logement'];
    $codepostal = $donnees['code_postale_logement'];
    $ville = $donnees['ville_logement'];
    $pays = $donnees['pays_logement'];
    $telephonelogement = $donnees['telephone_logement'];


    $reponse->closeCursor();

	return array($numerorue,$nomrue,$codepostal,$ville,$pays,$telephonelogement);

}

function donnees_utilisateur_secondaire($ID_logement){
  $bdd = connexion_bdd();

	$reponse2 = $bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE ID_logement=:id_logement AND type_utilisateur = :type');
	$reponse2->execute(array(
		'id_logement'=> $ID_logement,
		'type' => 2
	));

	$i=$reponse2->fetchColumn();

	if($i!=0){
	$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE ID_logement=:id_logement AND type_utilisateur = :type');
	$reponse->execute(array(
	'id_logement'=> $ID_logement,
	'type' => 2
	));

	$i=0;
	$nom = array();
	$prenom = array();
	$id=array();

	while ($donnees = $reponse->fetch()){
		$nom[] = $donnees['prenom_utilisateur'];
		$prenom[] = $donnees['nom_utilisateur'];
		$id[] = $donnees['ID_utilisateur'];
		$i = $i + 1;
	}


  $reponse->closeCursor();

	return array($i,$nom,$prenom,$id);
} else {
	return array(0,NULL,NULL,NULL);
}
}


function cemac($ID_logement){
	$bdd = connexion_bdd();

	$reponse3 = $bdd->prepare('SELECT * FROM cemac WHERE ID_logement = :ID_logement');
	$reponse3->execute(array(
			'ID_logement' => $ID_logement
			));

	$table_cemac = array();
	$c = 0;
		while ($donnees3 = $reponse3->fetch()){
			$table_cemac[$c] = $donnees3['numero_de_cemac'];
			$c = $c + 1;
		}
		return array($table_cemac,$c);
}




?>
