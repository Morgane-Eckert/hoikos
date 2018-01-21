<?php

function slogan() //Récupère le slogan
{
	$bdd=connexion_bdd();
	$req = $bdd->prepare("SELECT slogan FROM administration");
	$req->execute();
	$donnees = $req->fetch();
	
	return $donnees['slogan'];
}

?>