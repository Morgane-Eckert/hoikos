<?php /*On ajoute l'article à la base de donnée*/
session_start();

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

function ajout_utilisateur($type_utilisateur,$nom_utilisateur,$prenom_utilisateur,$telephone_1_utilisateur,$date_de_naissance_utilisateur,$adresse_mail_utilisateur,$mot_de_passe_utilisateur){
	$bdd=connexion_bdd();
	$mailexist=0;
	$entrees = $bdd->query('SELECT adresse_mail_utilisateur FROM utilisateur');
			$requete = $bdd->prepare("INSERT INTO `utilisateur` (`ID_utilisateur`, `ID_logement`, `type_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `telephone_1_utilisateur`, `date_de_naissance_utilisateur`, `adresse_mail_utilisateur`, `mot_de_passe_utilisateur`, `date_d_ajout_utilisateur`) VALUES (NULL, NULL, :type_utilisateur, :nom_utilisateur, :prenom_utilisateur, :telephone_1_utilisateur, :date_de_naissance_utilisateur, :adresse_mail_utilisateur, PASSWORD(:mot_de_passe_utilisateur),NOW());");
			/*On crée une ligne utilisateur*/
			$affectedLines = $requete->execute(array(
			'type_utilisateur' => $type_utilisateur,
	    	'nom_utilisateur' => $nom_utilisateur,
	    	'prenom_utilisateur' => $prenom_utilisateur,
	    	'telephone_1_utilisateur' => $telephone_1_utilisateur,
	    	'date_de_naissance_utilisateur' => $date_de_naissance_utilisateur,
	    	'adresse_mail_utilisateur' => $adresse_mail_utilisateur,
	    	'mot_de_passe_utilisateur' => $mot_de_passe_utilisateur
	    	));
	    	$_SESSION["prenom_utilisateur"]=$_POST["prenom"];
			/*On récupère l'ID de l'utilisateur qui vient d'être ajouté*/
			$reponse1 = $bdd->query('SELECT ID_utilisateur FROM utilisateur ORDER BY ID_utilisateur DESC LIMIT 1');
			$donnees1 = $reponse1->fetch();
			/*On le met dans une variable session pour qu'il soit accessible depuis da'utres pages du site*/
			$_SESSION['id_utilisateur'] = $donnees1['ID_utilisateur'];
}


?>
