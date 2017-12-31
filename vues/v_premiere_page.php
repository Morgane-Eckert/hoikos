<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/connexion.css">
		<link rel="stylesheet" href="public/css/footer.css">
		<script src="public/js/recuperer_variable_url.js" ></script>
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
				<script> //Eventuel affichage d'un message d'erreur
					var parametre = parseQueryString();
					var action = parametre["action"];//On récupère le parametre action dans l'url et on le met dans une variable JS 
					if (typeof action != "undefined") {//si la variable JS action est définie et non vide
						paragraphe = document.getElementById('message_d_erreur');//On récupère l'élement paragraphe grace à son id
						if (action == 'mot_de_passe_incorrect'){
							paragraphe.innerHTML='Le mot de passe entré est incorrect';//On remplace le contenu de paragraphe par 'mot de passe incorrect'
						} else if (action == 'adresse_mail_inconnue'){
							paragraphe.innerHTML='L\'adresse mail entrée ne correspond à aucun compte';
						}
					}
				</script>
				<form method="post" action="index.php?target=compte">
  					 <p><input type="text" name="adressemail" placeholder="Adresse mail" class="Case" size="27" required /></p>
  					 <p><input type="password" name="mot_de_passe" placeholder="Mot de passe" class="Case" size="27" required></p>
  					 <input type="submit" value="Connexion" class="Onglet" />
				</form><br/>
				<a href="index.php" class="lienn">Mot de passe oublié ?</a>
			</article >
			<article id="boutons">
				<a href="index.php?target=decouverte" class="Grandonglet"> Découverte </a>
				<a href="index.php?target=inscription&action=utilisateur" class="Grandonglet"> Inscription </a>
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