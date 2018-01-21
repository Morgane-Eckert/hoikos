<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/pagedaide.css">
		<link rel="stylesheet" href="public/css/base-header-sans-bouton.css">
		<link rel="stylesheet" href="public/css/footer.css">
		<title>Page d'aide</title>
	</head>
	<body>
		<?php include("vues/v_base-header-sans-bouton-deconnexion.php"); ?>
		<nav>
			<?php
			if (isset($_SESSION["connect"])){
				echo "<a href='index.php?target=compte&action=connecte&reaction=home' class='Onglet'>Retour</a>";				
			} else {
				echo "<a href='index.php' class='Onglet'>Retour</a>";
			} 
			?>
		</nav>		
		
		<section >
			<article class="article">
				<div class="titre"> F.A.Q.</div><br/><!-- Titre dans le bandeau rouge-->
				<div class="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
					<?php 	include ("modeles/m_faq.php");
						$question = afficher_question();
						$reponse = afficher_reponse();
						for ($i=0;$i<sizeof($question);$i++){
							$question_reponse[$i] = "<span class='bleu'>".$question[$i]."</span></br>".$reponse[$i];
						} 
						foreach ($question_reponse as $element){
							echo "</br>".$element."</br>";
						}
						echo "</br>";
			               	?>

				</div>
			</article>
			
			<article class="article">
				<div class="titre"> Nos coordonnées :</div><br/><!-- Titre dans le bandeau rouge-->
				<div class="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
					<span class='bleu'>Téléphone : </span>06 59 91 80 18 <br><br>
					<span class='bleu'>Adresse :</span> 10, rue de Vanves Issy-les-Moulineaux (92130)
				</div>
			</article>

			<article class="article">
				<div class="titre"> Contactez-nous :</div><br/><!-- Titre dans le bandeau rouge-->
				<div class="corps">
				<form action="index.php?target=aide_message" method="post">
					<label for="prenom" class='bleu'>Prénom :</label><br>
					<input class="input" type="text" name="prenom" required><br><br>
					<label for="nom" class='bleu'>Nom :</label> <br>
					<input class="input" type="text" name="nom" required><br/><br>
					<label for="mail" class='bleu'>Adresse mail :</label> <br>
					<input class="input" type="email" name="mail" required><br/><br>
					<label for="message" class='bleu'>Votre message :<br>
					<textarea class="input" name="message" rows='8' cols='60' required></textarea><br/> 

					<?php if ($_GET['target']=='aide_message_envoyé')
					{
						echo "Votre message a bien été envoyé !";
					}
					?>

					<?php if ($_GET['target']=='aide_message_bug')
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

