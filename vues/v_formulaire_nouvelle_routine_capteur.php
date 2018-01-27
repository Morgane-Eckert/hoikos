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
								echo '<p class=\'message_d_erreur\'> Veuillez sélectionner au moins un capteur </p>'.'<br>';
							}else{ ?>
								<div id="titre">Modification de la routine</div><br/>
							<div id="corps">
								<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvelle_routine_capteur_rempli&comprehension=<?php echo $_GET['comprehension']; ?>&anticipation=<?php echo $_GET['anticipation']; ?>">
									<label for="type">Modifier les fonctions :</label><br>
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
										$capteurs[1]=1;
										while ($donnees1 = $reponse1->fetch()){ 
											$compteur=0;
											foreach ($capteurs as $key => $value) {
												if ($value==$donnees1['nom_capteur']) { 
													$compteur++;
												}
											}
											if ($compteur!=1) { ?>
												<input type="checkbox" name="capteurs[]" value=<?php echo $donnees1['nom_capteur']; ?> checked/> <label for=<?php echo $donnees1['ID_capteur']; ?>><?php echo $donnees1['nom_capteur']; ?></label><br />
												<?php $capteurs[$donnees1['ID_capteur']]=$donnees1['nom_capteur'];
											}
										}
									$reponse = $bdd->prepare('SELECT nom_salle FROM salle INNER JOIN routine_salle ON routine_salle.ID_salle=salle.ID_salle WHERE ID_routine=:ID_routine');
									$reponse->execute(array(
										'ID_routine'=> $requete['ID_routine']
									));
									while($donnees = $reponse->fetch()){
										$reponse2 = $bdd->prepare('SELECT * FROM capteur WHERE ID_logement=:ID_logement AND nom_salle=:nom_salle');
										$reponse2->execute(array(
											'ID_logement' => $_SESSION['ID_logement'],
											'nom_salle' => $donnees['nom_salle']
										));
										while ($donnees2 = $reponse2->fetch()) {
										$compteur=0;
											foreach ($capteurs as $key => $value) {
												if ($value==$donnees2['nom_capteur']) { 
													$compteur++;
												}
											}
											if ($compteur<1) { ?>
												<input type="checkbox" name="capteurs[]" value=<?php echo $donnees2['nom_capteur']; ?> /> <label for=<?php echo $donnees2['ID_capteur']; ?>><?php echo $donnees2['nom_capteur']; ?></label><br />
												<?php $capteurs[$donnees2['ID_capteur']]=$donnees2['nom_capteur'];
											}
										}
									}
									 ?>
									<br>
									<br>
								<input type='submit' value='Valider' id='bouton'>
								</form>
							</div>
							<?php }
						}
					else {?>
					<div id="titre">Création d'une nouvelle routine</div><br/>
					<div id="corps">
					<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvelle_routine_capteur_rempli&anticipation=<?php echo $_GET['anticipation']; ?>">
						<label for="type">Sélectionner une ou plusieures fonction(s) :</label><br>
							<?php 
							$capteurs = afficher_capteur_routine_formulaire();
							foreach($capteurs as $cle => $element){ ?>
							<input type="checkbox" name="capteurs[]" value=<?php echo $element; ?> /> <label for=<?php echo $cle; ?>><?php echo $element; ?></label><br />		<?php }?>
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