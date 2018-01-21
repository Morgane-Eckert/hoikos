<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_administrateur.css">
		<link rel="stylesheet" href="public/css/base-header-avec-bouton.css">
		</head>
	
	<body>
		<?php include("vues/v_base-header-avec-bouton-deconnexion.php"); ?>
		<nav>
            <a href="index.php?target=compte&action=connecte&reaction=conditions_generales" class="Onglet">Conditions générales d'utilisation</a>
            <a href="index.php?target=compte&action=connecte&reaction=mentions_legales" class="Onglet">Mentions légales</a>
            <a href="index.php?target=compte&action=connecte&reaction=slogan" class="actuel">Slogan</a>
            <a href="index.php?target=compte&action=connecte&reaction=types" class="Onglet">Types de pièces et de fonctions</a>
            <a href="index.php?target=compte&action=connecte&reaction=FAQ" class="Onglet">F.A.Q.</a>
        </nav>

		<section class="section">
			<article class="article_etroit">
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                        <p>
                        <?php 
						$slogan = get_slogan();

						if(isset($_GET['rempli'])){
							if($_GET['rempli']=='administrateur'){
							?>

	                        <div style="text-align:center">
	                            <form method='post' action='index.php?target=compte&action=connecte&reaction=slogan&rempli=OK'>
									<label for='nom' class="categorie"><br> Edition du slogan </label><br><br>
									<textarea cols="50" name='slogan' id='slogan'><?php echo $slogan;?></textarea><br><br>
								    <input type='submit' value='Valider les changements' id='bouton'><br>
								</form>
	                        </div>

	                        <?php 
							}
						} 
						else{
							echo "<div class='conteneur_editer'>".$slogan."</div>";
							echo "<br><br><div class='conteneur_editer'><a href = 'index.php?target=compte&action=connecte&reaction=slogan&rempli=administrateur' class='editer'>Editer</a></div>";
						}
						?>

                        </p>
                    </div>
			</article>
		</section>
	</body>
</html>