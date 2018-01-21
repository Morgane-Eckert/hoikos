<?php

function nouveau_type_de_salle($nom_nouveau_type_de_salle){
	$bdd=connexion_bdd();
	$reponse0 = $bdd->prepare('SELECT COUNT(*) AS nombre_type_de_salle FROM type_de_salle WHERE nom_type_de_salle=:nom_type_de_salle');
	$reponse0->execute(array(
		'nom_type_de_salle' => $nom_nouveau_type_de_salle
		));
	$donnees0 = $reponse0->fetch();
	if ($donnees0['nombre_type_de_salle']==0){/*Si le nouveau nom de type de salle n'existe pas deja, on l'ajoute bien dans la base de donnee*/
		$requete = $bdd->prepare("INSERT INTO type_de_salle (nom_type_de_salle) VALUES (:nom_type_de_salle)");
		$requete->execute(array(
			'nom_type_de_salle' => $nom_nouveau_type_de_salle
		    ));
	} else {
		$nom_deja_existant='oui';
		return $nom_deja_existant;
	}
}

function nouveau_type_de_capteur($nom_nouveau_type_de_capteur){
	$bdd=connexion_bdd();
	$nom_nouveau_type_de_capteur[0] = strtoupper($nom_nouveau_type_de_capteur[0]);
	$reponse0 = $bdd->prepare('SELECT COUNT(*) AS nombre_type_de_capteur FROM type_de_capteur WHERE nom_type_de_capteur=:nom_type_de_capteur');
	$reponse0->execute(array(
		'nom_type_de_capteur' => $nom_nouveau_type_de_capteur
		));
	$donnees0 = $reponse0->fetch();
	if ($donnees0['nombre_type_de_capteur']==0){/*Si le nouveau nom de type de capteur n'existe pas deja, on l'ajoute bien dans la base de donnee*/
		$requete = $bdd->prepare("INSERT INTO type_de_capteur (nom_type_de_capteur) VALUES (:nom_type_de_capteur)");
		$requete->execute(array(
			'nom_type_de_capteur' => $nom_nouveau_type_de_capteur
		    ));
	} else {
		$nom_deja_existant='oui';
		return $nom_deja_existant;
	}
}

function get_conditions_generales(){
		$bdd=connexion_bdd();
		$reponse = $bdd->query('SELECT conditions_generales from administration');
		while ($donnees = $reponse->fetch()){
			$conditions_generales = $donnees["conditions_generales"];
		}
		return $conditions_generales;
	}


function get_mentions_legales(){
		$bdd=connexion_bdd();
		$reponse = $bdd->query('SELECT mentions_legales from administration');
		while ($donnees = $reponse->fetch()){
			$mentions_legales = $donnees["mentions_legales"];
		}
		return $mentions_legales;
	}

function get_slogan(){
		$bdd=connexion_bdd();
		$reponse = $bdd->query('SELECT slogan from administration');
		while ($donnees = $reponse->fetch()){
			$slogan = $donnees["slogan"];
		}
		return $slogan;
	}

function update_cgu($NEWconditions_generales){

	$bdd=connexion_bdd();
	$req = $bdd->prepare('UPDATE administration SET conditions_generales = :NEWconditions_generales');
	if ($NEWconditions_generales==NULL)
	{
		$req->execute(array(
		'NEWconditions_generales' => "Conditions générales d'utilisation non éditées pour le moment !"));
	}else{
		$req->execute(array(
		'NEWconditions_generales' => $NEWconditions_generales,));	
	}
	header("Location:index.php?target=compte&action=connecte&reaction=conditions_generales");
}

function update_mentions_legales($NEWmentions_legales){

	$bdd=connexion_bdd();
	$req = $bdd->prepare('UPDATE administration SET mentions_legales = :NEWmentions_legales');
	if ($NEWmentions_legales==NULL)
	{
		$req->execute(array(
		'NEWmentions_legales' => "Mentions Légales non éditées pour le moment !"));
	}else{
		$req->execute(array(
		'NEWmentions_legales' => $NEWmentions_legales,));	
	}
	header("Location:index.php?target=compte&action=connecte&reaction=mentions_legales");
}

function update_faq_edit(){
	$i=0;
	$count=0;
	$bdd=connexion_bdd();
	$recup = $bdd->query('SELECT question_faq,ID_faq from faq');
		while ($database = $recup->fetch()){
			$id_questions[$count] = $database[1];
			$count++;
		}

	for ($i=0;$i<$count;$i++){
		$NEWquestions[$i] = $_POST["questions$i"];
		$NEWreponses[$i] = $_POST["reponses$i"];
	}

	for ($i=0;$i<$count;$i++){
		$req = $bdd->prepare('UPDATE faq SET question_faq = :NEWquestion, reponse_faq = :NEWreponse WHERE ID_faq = :ID_faq');
			if ($NEWquestions[$i]==NULL){
				if ($NEWreponses[$i]==NULL){
					$bdd=connexion_bdd();
					$req1 = $bdd->prepare('DELETE FROM faq WHERE ID_faq = :ID_faq'); 
					$req1->execute(array(
				'ID_faq' => $id_questions[$i],
			));
				}else{
					$req->execute(array(
				'NEWquestion' => "Question non précisée !",
				'NEWreponse' => $NEWreponses[$i],
				'ID_faq' => $id_questions[$i],
			));
				}
			}else if ($NEWreponses[$i]==NULL){
					$req->execute(array(
				'NEWquestion' => $NEWquestions[$i],
				'NEWreponse' => "Reponse non précisée !",
				'ID_faq' => $id_questions[$i],
			));
			}else{
					$req->execute(array(
				'NEWquestion' => $NEWquestions[$i],
				'NEWreponse' => $NEWreponses[$i],
				'ID_faq' => $id_questions[$i],
			));
			}
		}
		header("Location:index.php?target=compte&action=connecte&reaction=FAQ");
		}
	

function update_faq_add(){

	$bdd=connexion_bdd();
	$requete = $bdd->prepare("INSERT INTO faq (question_faq, reponse_faq) VALUES (:question, :reponse)");
	$requete->execute(array(
	    'question' => $_POST['addquestion'],
	    'reponse' => $_POST['addreponse'],
	));
	header("Location:index.php?target=compte&action=connecte&reaction=FAQ");
}

function update_slogan(){
	$bdd=connexion_bdd();
	$req = $bdd->prepare('UPDATE administration SET slogan = :NEWslogan');
	if ($_POST['slogan']==NULL)
	{
		$req->execute(array(
		'NEWslogan' => "Slogan non édité pour le moment !"));
	}else{
		$req->execute(array(
		'NEWslogan' => $_POST['slogan'],));	
	}
	header("Location:index.php?target=compte&action=connecte&reaction=slogan");
}

function afficher_question(){
		$bdd=connexion_bdd();
		$i=0;
		$reponse = $bdd->query('SELECT question_faq from faq');
		while ($donnees = $reponse->fetch()){
			$question[$i] = $donnees["question_faq"];
			$i++;
		}
		return $question;
	}

	function afficher_reponse(){
		$bdd=connexion_bdd();
		$i=0;
		$reponse1=$bdd->query('SELECT reponse_faq from faq');
		while ($donnees1 = $reponse1->fetch()){
			$reponse[$i] = $donnees1["reponse_faq"];
			$i++;
		}
		return $reponse;
	}
?>