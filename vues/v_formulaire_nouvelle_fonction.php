<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_utilisateur_nouvelle_salle.css">
		<link rel="stylesheet" href="public/css/base-header-avec-bouton.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
	<body>
		<?php include("vues/v_base-header-avec-bouton-deconnexion.php"); ?>

		<nav>
			<a href="index.php?target=compte&action=connecte&reaction=home" class="Onglet">Home</a>
	         <?php //Affichage des onglets
	            include("accueil_onglets.php");
	            $onglets = afficher_onglets();
	            foreach($onglets as $element){//On parcourt le tableau
	                    ?>
	                    <a href="index.php?target=compte&action=connecte" class="Onglet"> <?php echo $element; ?> </a>
	                    <?php
	                }
	         ?>
            <a href="index.php?target=compte&action=connecte&reaction=nouvel_onglet" class="actuel" id='nouvel_onglet'>+</a>
            <a href="index.php?target=compte&action=connecte" class="Conso">Consommations</a>
            <a href="index.php" class="Onglet">Profil</a>
        </nav>

		<section>
			<article>
				<div id="titre">Ajouter une nouvelle fonction</div><br/>
				<div id="corps">
					<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvelle_fonction_rempli">
						<label for='nom_capteur' id=''> Nom de la nouvelle fonction : </label><br/>
	  					<input type="text" name="nom_capteur" placeholder="Température" class="Case" size="27" required /><br/><br/>
	  					<label for="type_de_capteur">Type de la nouvelle fonction :</label><br>
						<select name="type_de_salle" id="" required>
							<option value="temperature" selected >Température</option>
							<option value="humidité">Humidité</option>
							<option value="climatisation">Climatisation</option>
							<option value="mvc">MVC</option>
							<option value="musique">Musique</option>
							<option value="volets">Volets</option>
						</select><br><br>
						<input type='submit' value='Valider' id='bouton'>
					</form>
				</div>
			</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
	</body>
</html>