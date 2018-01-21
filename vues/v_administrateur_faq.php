<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="public/css/page_utilisateur.css">
		<link rel="stylesheet" href="public/css/base-header-avec-bouton.css">
		<link rel="stylesheet" href="public/css/footer.css">
		<link rel="stylesheet" href="public/css/page_administrateur_2.css">
		
	</head>
	
	<body>
		<?php include("vues/v_base-header-avec-bouton-deconnexion.php"); ?>
		<nav>
            <a href="index.php?target=compte&action=connecte&reaction=conditions_generales" class="Onglet">Conditions générales d'utilisation</a>
            <a href="index.php?target=compte&action=connecte&reaction=mentions_legales" class="Onglet">Mentions légales</a>
            <a href="index.php?target=compte&action=connecte&reaction=slogan" class="Onglet">Slogan</a>
            <a href="index.php?target=compte&action=connecte&reaction=types" class="Onglet">Types de salle et de fonction</a>
            <a href="index.php?target=compte&action=connecte&reaction=FAQ" class="actuel">FAQ</a>
        </nav>

		<section>
			<article>
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                
						<?php 
						$questions = afficher_question();
						$reponses = afficher_reponse();
						if(isset($_GET['rempli'])){
							if($_GET['rempli']=='editer'){
							?>

	                        <div class='titre'>FAQ</div>
	                        <div>
	                            <form method='post' action='index.php?target=compte&action=connecte&reaction=FAQ&rempli=OK_edit'>
									<?php for ($i=0;$i<sizeof($questions);$i++){
										$j = $i+1;
										echo "Q.$j : <textarea rows='3' cols='50' name='questions$i' id='FAQ'>$questions[$i]</textarea><br>";
										echo "R.$j : <textarea rows='3' cols='50' name='reponses$i' id='FAQ'>$reponses[$i]</textarea><br><br>";
									}
									?>
								    <input type='submit' value='Valider les changements' id='bouton'><br>

								</form>
	                        </div>

	                        <?php 
							}else if($_GET['rempli']=='ajouter'){
							?>

							<div>
	                            <form method='post' action='index.php?target=compte&action=connecte&reaction=FAQ&rempli=OK_add'>
									Votre question à ajouter: 	<textarea rows='3' cols='50' name='addquestion' id='FAQ'></textarea></br></br>
									Réponse à la question:  	<textarea rows='3' cols='50' name='addreponse' id='FAQ'></textarea>
									<input type='submit' value='Ajouter à la FAQ' id='bouton'><br>
								</form>
							</div>
						<?php
						}
						}else{
							echo "<a href = 'index.php?target=compte&action=connecte&reaction=FAQ&rempli=editer' class='editer'>Editer ou supprimer</a></br>";
							echo "<a href = 'index.php?target=compte&action=connecte&reaction=FAQ&rempli=ajouter' class='editer'>Ajouter</a></div></br>";
							for ($i=0;$i<sizeof($questions);$i++){
								$faq[$i] = "<span class='strong1'>$questions[$i]</span>"."</br>"."<em>".$reponses[$i]."</em>";
							} 
							foreach ($faq as $element){
								echo "</br>".$element."</br>";
							}
							echo "</br>";
						}
						echo "</div>";
						?>

                    </div>
			</article>
		</section>

		<?php include("vues/v_footer.php"); ?>
	</body>
</html>