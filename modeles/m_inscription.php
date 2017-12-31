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
			$reponse1 = $bdd->query('SELECT * FROM utilisateur ORDER BY ID_utilisateur DESC LIMIT 1');
			$donnees1 = $reponse1->fetch();
			/*On le met dans une variable session pour qu'il soit accessible depuis da'utres pages du site*/
			$_SESSION['id_utilisateur'] = $donnees1['ID_utilisateur'];
}

/*Ajout logement*/
function ajout_logement($superficie_totale_logement,$type_logement,$telephone_fixe,$numero_rue_logement,$nom_rue_logement,$code_postale_logement,$ville_logement,$pays_logement){
	$bdd=connexion_bdd();
	$type_logement='0';
	if ($_POST["type_logement"]=='Maison'){
   		$type_logement='2'; 
	}
	else{
    	$type_logement='1';
	}


	/*On crée une ligne logement*/
	$requete = $bdd->prepare("INSERT INTO logement (superficie_totale_logement, type_logement, telephone_logement, numero_rue_logement, nom_rue_logement, code_postale_logement, ville_logement, pays_logement) VALUES (:superficie_totale_logement, :type_logement, :telephone_fixe, :numero_rue_logement, :nom_rue_logement, :code_postale_logement, :ville_logement, :pays_logement)");
	$requete->execute(array(
	    'superficie_totale_logement' => $superficie_totale_logement,
	    'type_logement' => $type_logement,
	    'telephone_fixe' => $telephone_fixe,
	    'numero_rue_logement' => $numero_rue_logement,
	    'nom_rue_logement' => $nom_rue_logement,
	    'code_postale_logement' => $code_postale_logement,
	    'ville_logement' => $ville_logement,
	    'pays_logement' => $pays_logement
	    ));

	/*On récupère l'ID du logement qui vient d'être créé*/
	$reponse2 = $bdd->query('SELECT ID_logement FROM logement ORDER BY ID_logement DESC LIMIT 1');
	$donnees2 = $reponse2->fetch();
	$_SESSION['ID_logement'] = $donnees2['ID_logement'];
	/*On UPDATE la valeur de l'ID logement dans la table utilisateur*/
	$req = $bdd->prepare('UPDATE utilisateur SET ID_logement = :ID_logement WHERE ID_utilisateur = :ID_utilisateur');
	$req->execute(array(
	    'ID_logement' => $donnees2['ID_logement'],
	    'ID_utilisateur' => $_SESSION['id_utilisateur']
	    ));
}

/*Ajout utilisateurs secondaires*/
function ajout_utilisateurs_secondaires($type_utilisateur,$nom_utilisateur,$prenom_utilisateur,$telephone_1_utilisateur,$date_de_naissance_utilisateur,$adresse_mail_utilisateur,$mot_de_passe_utilisateur){
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
	    	$_SESSION["prenom_utilisateur_secondaire"]=$_POST["prenom"];
			/*On récupère l'ID de l'utilisateur qui vient d'être ajouté*/
			$reponse1 = $bdd->query('SELECT ID_utilisateur FROM utilisateur ORDER BY ID_utilisateur DESC LIMIT 1');
			$donnees1 = $reponse1->fetch();
			/*On le met dans une variable session pour qu'il soit accessible depuis da'utres pages du site*/
			$_SESSION['id_utilisateur_secondaire'] = $donnees1['ID_utilisateur'];
$req = $bdd->prepare('UPDATE utilisateur SET ID_logement = :ID_logement WHERE ID_utilisateur = :ID_utilisateur');
$req->execute(array(
    'ID_logement' => $_SESSION['ID_logement'],
    'ID_utilisateur' => $donnees1['ID_utilisateur'],
    ));
}

?>
