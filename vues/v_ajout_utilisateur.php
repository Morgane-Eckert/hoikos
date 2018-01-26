<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/inscription.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
	
	<body>
		<?php 	include("vues/v_header_no_bouton.php");
				verif_cond_utilisateur();
		?>
		<script src="public/js/valider_formulaire_inscription.js" ></script><!-- Verifications formulaire en JS -->
		<nav>
			<a href="index.php" class="Onglet">Retour</a>
		</nav>
		
		<section>
			<article>
				<div id="titre">Mon profil</div><br/>
				<form name='formulaire_inscription' method='post' action='index.php?target=inscription&action=utilisateur&reaction=rempli' id='corps' onsubmit="return verifForm(this)">
						<label for='nom' id='test'> Nom : </label><br/>
						<input type='text' pattern='^[a-zA-Z]+$' name='nom' id='nom' required><br><br>
						<label for='prénom'> Prénom :  </label><br/>
						<input type='text' pattern='^[a-zA-Z]+$' name='prenom' id='prenom' required><br><br />
						<label for='telephone'> Téléphone personnel :  </label><br/>
						<input type='tel' pattern='^0[1-9]\d{8}$' name='telephone1' id='telephone1' maxlength='10' required><br><br />
						<?php verif_mail();?>
						<label for='adresse_mail'> Adresse mail :  </label><br/>
						<input type='email' name='adresse_mail' id='adresse_mail' size='30' required><br><br />
						<label for='date_naissance'> Date de naissance:  </label><br/>
						<input type='date' name='date_naissance' id='date_naissance'  required><br><br />
						<?php verif_mdp();?>
						<label for='mot_de_passe'>Mot de passe : </label><br/>
						<input type='password' name='mot_de_passe' id='mot_de_passe'  required><br><br />

						<label for='mot_de_passe2'>Confirmation du mot de passe : </label><br/>
						<input type='password' name='mot_de_passe2' id='mot_de_passe2'  required><br><br />
	
						<label for='Conditions'></label><input type='checkbox'  id='Conditions' required><a href='index.php?target=conditions_generales' id='Condition' target=_blank>J'ai lu et accepté les conditions générales d'utilisation</a><br><br><br/>
						<input type='submit' value='Valider' id='bouton'>
				</form>



			<p class='NB'> Tous les champs sont obligatoires.<br></p>
			</article>
		</section>
		<section class="langues">
				<a href="conditionsgenerales.php" >
					<img alt="francais"  src="public/images/francais.png" id="francais">
				</a>
				<a href="conditionsgenerales-en.php" >
					<img alt="anglais"  src="public/images/anglais.png" id="anglais">
				</a>
		</section>

		<?php 	include("vues/v_footer.php");?>
		 
	</body>
</html>