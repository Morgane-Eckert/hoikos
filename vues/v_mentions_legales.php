<!DOCTYPE html>

<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/mentionslegales.css">
		<link rel="stylesheet" href="public/css/base-header-sans-bouton.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
	
		<body>
		<?php include("vues/v_base-header-sans-bouton-deconnexion.php"); ?>

		<nav>
			<a href="index.php" class="Onglet">Retour</a><a href="index.php?target=conditions_generales" class="Grandonglet">Conditions générales d'utilisation</a><a href="index.php?target=mentions_legales" class="actuel">Mentions légales</a>
		</nav>
		
		<section>

			<article>
				<div id="corps"> <!-- Tout ce qu'il y a dans le rectangle-->
					<strong>Nom de la société : </strong>Hoikos<br/><br/>

					<strong>Adresse : </strong>10, rue de Vanves 92170 Issy-les-Moulineaux<br/><br/>

					<strong>Au Capital de :</strong> 0 €<br/><br/>

					<strong>Adresse de courrier électronique : </strong>hoikos@gmail.com<br/><br/>

					<strong>Le Créateur du site est : </strong>Groupe 4C<br/><br/>

					<strong>Le Responsable de la publication est :</strong> Groupe 4C<br/><br/>

					<strong>Le Webmaster est  : </strong>Groupe 4C<br/><br/>

					<strong>Contactez le Webmaster : </strong>hoikos@gmail.com<br/><br/>

					<strong>L’hébergeur du site est : </strong>ISEP - 75006 PARIS
				</div>
			</article>
		</section>
		<section class="langues">
				<a href="index.php?target=mentions_legales.php" >
					<img alt="francais"  src="public/images/francais.png" id="francais">
				</a>
				<a href="mentionslegales-en.php" >
					<img alt="anglais"  src="public/images/anglais.png" id="anglais">
				</a>
		</section>
		
		<?php include("vues/v_footer.php"); ?>
		
	</body>
</html>