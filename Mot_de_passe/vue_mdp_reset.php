<!DOCTYPE HTML>

<HTML>
<head>
	<title>Réinitialisation du mot de pase</title>
	<meta charset="utf-8">
</head>

<body>
	<form action="mdp_reset.php" method="post">

  	<input type="hidden" name="token" value="<?php echo "".$token."" ?>"></input>
  	<input type="hidden" name="id" value="<?php echo "".$id."" ?>"></input>

	<label for='mot_de_passe'>Nouveau mot de passe : </label><br/>
	<input type='password' name='mdp' required><br><br />

	<label for='mot_de_passe2'>Confirmation du mot de passe : </label><br/>
	<input type='password' name='mdp2' required><br><br />
			
	<?php 
		if ($_SESSION["critmdp"]==1)
		{
	?>
		<span>Le mot de passe doit contenir au moins 8 caractères dont une majuscule, une miniscule, un chiffre et un caractère spécial.</span><br/><br/>
	<?php 
		}
		else
		{
	?>
		<span>Le mot de passe doit contenir au moins 8 caractères dont une majuscule, une miniscule, un chiffre et un caractère spécial.</span><br/><br/>
			<?php
		}
	?>
	<?php 
		if ($_SESSION["samemdp"]==1)
		{
	?>
		<span>Les deux mots de passe doivent être identiques.</span><br/><br/>
			<?php
		}
	?>

	<input type="submit" value="valider">

	</form>
</body>
</HTML>