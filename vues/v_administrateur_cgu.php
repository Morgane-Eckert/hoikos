<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_administrateur_2.css">
		<link rel="stylesheet" href="public/css/page_utilisateur.css">
		<link rel="stylesheet" href="public/css/base-header-avec-bouton.css">
		<link rel="stylesheet" href="public/css/footer.css">
		
		
	</head>
	
	<body>
		<?php include("vues/v_base-header-avec-bouton-deconnexion.php"); ?>
		<nav>
            <a href="index.php?target=compte&action=connecte&reaction=conditions_generales" class="actuel">Conditions générales d'utilisation</a>
            <a href="index.php?target=compte&action=connecte&reaction=mentions_legales" class="Onglet">Mentions légales</a>
            <a href="index.php?target=compte&action=connecte&reaction=slogan" class="Onglet">Slogan</a>
            <a href="index.php?target=compte&action=connecte&reaction=types" class="Onglet">Types de salle et de fonction</a>
            <a href="index.php?target=compte&action=connecte&reaction=FAQ" class="Onglet">FAQ</a>
        </nav>

		<section class="section0">
			<article class="articlecgu">
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                
						<?php 
						$conditions_generales = get_conditions_generales();

						if(isset($_GET['rempli'])){
							if($_GET['rempli']=='administrateur'){
							?>

	                        <div style="text-align:center">
	                            <form method='post' action='index.php?target=compte&action=connecte&reaction=conditions_generales&rempli=OK'>
									<label for='nom' class="titre"><br> Conditions générales </label><br><br>
									<textarea rows="50" cols="130" name='conditions_generales' id='conditions_generales'><?php echo $conditions_generales;?></textarea><br><br>
								    <input type='submit' value='Valider les changements' id='bouton'><br>
								</form>
	                        </div>

	                        <?php 
							}
						} 
						else{

							echo "<p><a href = 'index.php?target=compte&action=connecte&reaction=conditions_generales&rempli=administrateur' class='editer'>Editer</a></p></br>".$conditions_generales."</br>";
						}
						?>

                    </div>
			</article>
		</section>

		<?php include("vues/v_footer.php"); ?>
	</body>
</html>