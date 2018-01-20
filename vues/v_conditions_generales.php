<!DOCTYPE html>

<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/conditionsgenerales.css">
		<link rel="stylesheet" href="public/css/base-header-sans-bouton.css">
		<link rel="stylesheet" href="public/css/footer.css">
		<title>Conditions générales</title>
	</head>
	
	<body>
		<?php include("vues/v_base-header-sans-bouton-deconnexion.php"); ?>

		<nav>
			<a href="index.php" class="Onglet">Retour</a><a href="index.php?target=conditions_generales" class="actuel">Conditions générales d'utilisation</a><a href="index.php?target=mentions_legales" class="Grandonglet">Mentions légales</a>
		</nav>
		
		<section>

			<article>
				<div id="corps"> <!-- Tout ce qu'il y a dans le rectangle-->
					<?php 	include ("modeles/m_conditions_generales.php");
						echo afficher_conditions_generales();
					?>
				</div>		
			</article>
		</section>
		<section class="langues">
				<a href="index.php?target=conditions_generales" >
					<img alt="francais"  src="public/images/francais.png" id="francais">
				</a>
				<a href="conditionsgenerales-en.php" >
					<img alt="anglais"  src="public/images/anglais.png" id="anglais">
				</a>
		</section>
		
		<?php include("vues/v_footer.php"); ?>
		
	</body>
</html>
