<?php
session_start();

$_SESSION["mailexist"]=1;

if (isset($_POST['mail']))
{
	//Connexion BDD
	$bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); //Détection d'erreurs 

	$email = htmlentities($_POST['mail']);
	
	//Verification existance de l'email sur la base de données
	$req = $bdd->prepare("SELECT COUNT(*) AS existant FROM utilisateur WHERE adresse_mail_utilisateur = :mail LIMIT 1");
	$req->execute(array('mail' => $email));
	
	$donnees = $req->fetch();
	
		if($donnees['existant'] == 0)  //Le mail n'existe pas
		{	
			$_SESSION["mailexist"]=0;
			include("vue_formulaire_reset.php");
		//Rediriger vers la page précédent, ajouter un message d'erreur comme quoi l'utilisateur n'existe pas
		}
		else  //Le mail existe
		{
			$token = md5(uniqid(rand(), true));
			//echo $token;

			$req = $bdd->prepare("UPDATE utilisateur SET token_mdp = :token WHERE adresse_mail_utilisateur = :mail");
			$req->execute(array(
				'token' => $token,
				'mail' => $email
			));	//Génerer un token unique et le stocker dans la base de données

			//Récupère l'ID de l'utilisateur
			$req = $bdd->prepare("SELECT ID_utilisateur FROM utilisateur WHERE adresse_mail_utilisateur = :mail");
			$req->execute(array('mail' => $email));
			$donnees = $req->fetch();
			$id = $donnees['ID_utilisateur'];
			
			//Envoyer un mail contenant un lien vers la page permettant la modificationtion du mot de passe
			$destinataire = $email;
			$expediteur = 'hoikosg4c@gmail.com';
			$copie = '';
			$copie_cachee = 'hoikosg4c@gmail.com';
			$objet = 'Récupération du mot de passe Hoikos'; // Objet du message
			$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
			$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
			$headers .= 'From: "Hoikos"<'.$expediteur.'>'."\n"; // Expediteur
			$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
			$headers .= 'Cc: '.$copie."\n"; // Copie Cc
			$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        

			$message = "Bonjour, vous avez oubliez votre mot de passe Hoikos, cliquez sur le lien suivant pour le réinitialiser : http://localhost/Mot_de_passe/mdp_reset.php?token=$token&id=$id";

			if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
			{
			    echo 'Un mail vous a été envoyé afin de réinitialiser votre mot de passe';
			}
			else // Non envoyé
			{
			    echo "Erreur lors de l'envoi du mail, veuillez contacter directement Hoikos";
			}
		}
}
else
{
	include("vue_formulaire_reset.php");
}
?>