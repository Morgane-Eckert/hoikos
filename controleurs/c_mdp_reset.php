<?php
session_start();
$_SESSION["samemdp"]=0;
$_SESSION["critmdp"]=0;
include ('../modeles/m_mdp_reset.php');
if (isset($_GET['token']) AND isset($_GET['id']))
{
	//Recuperation du token et id dans le lien 
	$token = htmlentities($_GET['token']);
	$id = htmlentities($_GET['id']);
	
		if(token_id_check($token,$id) == 0)  //Non existant et/ou concordant
		{
			echo "Le lien a expiré, veuillez remplir le formulaire de récupération de mot de passe une nouvelle fois";	
		}
		else  //Existant et concordant
		{
			include("../vues/v_mdp_reset.php");
		}
}
if (isset($_POST['token']) AND isset($_POST['id']) AND isset($_POST['mdp']) AND isset($_POST['mdp2']))
{
	$token = htmlentities($_POST['token']);
	$id = htmlentities($_POST['id']);
	$mdp = htmlentities($_POST['mdp']);
	$mdp2 = htmlentities($_POST['mdp2']);
	if ($mdp == $mdp2 && (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#', $mdp)))
	{
		change_mdp($mdp,$token,$id); //Modification du mot de passe dans la BDD
		reset_token($id); //Effacer le token de la BDD
		echo "Votre mot de passe a bien été modifié";
	}
	else
	{
		if (!(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#', $mdp)))
		{
			$_SESSION["critmdp"]=1;
		}
		if (!($mdp == $mdp2))
		{
			$_SESSION["samemdp"]=1;
		}
		include("../vues/v_mdp_reset.php");
	}
}
?>