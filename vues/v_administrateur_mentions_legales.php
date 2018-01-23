<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_administrateur.css">
		<link rel="stylesheet" href="public/css/base-header-avec-bouton.css">
	</head>
	
	<body>
		<?php include("vues/v_header_bouton.php"); ?>
		<nav>
            <a href="index.php?target=compte&action=connecte&reaction=conditions_generales" class="Onglet">Conditions générales d'utilisation</a>
            <a href="index.php?target=compte&action=connecte&reaction=mentions_legales" class="actuel">Mentions légales</a>
            <a href="index.php?target=compte&action=connecte&reaction=slogan" class="Onglet">Slogan</a>
            <a href="index.php?target=compte&action=connecte&reaction=types" class="Onglet">Types de pièces et de fonctions</a>
            <a href="index.php?target=compte&action=connecte&reaction=FAQ" class="Onglet">F.A.Q.</a>
        </nav>

		<section class="section">
			<article class="article_etroit">
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
						<?php 
						$mentions_legales = get_mentions_legales();

						if(isset($_GET['rempli'])){
							if($_GET['rempli']=='administrateur'){
							?>

	                        <div style="text-align:center">
	                            <form method='post' action='index.php?target=compte&action=connecte&reaction=mentions_legales&rempli=OK'>
									<label for='nom' class="categorie"><br>Edition des mentions légales </label><br><br>
									<textarea rows="30" cols="50" name='mentions_legales' id='mentions_legales'><?php echo $mentions_legales;?></textarea><br><br>
								    <input type='submit' value='Valider les changements' id='bouton'><br>
								</form>
	                        </div>

	                        <?php 
							}
						} 
						else{
							echo $mentions_legales;
							echo "<br><br><div class='conteneur_editer'><a href = 'index.php?target=compte&action=connecte&reaction=mentions_legales&rempli=administrateur' class='editer'>Editer</a></div>";

						}
						?>
                    </div>
			</article>
		</section>
	</body>
</html>