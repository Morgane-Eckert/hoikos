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
           <a href="index.php?target=compte&action=connecte&reaction=effacer_routine&anticipation=<?php echo $_GET['anticipation']; ?>" class="Onglet" >Annuler</a>
           <?php } ?>
        </nav>

		<section>
			<article>
				<?php
				if (isset($_GET['comprehension'])){
					if ($_GET['comprehension'] =='erreur'){
						echo '<p class=\'message_d_erreur\'> Veuillez sélectionner au moins un capteur </p>'.'<br>';
					}else{ ?>
						<div id="titre">Modification de la routine</div><br/>
						<div id="corps">
							<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvelle_routine_horaire_rempli&comprehension=<?php echo $_GET['comprehension']; ?>&anticipation=<?php echo $_GET['anticipation']; ?>">
								<label for="type">Modifier les jours :</label><br><br>
								<?php
								try
								{
							    	$bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
								}
								catch(Exception $e)
								{
							        die('Erreur : '.$e->getMessage());
								}

								$reponse0 = $bdd->prepare('SELECT ID_routine FROM routine WHERE nom_routine=:nom_routine AND ID_logement=:ID_logement');
								$reponse0->execute(array(
									'nom_routine' => $_GET['comprehension'],
									'ID_logement' => $_SESSION['ID_logement']
								));
								$donnees0 = $reponse0->fetch();
								$reponse1 = $bdd->prepare('SELECT * FROM routine_jour WHERE ID_routine=:ID_routine');
								$reponse1->execute(array(
									'ID_routine' => $donnees0['ID_routine']
								)); 
								?>
								<label for="type">Sélectionner un ou plusieurs jour(s) :</label><br>

								<?php while ($donnees1 = $reponse1->fetch()) { 
									?>
									<?php if($donnees1['jour_routine']=='Lundi'){ ?>
										<input type="checkbox" name="jours[]" value="Lundi" checked />Lundi<br>
									<?php }else{ ?>
										<input type="checkbox" name="jours[]" value="Lundi" />Lundi<br>
										<?php if($donnees1['jour_routine']=='Mardi'){ ?>
											<input type="checkbox" name="jours[]" value="Mardi" checked />Mardi<br>
										<?php }else{ ?>
											<input type="checkbox" name="jours[]" value="Mardi" />Mardi<br>
											<?php if($donnees1['jour_routine']=='Mercredi'){ ?>
												<input type="checkbox" name="jours[]" value="Mercredi" checked />Mercredi<br>
											<?php }else{ ?>
												<input type="checkbox" name="jours[]" value="Mercredi" />Mercredi<br>
												<?php if($donnees1['jour_routine']=='Jeudi'){ ?>
													<input type="checkbox" name="jours[]" value="Jeudi" checked />Jeudi<br>
												<?php }else{ ?>
													<input type="checkbox" name="jours[]" value="Jeudi" />Jeudi<br>
													<?php if($donnees1['jour_routine']=='Vendredi'){ ?>
														<input type="checkbox" name="jours[]" value="Vendredi" checked />Vendredi<br>
													<?php }else{ ?>
														<input type="checkbox" name="jours[]" value="Vendredi" />Vendredi<br>
														<?php if($donnees1['jour_routine']=='Samedi'){ ?>
															<input type="checkbox" name="jours[]" value="Samedi" checked />Samedi<br>
														<?php }else{ ?>
															<input type="checkbox" name="jours[]" value="Samedi" />Samedi<br>
															<?php if($donnees1['jour_routine']=='Dimanche'){ ?>
																<input type="checkbox" name="jours[]" value="Dimanche" checked />Dimanche<br>
															<?php }else{ ?>
																<input type="checkbox" name="jours[]" value="Dimanche" />Dimanche<br>
									<?php } } } } } } }?>	
								<br />
								<?php } 
								$reponse2 = $bdd->prepare('SELECT * FROM routine_jour WHERE ID_routine=:ID_routine ORDER BY ID_routine_jour DESC LIMIT 1  ');
								$reponse2->execute(array(
									'ID_routine' => $donnees0['ID_routine']
								)); 
								$donnees2 = $reponse2->fetch();
								?>
								<label for="type">Sélectionner une heure de début :</label><br>
									<input type="time" name="debut" value="<?php echo $donnees2['heure_debut_routine'] ?>" /><br>
								<br>
								<label for="type">Sélectionner une heure de fin :</label><br>
									<input type="time" name="fin" value="<?php echo $donnees2['heure_fin_routine'] ?>" /><br> <br>
									 
								<input type='submit' value='Valider' id='bouton'>
							</form>
						</div>
					<?php }
				}else{ ?>
					<div id="titre">Création d'une nouvelle routine</div><br/>
					<div id="corps">
						<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvelle_routine_consigne_rempli&anticipation=<?php echo $_GET['anticipation']; ?>">
							<label for="type">Donner des ordres à vos capteurs :</label><br><br>
							<label for="type">Sélectionner un ou plusieurs jour(s) :</label><br>
								<input type="checkbox" name="jours[]" value="Lundi" />Lundi<br>
								<input type="checkbox" name="jours[]" value="Mardi" />Mardi<br>
								<input type="checkbox" name="jours[]" value="Mercredi" />Mercredi<br>
								<input type="checkbox" name="jours[]" value="Jeudi" />Jeudi<br>
								<input type="checkbox" name="jours[]" value="Vendredi" />Vendredi<br>
								<input type="checkbox" name="jours[]" value="Samedi" />Samedi<br>
								<input type="checkbox" name="jours[]" value="Dimanche" />Dimanche<br>
							<br />
							<label for="type">Sélectionner une heure de début :</label><br>
							<input type="time" name="debut" /><br>
							<br>
							<label for="type">Sélectionner une heure de fin :</label><br>
								<input type="time" name="fin" /><br>
							<br> 
							<input type='submit' value='Valider' id='bouton'>
						</form>
					</div>
				<?php } ?>
			</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
	</body>
</html>