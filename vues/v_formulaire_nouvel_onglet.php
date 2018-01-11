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
			<a href="index.php?target=compte&action=connecte&reaction=home" class="Onglet">Home</a>
	         <?php //Affichage des onglets
                include("accueil_onglets.php");
                $onglets = afficher_onglets();
                if ($onglets!=NULL)
                foreach($onglets as $element){//On parcourt le tableau
                    ?>
                        <a href="index.php?target=compte&action=connecte&reaction=<?php echo $element; ?>" class="Onglet"> <?php echo $element; ?> </a>
                    <?php
                }	         ?>
            <a href="index.php?target=compte&action=connecte&reaction=nouvel_onglet" class="actuel" id='nouvel_onglet'>+</a>
            <div class="Vide"></div>
            <a href="index.php?target=compte&action=connecte" class="Conso">Consommations</a>
            <a href="index.php" class="Onglet">Profil</a>
        </nav>

		<section>
			<article>
				<div id="titre"> Ajouter une pièce</div><br/>
				<div id="corps">
					<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvel_onglet_rempli&anticipation=<?php echo $_GET['reaction'] ?>">
						<label for='nom_salle' id=''> Nom de la nouvelle pièce : </label><br/>
	  					<input type="text" name="nom_salle" placeholder="" class="Case" size="27" required /><br/><br/>
	  					<label for="type">Type de la nouvelle pièce :</label><br>
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
							$reponse1 = $bdd->query('SELECT * FROM type_de_salle');

							while ($donnees1 = $reponse1->fetch()){
							?>
								<option value=<?php echo $donnees1['ID_type_de_salle']; ?>> <?php echo $donnees1['nom_type_de_salle']; ?> </option>
							<?php }?>
						</select><br><br>
						<label for="superficie_salle">Superficie de la nouvelle pièce :</label><br>
						<input type="text" name="superficie_salle" placeholder="" class="Case" size="27" required /><br/><br/>
						Utilisateurs secondaires pouvant accéder aux fonctions de la pièce : <br>
						<?php
							try
							{
						    	$bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
							}
							catch(Exception $e)
							{
						        die('Erreur : '.$e->getMessage());
							}
		                $reponse2 = $bdd->prepare('SELECT * FROM utilisateur WHERE ID_logement=:ID_logement AND type_utilisateur=:type_utilisateur');
		                $reponse2->execute(array(
		                    'type_utilisateur' => '2',
		                    'ID_logement' => $_SESSION['ID_logement']
		                    ));

		                    while ($donnees2 = $reponse2->fetch()){
		                    	?>
		                    	<input type="checkbox" name=<?php echo $donnees2['ID_utilisateur']; ?> checked />								<label for=<?php echo $donnees2['ID_utilisateur']; ?>> <?php echo $donnees2['prenom_utilisateur']; ?></label><br><br>
		                        <?php

		                    }
		                    ?>
						<input type='submit' value='Valider' id='bouton'>
					</form>
				</div>
			</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
	</body>
</html>