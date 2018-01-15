<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/decouverte.css">
		<title>Découverte</title>
	<body>
		<header>
			<a href="index.php" >
				<img alt="Logo"  src="public/images/logooo.png" id="Logo"><!--Photo du logo et du slogan-->
			</a>
		</header>
		<nav>
            <a href="index.php" class="Onglet">Retour</a>
        </nav>
		<section>
			<article>
				<div id="titre"> Notre Offre</div><br/><!-- Titre dans le bandeau rouge-->
				<div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
					<img alt="decouverte"  src="public/images/decouverte.png" id="decouverte">
				</div>
			</article>
			<a href="index.php?target=inscription&action=utilisateur" class="Grandonglet">Inscription</a>
		</section>
		<section class="langues">
				<a href="decouverte.php" >
					<img alt="francais"  src="public/images/francais.png" id="francais">
				</a>
				<a href="decouverte.php" >
					<img alt="anglais"  src="public/images/anglais.png" id="anglais">
				</a>
		</section>

		<footer>
			<?php include("vues/v_footer.php"); ?>
		</footer>
		
	</body>
</html>
