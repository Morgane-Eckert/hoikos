<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../connexion.css">
		<link rel="stylesheet" href="../footer.css">
	</head>
	<body>
		<header>
			<a href="connexion.php" >
				<img alt="Logo"  src="../logooo.png" id="Logo"><!--Photo du logo et du slogan-->
			</a>
		</header>

		<section>
			<article id="formulaire">
				<form method="post" action="traitement_connexion.php">
  					 <p><input type="text" name="adressemail" placeholder="Adresse mail" class="Case" size="27" required /></p>
  					 <p><input type="password" name="mot_de_passe" placeholder="Mot de passe" class="Case" size="27" required></p>
  					 <input type="submit" value="Connexion" class="Onglet" />
				</form><br/>
				<a href="conditionsgenerales.html" class="lienn">Mot de passe oublié ?</a>
			</article >
			<article id="boutons">
				<a href="decouverte.php" class="Grandonglet"> Découverte </a>
				<a href="index.php?target=inscription" class="Grandonglet"> Inscription </a>
			</article>
			<article id="image">
				<img alt="demo" src="../demo.jpg" id="demo">
			</article>
			<aside>
			<a href="connexion.php" >
				<img alt="francais"  src="../francais.png" id="francais">
			</a>
			<a href="connexion-en.php" >
				<img alt="anglais"  src="../anglais.png" id="anglais">
			</a>
			</aside>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>