<?php
//session_start();

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
	$nom_salle[0] = strtoupper($nom_salle[0]);
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

// En cours de fesation
function recupererTrame(){
	$url ='http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=004C';

	// Création d'une ressource CURL
			$ch = curl_init();
			 curl_setopt($ch, CURLOPT_USERAGENT, 'Récupère IP');

	// Définition de l'URL et autres options appropriées
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, false);

	// Récupération du contenu :
			$data = curl_exec($ch);
		curl_close(@$ch);

		$data_tab = str_split($data,33);
		$last = $data_tab[count($data_tab)];
		$valeur = substr($last,9,13);
		return $valeur;
}

function ajout_ordre(){
	$content = '';

	$bdd=connexion_bdd();
	$reponsec = $bdd->prepare('SELECT ID_type_de_capteur FROM type_de_capteur WHERE nom_type_de_capteur=:nom_type_de_capteur');
	$reponsec->execute(array(
		'nom_type_de_capteur' => $_GET['comprehension']
		));
	$donneesc = $reponsec->fetch();

	$requeted = $bdd->prepare("INSERT INTO ordre (ID_ordre, ID_utilisateur, ID_logement, ID_type_de_capteur, nom_salle, valeur_ordre, etat_ordre, date_d_ajout_ordre) VALUES (NULL, :ID_utilisateur, :ID_logement, :ID_type_de_capteur, :nom_salle, :valeur_ordre, :etat_ordre, NOW())");
	$requeted->execute(array(
		'ID_utilisateur' => (int)$_SESSION['ID_utilisateur'],
		'ID_logement' => (int)$_SESSION['ID_logement'],
		'ID_type_de_capteur' => (int)$donneesc['ID_type_de_capteur'],
		'nom_salle' => $_GET['anticipation'],
		'valeur_ordre' => $_POST['ordre'],
	    'etat_ordre' => 1
	    ));
	if ($_GET['anticipation']=='home'){
		$req = $bdd->prepare('UPDATE capteur SET donnee_envoyee_capteur = :donnee_envoyee_capteur WHERE ID_logement=:ID_logement AND nom_capteur=:nom_capteur ');
		$req->execute(array(
		'donnee_envoyee_capteur' => $_POST['ordre'],
	    'ID_logement' => $_SESSION['ID_logement'],
	    'nom_capteur' => $_GET['comprehension']
	    ));
	} else {
		$req = $bdd->prepare('UPDATE capteur SET donnee_envoyee_capteur = :donnee_envoyee_capteur WHERE ID_logement=:ID_logement AND nom_salle=:nom_salle AND nom_capteur=:nom_capteur ');
		$req->execute(array(
		'donnee_envoyee_capteur' => $_POST['ordre'],
	    'ID_logement' => $_SESSION['ID_logement'],
	    'nom_salle' => $_GET['anticipation'],
	    'nom_capteur' => $_GET['comprehension']

    ));
	}

	if((int)$donneesc['ID_type_de_capteur']==13 && $_POST['ordre'] == 'ON'){ //Trame pour allumer la clim
		$url ='http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=004C&TRAME=1004C2102000113009020180611000000';

		// Création d'une ressource CURL
				$ch = curl_init();
				 curl_setopt($ch, CURLOPT_USERAGENT, 'Récupère IP');

		// Définition de l'URL et autres options appropriées
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_HEADER, false);

		// Récupération du contenu :
				$content = curl_exec($ch);
		curl_close(@$ch);
	}elseif((int)$donneesc['ID_type_de_capteur']==13 && $_POST['ordre'] == 'OFF'){ //Trame pour éteindre la clim
		$url ='http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=004C&TRAME=1004C2102000013009020180611000000';

		// Création d'une ressource CURL
				$ch = curl_init();
				 curl_setopt($ch, CURLOPT_USERAGENT, 'Récupère IP');

		// Définition de l'URL et autres options appropriées
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_HEADER, false);

		// Récupération du contenu :
				$content = curl_exec($ch);
		curl_close(@$ch);
	}elseif((int)$donneesc['ID_type_de_capteur']==1){ // présence

	}elseif((int)$donneesc['ID_type_de_capteur']==5 &&  $_POST['ordre'] == 'Allumer'){ //Trame pour allumer la lumière/LED
			$url ='http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=004C&TRAME=1004C21020001050709019970611000000';

			// Création d'une ressource CURL
					$ch = curl_init();
					 curl_setopt($ch, CURLOPT_USERAGENT, 'Récupère IP');

			// Définition de l'URL et autres options appropriées
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_HEADER, false);

			// Récupération du contenu :
					$content = curl_exec($ch);
			curl_close(@$ch);
	} elseif((int)$donneesc['ID_type_de_capteur']==5 &&  $_POST['ordre'] == 'Eteindre') { //Trame pour éteindre la lumière/LED
		$url ='http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=004C&TRAME=1004C21020000050709019970611000000';

		// Création d'une ressource CURL
				$ch = curl_init();
				 curl_setopt($ch, CURLOPT_USERAGENT, 'Récupère IP');

		// Définition de l'URL et autres options appropriées
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_HEADER, false);

		// Récupération du contenu :
				$content = curl_exec($ch);
		curl_close(@$ch);
	}
	elseif((int)$donneesc['ID_type_de_capteur']==13){ //Volet

	}
	return $content;
}

