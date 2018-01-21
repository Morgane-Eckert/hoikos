<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/decouverte.css">
		<link rel="stylesheet" href="public/css/footer.css">
		<title>Découverte</title>
	<body>
		<header>
			<a href="index.php" >
				<img alt="Logo"  src="public/images/logo.png" id="Logo"><!--Photo du logo-->
			</a>
			<br/>
			<p class="slogan">
			<?php 
			include('modeles/m_bddco.php'); 
			include ('modeles/m_slogan.php');
			echo slogan(); ?><p>
		</header>
		

		<nav>
            <a href="index.php" class="Onglet">Retour</a>
        </nav>
		<section class="content">
			<article>
				<div id="titre"> Notre Offre</div><br/><!-- Titre dans le bandeau rouge-->
				<div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
					<img alt="decouverte"  src="public/images/decouverte.png" id="decouverte">
				</div>
			</article>
			<p>
				<a href="index.php?target=inscription&action=utilisateur" class="Grandonglet">Inscription</a>
			</p>
		</section>
		<section class="langues">
				<a href="decouverte.php" >
					<img alt="francais"  src="public/images/francais.png" id="francais">
				</a>
				<a href="decouverte.php" >
					<img alt="anglais"  src="public/images/anglais.png" id="anglais">
				</a>
		</section>

		<?php include("vues/v_footer.php"); ?>
		
	</body>
</html>