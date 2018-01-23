<?php

if (isset($_POST['prenom']) AND isset($_POST['nom']) AND isset($_POST['mail']) AND isset($_POST['message']))
{
	//Recuperation des données
	$prenom = htmlentities($_POST['prenom']);
	$nom = htmlentities($_POST['nom']);
	$mail = htmlentities($_POST['mail']);
	$message = htmlentities($_POST['message']);

	//Envoi du message sur la boite mail d'Hoikos
	$destinataire = 'hoikosg4c@gmail.com';
	$expediteur = 'hoikosg4c@gmail.com';
	$copie = '';
	$copie_cachee = '';
	$objet = 'Message de '.$prenom.' '.$nom; // Objet du message
	$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
	$headers .= 'Content-type: text/html; charset=utf-8' . "\n"; //Pour avoir un mail en format HTML
	$headers .= 'Reply-To: '.$mail."\n"; // Mail de reponse
	$headers .= 'From: '.$prenom.' '.$nom.'<'.$mail.'>'."\n"; // Expediteur
	$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
	$headers .= 'Cc: '.$copie."\n"; // Copie Cc
	$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        

	$texte = 
	'<html>
      <body>
       <p>Adresse mail de '.$prenom.' '.$nom.': '.$mail.'</p> 
       <p>Contenu du message :</p>
       <p>'.$message.'</p>
      </body>
     </html>';

	if (mail($destinataire, $objet, $texte, $headers)) // Envoi du message
	{
	    header("location: index.php?target=sav_message_envoyé");
	}
	else // Non envoyé
	{
	    header("location: index.php?target=sav_message_bug");

	}
}
else
{
	include ('vues/v_sav.php');
}

?>