function accueil_suppression(){
	$bdd=connexion_bdd();
	/*Suppression de la salle dans la routine*/
	$reponse = $bdd->prepare('SELECT ID_salle FROM salle WHERE nom_salle=:nom_salle AND ID_logement=:ID_logement');
	$reponse->execute(array(
		'ID_logement' => $_SESSION['ID_logement'],
		'nom_salle' => $_GET['reaction']

		));
	$donnees = $reponse->fetch();
	$supprime1 = $bdd->prepare("DELETE FROM routine_salle WHERE ID_salle=:ID_salle");
	$supprime1->execute(array(
		'ID_salle' => $donnees['ID_salle']
	));
	/*Suppression de la salle*/
	$requetef = $bdd->prepare("DELETE FROM salle WHERE nom_salle=:nom_salle AND ID_logement=:ID_logement");
	$requetef->execute(array(
		'nom_salle' => $_GET['reaction'],
		'ID_logement' => $_SESSION['ID_logement']
	    ));
	/*Suppression des capteurs de la salle dans la routine*/
	$reponse2 = $bdd->prepare('SELECT ID_capteur FROM capteur INNER JOIN salle ON capteur.nom_salle=salle.nom_salle WHERE capteur.nom_salle=:nom_salle AND capteur.ID_logement=:ID_logement AND salle.ID_logement=:ID_logement');
	$reponse2->execute(array(
		'nom_capteur' => $_GET['comprehension'],
		'nom_salle' => $_GET['reaction'],
		'ID_logement' => $_SESSION['ID_logement']

		));
	while($donnees2 = $reponse2->fetch()){
		$supprime2 = $bdd->prepare("DELETE FROM routine_capteur WHERE ID_capteur=:ID_capteur");
		$supprime2->execute(array(
			'ID_capteur' => $donnees2['ID_capteur']
		));
	}
	/*Suppression des capteurs de la salle*/
	$requeteg = $bdd->prepare("DELETE FROM capteur WHERE ID_logement=:ID_logement AND nom_salle=:nom_salle");
	$requeteg->execute(array(
		'ID_logement' => $_SESSION['ID_logement'],
		'nom_salle' => $_GET['reaction']
	    ));
}

function accueil_suppression_fonction(){

	$bdd=connexion_bdd();
	$reponse = $bdd->prepare('SELECT ID_capteur FROM capteur INNER JOIN salle ON capteur.nom_salle=salle.nom_salle WHERE nom_capteur=:nom_capteur AND capteur.nom_salle=:nom_salle');
	$reponse->execute(array(
		'nom_capteur' => $_GET['comprehension'],
		'nom_salle' => $_GET['reaction']

		));
	$donnees = $reponse->fetch();
	$supprime1 = $bdd->prepare("DELETE FROM routine_capteur WHERE ID_capteur=:ID_capteur");
	$supprime1->execute(array(
		'ID_capteur' => $donnees['ID_capteur']
	));
	$reponseg = $bdd->prepare('SELECT ID_type_de_capteur FROM type_de_capteur WHERE nom_type_de_capteur=:nom_type_de_capteur');
	$reponseg->execute(array(
		'nom_type_de_capteur' => $_GET['comprehension']
		));
	$donneesg = $reponseg->fetch();
	$requetef = $bdd->prepare("DELETE FROM capteur WHERE ID_type_de_capteur=:ID_type_de_capteur AND ID_logement=:ID_logement AND nom_salle=:nom_salle");
	$requetef->execute(array(
		'ID_type_de_capteur' => $donneesg['ID_type_de_capteur'],
		'ID_logement' => $_SESSION['ID_logement'],
		'nom_salle' => $_GET['reaction']
	    ));
}

