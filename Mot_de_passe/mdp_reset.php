<?php
session_start();

$_SESSION["samemdp"]=0;
$_SESSION["critmdp"]=0;

if (isset($_GET['token']) AND isset($_GET['id']))
{
	//Recuperation du token et id dans le lien 
	$token = htmlentities($_GET['token']);
	$id = htmlentities($_GET['id']);

	//Connexion BDD
	$bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); //Détection d'erreurs 

	//Vérification de l'existance et concordance du token et id
	$req = $bdd->prepare("SELECT COUNT(*) AS existant FROM utilisateur WHERE token_mdp = :token AND ID_utilisateur = :id LIMIT 1");
	$req->execute(array(
		'token' => $token,
		'id' => $id
	));
		
	while ($donnees = $req->fetch())
	{
		if($donnees['existant'] == 0)  //Non existant et/ou concordant
		{
			echo "Le lien a expiré, veuillez remplir le formulaire de récupération de mot de passe une nouvelle fois";	
		}
		else  //Existant et concordant
		{
			include("vue_mdp_reset.php");
		}
	}
}

if (isset($_POST['token']) AND isset($_POST['id']) AND isset($_POST['mdp']) AND isset($_POST['mdp2']))
{
	//Recuperation du token et id dans le lien 
	$token = htmlentities($_POST['token']);
	$id = htmlentities($_POST['id']);
	$mdp = htmlentities($_POST['mdp']);
	$mdp2 = htmlentities($_POST['mdp2']);

	if ($mdp == $mdp2 && (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#', $mdp)))
	{
		//Connexion BDD
		$bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); //Détection d'erreurs 

		//Modification du mot de passe dans la BDD
		$req = $bdd->prepare("UPDATE utilisateur SET mot_de_passe_utilisateur = PASSWORD(:mdp) WHERE token_mdp = :token AND ID_utilisateur = :id");
		$req->execute(array(
			'mdp' => $mdp,
			'token' => $token,
		    'id' => $id
		));

		//Effacer le token de la BDD
		$req = $bdd->prepare("UPDATE utilisateur SET token_mdp = :token WHERE ID_utilisateur = :id");
		$req->execute(array(
			'token' => NULL,
		    'id' => $id
		));

		echo "Votre mot de passe a bien été modifié";

	}
	else
	{
		if (!(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#', $mdp)))
		{
			$_SESSION["critmdp"]=1;
		}
		if (!($mdp == $mdp2))
		{
			$_SESSION["samemdp"]=1;
		}
		include("vue_mdp_reset.php");
	}
}

?>
