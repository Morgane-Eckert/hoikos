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
						<label for='type_logement'>Vous habitez dans : </label>
						<input type='radio' id='Maison' name='type_logement' value='Maison' required> Une maison
					
						<input type='radio' id='Appartement' name='type_logement' value='Appartement' required> Un appartement
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
            <script>
              var placeSearch, autocomplete;
              var componentForm = {
				street_number: 'short_name',
				route: 'long_name',
				locality: 'long_name',
				country: 'long_name',
				postal_code: 'short_name'
              };
        
              function initAutocomplete() {
                // Create the autocomplete object, restricting the search to geographical
                // location types.
                autocomplete = new google.maps.places.Autocomplete(
                    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                    {types: ['geocode']});
        
                autocomplete.addListener('place_changed', fillInAddress);
              }
        
              function fillInAddress() {
                var place = autocomplete.getPlace();
        
                for (var component in componentForm) {
                  document.getElementById(component).disabled = false;
                  document.getElementById(component).value = '';
                  document.getElementById(component).disabled = true;
                }
        
                for (var i = 0; i < place.address_components.length; i++) {
                  var addressType = place.address_components[i].types[0];
                  if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                  }
                }
              }
        
              function geolocate() {
                if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(function(position) {
                    var geolocation = {
                      lat: position.coords.latitude,
                      lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                      center: geolocation,
                      radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                  });
                }
              }
              function activate(){
                for (var component in componentForm) {
                  document.getElementById(component).disabled = false;
                }
              }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz2XZbaRtoXDEpEBz7QqqmMEORtzrU7Dk&libraries=places&callback=initAutocomplete"
                async defer></script>
	</body>
</html>