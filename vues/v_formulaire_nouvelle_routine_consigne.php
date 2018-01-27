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
							<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvelle_routine_consigne_rempli&comprehension=<?php echo $_GET['comprehension']; ?>&anticipation=<?php echo $_GET['anticipation']; ?>">
								<label for="type">Modifier les ordres :</label><br><br>
								<?php 
								try
								{
							    	$bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
								}
								catch(Exception $e)
								{
							        die('Erreur : '.$e->getMessage());
								}
								$requete= $bdd->prepare('SELECT ID_routine FROM routine WHERE nom_routine=:nom_routine AND ID_logement=:ID_logement');
								$requete->execute(array(
										'nom_routine' => $_GET['comprehension'],
										'ID_logement' => $_SESSION['ID_logement']
								));
								$requete = $requete->fetch();
								$reponse1 = $bdd->prepare('SELECT * FROM capteur INNER JOIN routine_capteur ON routine_capteur.ID_capteur=capteur.ID_capteur WHERE ID_routine=:ID_routine');
								$reponse1->execute(array(
									'ID_routine' => $requete['ID_routine']
								));
								$consignes[1]=1;
								while ($donnees1 = $reponse1->fetch()){
									$compteur=0; 
									foreach ($consignes as $key => $value) {
										if ($key==$donnees1['nom_capteur']) {
											$compteur++;
										}
									}if ($compteur!=1) {
										if ($donnees1['nom_capteur']=='Lumière'){ ?>
					                        <label for="type"><?php echo $donnees1['nom_capteur']; ?> :</label><br>
					                        <select name="consigne[<?php echo $donnees1['nom_capteur']; ?>]" required>
					                        	<?php if ($donnees1['ordre']=='Allumer') { ?>
					                        		<option value="Allumer" selected>Allumer</option>
					                            	<option value="Eteindre">Eteindre</option>
					                        	<?php }else{ ?>
					                            	<option value="Allumer">Allumer</option>
					                            	<option value="Eteindre" selected>Eteindre</option>
					                            <?php } ?>
					                            
					                        </select> <br><br>

					                    <?php $consignes[$donnees1['nom_capteur']]=$donnees1['nom_capteur'];
					                	} else if ($donnees1['nom_capteur']=='Humidité'){  ?>
					                        <label for="type"><?php echo $donnees1['nom_capteur']; ?> :</label><br>
					                        <?php if ($donnees1['ordre']=='non') { ?>
					                        	<input type="text" size='2' name="consigne[<?php echo $donnees1['nom_capteur']; ?>]" value="">&nbsp;% <br><br>
					                        <?php }else{ ?>
					                        	<input type="text" size='2' name="consigne[<?php echo $donnees1['nom_capteur']; ?>]" value="<?php echo $donnees1['ordre']; ?>">&nbsp;% <br><br>
					                        <?php } ?>

					                    <?php $consignes[$donnees1['nom_capteur']]=$donnees1['nom_capteur'];
					                	} else if ($donnees1['nom_capteur']=='Température'){  ?>
					                        <label for="type"><?php echo $donnees1['nom_capteur']; ?> :</label><br>
					                         <?php if ($donnees1['ordre']=='non') { ?>
					                        	<input type="text" size='2' name="consigne[<?php echo $donnees1['nom_capteur']; ?>]" value="">&nbsp;°C <br><br>
					                        <?php }else{ ?>
					                        	<input type="text" size='2' name="consigne[<?php echo $donnees1['nom_capteur']; ?>]" value="<?php echo $donnees1['ordre']; ?>">&nbsp;°C <br><br>
					                        <?php } ?>

					                    <?php $consignes[$donnees1['nom_capteur']]=$donnees1['nom_capteur'];
					                	} else if ($donnees1['nom_capteur']=='Volets'){ ?>
					                        <label for="type"><?php echo $donnees1['nom_capteur']; ?> :</label><br>
					                        <select name="consigne[<?php echo $donnees1['nom_capteur']; ?>]" required>
					                        	<?php if ($donnees1['ordre']=='Ouvrir') { ?>
					                        		<option value="Ouvrir" selected>Ouvrir</option>
					                            	<option value="Fermer">Fermer</option>
					                        	<?php }else{ ?>
					                            	<option value="Ouvrir">Ouvrir</option>
					                            	<option value="Fermer" selected>Fermer</option>
					                            <?php } ?>
					                        </select> <br><br>

					                    <?php $consignes[$donnees1['nom_capteur']]=$donnees1['nom_capteur'];
					                	} else{ ?>
					                        <label for="type"><?php echo $donnees1['nom_capteur']; ?> :</label><br>
					                        <select name="consigne[<?php echo $donnees1['nom_capteur']; ?>]" required>
					                        	<?php if ($donnees1['ordre']=='ON') { ?>
					                        		<option value="ON" selected="">ON</option>
					                            	<option value="OFF" >OFF</option>
					                        	<?php }else{ ?>
					                            	<option value="ON">ON</option>
					                            	<option value="OFF" selected="">OFF</option>
					                            <?php } ?>
					                        </select> <br><br>
					                        <?php $consignes[$donnees1['nom_capteur']]=$donnees1['nom_capteur'];
					                     }
					                } 
				                        	 
								}
								?>
								<br>
								<br>
								<?php 

								 ?>
								<input type='submit' value='Valider' id='bouton'>
							</form>
						</div>
					<?php }
				}
				else { ?>
					<div id="titre">Création d'une nouvelle routine</div><br/>
					<div id="corps">
						<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvelle_routine_consigne_rempli&anticipation=<?php echo $_GET['anticipation']; ?>">
							<label for="type">Donner des ordres à vos capteurs :</label><br><br>
							<?php 
							$consignes = afficher_consigne_routine_formulaire();
							foreach($consignes as $clef => $element){ 
								if ($element=='Lumière'){ ?>
			                        <label for="type"><?php echo $clef; ?> :</label><br>
			                        <select name="consigne[<?php echo $clef; ?>]" required>
			                            <option value="Allumer">Allumer</option>
			                            <option value="Eteindre" selected>Eteindre</option>
			                        </select> <br><br>

			                    <?php } else if ($element=='Humidité'){  ?>
			                        <label for="type"><?php echo $clef; ?> :</label><br>
			                        <input type="text" size='2' name="consigne[<?php echo $clef; ?>]" value="50">&nbsp;% <br><br>

			                    <?php } else if ($element=='Température'){  ?>
			                        <label for="type"><?php echo $clef; ?> :</label><br>
			                        <input type="text" size='2' name="consigne[<?php echo $clef; ?>]" value="15">&nbsp;°C <br><br>

			                    <?php } else if ($element=='Volets'){ ?>
			                        <label for="type"><?php echo $clef; ?> :</label><br>
			                        <select name="consigne[<?php echo $clef; ?>]" required>
			                            <option value="Ouvrir">Ouvrir</option>
			                            <option value="Fermer" selected>Fermer</option>
			                        </select> <br><br>

			                    <?php }else{ ?>
			                        <label for="type"><?php echo $clef; ?> :</label><br>
			                        <select name="consigne[<?php echo $clef; ?>]" required>
			                            <option value="ON">ON</option>
			                            <option value="OFF" selected="">OFF</option>
			                        </select> <br><br>
			                    <?php } 
			                } ?>
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