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
            <a href="index.php?target=compte&action=connecte&reaction=conditions_generales" class="Onglet">Conditions générales d'utilisation</a>
            <a href="index.php?target=compte&action=connecte&reaction=mentions_legales" class="Onglet">Mentions légales</a>
            <a href="index.php?target=compte&action=connecte&reaction=slogan" class="actuel">Slogan</a>
            <a href="index.php?target=compte&action=connecte&reaction=types" class="Onglet">Types de salle et de fonction</a>
            <a href="index.php?target=compte&action=connecte&reaction=FAQ" class="Onglet">FAQ</a>
        </nav>

		<section>
			<article>
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                        <p>
                        <?php 
						$slogan = get_slogan();

						if(isset($_GET['rempli'])){
							if($_GET['rempli']=='administrateur'){
							?>

	                        <div>
	                            <form method='post' action='index.php?target=compte&action=connecte&reaction=slogan&rempli=OK'>
									<label for='nom' class="titre"><br> Slogan </label><br><br>
									<textarea rows="2" cols="130" name='slogan' id='slogan'><?php echo $slogan;?></textarea><br><br>
								    <input type='submit' value='Valider les changements' id='bouton'><br>
								</form>
	                        </div>

	                        <?php 
							}
						} 
						else{

							echo "<p><a href = 'index.php?target=compte&action=connecte&reaction=slogan&rempli=administrateur' class='editer'>Editer</a></p></br>".$slogan."</br>";
						}
						?>

                        </p>
                    </div>
			</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
	</body>
</html>