<?php 
function connexion_bdd2(){
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



function afficher_onglets(){
	$bdd=connexion_bdd2();
	$reponse = $bdd->prepare('SELECT COUNT(*) AS nombre FROM salle WHERE ID_logement=:ID_logement');
	$reponse->execute(array(
		'ID_logement' => $_SESSION['ID_logement']
		));
	$reponse = $reponse->fetch();
	if ($reponse['nombre']!=0){
		$bdd=connexion_bdd2();
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

$bdd=connexion_bdd2();

	$reponse = $bdd->prepare('SELECT COUNT(*) AS nombre FROM capteur WHERE ID_logement=:ID_logement AND nom_salle=:nom_salle');
	$reponse->execute(array(
		'ID_logement' => $_SESSION['ID_logement'],
		'nom_salle' => $_GET['reaction']
		));
	$reponse = $reponse->fetch();
	if ($reponse['nombre']!=0){
		//$bdd=connexion_bdd2();
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
	$bdd=connexion_bdd2();

	$reponse = $bdd->prepare('SELECT COUNT(*) AS nombre FROM capteur WHERE ID_logement=:ID_logement');
	$reponse->execute(array(
		'ID_logement' => $_SESSION['ID_logement'],
		));
	$reponse = $reponse->fetch();
	if ($reponse['nombre']!=0){
		//$bdd=connexion_bdd2();
		$reponsea = $bdd->prepare('SELECT nom_capteur FROM capteur WHERE ID_logement=:ID_logement');
		$reponsea->execute(array(
			'ID_logement' => $_SESSION['ID_logement'],
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
?>
