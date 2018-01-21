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



/*function afficher_fonctions(){
	$bdd=connexion_bdd2();

	$reponse = $bdd->prepare('SELECT COUNT(*) AS nombre FROM capteur WHERE ID_logement=:ID_logement');
	$reponse->execute(array(
		'ID_logement' => $_SESSION['ID_logement']
		));
	$reponse = $reponse->fetch();
	if ($reponse['nombre']!=0){
		$bdd=connexion_bdd2();
		$reponsea = $bdd->prepare('SELECT nom_capteur FROM capteur WHERE ID_logement=:ID_logement');
		$reponsea->execute(array(
			'ID_logement' => $_SESSION['ID_logement']
			));
		$i=0;
		while ($donneesa = $reponsea->fetch()){
		    $capteurs[$i]= $donneesa['nom_capteur']; 
		    $i++; 
		}
		return $capteurs;
	} else {
		return NULL;
	}

}*/


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
?>