function ajout_salle_routine($salles){
	$bdd=connexion_bdd();
	if (isset($_GET['comprehension'])) {
		$donnees0 = $bdd->prepare("SELECT ID_routine FROM routine WHERE nom_routine=:nom_routine AND ID_logement=:ID_logement");
		$affectedLines = $donnees0->execute(array(
		'nom_routine' => $_GET['comprehension'],
		'ID_logement' =>$_SESSION['ID_logement']
		));
		$donnees0 = $donnees0->fetch();
		$supprime1 = $bdd->prepare("DELETE FROM routine_salle WHERE ID_routine=:ID_routine");
		$supprime1->execute(array(
		'ID_routine' => $donnees0['ID_routine']
		));
		foreach ($salles as $elements) {
			$requete = $bdd->prepare("INSERT INTO routine_salle (ID_routine_salle, ID_salle, ID_routine) VALUES (NULL, :ID_salle, :ID_routine)");
			$affectedLines = $requete->execute(array(
				'ID_salle' => $elements,
				'ID_routine' => $donnees0['ID_routine']
		    ));
		}

		$requete1 = $bdd->prepare("SELECT * FROM routine_capteur INNER JOIN capteur ON routine_capteur.ID_capteur=capteur.ID_capteur WHERE ID_routine=:ID_routine");
		$affectedLines = $requete1->execute(array(
			'ID_routine' => $donnees0['ID_routine']
		));
		while ($donnees1 = $requete1->fetch()){
			$requete2 = $bdd->prepare("SELECT nom_salle FROM capteur WHERE ID_capteur=:ID_capteur");
			$affectedLines = $requete2->execute(array(
				'ID_capteur' => $donnees1['ID_capteur']
			));
			$donnees2 = $requete2->fetch();
			$requete3 = $bdd->prepare("SELECT ID_salle FROM salle WHERE nom_salle=:nom_salle AND ID_logement=:ID_logement");
			$affectedLines = $requete3->execute(array(
				'nom_salle' => $donnees2['nom_salle'],
				'ID_logement' =>$_SESSION['ID_logement']
			));
			$donnees3 = $requete3->fetch();
			$compteur=0;
			foreach ($salles as $elements){
				if ($elements==$donnees3['ID_salle']) {
					$compteur++;
				}
			}if ($compteur==0){
				$supprime2 = $bdd->prepare("DELETE FROM routine_capteur WHERE ID_capteur=:ID_capteur");
				$supprime2->execute(array(
					'ID_capteur' => $donnees1['ID_capteur']
				));
			}else{
				$requete4 = $bdd->prepare("SELECT * FROM capteur INNER JOIN salle ON capteur.nom_salle=salle.nom_salle WHERE ID_salle=:ID_salle AND capteur.ID_logement=:ID_logement");
					$affectedLines = $requete4->execute(array(
						'ID_salle' => $elements,
						'ID_logement' =>$_SESSION['ID_logement']
					));
					while ($donnees4 = $requete4->fetch()) {
						if ($donnees4['nom_capteur']==$donnees1['nom_capteur']) {
							$requete2 = $bdd->prepare("INSERT INTO routine_capteur (ID_routine_capteur, ID_routine, ID_capteur, ordre) VALUES (NULL, :ID_routine, :ID_capteur, :ordre)");
							$affectedLines = $requete2->execute(array(
								'ID_routine' => $donnees0['ID_routine'],
								'ID_capteur' => $donnees4['ID_capteur'],
								'ordre' => $donnees1['ordre']

							));
							$requetea = $bdd->prepare("SELECT COUNT(*) AS nombre FROM routine_capteur WHERE ID_routine=:ID_routine AND ID_capteur=:ID_capteur");
							$requetea->execute(array(
								'ID_routine' => $donnees0['ID_routine'],
								'ID_capteur' => $donnees4['ID_capteur']
							));
							$requetea = $requetea->fetch();
							if ($requetea['nombre']>1) {
								$supprime1 = $bdd->prepare("DELETE FROM routine_capteur WHERE ID_routine=:ID_routine AND ID_capteur=:ID_capteur ORDER BY ID_routine_capteur DESC LIMIT 1");
								$supprime1->execute(array(
								'ID_routine' => $donnees0['ID_routine'],
								'ID_capteur' => $donnees4['ID_capteur']
								));
							}
						}
					}
			}
		}


	}else{
		if ($_GET['anticipation']== 'home'){
			$donneesb = $bdd->prepare("INSERT INTO routine (ID_routine, ID_utilisateur, ID_logement, date_d_ajout_routine, nom_routine) VALUES (NULL, :ID_utilisateur, :ID_logement, NOW(), NULL)");
			$affectedLines = $donneesb->execute(array(
			'ID_utilisateur' => $_SESSION['ID_utilisateur'],
			'ID_logement' => $_SESSION['ID_logement']
			));
			$routine1 = $bdd->query('SELECT * FROM routine ORDER BY ID_routine DESC LIMIT 1');
					$routine2 = $routine1->fetch();
					/*On le met dans une variable session pour qu'il soit accessible depuis da'utres pages du site*/
					$_SESSION['ID_routine'] = $routine2['ID_routine'];
			foreach ($salles as $elements) {
				$requete = $bdd->prepare("INSERT INTO routine_salle (ID_routine_salle, ID_salle, ID_routine) VALUES (NULL, :ID_salle, :ID_routine)");
					$affectedLines = $requete->execute(array(
					'ID_salle' => $elements,
					'ID_routine' => $_SESSION['ID_routine']
			    	));
			}
		}
	}
}

