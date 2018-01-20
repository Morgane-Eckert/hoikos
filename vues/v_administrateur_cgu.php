<!--
	<form method='post' action='index.php?target=compte&action=connecte&reaction=profil&rempli=compte'>
		<label for='nom'> Mentions légales : </label><br>
	    <input type='text' name='nom' id='nom' value ="<?php echo $mentions_legales;?>" required><br><br>
	    <input type='submit' value='Valider les changements' id='bouton'>
	</form>

	<form method='post' action='index.php?target=compte&action=connecte&reaction=profil&rempli=compte'>
		<label for='nom'> Conditions générales : </label><br>
	    <input type='text' name='nom' id='nom' value ="<?php echo $nom;?>" required><br><br>
	    <input type='submit' value='Valider les changements' id='bouton'>
	</form>
-->

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
            <a href="index.php?target=compte&action=connecte&reaction=conditions_generales" class="actuel">Conditions générales d'utilisation</a>
            <a href="index.php?target=compte&action=connecte&reaction=mentions_legales" class="Onglet">Mentions légales</a>
            <a href="index.php?target=compte&action=connecte&reaction=slogan" class="Onglet">Slogan</a>
            <a href="index.php?target=compte&action=connecte&reaction=types" class="Onglet">Types de salle et de fonction</a>
        </nav>

		<section>
			<article>
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                
						<?php 
						$conditions_generales = get_conditions_generales();

						if(isset($_GET['rempli'])){
							if($_GET['rempli']=='administrateur'){
							?>

	                        <div style="text-align:center">
	                            <form method='post' action='index.php?target=compte&action=connecte&reaction=conditions_generales&rempli=OK'>
									<label for='nom' class="titre"><br> Conditions générales </label><br><br>
									<textarea rows="50" cols="130" name='conditions_generales' id='conditions_generales'><div><?php echo $conditions_generales;?></div></textarea><br><br>
								    <input type='submit' value='Valider les changements' id='bouton'><br>
								</form>
	                        </div>

	                        <?php 
							}
						} 
						else{

							echo "<a href = 'index.php?target=compte&action=connecte&reaction=conditions_generales&rempli=administrateur' class='editer'>Editer</a></br>".$conditions_generales."</br>";
						}
						?>

                    </div>
			</article>
		</section>

		<?php include("vues/v_footer.php"); ?>
	</body>
</html>