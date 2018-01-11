<?php
function connexion_bdd()
{
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
function token_id_check($token,$id) //Vérification de l'existance et concordance du token et id (Return 0 si pas bon)
{
	$bdd=connexion_bdd();
	$req = $bdd->prepare("SELECT COUNT(*) AS existant FROM utilisateur WHERE token_mdp = :token AND ID_utilisateur = :id LIMIT 1");
	$req->execute(array(
		'token' => $token,
		'id' => $id
	));
		
	$donnees = $req->fetch();
	return $donnees['existant'];
}
function change_mdp($mdp,$token,$id) //Modification du mot de passe dans la BDD
{
	$bdd=connexion_bdd();
	$req = $bdd->prepare("UPDATE utilisateur SET mot_de_passe_utilisateur = PASSWORD(:mdp) WHERE token_mdp = :token AND ID_utilisateur = :id");
	$req->execute(array(
		'mdp' => $mdp,
		'token' => $token,
	    'id' => $id
	));	
}
function reset_token($id) //Enlève le token de la BDD
{
	$bdd=connexion_bdd();
	$req = $bdd->prepare("UPDATE utilisateur SET token_mdp = :token WHERE ID_utilisateur = :id");
	$req->execute(array(
		'token' => NULL,
	    'id' => $id
	));
}
?>