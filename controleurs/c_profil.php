<?php
include ('/modeles/m_profil.php');
function profil(){
	include('vues/v_profil.php');
}
function profil_editer_utilisateur_principal($id_utilisateur,$nom,$prenom,$telephone,$adresse_mail,$date_de_naissance){
	$bdd = connexion_bdd3();
	
	$reponse = $bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE adresse_mail_utilisateur = :adresse_mail_utilisateur');
	$reponse->execute(array(
	'adresse_mail_utilisateur' => $adresse_mail,
	));
	
	$count=$reponse->fetchColumn();
	
	if($count<=1){
		$req = $bdd->prepare('UPDATE utilisateur SET nom_utilisateur = :nvnom, prenom_utilisateur = :nvprenom, adresse_mail_utilisateur = :nvadresse, date_de_naissance_utilisateur = :nvdate, telephone_1_utilisateur = :nvtelephone WHERE ID_utilisateur = :id');
		$req->execute(array(
			'nvnom' => $nom,
			'nvprenom' => $prenom,
			'nvadresse' => $adresse_mail,
			'nvdate' => $date_de_naissance,
			'nvtelephone' => $telephone,
			'id' => $id_utilisateur,
		));
	
	}
	header("Location:index.php?target=compte&action=connecte&reaction=profil");
	
}
function profil_editer_adresse($id_utilisateur,$ruelogement,$villelogement,$numeroruelogement,$codepostallogement,$telephonefixe){
	$bdd = connexion_bdd3();
    
	$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE ID_utilisateur=:id');
    $reponse->execute(array(
    'id'=> $id_utilisateur,
    ));
	
    while ($donnees = $reponse->fetch()){
    $ID_logement = $donnees['ID_logement'];
	}
    $reponse->closeCursor();
	
	$req = $bdd->prepare('UPDATE logement SET nom_rue_logement = :nvnomrue,ville_logement = :nvville, numero_rue_logement = :nvnumerorue, code_postale_logement = :nvcodepostale, telephone_logement = :nvtelephone WHERE ID_logement = :id');
	$req->execute(array(
		'nvnomrue' => $ruelogement,
		'nvville' => $villelogement,
		'nvnumerorue' => $numeroruelogement,
		'nvcodepostale' => $codepostallogement,
		'nvtelephone' => $telephonefixe,
		'id' => $ID_logement,
	));
	header("Location:index.php?target=compte&action=connecte&reaction=profil");
}
?>