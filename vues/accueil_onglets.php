<?php 


function afficher_onglets(){
	$bdd=connexion_bdd();
	$reponse = $bdd->prepare('SELECT COUNT(*) AS nombre FROM salle WHERE ID_logement=:ID_logement');
	$reponse->execute(array(
		'ID_logement' => $_SESSION['ID_logement']
		));
	$reponse = $reponse->fetch();
	if ($reponse['nombre']!=0){
		$bdd=connexion_bdd();
		$reponsea = $bdd->prepare('SELECT nom_salle FROM salle WHERE ID_logement=:ID_logement');
		$reponsea->execute(array(
			'ID_logement' => $_SESSION['ID_logement']
			));
		$i=0;
		while ($donneesa = $reponsea->fetch()){
		    $onglets[$i]= $donneesa['nom_salle']; 
		    $i++; 
		}
		return $onglets;
	} else {
		return NULL;
	}

}

function afficher_fonctions(){

$bdd=connexion_bdd();

	$reponse = $bdd->prepare('SELECT COUNT(*) AS nombre FROM capteur WHERE ID_logement=:ID_logement AND nom_salle=:nom_salle');
	$reponse->execute(array(
		'ID_logement' => $_SESSION['ID_logement'],
		'nom_salle' => $_GET['reaction']
		));
	$reponse = $reponse->fetch();
	if ($reponse['nombre']!=0){
		$reponsea = $bdd->prepare('SELECT nom_capteur FROM capteur WHERE ID_logement=:ID_logement AND nom_salle=:nom_salle');
		$reponsea->execute(array(
			'ID_logement' => $_SESSION['ID_logement'],
			'nom_salle' => $_GET['reaction']
			));
		$i=0;
		$a=0;
		while ($donneesa = $reponsea->fetch()){
			if ($i==0){
				$capteurs[$a] = $donneesa['nom_capteur'];
				$a++;
			} else {
				if (!(in_array($donneesa['nom_capteur'], $capteurs))){
		    	$capteurs[$a] = $donneesa['nom_capteur'];
		    	$a++;
		    	}
			}
		    $i++; 
		}
		return $capteurs;
	} else {
		return NULL;
	}

}

function afficher_fonctions_home(){
	$bdd=connexion_bdd();

	$reponse = $bdd->prepare('SELECT COUNT(*) AS nombre FROM capteur WHERE ID_logement=:ID_logement');
	$reponse->execute(array(
		'ID_logement' => $_SESSION['ID_logement'],
		));
	$reponse = $reponse->fetch();
	if ($reponse['nombre']!=0){
		$reponsea = $bdd->prepare('SELECT nom_capteur FROM capteur WHERE ID_logement=:ID_logement');
		$reponsea->execute(array(
			'ID_logement' => $_SESSION['ID_logement']
			));
		$i=0;
		$a=0;
		while ($donneesa = $reponsea->fetch()){
			if ($i==0){
				$capteurs[$a] = $donneesa['nom_capteur'];
				$a++;
			} else {
				if (!(in_array($donneesa['nom_capteur'], $capteurs))){
		    	$capteurs[$a] = $donneesa['nom_capteur'];
		    	$a++;
		    	}
			}
		    $i++; 
		}
		return $capteurs;
	} else {
		return NULL;
	}

}

function afficher_erreur_capteur(){
		$bdd=connexion_bdd();
        $reponses = $bdd->prepare("SELECT COUNT(*) AS nombre FROM capteur WHERE ID_logement=:ID_logement AND etat_capteur='2'");
        $reponses->execute(array(
            'ID_logement' => $_SESSION['ID_logement']
            ));
        $reponses = $reponses->fetch();
        if ($reponses['nombre']!=0){
			$reponset = $bdd->prepare("SELECT * FROM capteur WHERE ID_logement=:ID_logement AND etat_capteur='2'");
			$reponset->execute(array(
				'ID_logement' => $_SESSION['ID_logement']
				));
			$a=0;
			$capteurs =array();
			$salles =array();
			while ($donneest = $reponset->fetch()){
				$capteurs[$a] = $donneest['nom_capteur'];
				$salles[$a] = $donneest['nom_salle'];
				$a++; 
			}

			return array($capteurs,$salles,$a);
        }
}

function compteur(){
	$bdd=connexion_bdd();
	if ($_GET['anticipation']=='home') {
		$reponse = $bdd->prepare('SELECT COUNT(*) AS nombre FROM capteur WHERE ID_logement=:ID_logement');
		$reponse->execute(array(
			'ID_logement' => $_SESSION['ID_logement']
		));
		$reponse = $reponse->fetch();
		$compteur=$reponse['nombre'];
	} else{
		$reponse = $bdd->prepare('SELECT COUNT(*) AS nombre FROM capteur WHERE ID_logement=:ID_logement AND nom_salle=:nom_salle');
		$reponse->execute(array(
			'ID_logement' => $_SESSION['ID_logement'],
			'nom_salle' => $_GET['anticipation']
		));
		$reponse = $reponse->fetch();
		$compteur=$reponse['nombre'];
	}
	return $compteur;
}

