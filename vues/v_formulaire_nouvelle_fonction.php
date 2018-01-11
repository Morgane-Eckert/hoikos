<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_utilisateur_nouvelle_salle.css">
		<link rel="stylesheet" href="public/css/base-header-avec-bouton.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
	<body>
		<?php include("vues/v_base-header-avec-bouton-deconnexion.php"); ?>

		<nav>
            <?php 
			if ($_GET['anticipation']=='home'){
				?>			
				<a href="index.php?target=compte&action=connecte&reaction=home" class="actuel">Home</a>
			<?php 
			} else {
				?>
				<a href="index.php?target=compte&action=connecte&reaction=home" class="Onglet">Home</a>
			<?php
			}
                include("accueil_onglets.php");
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
            <a href="index.php?target=compte&action=connecte&reaction=nouvel_onglet&anticipation=<?php echo $_GET['reaction']; ?>" class="Onglet" id='nouvel_onglet'>+</a>
            <div class="Vide"></div>
            <a href="index.php?target=compte&action=connecte" class="Conso">Consommations</a>
            <a href="index.php" class="Onglet">Profil</a>
        </nav>

		<section>
			<article>
				<div id="titre">Ajouter une nouvelle fonction</div><br/>
				<div id="corps">
					<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvelle_fonction_rempli&anticipation=<?php echo $_GET['anticipation'] ?>">
	  					<label for="type">Type de la nouvelle fonction :</label><br>
						<select name="type" required>
							<?php 
							try
							{
						    	$bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
							}
							catch(Exception $e)
							{
						        die('Erreur : '.$e->getMessage());
							}
							$reponse1 = $bdd->query('SELECT * FROM type_de_capteur');

							while ($donnees1 = $reponse1->fetch()){
							?>
								<option value=<?php echo $donnees1['ID_type_de_capteur']; ?>> <?php echo $donnees1['nom_type_de_capteur']; ?> </option>
							<?php }?>
						</select><br><br>
						<input type='submit' value='Valider' id='bouton'>
					</form>
				</div>
			</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
	</body>
</html>