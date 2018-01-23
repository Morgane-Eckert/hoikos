<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/pagedaide.css">
		<link rel="stylesheet" href="public/css/footer.css">
		<title>Page SAV</title>
	</head>
	<body>
	<?php include("vues/v_header_bouton.php"); ?>
	<nav>
           <a href="index.php?target=compte&action=connecte&reaction=home" class="Onglet">Retour</a>
    </nav>
    	<section>
			<article class="article">
				<div class="titre"> Contactez-nous :</div><br/><!-- Titre dans le bandeau rouge-->
				<div class="corps">
				<form action="index.php?target=sav" method="post">
					<label for="prenom" class='bleu'>Prénom :</label><br>
					<input class="input" type="text" name="prenom" required><br><br>
					<label for="nom" class='bleu'>Nom :</label> <br>
					<input class="input" type="text" name="nom" required><br/><br>
					<label for="mail" class='bleu'>Adresse mail :</label> <br>
					<input class="input" type="email" name="mail" required><br/><br>
					<label for="message" class='bleu'>Votre message :<br>
					<textarea class="input" name="message" rows='8' cols='60' required></textarea><br/> 

					<?php if ($_GET['target']=='sav_message_envoyé')
					{
						echo "Votre message a bien été envoyé !";
					}
					?>

					<?php if ($_GET['target']=='sav_message_bug')
					{
						echo "Erreur ! Veuillez contacter directement hoikosg4c@gmail.com";
					}
					?>

					<span class='conteneur'><input class="bouton" type="submit" value="Envoyer"></span>
				</form>
			</div>
			</article>

		</section>
		
		<?php include("vues/v_footer.php"); ?>
		
	</body>
</html>

