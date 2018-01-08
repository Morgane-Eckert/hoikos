<?php
session_start();

$_SESSION["mailexist"]=1;

include ('../modeles/m_mail_reset.php');


if (isset($_POST['mail']))
{
	$email = htmlentities($_POST['mail']);
	
		if(mail_exist($email) == 0)  //Le mail n'existe pas
		{	
			$_SESSION["mailexist"]=0;
			include("../vues/v_formulaire_reset.php");
		//Rediriger vers la page précédent, ajouter un message d'erreur comme quoi l'utilisateur n'existe pas
		}
		else  //Le mail existe
		{
			$token = token_mdp($email); //Génère un token random et le stock dans la base de données

			$id = id_utilisateur($email); //Récupère l'ID de l'utilisateur(à partir du mail)
			
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

			$message = "Bonjour, vous avez oubliez votre mot de passe Hoikos, cliquez sur le lien suivant pour le réinitialiser : http://localhost/hoikos-master/controleurs/c_mdp_reset.php?token=$token&id=$id";

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
	include("../vues/v_formulaire_reset.php");
}
?>