function ajout_capteur_routine($capteurs){
	$bdd=connexion_bdd();
	if (isset($_GET['comprehension'])) {
		$donnees0 = $bdd->prepare("SELECT ID_routine FROM routine WHERE nom_routine=:nom_routine AND ID_logement=:ID_logement");
		$affectedLines = $donnees0->execute(array(
		'nom_routine' => $_GET['comprehension'],
		'ID_logement' =>$_SESSION['ID_logement']
		));
		$donnees0 = $donnees0->fetch();
		$requete2 = $bdd->prepare("SELECT nom_salle FROM salle INNER JOIN routine_salle ON salle.ID_salle=routine_salle.ID_salle WHERE ID_routine=:ID_routine");
		$affectedLines = $requete2->execute(array(
			'ID_routine' => $donnees0['ID_routine']
		));
		while ($donnees2 = $requete2->fetch()) {
			foreach ($capteurs as $elements) {
				$requete1 = $bdd->prepare("SELECT ID_capteur FROM capteur WHERE nom_capteur=:nom_capteur AND ID_logement=:ID_logement AND nom_salle=:nom_salle");
				$affectedLines = $requete1->execute(array(
					'nom_capteur' => $elements,
					'ID_logement' => $_SESSION['ID_logement'],
					'nom_salle' => $donnees2['nom_salle']
				));
				while($donnees1 = $requete1->fetch()){
					$requete3 = $bdd->prepare("INSERT INTO routine_capteur (ID_routine_capteur, ID_capteur, ID_routine, ordre) VALUES (NULL, :ID_capteur, :ID_routine, 'non')");
					$requete3->execute(array(
						'ID_capteur' => $donnees1['ID_capteur'],
						'ID_routine' => $donnees0['ID_routine']
					));
				}
			}
		}

		$requete4 = $bdd->prepare("SELECT * FROM capteur INNER JOIN routine_capteur ON routine_capteur.ID_capteur=capteur.ID_capteur WHERE ID_routine=:ID_routine");
		$affectedLines = $requete4->execute(array(
			'ID_routine' => $donnees0['ID_routine']
		));
		while ($donnees4 = $requete4->fetch()) {
			$requetea = $bdd->prepare("SELECT COUNT(*) AS nombre FROM routine_capteur INNER JOIN capteur ON routine_capteur.ID_capteur=capteur.ID_capteur WHERE ID_routine=:ID_routine AND nom_capteur=:nom_capteur");
			$requetea->execute(array(
				'ID_routine' => $donnees0['ID_routine'],
				'nom_capteur' => $donnees4['nom_capteur']
			));
			$requetea = $requetea->fetch();
			if ($requetea['nombre']>1) {
				$supprime1 = $bdd->prepare("DELETE FROM routine_capteur WHERE ID_capteur=:ID_capteur AND ID_routine=:ID_routine AND ordre='non' ");
				$supprime1->execute(array(
					'ID_capteur' => $donnees4['ID_capteur'],
					'ID_routine' => $donnees0['ID_routine'],
				));
			}
		}
		$requete5 = $bdd->prepare("SELECT * FROM capteur INNER JOIN routine_capteur ON routine_capteur.ID_capteur=capteur.ID_capteur WHERE ID_routine=:ID_routine");
		$affectedLines = $requete5->execute(array(
			'ID_routine' => $donnees0['ID_routine']
		));
		while ($donnees5 = $requete5->fetch()) {
			$requetea = $bdd->prepare("SELECT COUNT(*) AS nombre FROM routine_capteur INNER JOIN capteur ON routine_capteur.ID_capteur=capteur.ID_capteur WHERE ID_routine=:ID_routine AND nom_capteur=:nom_capteur");
			$requetea->execute(array(
				'ID_routine' => $donnees0['ID_routine'],
				'nom_capteur' => $donnees5['nom_capteur']
			));
			$requetea = $requetea->fetch();
			if ($requetea['nombre']==1) {
				$supprime1 = $bdd->prepare("DELETE FROM routine_capteur WHERE ID_capteur=:ID_capteur AND ID_routine=:ID_routine AND ordre!='non' ");
				$supprime1->execute(array(
					'ID_capteur' => $donnees5['ID_capteur'],
					'ID_routine' => $donnees0['ID_routine']
				));
			}
		}


	}else{
		if ($_GET['anticipation']!= 'home'){
			$donneesb = $bdd->prepare("INSERT INTO routine (ID_routine, ID_utilisateur, ID_logement, date_d_ajout_routine, nom_routine) VALUES (NULL, :ID_utilisateur,:ID_logement, NOW(), NULL)");
			/*On crée une ligne utilisateur*/
			$affectedLines = $donneesb->execute(array(
			'ID_utilisateur' => $_SESSION['ID_utilisateur'],
			'ID_logement' => $_SESSION['ID_logement']
			));
			$routine1 = $bdd->query('SELECT * FROM routine ORDER BY ID_routine DESC LIMIT 1');
					$routine2 = $routine1->fetch();
					/*On le met dans une variable session pour qu'il soit accessible depuis da'utres pages du site*/
					$_SESSION['ID_routine'] = $routine2['ID_routine'];
			$requete0 = $bdd->prepare("SELECT ID_salle FROM salle WHERE nom_salle=:nom_salle AND ID_logement=:ID_logement ") ;
			$affectedLines = $requete0->execute(array(
				'nom_salle' => $_GET['anticipation'],
				'ID_logement' => $_SESSION['ID_logement']
			));
			$requete0 = $requete0->fetch();
			$requete = $bdd->prepare("INSERT INTO routine_salle (ID_routine_salle, ID_salle, ID_routine) VALUES (NULL, :ID_salle, :ID_routine)");
					/*On crée une ligne utilisateur*/
					$affectedLines = $requete->execute(array(
					'ID_salle' => $requete0['ID_salle'],
					'ID_routine' => $_SESSION['ID_routine']
			    	));
		}
		foreach ($capteurs as $elements) {
			$requete1 = $bdd->prepare("SELECT nom_salle FROM capteur WHERE nom_capteur=:nom_capteur AND ID_logement=:ID_logement");
					/*On crée une ligne utilisateur*/
					$affectedLines = $requete1->execute(array(
					'nom_capteur' => $elements,
					'ID_logement' => $_SESSION['ID_logement']
			    	));
			while ($donnees1 = $requete1->fetch()){
				$requete2 = $bdd->prepare("SELECT nom_salle FROM salle INNER JOIN routine_salle ON routine_salle.ID_salle=salle.ID_salle WHERE ID_routine=:ID_routine");
					/*On crée une ligne utilisateur*/
					$affectedLines = $requete2->execute(array(
					'ID_routine' => $_SESSION['ID_routine']
			    	));
				while ($donnees2 = $requete2->fetch()){
					if ($donnees1['nom_salle']==$donnees2['nom_salle']) {
						$requete3 = $bdd->prepare("SELECT ID_capteur FROM capteur WHERE nom_salle=:nom_salle AND nom_capteur=:nom_capteur AND ID_logement=:ID_logement");
						$affectedLines = $requete3->execute(array(
						'nom_salle' => $donnees2['nom_salle'],
						'nom_capteur' => $elements,
						'ID_logement' => $_SESSION['ID_logement']
					   	));
					   	$donnees3 = $requete3->fetch();
						$requete4 = $bdd->prepare("INSERT INTO routine_capteur (ID_routine_capteur, ID_capteur, ID_routine, ordre) VALUES (NULL, :ID_capteur, :ID_routine, 'non')");
						$affectedLines = $requete4->execute(array(
						'ID_capteur' => $donnees3['ID_capteur'],
						'ID_routine' => $_SESSION['ID_routine']
					   	));
					}
				}
			}
		}
	}
}