function afficher_routines_salle(){

	$bdd=connexion_bdd();

	$requete1 = $bdd->prepare('SELECT ID_salle FROM salle WHERE ID_logement=:ID_logement AND nom_salle=:nom_salle');
	$requete1->execute(array(
		'ID_logement' => $_SESSION['ID_logement'],
		'nom_salle' => $_GET['anticipation']
		));
	while ($reponse1 = $requete1->fetch()){
		$requete2 = $bdd->prepare('SELECT COUNT(*) AS nombre FROM routine_salle WHERE ID_salle=:ID_salle');
		$requete2->execute(array(
		'ID_salle' => $reponse1['ID_salle']
		));
		$reponse2 = $requete2->fetch();
		if ($reponse2['nombre']!=0) {
			$requete3 = $bdd->prepare('SELECT ID_routine FROM routine_salle WHERE ID_salle=:ID_salle');
			$requete3->execute(array(
			'ID_salle' => $reponse1['ID_salle']
			));
			while ($reponse3 = $requete3->fetch()){
				$requete4 = $bdd->prepare('SELECT nom_routine FROM routine WHERE ID_routine=:ID_routine');
				$requete4->execute(array(
				'ID_routine' => $reponse3['ID_routine']
				));
				$reponse4 = $requete4->fetch();
			    $routines[$reponse3['ID_routine']]= $reponse4['nom_routine']; 
			}
			return $routines;	
		} else {
		return NULL;
		}
	}
} 


function afficher_routines_home(){
 
	$bdd=connexion_bdd();

	$reponse = $bdd->prepare('SELECT COUNT(*) AS nombre FROM routine WHERE ID_logement=:ID_logement');
	$reponse->execute(array(
		'ID_logement' => $_SESSION['ID_logement'],
		));
	$reponse = $reponse->fetch();
	if ($reponse['nombre']!=0){
		$reponsea = $bdd->prepare('SELECT * FROM routine WHERE ID_logement=:ID_logement');
		$reponsea->execute(array(
			'ID_logement' => $_SESSION['ID_logement'],
			));
		$i=0;
		while ($donneesa = $reponsea->fetch()){
			if ($i==0){
				$routines[$donneesa['ID_routine']] = $donneesa['nom_routine'];
			} else {
				if (!(in_array($donneesa['nom_routine'], $routines))){
		    	$routines[$donneesa['ID_routine']] = $donneesa['nom_routine'];
		    	}
			}
		    $i++; 
		}
		return $routines;
	} else {
		return NULL;
	}

}

function afficher_capteur_routine_formulaire(){
	$bdd=connexion_bdd();
	if ($_GET['anticipation']!='home') {
		$reponse = $bdd->prepare('SELECT COUNT(*) AS nombre FROM capteur WHERE ID_logement=:ID_logement AND nom_salle=:nom_salle');
		$reponse->execute(array(
			'ID_logement' => $_SESSION['ID_logement'],
			'nom_salle' => $_GET['anticipation']
			));
		$reponse = $reponse->fetch();
		if ($reponse['nombre']!=0){
			$reponsea = $bdd->prepare('SELECT * FROM capteur WHERE ID_logement=:ID_logement AND nom_salle=:nom_salle');
			$reponsea->execute(array(
				'ID_logement' => $_SESSION['ID_logement'],
				'nom_salle' => $_GET['anticipation']
				));
			$i=0;
			while ($donneesa = $reponsea->fetch()){
				if ($i==0){
					$capteurs[$donneesa['ID_capteur']] = $donneesa['nom_capteur'];
				} else {
					if (!(in_array($donneesa['nom_capteur'], $capteurs))){
			    	$capteurs[$donneesa['ID_capteur']] = $donneesa['nom_capteur'];
			    	}
				}
			    $i++; 
			}
		}
	} else{
		$reponse = $bdd->prepare('SELECT nom_salle FROM salle INNER JOIN routine_salle ON routine_salle.ID_salle=salle.ID_salle WHERE ID_routine=:ID_routine');
		$reponse->execute(array(
			'ID_routine'=> $_SESSION['ID_routine']
		));
		$i=0;
		while ($reponse1 = $reponse->fetch()){			
			$reponsea = $bdd->prepare('SELECT * FROM capteur WHERE nom_salle=:nom_salle AND ID_logement=:ID_logement');
			$reponsea->execute(array(
				'nom_salle' => $reponse1['nom_salle'],
				'ID_logement' =>  $_SESSION['ID_logement']
				));
			while ($donneesa = $reponsea->fetch()){
				if ($i==0){
					$capteurs[$donneesa['ID_capteur']] = $donneesa['nom_capteur'];
				} else {
					if (!(in_array($donneesa['nom_capteur'], $capteurs))){
			    	$capteurs[$donneesa['ID_capteur']] = $donneesa['nom_capteur'];
			    	}
				}
				$i++; 
			}
		} 
	}
	return $capteurs;
}

