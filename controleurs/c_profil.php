<?php

include ('modeles/m_profil.php');



function profil(){
	include('vues/v_profil.php');
}

function profil_secondaire(){
	include("vues/v_profil_secondaire.php");
}

function profil_editer_utilisateur_principal($session_adresse,$nom,$prenom,$telephone,$adresse_mail,$date_de_naissance){
	$bdd = connexion_bdd();

		$id_utilisateur = id_utilisateur($session_adresse);

	$reponse = $bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE adresse_mail_utilisateur = :adresse_mail_utilisateur AND ID_utilisateur != :id');
	$reponse->execute(array(
	'adresse_mail_utilisateur' => $adresse_mail,
	'id' => $id_utilisateur
	));

	$count=$reponse->fetchColumn();

	if($count==0){
		$req = $bdd->prepare('UPDATE utilisateur SET nom_utilisateur = :nvnom, prenom_utilisateur = :nvprenom, adresse_mail_utilisateur = :nvadresse, date_de_naissance_utilisateur = :nvdate, telephone_1_utilisateur = :nvtelephone WHERE ID_utilisateur = :id');
		$req->execute(array(
			'nvnom' => $nom,
			'nvprenom' => $prenom,
			'nvadresse' => $adresse_mail,
			'nvdate' => $date_de_naissance,
			'nvtelephone' => $telephone,
			'id' => $id_utilisateur,
		));
		$_SESSION["adresse_mail_utilisateur"] = $adresse_mail;
			header("Location:index.php?target=compte&action=connecte&reaction=profil");

	} else {

		$req = $bdd->prepare('UPDATE utilisateur SET nom_utilisateur = :nvnom, prenom_utilisateur = :nvprenom, date_de_naissance_utilisateur = :nvdate, telephone_1_utilisateur = :nvtelephone WHERE ID_utilisateur = :id');
		$req->execute(array(
			'nvnom' => $nom,
			'nvprenom' => $prenom,
			'nvdate' => $date_de_naissance,
			'nvtelephone' => $telephone,
			'id' => $id_utilisateur,
		));

		header("Location:index.php?target=compte&action=connecte&reaction=profil&conflit=".$adresse_mail);
	}

}

function profil_editer_adresse($session_adresse,$ruelogement,$villelogement,$numeroruelogement,$codepostallogement,$telephonefixe){
	$bdd = connexion_bdd();

	$id_utilisateur = id_utilisateur($session_adresse);

			$reponse = $bdd->prepare('SELECT ID_logement FROM utilisateur WHERE ID_utilisateur=:id');
		  $reponse->execute(array(
		  'id'=> $id_utilisateur,
		  ));

			$donnees = $reponse->fetch();

		  $ID_logement = $donnees['ID_logement'];
		  $reponse->closeCursor();

			$req = $bdd->prepare('UPDATE logement SET nom_rue_logement = :nvnomrue,ville_logement = :nvville, numero_rue_logement = :nvnumerorue, code_postale_logement = :nvcodepostale, telephone_logement = :nvtelephone WHERE ID_logement = :id');
			$req->execute(array(
				'nvnomrue' => $ruelogement,
				'nvville' => $villelogement,
				'nvnumerorue' => $numeroruelogement,
				'nvcodepostale' => $codepostallogement,
				'nvtelephone' => $telephonefixe,
				'id' => $ID_logement,
			));

			header("Location:index.php?target=compte&action=connecte&reaction=profil");

}


function supprimer($id){
	$bdd=connexion_bdd();

	$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = :id');
	$reponse->execute(array(
	'id'=> $id,
	));

	$donnees = $reponse->fetch();
	$prenom=$donnees['prenom_utilisateur'];



	$req = $bdd->prepare("DELETE FROM utilisateur WHERE id_utilisateur = :id");
	$req->execute(array(
		"id"=>$id,
	));

	header("Location:index.php?target=compte&action=connecte&reaction=profil&suppression=".$prenom);
}

function ajouter_cemac($id_cemac,$session_adresse){
	$bdd = connexion_bdd();

	$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE adresse_mail_utilisateur=:id');
	$reponse->execute(array(
	'id'=> $session_adresse,
	));

	$donnees=$reponse->fetch();

	$req = $bdd->prepare('UPDATE cemac SET etat_cemac = 1, ID_logement = :id WHERE numero_de_cemac = :num');
	$req->execute(array(
			'id' => $donnees["ID_logement"],
			'num'=> $id_cemac
			));
}

function changement($email){

			$token = token_mdp($email); //Génère un token random et le stock dans la base de données
			$id = id_utilisateur($email); //Récupère l'ID de l'utilisateur(à partir du mail)
			//Envoyer un mail contenant un lien vers la page permettant la modificationtion du mot de passe
			$destinataire = $email;
			$expediteur = 'hoikosg4c@gmail.com';
			$copie = '';
			$copie_cachee = 'hoikosg4c@gmail.com';
			$objet = 'Changement du mot de passe Hoikos'; // Objet du message
			$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
			$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
			$headers .= 'From: "Hoikos"<'.$expediteur.'>'."\n"; // Expediteur
			$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
			$headers .= 'Cc: '.$copie."\n"; // Copie Cc
			$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc
			$message = "Bonjour, Pour changer votre mot de passe Hoikos, cliquez sur le lien suivant pour le réinitialiser : http://localhost/hoikos-master/controleurs/c_mdp_reset.php?token=$token&id=$id";
			if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
			{
				echo "";
			}
			else // Non envoyé
			{
			    echo "Erreur lors de l'envoi du mail, veuillez contacter directement Hoikos";
			}
			header("Location:index.php?target=compte&action=connecte&reaction=profil&Mail");
		}

?>