function ajout_consigne_routine($consignes){
	$bdd=connexion_bdd();
	if (isset($_GET['comprehension'])) {
		$donnees0 = $bdd->prepare("SELECT ID_routine FROM routine WHERE nom_routine=:nom_routine AND ID_logement=:ID_logement");
		$affectedLines = $donnees0->execute(array(
		'nom_routine' => $_GET['comprehension'],
		'ID_logement' =>$_SESSION['ID_logement']
		));
		$donnees0 = $donnees0->fetch();
		foreach ($consignes as $clef => $elements) {
			$requete1 = $bdd->prepare("SELECT ID_routine_capteur FROM routine_capteur INNER JOIN capteur ON routine_capteur.ID_capteur=capteur.ID_capteur WHERE ID_routine=:ID_routine AND nom_capteur=:nom_capteur");
			$affectedLines = $requete1->execute(array(
				'ID_routine' => $donnees0['ID_routine'],
				'nom_capteur' => $clef
			));
			while ($donnees1 = $requete1->fetch()){
				$requete2 = $bdd->prepare("UPDATE routine_capteur SET ordre=:ordre WHERE ID_routine=:ID_routine AND ID_routine_capteur=:ID_routine_capteur");
				$affectedLines = $requete2->execute(array(
				'ordre' => $elements,
				'ID_routine_capteur' => $donnees1['ID_routine_capteur'],
				'ID_routine' => $donnees0['ID_routine']
				));
			}
		}
	}else{
		foreach ($consignes as $clef => $elements) {
			$requete1 = $bdd->prepare("SELECT ID_routine_capteur FROM routine_capteur INNER JOIN capteur ON routine_capteur.ID_capteur=capteur.ID_capteur WHERE ID_routine=:ID_routine AND nom_capteur=:nom_capteur");
			$affectedLines = $requete1->execute(array(
				'ID_routine' => $_SESSION['ID_routine'],
				'nom_capteur' => $clef
			));
			while ($donnees1 = $requete1->fetch()){
				$requete2 = $bdd->prepare("UPDATE routine_capteur SET ordre=:ordre WHERE ID_routine=:ID_routine AND ID_routine_capteur=:ID_routine_capteur");
				$affectedLines = $requete2->execute(array(
				'ordre' => $elements,
				'ID_routine_capteur' => $donnees1['ID_routine_capteur'],
				'ID_routine' => $_SESSION['ID_routine']
				));
			}
		}
	}
}