function afficher_consigne_routine_formulaire(){
	$bdd=connexion_bdd();
	$reponse = $bdd->prepare('SELECT COUNT(nom_capteur) AS nombre FROM capteur INNER JOIN routine_capteur ON routine_capteur.ID_capteur=capteur.ID_capteur WHERE ID_routine=:ID_routine');
	$reponse->execute(array(
		'ID_routine'=> $_SESSION['ID_routine']
	));
	$reponse = $reponse->fetch();
	if ($reponse['nombre']!=0){
		$reponse1 = $bdd->prepare('SELECT * FROM capteur INNER JOIN routine_capteur ON routine_capteur.ID_capteur=capteur.ID_capteur WHERE ID_routine=:ID_routine');
		$reponse1->execute(array(
			'ID_routine'=> $_SESSION['ID_routine']
		));
		$i=0;
		while ($donnees1 = $reponse1->fetch()){
				if ($i==0){
					$consigne[$donnees1['nom_capteur']] = $donnees1['nom_capteur'];
				} else {
					if (!(in_array($donnees1['nom_capteur'], $consigne))){
			    		$consigne[$donnees1['nom_capteur']] = $donnees1['nom_capteur'];
			    	}
				}
				$i++; 
		}return $consigne;
	}else {
		return NULL;
	}
}

function afficher_jours_routine($ID_routine){
	$bdd=connexion_bdd();
	$reponse1 = $bdd->prepare('SELECT jour_routine FROM routine_jour WHERE ID_routine=:ID_routine');
	$reponse1->execute(array(
		'ID_routine'=> $ID_routine
	));
	$i=0;
	while ($donnees1 = $reponse1->fetch()){
		$jours[$i] = $donnees1['jour_routine'];
		$i++;
	}
	return $jours;
}

function afficher_horaire_routine($ID_routine){
	$bdd=connexion_bdd();
	$reponse1 = $bdd->prepare('SELECT * FROM routine_jour WHERE ID_routine=:ID_routine');
	$reponse1->execute(array(
		'ID_routine'=> $ID_routine
	));
	while ($donnees1 = $reponse1->fetch()){
		$horaires[$donnees1['heure_debut_routine']] = $donnees1['heure_fin_routine'];
		}
	return $horaires;
}

function afficher_salle_routine($ID_routine){
	$bdd=connexion_bdd();
	$reponse0 = $bdd->prepare('SELECT COUNT(*) as nombre FROM salle INNER JOIN routine_salle ON routine_salle.ID_salle=salle.ID_salle WHERE ID_routine=:ID_routine');
	$reponse0->execute(array(
		'ID_routine'=> $ID_routine
	));
	$reponse0 = $reponse0->fetch();
	if ($reponse0['nombre']!=0) {
		$reponse1 = $bdd->prepare('SELECT nom_salle FROM salle INNER JOIN routine_salle ON routine_salle.ID_salle=salle.ID_salle WHERE ID_routine=:ID_routine');
		$reponse1->execute(array(
			'ID_routine'=> $ID_routine
		));
		$i=1;
		while ($donnees1 = $reponse1->fetch()){
			$salles[$i] = $donnees1['nom_salle'];
			$i++;
			}
	}else{
		$salles['null']=NULL;
	}
	
	return $salles;
}

function afficher_consigne_routine($ID_routine){
	$bdd=connexion_bdd();
	$reponse0 = $bdd->prepare('SELECT COUNT(*) as nombre FROM routine_capteur WHERE ID_routine=:ID_routine');
	$reponse0->execute(array(
		'ID_routine'=> $ID_routine
	));
	$reponse0 = $reponse0->fetch();
	if ($reponse0['nombre']!=0) {
		$reponse1 = $bdd->prepare('SELECT ordre, ID_capteur FROM routine_capteur WHERE ID_routine=:ID_routine');
		$reponse1->execute(array(
			'ID_routine'=> $ID_routine
		));
		while ($donnees1 = $reponse1->fetch()){
			$reponse2 = $bdd->prepare('SELECT nom_capteur FROM capteur WHERE ID_capteur=:ID_capteur');
			$reponse2->execute(array(
				'ID_capteur'=> $donnees1['ID_capteur']
			));
			$donnees2 = $reponse2->fetch();
			$consignes[$donnees2['nom_capteur']] = $donnees1['ordre'];
		}
	}else{
		$consignes['null']=NULL;
	}
	return $consignes;

}
?>
