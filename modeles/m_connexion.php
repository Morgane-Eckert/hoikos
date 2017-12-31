<?php
//session_start();

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


function verification($email,$password){
	$bdd=connexion_bdd();
	$reponse = $bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE adresse_mail_utilisateur = :adresse_mail_utilisateur');
	$reponse->execute(array(
		'adresse_mail_utilisateur' => $email
		));

	//$count=($reponse->fetchColumn()==0)?1:0;
	$count=$reponse->fetchColumn();
	if ($count == 1){
		$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE adresse_mail_utilisateur = :adresse_mail_utilisateur AND mot_de_passe_utilisateur = PASSWORD(:password)');
		$reponse->execute(array(
			'adresse_mail_utilisateur'=> $email, 
			'password'=> $password
			));

		$account = $reponse->fetch();
		if(isset($account["nom_utilisateur"])){
			$_SESSION["connect"] = true;
			$_SESSION["ID_utilisateur"] = $account["ID_utilisateur"];
			$_SESSION["nom_utilisateur"] = $account["nom_utilisateur"];
			$_SESSION["prenom_utilisateur"] = $account["prenom_utilisateur"];
			$_SESSION["adresse_mail_utilisateur"] = $account["adresse_mail_utilisateur"];
			$_SESSION["type_utilisateur"] = $account["type_utilisateur"];
			$_SESSION["action"] = "connecte";
		}
		else{
			echo "L'adresse a été reconnue, mais le mot de passe est erroné. Nous vous invitons à retourner sur la <a href='index.php'>page d'accueil</a> pour réessayer.";
			$_SESSION["action"] = "mot_de_passe_incorrect";
		}
	}
	else{
		echo "L'adresse n'a pas été reconnue. Nous vous invitons à retourner sur la <a href='..\index.php'>page d'accueil</a> pour réessayer.";
		$_SESSION["action"] = "adresse_mail_inconnue";
	}
}
?>