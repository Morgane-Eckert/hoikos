<?php
function nouveau_cemac($numero_cemac){
	$bdd=connexion_bdd();
	$requete = $bdd->prepare("INSERT INTO cemac (numero_de_cemac) VALUES (:numero_de_cemac)");
	$requete->execute(array(
			'numero_de_cemac' => $numero_cemac
		    ));
}
?>