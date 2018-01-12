<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/mail_reset.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
	<body>
		<header>
			<a href="index.php" >
				<img alt="Logo"  src="public/images/logooo.png" id="Logo"><!--Photo du logo et du slogan-->
			</a>
		</header>

		<section>
		<article id="formulaire">

		<?php if ($_GET["target"]=="mail_non_exist")
		{
		?>
			<span class="wrong">Adresse mail non existante</span><br/>
		<?php 
		}
		?>

		<?php if ($_GET["target"]=="mail_sent")
		{
		?>
			<span class="good"><br/>Un mail vous a été envoyé afin de réinitialiser votre mot de passe</span><br/>
		<?php 
		}
		?>

		<form action="./controleurs/c_mail_reset.php" method="post">
		<input type="email" name="mail" placeholder="Adresse mail" class="input" size="27"><br>
		<input type="submit" value="Envoyer" class="Onglet">
		</form>

		</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
	</body>
</html>