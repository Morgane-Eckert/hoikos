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
			$_SESSION["ID_logement"] = $account["ID_logement"];
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
		echo "L'adresse n'a pas été reconnue. Nous vous invitons à retourner sur la <a href='index.php'>page d'accueil</a> pour réessayer.";
		$_SESSION["action"] = "adresse_mail_inconnue";
	}
}

function ajout_nouvel_onglet($nom_salle,$superficie_salle){
	$bdd=connexion_bdd();
	$requete = $bdd->prepare("INSERT INTO salle (ID_salle, ID_logement, ID_cemac, ID_type_salle, nom_salle, superficie_salle) VALUES (NULL, NULL, NULL, NULL, :nom_salle, :superficie_salle)");
	$affectedLines = $requete->execute(array(
		//'ID_logement' => '3',
	    'nom_salle' => $nom_salle,
	    'superficie_salle' => $superficie_salle
	    ));
	$req = $bdd->prepare('UPDATE salle SET ID_logement = :ID_logement ORDER BY ID_salle DESC LIMIT 1');
	$req->execute(array(
    'ID_logement' => $_SESSION['ID_logement'],
    ));
}

function ajout_nouveau_capteur($nom_capteur){
	$bdd=connexion_bdd();
	$requete = $bdd->prepare("INSERT INTO capteur (ID_capteur, ID_logement, ID_cemac, ID_type_de_capteur, nom_capteur, date_d_ajout_capteur, donnee_envoyee_capteur, donnee_recue_capteur) VALUES (NULL, NULL, NULL, NULL, :nom_capteur, NOW(), NULL, NULL)");
	$affectedLines = $requete->execute(array(
	    'nom_capteur' => $nom_capteur
	    ));
	$req = $bdd->prepare('UPDATE capteur SET ID_logement = :ID_logement ORDER BY ID_capteur DESC LIMIT 1');
	$req->execute(array(
    'ID_logement' => $_SESSION['ID_logement'],
    ));
}




?>