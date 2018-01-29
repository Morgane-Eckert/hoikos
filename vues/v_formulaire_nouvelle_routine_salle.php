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
			<?php if (!(isset($_GET['comprehension']))) { ?>			
            <a href="index.php?target=compte&action=connecte&reaction=routine&anticipation=<?php echo $_GET['anticipation']; ?>" class="Onglet" >Annuler</a>
            <?php } ?>
        </nav>

		<section>
			<article>
				
					<?php
					if (isset($_GET['comprehension'])){
						if ($_GET['comprehension'] =='erreur'){
							echo '<p class=\'message_d_erreur\'> Veuillez sélectionner au moins une salle </p>'.'<br>';
						}else{ ?>
							<div id="titre">Modification de la routine</div><br/>
							<div id="corps">
								<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvelle_routine_salle_rempli&comprehension=<?php echo $_GET['comprehension']; ?>&anticipation=<?php echo $_GET['anticipation']; ?>">
									<label for="type">Modifier les salles :</label><br>
									<?php 
									try
									{
								    	$bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
									}
									catch(Exception $e)
									{
								        die('Erreur : '.$e->getMessage());
									}
									$salles[1]=1;
									$requete= $bdd->prepare('SELECT ID_routine FROM routine WHERE nom_routine=:nom_routine AND ID_logement=:ID_logement');
									$requete->execute(array(
											'nom_routine' => $_GET['comprehension'],
											'ID_logement' => $_SESSION['ID_logement']
										));
									$requete = $requete->fetch();
									$reponse1 = $bdd->prepare('SELECT * FROM salle INNER JOIN routine_salle ON routine_salle.ID_salle=salle.ID_salle WHERE ID_routine=:ID_routine');
										$reponse1->execute(array(
											'ID_routine' => $requete['ID_routine']
										));
									while ($donnees1 = $reponse1->fetch()){ ?>
										<input type="checkbox" name="salles[]" value=<?php echo $donnees1['ID_salle']; ?> checked/> <label for=<?php echo $donnees1['ID_salle']; ?>><?php echo $donnees1['nom_salle']; ?></label><br />
										<?php $salles[$donnees1['ID_salle']]=$donnees1['nom_salle'];
									}
									$reponse2 = $bdd->prepare('SELECT * FROM salle WHERE ID_logement=:ID_logement');
									$reponse2->execute(array(
										'ID_logement' => $_SESSION['ID_logement']
									));
									while ($donnees2 = $reponse2->fetch()) {
									$compteur=0;
										foreach ($salles as $key => $value) {
											if ($value==$donnees2['nom_salle']) { 
												$compteur++;
											}
										}
										if ($compteur<1) {
											$reponse3 = $bdd->prepare('SELECT COUNT(ID_capteur) AS nombre FROM capteur WHERE nom_salle=:nom_salle AND ID_logement=:ID_logement');
											$reponse3->execute(array(
													'nom_salle' => $donnees2['nom_salle'],
													'ID_logement' => $_SESSION['ID_logement']
												));
											$donnees3 = $reponse3->fetch();
											if($donnees3['nombre']!=0){ ?>
												<input type="checkbox" name="salles[]" value=<?php echo $donnees2['ID_salle']; ?> /> <label for=<?php echo $donnees2['ID_salle']; ?>><?php echo $donnees2['nom_salle']; ?></label><br />
												<?php $salles[$donnees2['ID_salle']]=$donnees2['nom_salle'];
											}
										}
									}
									 ?>
									<br>
									<br>
								<input type='submit' value='Valider' id='bouton'>
								</form>
							</div>
					<?php }}else{ ?>
					<div id="titre">Création d'une nouvelle routine</div><br/>
				<div id="corps">
					<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvelle_routine_salle_rempli&anticipation=<?php echo $_GET['anticipation']; ?>">
						<label for="type">Sélectionner une ou plusieures salle(s) :</label><br>
							<?php 
							try
							{
						    	$bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
							}
							catch(Exception $e)
							{
						        die('Erreur : '.$e->getMessage());
							}
							$reponse1 = $bdd->prepare('SELECT * FROM salle WHERE ID_logement=:ID_logement');
							$reponse1->execute(array(
								'ID_logement' => $_SESSION['ID_logement']
								));
							while ($donnees1 = $reponse1->fetch()){
								$reponse2 = $bdd->prepare('SELECT COUNT(ID_capteur) AS nombre FROM capteur WHERE nom_salle=:nom_salle AND ID_logement=:ID_logement');
								$reponse2->execute(array(
									'nom_salle' => $donnees1['nom_salle'],
									'ID_logement' => $_SESSION['ID_logement']
								));
								$donnees2 = $reponse2->fetch();
								if($donnees2['nombre']!=0){
							?>
								<input type="checkbox" name="salles[]" value=<?php echo $donnees1['ID_salle']; ?> /> <label for=<?php echo $donnees1['ID_salle']; ?>><?php echo $donnees1['nom_salle']; ?></label><br />
							<?php }
						}?>
						<br>
						<br>
						<input type='submit' value='Valider' id='bouton'>
						<?php } ?>
					</form>
				</div>
			</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
	</body>
</html>