function ajout_horaire_routine($jours,$debut,$fin){
	$bdd=connexion_bdd();
	if (isset($_GET['comprehension'])) {
		$donnees0 = $bdd->prepare("SELECT ID_routine FROM routine WHERE nom_routine=:nom_routine AND ID_logement=:ID_logement");
		$affectedLines = $donnees0->execute(array(
		'nom_routine' => $_GET['comprehension'],
		'ID_logement' =>$_SESSION['ID_logement']
		));
		$donnees0 = $donnees0->fetch();
		$supprime1 = $bdd->prepare("DELETE FROM routine_jour WHERE ID_routine=:ID_routine");
		$supprime1->execute(array(
		'ID_routine' => $donnees0['ID_routine']
		));
		foreach ($jours as $elements) {
			$requete = $bdd->prepare("INSERT INTO routine_jour (ID_routine_jour, jour_routine, ID_routine,heure_debut_routine, heure_fin_routine) VALUES (NULL, :jour_routine, :ID_routine, :heure_debut_routine, :heure_fin_routine)");
			$affectedLines = $requete->execute(array(
			'jour_routine' => $elements,
			'ID_routine' => $donnees0['ID_routine'],
			'heure_debut_routine' => $debut,
			'heure_fin_routine' => $fin
		   	));
		}
	}else{
		foreach ($jours as $elements) {
			$requete = $bdd->prepare("INSERT INTO routine_jour (ID_routine_jour, jour_routine, ID_routine,heure_debut_routine, heure_fin_routine) VALUES (NULL, :jour_routine, :ID_routine, :heure_debut_routine, :heure_fin_routine)");
			$affectedLines = $requete->execute(array(
			'jour_routine' => $elements,
			'ID_routine' => $_SESSION['ID_routine'],
			'heure_debut_routine' => $debut,
			'heure_fin_routine' => $fin
		   	));
		}
	}
}

