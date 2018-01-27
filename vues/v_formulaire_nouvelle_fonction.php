<?php include("accueil_onglets.php");?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_utilisateur_nouvelle_salle.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
	<body>
    <?php 
            include("vues/v_header_bouton.php");
            //Affichage d'un message d'erreur si un capteur ne fonctionne pas
            list($erreur_capteur,$erreur_salles,$a) = afficher_erreur_capteur();
            for($i=0;$i<$a;$i++){
                echo "<p class='erreur_capteur'>Attention : La fonction ".$erreur_capteur[$i]." de la pièce ".$erreur_salles[$i]." rencontre un dysfonctionnement. <a href='index.php?target=sav' class='lien_message_etat_capteur'>Contactez le SAV en cliquant ici</a>";
            }
    ?>

		<nav>
            <?php 

			if ($_GET['anticipation']=='home'){
				?>			
				<a href="index.php?target=compte&action=connecte&reaction=home" class="Conso">Home</a>
			<?php 
			} else {
				?>
				<a href="index.php?target=compte&action=connecte&reaction=home" class="Conso">Home</a>
			<?php
			}
                $onglets = afficher_onglets();
                if ($onglets!=NULL)
                foreach($onglets as $element){//On parcourt le tableau
                    if ($_GET['anticipation']==$element){
                    ?>

                        <a href="index.php?target=compte&action=connecte&reaction=<?php echo $element; ?>" class="actuel"> <?php echo $element; ?> </a>
                    <?php
                    } else {
                        ?>
                        <a href="index.php?target=compte&action=connecte&reaction=<?php echo $element; ?>" class="Onglet"> <?php echo $element; ?> </a>
                        <?php
                    }
                }
             ?>
            <a href="index.php?target=compte&action=connecte&reaction=nouvel_onglet&anticipation=<?php echo $_GET['reaction']; ?>" class="nouvel_onglet" id='nouvel_onglet'>+</a>
            <div class="Vide"></div>
            <a href="index.php?target=compte&action=connecte&reaction=consommation" class="Conso">Consommations</a>
            <a href="index.php?target=compte&action=connecte&reaction=profil&anticipation= <?php echo $_GET['reaction'];?>" class="Conso">Profil</a>
        </nav>

		<section>
			<article>
				<div id="titre">Ajouter une nouvelle fonction</div><br/>
				<div id="corps">
					<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvelle_fonction_rempli&anticipation=<?php echo $_GET['anticipation'] ?>">
	  					<label for="type">Type de la nouvelle fonction :</label><br>
						<select name="type" required>
							<?php 
							$bdd=connexion_bdd();
							$reponse1 = $bdd->query('SELECT * FROM type_de_capteur');
							while ($donnees1 = $reponse1->fetch()){
							?>
								<option value=<?php echo $donnees1['ID_type_de_capteur']; ?>> <?php echo $donnees1['nom_type_de_capteur']; ?> </option>
							<?php }?>
						</select><br><br>
						<label for="cemac">Choix du CeMAC :</label><br>
						<select name="cemac" required>
						<?php
							$reponse3 = $bdd->prepare('SELECT * FROM cemac WHERE ID_logement = :ID_logement');
							$reponse3->execute(array(
							    'ID_logement' => $_SESSION['ID_logement']
							    ));

							while ($donnees3 = $reponse3->fetch()){
							?>
								<option value=<?php echo $donnees3['ID_cemac']; ?>> <?php echo $donnees3['numero_de_cemac']; ?> </option>
							<?php } ?>
						</select><br><br>
						<input type='submit' value='Valider' id='bouton'>
					</form>
				</div>
			</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
	</body>
</html>