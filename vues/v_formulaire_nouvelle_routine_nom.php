<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_utilisateur_nouvelle_salle.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
	<body>
		<?php include("vues/v_header_bouton.php"); ?>
		<?php include("vues/accueil_onglets.php"); ?>

		<nav>
            <a href="index.php?target=compte&action=connecte&reaction=effacer_routine&anticipation=<?php echo $_GET['anticipation']; ?>" class="Onglet" >Annuler</a>
        </nav>

		<section>
			<article>
				<div id="titre">Création d'une nouvelle routine</div><br/>
				<div id="corps">
					<?php 
					if (isset($_GET['comprehension'])){
						if ($_GET['comprehension'] =='erreur'){
							echo '<p class=\'message_d_erreur\'>Veuillez entrer un nom pour votre routine </p>'.'<br>';
						}elseif ($_GET['comprehension'] =='erreur2'){
							echo '<p class=\'message_d_erreur\'> Ce nom déjà utilisé dans votre foyer. Veuillez entrer un nouveau nom </p>'.'<br>';
						}
					}
					?>
					<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvelle_routine_nom_rempli&anticipation=<?php echo $_GET['anticipation']; ?>">
						<label for="type">Choisir un nom pour la nouvelle routine :</label><br>
							<br><input type="text" name="nom" /> <br />	
						<br>
						<br>
						<input type='submit' value='Valider' id='bouton'>
					</form>
				</div>
			</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
	</body>
</html>