<?php 
session_start();
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

	$email = $_POST["adressemail"];
	$password = $_POST["mot_de_passe"];

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
			header("Location:index.php?compte=actif");
		}
		else{
			echo "L'adresse ".$email." a été reconnue, mais le mot de passe est erroné. Nous vous invitons à retourner sur la <a href='index.php'>page d'accueil</a> pour réessayer.";
		}
	}
	else{
		echo "L'adresse ".$email." n'a pas été reconnue. Nous vous invitons à retourner sur la <a href='..\index.php'>page d'accueil</a> pour réessayer.";
	}

?>