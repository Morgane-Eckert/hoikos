<?php 

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