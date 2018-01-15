<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/inscription.css">
		<link rel="stylesheet" href="public/css/base-header-sans-bouton.css">
		<link rel="stylesheet" href="public/css/footer.css">
		<script type="text/javascript" src="public/js/adresse.js"></script>
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
						<label for='type_logement'>Vous habitez dans : </label>
						<input type='radio' id='Maison' name='type_logement' value='Maison' required> Une maison
						<input type='radio' id='Appartement' name='type_logement' value='Appartement' required> Un appartement<br><br>
						<label for='superficie' id='superficie'> Superficie : </label><br/>
						<input type='text' name='superficie' id='superficie' required>  m&sup2;<br><br>
						
						

						<label for='numero_de_cemac'> Numéro de série de votre CeMAC (ce numéro vous a été fourni en magasin lors de votre premier achat) : </label><br/>
						<input type='text' name='numero_de_cemac' maxlength="5" required>
						<br><br>


						<label for='telephone_fixe'> Téléphone fixe :  </label><br/>
						<input type='text' name='telephone_fixe' id='telephone_fixe' maxlength='10' required><br><br />

						<label>Addresse</label><br>
						<input id="autocomplete" placeholder="Taper votre adresse..."
             onFocus="geolocate()" type="text" class='adresse' style="width:300px;"><br><br>

						<label for='numero_rue_logement' id='numero_rue_logement'> Numéro de rue : </label><br/>
						<input type='text' name='numero_rue_logement' id='street_number' class='adresse' required disabled = 'true'><br><br>
						<label for='nom_rue_logement' id='nom_rue_logement'> Nom de rue : </label><br/>
						<input type='text' name='nom_rue_logement' id='route' class='adresse'required disabled = 'true'><br><br>
						<label for='code_postale_logement' id='code_postale_logement'> Code postal : </label><br/>
						<input type='text' name='code_postale_logement' id='postal_code' class='adresse' required disabled = 'true'><br><br>
						<label for="ville_logement">Ville :</label><br>
						<input type='text' name="ville_logement" id="locality" class='adresse' required disabled = 'true'> <br><br>
						<label for="pays_logement">Pays :</label><br>
						<input type='text' name="pays_logement" id="country" class='adresse' required disabled = 'true'> <br><br>
						<input type='submit' value='Valider' id='bouton' onclick='activate()'>
				</form>
				<p class='NB'> Tous les champs sont obligatoires.<br></p>
			</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz2XZbaRtoXDEpEBz7QqqmMEORtzrU7Dk&libraries=places&callback=initAutocomplete"
                async defer></script>
	</body>
</html>