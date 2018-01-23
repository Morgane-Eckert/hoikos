<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_administrateur.css">
	</head>
	
	<body>
		<?php include("vues/v_header_bouton.php"); ?>
		<nav>
            <a href="index.php?target=compte&action=connecte&reaction=conditions_generales" class="Onglet">Conditions générales d'utilisation</a>
            <a href="index.php?target=compte&action=connecte&reaction=mentions_legales" class="Onglet">Mentions légales</a>
            <a href="index.php?target=compte&action=connecte&reaction=slogan" class="Onglet">Slogan</a>
            <a href="index.php?target=compte&action=connecte&reaction=types" class="Onglet">Types de pièces et de fonctions</a>
            <a href="index.php?target=compte&action=connecte&reaction=FAQ" class="actuel">F.A.Q.</a>
        </nav>

		<section class="section">
			<article class="article_etroit">
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                
						<?php 
						$questions = afficher_question();
						$reponses = afficher_reponse();
						if(isset($_GET['rempli'])){
							if($_GET['rempli']=='editer'){
							?>
								<div style="text-align:center">
		                            <form method='post' action='index.php?target=compte&action=connecte&reaction=FAQ&rempli=OK_edit'>
		                            	<label for='nom' class="categorie"><br> Edition de la F.A.Q. </label><br><br>
										<?php for ($i=0;$i<sizeof($questions);$i++){
											$j = $i+1;
											echo "<label for='question$j' >Question $j : </label><br> <textarea rows='3' cols='50' name='questions$i' id='FAQ'>$questions[$i]</textarea><br>";
											echo "<label for='reponse$j' >Réponse $j : </label><br><textarea rows='3' cols='50' name='reponses$i' id='FAQ'>$reponses[$i]</textarea><br><br>";
										}
										?>
									    <input type='submit' value='Valider les changements' id='bouton'><br>
									</form>
								</div>

	                        <?php 
							}else if($_GET['rempli']=='ajouter'){
							?>
								<div style="text-align:center">
		                            <form method='post' action='index.php?target=compte&action=connecte&reaction=FAQ&rempli=OK_add'>
		                            	<label for='nom' class="categorie"><br> Ajout d'une question et d'une réponse </label><br><br>
										<label for='question' >Nouvelle question : </label><br>
										<textarea rows='3' cols='50' for='question' name='addquestion' id='FAQ' required></textarea></br></br>
										<label for='reponse' >Nouvelle réponse :</label><br>
										<textarea rows='3' cols='50' name='addreponse' for='reponse' id='FAQ' required></textarea><br><br>
										<input type='submit' value='Valider les changements' id='bouton'><br>
									</form>
								</div>
						<?php
						}
						}else{
							for ($i=0;$i<sizeof($questions);$i++){
								$faq[$i] = "<span class='sous-titre'>$questions[$i]</span>"."</br>"."<em>".$reponses[$i]."</em>";
							} 
							foreach ($faq as $element){
								echo "</br>".$element."</br>";

							}
							echo "<br><br><div class='conteneur_deux_editer'><a href = 'index.php?target=compte&action=connecte&reaction=FAQ&rempli=editer' class='editer'>Editer</a><a href = 'index.php?target=compte&action=connecte&reaction=FAQ&rempli=ajouter' class='editer'>Ajouter</a></div>";
						}
						echo "</div>";
						?>

                    </div>
			</article>
		</section>
	</body>
</html>