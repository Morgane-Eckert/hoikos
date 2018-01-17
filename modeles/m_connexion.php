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
			$_SESSION["action"] = "mot_de_passe_incorrect";
		}
	}
	else{
		$_SESSION["action"] = "adresse_mail_inconnue";
	}
}

function ajout_nouvel_onglet($nom_salle){
	$bdd=connexion_bdd();
	$reponse3 = $bdd->prepare('SELECT COUNT(*) AS nombre_de_salle FROM salle WHERE ID_logement=:ID_logement AND nom_salle=:nom_salle');
	$reponse3->execute(array(
		'ID_logement' => $_SESSION['ID_logement'],
		'nom_salle' => $nom_salle
		));
	$donnees3 = $reponse3->fetch();
	if ($donnees3['nombre_de_salle']==0){
	$reponse0 = $bdd->prepare('SELECT ID_type_de_salle FROM type_de_salle WHERE nom_type_de_salle=:nom_type_de_salle');
	$reponse0->execute(array(
    	'nom_type_de_salle' => $_POST['type']
    ));
    $donnees0 = $reponse0->fetch();

	$requete = $bdd->prepare("INSERT INTO salle (ID_salle, ID_logement, ID_cemac, ID_type_salle, nom_salle, superficie_salle) VALUES (NULL, NULL, NULL, :ID_type_salle, :nom_salle, NULL)");
	$affectedLines = $requete->execute(array(
		//'ID_logement' => '3',
		'ID_type_salle' => $donnees0['ID_type_de_salle'],
	    'nom_salle' => $nom_salle
	    ));
	$req = $bdd->prepare('UPDATE salle SET ID_logement = :ID_logement ORDER BY ID_salle DESC LIMIT 1');
	$req->execute(array(
    'ID_logement' => $_SESSION['ID_logement']
    ));
} else {
	$erreur = 'nom déjà existant';
	return $erreur;
}
}

function ajout_nouveau_capteur(){
	$bdd=connexion_bdd();
		$reponsea = $bdd->prepare('SELECT nom_type_de_capteur FROM type_de_capteur WHERE ID_type_de_capteur=:ID_type_de_capteur');
		$reponsea->execute(array(
			'ID_type_de_capteur' => $_POST['type']
			));
		$i=0;
		$donneesa = $reponsea->fetch();
	$requete = $bdd->prepare("INSERT INTO capteur (ID_capteur, ID_logement, ID_cemac, ID_type_de_capteur, nom_salle, nom_capteur, date_d_ajout_capteur, donnee_envoyee_capteur, donnee_recue_capteur) VALUES (NULL, NULL, :ID_cemac, :ID_type_capteur, :nom_salle, :nom_capteur, NOW(), NULL, NULL)");
	$affectedLines = $requete->execute(array(
		'ID_cemac'=> $_POST['cemac'],
		'ID_type_capteur' => $_POST['type'],
		'nom_salle' => $_GET['anticipation'],
	    'nom_capteur' => $donneesa['nom_type_de_capteur']
	    ));
	$req = $bdd->prepare('UPDATE capteur SET ID_logement = :ID_logement ORDER BY ID_capteur DESC LIMIT 1');
	$req->execute(array(
    'ID_logement' => $_SESSION['ID_logement']
    ));
}

function ajout_ordre(){
	$bdd=connexion_bdd();
	$reponsec = $bdd->prepare('SELECT ID_type_de_capteur FROM type_de_capteur WHERE nom_type_de_capteur=:nom_type_de_capteur');
	$reponsec->execute(array(
		'nom_type_de_capteur' => $_GET['comprehension']
		));
	$donneesc = $reponsec->fetch();
	
	$requeted = $bdd->prepare("INSERT INTO ordre (ID_ordre, ID_utilisateur, ID_logement, ID_type_de_capteur, valeur_ordre, etat_ordre, date_d_ajout_ordre) VALUES (NULL, :ID_utilisateur, :ID_logement, :ID_type_de_capteur, :valeur_ordre, :etat_ordre, NOW())");
	$requeted->execute(array(
		'ID_utilisateur' => (int)$_SESSION['ID_utilisateur'],
		'ID_logement' => (int)$_SESSION['ID_logement'],
		'ID_type_de_capteur' => (int)$donneesc['ID_type_de_capteur'],
		'valeur_ordre' => $_POST['ordre'],
	    'etat_ordre' => 1
	    ));
}

function accueil_suppression(){
	$bdd=connexion_bdd();
	$requetef = $bdd->prepare("DELETE FROM salle WHERE nom_salle=:nom_salle AND ID_logement=:ID_logement");
	$requetef->execute(array(
		'nom_salle' => $_GET['reaction'],
		'ID_logement' => $_SESSION['ID_logement']
	    ));
}

function accueil_suppression_fonction(){
	$bdd=connexion_bdd();
	$reponseg = $bdd->prepare('SELECT ID_type_de_capteur FROM type_de_capteur WHERE nom_type_de_capteur=:nom_type_de_capteur');
	$reponseg->execute(array(
		'nom_type_de_capteur' => $_GET['comprehension']
		));
	$donneesg = $reponseg->fetch();
	$requetef = $bdd->prepare("DELETE FROM capteur WHERE ID_type_de_capteur=:ID_type_de_capteur AND ID_logement=:ID_logement");
	$requetef->execute(array(
		'ID_type_de_capteur' => $donneesg['ID_type_de_capteur'],
		'ID_logement' => $_SESSION['ID_logement']
	    ));
}

?>