<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../public/css/mdp_reset.css">
		<link rel="stylesheet" href="../public/css/footer.css">
	</head>
	<body>
		<header>
			<a href="../index.php" >
				<img alt="Logo"  src="../public/images/logooo.png" id="Logo"><!--Photo du logo et du slogan-->
			</a>
		</header>

		<section>
		
		<?php if ($_SESSION["mdp_changed"]==0)
		{
		?>
		
		<p><article id="formulaire">	

		<form action="../controleurs/c_mdp_reset.php" method="post">

	  	<input type="hidden" name="token" value="<?php echo "".$token."" ?>"></input>
	  	<input type="hidden" name="id" value="<?php echo "".$id."" ?>"></input>

		<label for='mot_de_passe'>Nouveau mot de passe</label><br/>
		<input type='password' name='mdp' class= "input" required><br><br />

		<label for='mot_de_passe2'>Confirmation du mot de passe</label><br/>
		<input type='password' name='mdp2' class = "input" required><br><br />
		</p>
		<p>
		<?php 
			if ($_SESSION["critmdp"]==1)
			{
		?>
			<span class= "wrong">Le mot de passe doit contenir au moins 8 caractères dont une majuscule, une miniscule, un chiffre et un caractère spécial</span><br/><br/>
		<?php 
			}
			else if ($_SESSION["critmdp"]==2)
			{
		?>
			<span class= "good">Le mot de passe doit contenir au moins 8 caractères dont une majuscule, une miniscule, un chiffre et un caractère spécial</span><br/><br/>
		<?php
			}
			else
			{
		?>
			<span class= "normal">Le mot de passe doit contenir au moins 8 caractères dont une majuscule, une miniscule, un chiffre et un caractère spécial</span><br/><br/>
		<?php
			}
		?>

		<?php 
			if ($_SESSION["samemdp"]==1)
			{
		?>
			<span class= "wrong">Les deux mots de passe doivent être identiques</span><br/><br/>
				<?php
			}
		?>
		</p>
		<p>
		<input type="submit" value="Valider" class="bouton">
		</form>
		</p>

		<?php
		}
		else
		{
		?>
		<span class= "changed">Votre mot de passe a bien été modifié</span><br/><br/>
		<?php
		}
		?>


		</article>
		</section>
		
		<?php if ($_SESSION["mdp_changed"]==0)
		{
		?>
		<footer>
		<a href="../index.php?target=conditions_generales" class="lien">Conditions générales d'utilisation</a>
		<div >Hoikos™ - Tous droits de reproduction réservés</div>
		<a href="../index.php?target=mentions_legales" class="lien">Mentions légales</a>
		<a href="../index.php?target=aide"><img src="../public/images/aide.png" id="help" ></a>
		</footer>
		<?php
		}
		?>
	</body>
</html>
