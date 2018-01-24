<!DOCTYPE html>

<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/mentionslegales.css">
		<link rel="stylesheet" href="public/css/footer.css">
		
		<title>Mentions légales</title>
	</head>
	
		<body>
		<?php include("vues/v_header_no_bouton.php"); ?>

		<nav>
			<?php if((isset($_SESSION["connect"])) && ($_SESSION["connect"] == true) && ((isset($_SESSION["type_utilisateur"])) && (($_SESSION["type_utilisateur"]==1) || ($_SESSION["type_utilisateur"]==2)))) {?>
			<a href="index.php?target=compte&action=connecte&reaction=home" class= "Onglet">Retour</a>
			<?php }else if ((isset($_SESSION["connect"])) && ($_SESSION["connect"] == true) && ((isset($_SESSION["type_utilisateur"])) && (($_SESSION["type_utilisateur"])==4))) {?>
			<a href="index.php?target=compte&action=connecte&reaction=cemac" class= "Onglet">Retour</a>
			<?php }else if ((isset($_SESSION["connect"])) && ($_SESSION["connect"] == true) && ((isset($_SESSION["type_utilisateur"])) && (($_SESSION["type_utilisateur"])==3))) {?>
			<a href="index.php?target=compte&action=connecte&reaction=conditions_generales" class= "Onglet">Retour</a>
			<?php }else{ ?>
			<a href="index.php" class= "Onglet">Retour</a>
			<?php }?>
			<a href='index.php?target=conditions_generales' class='Grandonglet'>Conditions générales d'utilisation</a><a href='index.php?target=mentions_legales' class='actuel'>Mentions légales</a>
		</nav>
		
		<section>

			<article>
				<div id="corps"> <!-- Tout ce qu'il y a dans le rectangle-->
					<?php 	include ("modeles/m_conditions_generales.php");
						echo afficher_mentions_legales();
					?>
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
