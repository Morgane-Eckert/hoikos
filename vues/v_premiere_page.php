<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/connexion.css">
		<link rel="stylesheet" href="public/css/footer.css">
		<!--<script src="public/js/recuperer_variable_url.js" ></script>
		<script src="public/js/valider_formulaire_connexion.js" ></script>-->
	</head>
	<body>
		<header>
			<a href="index.php" >
				<img alt="Logo"  src="public/images/logooo.png" id="Logo"><!--Photo du logo et du slogan-->
			</a>
		</header>

		<section>
			<div id='conteneur_message_d_erreur'>
				<p id ='message_d_erreur'></p>
			</div>
			<article id="formulaire">
			<?php 
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 'mot_de_passe_incorrect'){
					echo "<p id='message_d_erreur'>Le mot de passe entré est incorrect.</p>";
				} else if ($_GET['action'] == 'adresse_mail_inconnue'){
					echo "<p id='message_d_erreur'>L'adresse mail entrée ne correspond à aucun compte</p>";
				}
			}
			?>

				<form method="post" action="index.php?target=compte">
  					 <p><input type="text" name="adressemail" placeholder="Adresse mail" class="Case" size="27" required /></p>
  					 <p><input type="password" name="mot_de_passe" placeholder="Mot de passe" class="Case" size="27" required></p>
  					 <input type="submit" value="Connexion" class="Onglet" />
				</form><br/>
				<a href="index.php?target=mot_de_passe_oublié" class="lienn">Mot de passe oublié ?</a>
			</article >
			<article id="boutons">
				<a href="index.php?target=decouverte" class="Grandonglet"> Découverte </a>
				<a href="index.php?target=inscription&action=utilisateur" class="Grandonglet"> Inscription </a>
			</article>
			<article id="image">
				<img alt="demo" src="public/images/petitesmaisons.png" id="demo">
			</article>
			<aside>
			<a href="index.php" >
				<img alt="francais"  src="public/images/francais.png" id="francais">
			</a>
			<a href="connexion-en.php" >
				<img alt="anglais"  src="public/images/anglais.png" id="anglais">
			</a>
			</aside>
		</section>
		<?php include("vues/v_footer.php"); ?>
		<script src="public/js/valider_formulaire_connexion.js" ></script>
	</body>
</html>