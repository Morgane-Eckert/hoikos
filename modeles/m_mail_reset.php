<?php

function connexion_bdd_mail(){
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

function mail_exist($email) //Vérifie l'existance du mail (Return 0 si non existant)
{
	$bdd=connexion_bdd_mail();
	$req = $bdd->prepare("SELECT COUNT(*) AS existant FROM utilisateur WHERE adresse_mail_utilisateur = :mail LIMIT 1");
	$req->execute(array('mail' => $email));
	$donnees = $req->fetch();
	
	return $donnees['existant'];
}
function token_mdp($email) //Génère un token random et le sotck dans la base de données
{
	$token = md5(uniqid(rand(), true));
	
	$bdd=connexion_bdd_mail();		
	$req = $bdd->prepare("UPDATE utilisateur SET token_mdp = :token WHERE adresse_mail_utilisateur = :mail");
	$req->execute(array(
		'token' => $token,
		'mail' => $email
	));
	return $token;
}
function id_utilisateur($email) //Récupère l'ID de l'utilisateur(à partir du mail)
{
	$bdd=connexion_bdd_mail();
	$req = $bdd->prepare("SELECT ID_utilisateur FROM utilisateur WHERE adresse_mail_utilisateur = :mail");
	$req->execute(array('mail' => $email));
	$donnees = $req->fetch();
	
	return $donnees['ID_utilisateur'];
}
?>