function ajout_nom_routine($nom){
	$bdd=connexion_bdd();
	$requete = $bdd->prepare("SELECT COUNT(nom_routine) AS nombre FROM routine WHERE nom_routine=:nom_routine AND ID_logement=:ID_logement");
	$requete->execute(array(
		'nom_routine' =>$nom,
		'ID_logement' => $_SESSION['ID_logement']
	));
	$requete = $requete->fetch();
	if ($requete['nombre']==0) {
		$donnee = $bdd->prepare("UPDATE routine SET nom_routine = :nom_routine WHERE ID_routine = :ID_routine");
		$affectedLines = $donnee->execute(array(
		'nom_routine' => $nom,
		'ID_routine' => $_SESSION['ID_routine']
		));
	}else {
		$erreur = 'nom déjà existant';
		return $erreur;
	}

}

function effacer_routine(){
	$bdd=connexion_bdd();
	$supprime1 = $bdd->prepare("DELETE FROM routine_salle WHERE ID_routine=:ID_routine");
	$supprime1->execute(array(
		'ID_routine' => $_SESSION['ID_routine']
		));
	$supprime2 = $bdd->prepare("DELETE FROM routine_capteur WHERE ID_routine=:ID_routine");
	$supprime2->execute(array(
		'ID_routine' => $_SESSION['ID_routine']
		));
	$supprime3 = $bdd->prepare("DELETE FROM routine_jour WHERE ID_routine=:ID_routine");
	$supprime3->execute(array(
		'ID_routine' => $_SESSION['ID_routine']
		));
	$supprime4 = $bdd->prepare("DELETE FROM routine WHERE ID_routine=:ID_routine");
	$supprime4->execute(array(
		'ID_routine' => $_SESSION['ID_routine']
		));
}

function suppression_routine_confirme(){
	$bdd=connexion_bdd();
	$requete = $bdd->prepare("SELECT ID_routine FROM routine WHERE nom_routine=:nom_routine");
	$requete->execute(array(
		'nom_routine' =>$_GET['comprehension']
	));
	$requete = $requete->fetch();

	$supprime1 = $bdd->prepare("DELETE FROM routine_salle WHERE ID_routine=:ID_routine");
	$supprime1->execute(array(
		'ID_routine' => $requete['ID_routine']
		));
	$supprime2 = $bdd->prepare("DELETE FROM routine_capteur WHERE ID_routine=:ID_routine");
	$supprime2->execute(array(
		'ID_routine' => $requete['ID_routine']
		));
	$supprime3 = $bdd->prepare("DELETE FROM routine_jour WHERE ID_routine=:ID_routine");
	$supprime3->execute(array(
		'ID_routine' => $requete['ID_routine']
		));
	$supprime4 = $bdd->prepare("DELETE FROM routine WHERE ID_routine=:ID_routine");
	$supprime4->execute(array(
		'ID_routine' => $requete['ID_routine']
		));
}
?>
