<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_utilisateur.css">
		<link rel="stylesheet" href="public/css/base-header-avec-bouton.css">
		<link rel="stylesheet" href="public/css/footer.css">
		<link rel="stylesheet" href="public/css/admin.css">
		<link rel="stylesheet" href="public/css/page_administrateur.css">
	</head>
	
	<body>
		<?php include("vues/v_base-header-avec-bouton-deconnexion.php"); ?>
		<nav>
            <a href="index.php?target=compte&action=connecte&reaction=conditions_generales" class="Onglet">Conditions générales d'utilisation</a>
            <a href="index.php?target=compte&action=connecte&reaction=mentions_legales" class="actuel">Mentions légales</a>
            <a href="index.php?target=compte&action=connecte&reaction=slogan" class="Onglet">Slogan</a>
            <a href="index.php?target=compte&action=connecte&reaction=types" class="Onglet">Types de salle et de fonction</a>
        </nav>

		<section>
			<article>
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                
						<?php 
						$mentions_legales = get_mentions_legales();

						if(isset($_GET['rempli'])){
							if($_GET['rempli']=='administrateur'){
							?>

	                        <div style="text-align:center">
	                            <form method='post' action='index.php?target=compte&action=connecte&reaction=mentions_legales&rempli=OK'>
									<label for='nom' class="titre"><br> Mentions Légales </label><br><br>
									<textarea rows="50" cols="130" name='mentions_legales' id='mentions_legales'><div><?php echo $mentions_legales;?></div></textarea><br><br>
								    <input type='submit' value='Valider les changements' id='bouton'><br>
								</form>
	                        </div>

	                        <?php 
							}
						} 
						else{

							echo "<a href = 'index.php?target=compte&action=connecte&reaction=mentions_legales&rempli=administrateur' class='editer'>Editer</a></br>".$mentions_legales."</br>";
						}
						?>

                    </div>
			</article>
		</section>

		<?php include("vues/v_footer.php"); ?>
	</body>
</html>