<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_utilisateur_nouvelle_salle.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
	<body>
		<?php include("vues/v_header_bouton.php"); ?>

		<nav>
			<a href="index.php?target=compte&action=connecte&reaction=home" class="Conso">Home</a>
	         <?php //Affichage des onglets
                include("accueil_onglets.php");
                $onglets = afficher_onglets();
                if ($onglets!=NULL)
                foreach($onglets as $element){//On parcourt le tableau
                    ?>
                        <a href="index.php?target=compte&action=connecte&reaction=<?php echo $element; ?>" class="Onglet"> <?php echo $element; ?> </a>
                    <?php
                }	         ?>
            <a href="index.php?target=compte&action=connecte&reaction=nouvel_onglet" class="actuel_nouvel_onglet" id='actuel'>+</a>
            <div class="Vide"></div>
            <a href="index.php?target=compte&action=connecte" class="Conso">Consommations</a>
            <a href="index.php?target=compte&action=connecte&reaction=profil" class="Conso">Profil</a>
        </nav>

		<section>
			<article>
				<div id="titre"> Ajouter une pièce</div><br/>
				<div id="corps">
					<?php 
						if (isset($_GET['anticipation'])){
							if ($_GET['anticipation'] =='erreur'){
								echo '<p class=\'message_d_erreur\'> Ce nom déjà utilisé dans votre foyer. Veuillez entrer un nouveau nom </p>'.'<br>';
							}
						}
					?>
					<br/>
					<form method="post" action="index.php?target=compte&action=connecte&reaction=nouvel_onglet_rempli&anticipation=<?php echo $_GET['reaction'] ?>" id="formulaire">
	  					<label for="type">Type de la nouvelle pièce :</label><br>
						<select name="type" id="type_onglet" required>
							<?php 
							$bdd=connexion_bdd();
							$reponse1 = $bdd->query('SELECT * FROM type_de_salle');

							while ($donnees1 = $reponse1->fetch()){
							?>
								<option value="<?php echo $donnees1['nom_type_de_salle']; ?>"> <?php echo $donnees1['nom_type_de_salle']; ?> </option>
							<?php }?>
						</select><br><br>
						<p class='instruction_nom_salle'> Le nom de la salle doit être unique dans votre foyer.</p>
						<label for='nom_salle' id=''> Nom de la nouvelle pièce : </label><br/>
	  					<input type="text" name="nom_salle" id="nom_onglet" placeholder="" value="Chambre" class="Case" maxlength='20' required /><br/><br/>
	  					<!-- Debut de code pour afficher la liste des utilisateurs secondaires afin de restreindre leurs droits. Fonctionnalité à rajouter.
						Utilisateurs secondaires pouvant accéder aux fonctions de la pièce : <br>
						<?php
						$bdd=connexion_bdd();
		                $reponse21 = $bdd->prepare('SELECT * FROM utilisateur WHERE ID_logement=:ID_logement AND type_utilisateur=:type_utilisateur');
		                $reponse21->execute(array(
		                    'type_utilisateur' => '2',
		                    'ID_logement' => $_SESSION['ID_logement']
		                    ));
		                    while ($donnees21 = $reponse21->fetch()){
		                    	?>
		                    	<input type="checkbox" name=<?php echo $donnees21['ID_utilisateur']; ?> checked />								<label for=<?php echo $donnees21['ID_utilisateur']; ?>> <?php echo $donnees21['prenom_utilisateur']; ?></label><br><br>
		                        <?php
		                    }
		                    ?>-->
						<input type='submit' value='Valider' id='bouton'>
					</form>
				</div>
			</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
		<script src="public/js/valider_formulaire_nouvel_onglet.js" ></script>
	</body>
</html>