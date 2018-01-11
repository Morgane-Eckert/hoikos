<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/inscription.css">
		<link rel="stylesheet" href="public/css/base-header-sans-bouton.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
	<body>
		<?php include("vues/v_base-header-sans-bouton-deconnexion.php"); ?>
		<nav>
			<a href="index.php" class="Onglet">Retour</a>
		</nav>
		<section>
			<article>
				<div id="titre">Mon logement</div><br/>
				<form method='post' action='index.php?target=inscription&action=logement&reaction=rempli' id='corps'>
						<label for='superficie' id='superficie'> Superficie : </label><br/>
						<input type='text' name='superficie' id='superficie' required>  m&sup2;<br><br>
						<label for='type_logement'>Vous habitez dans : </label>

						<input type='radio' id='Maison' name='type_logement' value='Maison' required> Une maison
					
						<input type='radio' id='Appartement' name='type_logement' value='Appartement' required> Un appartement
						<br><br>
						<label for='telephone_fixe'> Téléphone fixe :  </label><br/>
						<input type='text' name='telephone_fixe' id='telephone_fixe' maxlenght='10' required><br><br />
						<label for='numero_rue_logement' id='numero_rue_logement'> Numéro de rue : </label><br/>
						<input type='text' name='numero_rue_logement' id='numero_rue_logement' required><br><br>
						<label for='nom_rue_logement' id='nom_rue_logement'> Nom de rue : </label><br/>
						<input type='text' name='nom_rue_logement' id='nom_rue_logement' required><br><br>
						<label for='code_postale_logement' id='code_postale_logement'> Code postal : </label><br/>
						<input type='text' name='code_postale_logement' id='code_postale_logement' required><br><br>
						<label for="ville_logement">Ville :</label><br>
						<select name="ville_logement" id="ville_logement" required>
							<option value="Bordeaux">Bordeaux</option>
							<option value="Lyon">Lyon</option>
							<option value="Marseille">Marseille</option>
							<option value="Nantes">Nantes</option>
							<option value="Paris" selected>Paris</option><br><br>
							<option value="Toulouse">Toulouse</option>
						</select><br><br>
						<label for="pays_logement">Pays :</label><br>
						<select name="pays_logement" id="pays_logement">
							<option value="France" selected>France</option>
						</select><br><br>
						<input type='submit' value='Valider' id='bouton'>
				</form>
				<p class='NB'> Tous les champs sont obligatoires.<br></p>
			</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
	</body>
</html>