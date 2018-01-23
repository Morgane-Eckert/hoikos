<?php 

function connexion_bdd(){
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

function slogan() //Récupère le slogan
{
	$bdd=connexion_bdd();
	$req = $bdd->prepare("SELECT slogan FROM administration");
	$req->execute();
	$donnees = $req->fetch();
	
	return $donnees['slogan'];
}

?>