<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/inscription.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
	<body>
		<?php include("vues/v_header_no_bouton.php");
				verif_cond_logement();

		?>
		<nav>
			<a href="index.php?target=inscription&action=utilisateur" class="Onglet">Retour</a>
		</nav>
		<section>
			<article>
				<div id="titre">Mon logement</div><br/>
				<form method='post' action='index.php?target=inscription&action=logement&reaction=rempli' id='corps'>
						<?php verif_cemac();?>
						<label for='numero_de_cemac'> Numéro de série de votre CeMAC (ce numéro vous a été fourni en magasin lors de votre premier achat) : </label><br/>
						<input type='text' name='numero_de_cemac' maxlength="5" required>
						<br><br>


						<label for='telephone_fixe'> Téléphone fixe :  </label><br/>
						<span id ="missTel"></span><br>
						<input type='text' name='telephone_fixe' id='telephone_fixe' maxlength='10' required><br><br />

						<label>Adresse</label><br>
						<input 	id="autocomplete" placeholder="Taper votre adresse..."
            					onFocus="geolocate()" type="text" class='adresse' style="width:300px;"><br><br>

						<label for='numero_rue_logement' id='numero_rue_logement'> Numéro de rue : </label><br/>
						<span id ="missNumrue"></span><br>
						<input type='text' name='numero_rue_logement' id='street_number' class='adresse' required><br><br>
						<label for='nom_rue_logement' id='nom_rue_logement'> Nom de rue : </label><br/>
						<span id ="missRue"></span><br>
						<input type='text' name='nom_rue_logement' id='route' class='adresse' required><br><br>
						<label for='code_postale_logement' id='code_postale_logement'> Code postal : </label><br/>
						<span id ="missCp"></span><br>
						<input type='text' name='code_postale_logement' id='postal_code' class='adresse' required><br><br>
						<label for="ville_logement">Ville :</label><br>
						<span id ="missVille"></span><br>
						<input type='text' name="ville_logement" id="locality" class='adresse' required> <br><br>
						<label for="pays_logement">Pays :</label><br>
						<span id ="missPays"></span><br>
						<input type='text' name="pays_logement" id="country" class='adresse' required> <br><br>
						<input type='submit' value='Valider' onclick="validation()" id='bouton'>
				</form>
				<p class='NB'> Tous les champs sont obligatoires.<br></p>
			</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz2XZbaRtoXDEpEBz7QqqmMEORtzrU7Dk&libraries=places&callback=initAutocomplete"
                async defer></script>
								<script type='text/javascript' src='public/js/verification_adresse.js'></script>
								<script type='text/javascript' src='public/js/adresse.js'></script>
	</body>
</html>
