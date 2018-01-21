<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/connexion.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
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

		<section>
			<p id ='message_d_erreur'></p>
			<article id="formulaire">
				<script> //Eventuel affichage d'un message d'erreur
					if (typeof <?php $_GET['action'] ?> != "undefined") {
						paragraphe = document.getElementById('message_d_erreur');
						if (action == mot_de_passe_incorrect){
							paragraphe.innerHTML='mot de passe incorrect';
						} else if (action == adresse_mail_inconnue){
							paragraphe.innerHTML='mot de passe incorrect';
						}
					}
				</script>
				<form method="post" action="index.php?target=compte">
  					 <p><input type="text" name="adressemail" placeholder="Adresse mail" class="Case" size="27" required /></p>
  					 <p><input type="password" name="mot_de_passe" placeholder="Mot de passe" class="Case" size="27" required></p>
  					 <input type="submit" value="Connexion" class="Onglet" />
				</form><br/>
				<a href="" class="lienn">Mot de passe oublié ?</a>
			</article >

			<article id="boutons">
				<a href="index.php?target=decouverte" class="Grandonglet"> Découverte </a>
				<a href="index.php?target=inscription" class="Grandonglet"> Inscription </a>
			</article>

			<article id="image">
				<img alt="demo" src="public/images/demo.jpg" id="demo">
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
	</body>
</html>
