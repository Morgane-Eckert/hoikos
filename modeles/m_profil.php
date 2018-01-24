<?php
function token_mdp($email) //Génère un token random et le sotck dans la base de données
{
	$token = md5(uniqid(rand(), true));

	$bdd=connexion_bdd();
	$req = $bdd->prepare("UPDATE utilisateur SET token_mdp = :token WHERE adresse_mail_utilisateur = :mail");
	$req->execute(array(
		'token' => $token,
		'mail' => $email
	));
	return $token;
}
function id_utilisateur($email) //Récupère l'ID de l'utilisateur(à partir du mail)
{
	$bdd=connexion_bdd();
	$req = $bdd->prepare("SELECT ID_utilisateur FROM utilisateur WHERE adresse_mail_utilisateur = :mail");
	$req->execute(array('mail' => $email));
	$donnees = $req->fetch();

	return $donnees['ID_utilisateur'];
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
			$message = "Bonjour, Pour changer votre mot de passe Hoikos, cliquez sur le lien suivant pour le réinitialiser : http://localhost/thelast/h/controleurs/c_mdp_reset.php?token=$token&id=$id";
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

function donnees_utilisateur($id_utilisateur){
    $bdd = connexion_bdd();
    $reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE ID_utilisateur=:id');
    $reponse->execute(array(
    'id'=> $id_utilisateur,
    ));

    while ($donnees = $reponse->fetch()){
    $ID_logement = $donnees['ID_logement'];
    $nom = $donnees['nom_utilisateur'];
    $prenom = $donnees['prenom_utilisateur'];
    $telephone = $donnees['telephone_1_utilisateur'];
    $adresse_mail = $donnees['adresse_mail_utilisateur'];
    $date_de_naissance = $donnees['date_de_naissance_utilisateur'];
    $date_d_ajout = $donnees['date_d_ajout_utilisateur'];
    }
    $reponse->closeCursor();

	return array($ID_logement,$nom,$prenom,$telephone,$adresse_mail,$date_de_naissance,$date_d_ajout);
}

function donnees_logement($ID_logement){
    $bdd = connexion_bdd();
	$reponse = $bdd->prepare('SELECT * FROM logement WHERE ID_logement=:id');
    $reponse->execute(array(
    'id'=> $ID_logement,
    ));

	while ($donnees = $reponse->fetch()){
    $nomrue = $donnees['nom_rue_logement'];
    $numerorue = $donnees['numero_rue_logement'];
    $codepostal = $donnees['code_postale_logement'];
    $ville = $donnees['ville_logement'];
    $pays = $donnees['pays_logement'];
    $telephonelogement = $donnees['telephone_logement'];
    }

    $reponse->closeCursor();

	return array($numerorue,$nomrue,$codepostal,$ville,$pays,$telephonelogement);

}

function donnees_utilisateur_secondaire($ID_logement,$ID_utilisateur){
    $bdd = connexion_bdd();
	$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE ID_logement=:id_logement');
	$reponse->execute(array(
	'id_logement'=> $ID_logement,
	));

	$i=0;
	while ($donnees = $reponse->fetch()){
	if ($donnees['ID_utilisateur']==$ID_utilisateur){
	}  else {
		list($nom,$prenom,$i,$id) = utilisateur_secondaire($ID_logement,$ID_utilisateur);
	}
	}

    $reponse->closeCursor();
	if($i!=0){
	return array($i,$nom,$prenom,$id);
}
}

function utilisateur_secondaire($ID_logement,$ID_utilisateur){
    $bdd = connexion_bdd();
	$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE ID_logement=:id_logement');
	$reponse->execute(array(
	'id_logement'=> $ID_logement,
	));

	$i = 0;
	$nom = array();
	$prenom = array();
	$id=array();
	while ($donnees = $reponse->fetch()){
	if ($donnees['ID_utilisateur']==$ID_utilisateur){
	}  else {
		$i = $i + 1;
		$nom[] = $donnees['prenom_utilisateur'];
		$prenom[] = $donnees['nom_utilisateur'];
		$id[] = $donnees['ID_utilisateur'];
	}
	}

	$reponse->closeCursor();

	return array($nom,$prenom,$i,$id);
}

function cemac($ID_logement){

	$bdd = connexion_bdd();
	$reponse3 = $bdd->prepare('SELECT * FROM cemac WHERE ID_logement = :ID_logement AND etat_cemac = 1');
	$reponse3->execute(array(
			'ID_logement' => $ID_logement
			));

	$table_cemac = array();
	$c = 0;
		while ($donnees3 = $reponse3->fetch()){
			$table_cemac[$c] = $donnees3['numero_de_cemac'];
			$c = $c + 1;
		}
		return array($table_cemac,$c);
}

function nv_cemac($ID_logement){

	$bdd = connexion_bdd();
	$reponse = $bdd->prepare('SELECT COUNT(*) FROM cemac WHERE ID_logement = :ID_logement AND etat_cemac = :etat');
	$reponse->execute(array(
			'ID_logement' => $ID_logement,
			'etat'=>2,
			));
	$c = $reponse->fetchColumn();
		return $c;
}

function ajouter_cemac($id_cemac,$id_logement){
	$bdd = connexion_bdd();
	$req = $bdd->prepare('UPDATE cemac SET etat_cemac = 1 WHERE ID_logement = :id AND numero_de_cemac = :num');
	$req->execute(array(
			'id' => $ID_logement,
			'num'=>$id_cemac,
			));
}


function supprimer($id){
	$bdd=connexion_bdd();
	$req = $bdd->prepare("DELETE FROM utilisateur WHERE id_utilisateur = :id");
	$req->execute(array(
		"id"=>$id,
	));
	header("Location:index.php?target=compte&action=connecte&reaction=profil");
}

?>
