<?php 
include("accueil_onglets.php");
?><!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_utilisateur.css">
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
            <a href="index.php?target=compte&action=connecte&reaction=home" class="actuel">Home</a>
             <?php //Affichage des onglets

                $onglets = afficher_onglets();
                if ($onglets!=NULL)
                foreach($onglets as $element){//On parcourt le tableau
                    ?>
                        <a href="index.php?target=compte&action=connecte&reaction=<?php echo $element; ?>" class="Onglet"> <?php echo $element; ?> </a>
                    <?php
                }
             ?>
            <div class="Vide"></div>
            <a href="index.php?target=compte&action=connecte&reaction=consommation" class="Conso">Consommations</a>
            <a href="index.php?target=compte&action=connecte&reaction=profil" class="Onglet">Profil</a>
        </nav>

		<section>
			<article>
				<div id="titre">Fonctions de la maison<a href="" class="Routine">Routine</a></div> 
                    <br/><!-- Titre dans le bandeau rouge-->
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                        <?php //Affichage des onglets
                            $capteurs = afficher_fonctions_home();
                            if ($capteurs!=NULL){
                                foreach($capteurs as $element){//On parcourt le tableau
                                    ?>
                                    <div class="Capteurs">
                                        <div class = "BoiteVide">
                                            <h3 class="Titre"> <?php echo $element; ?> </h3><h3 class="Affichage">
                                                <?php
                                            $bdd=connexion_bdd();
                                            $reponseg = $bdd->prepare('SELECT ID_type_de_capteur FROM type_de_capteur WHERE nom_type_de_capteur=:nom_type_de_capteur');
                                            $reponseg->execute(array(
                                                    'nom_type_de_capteur' => $element
                                                    ));
                                            $donneesg = $reponseg->fetch();
                                            $reponseh = $bdd->prepare('SELECT * FROM capteur WHERE ID_logement=:ID_logement AND ID_type_de_capteur=:ID_type_de_capteur AND nom_salle=:nom_salle');
                                            $reponseh->execute(array(
                                                'ID_logement' => $_SESSION['ID_logement'],
                                                'ID_type_de_capteur' => $donneesg['ID_type_de_capteur'],
                                                'nom_salle' => $_GET['reaction']
                                                ));
                                           $donneesh = $reponseh->fetch();
                                            if ($donneesh['donnee_recue_capteur']==NULL){
                                                echo '';
                                            } else {
                                                echo $donneesh['donnee_recue_capteur'];
                                                if ($element=='Humidité'){
                                                    echo "%";
                                                } else if ($element=='Température'){
                                                    echo "°C";
                                                }
                                            }
                                            ?>
                                            </h3>
                                        </div>
                                        <div class = "BoiteVide"><!--Deuxieme ligne : ordre-->
                                            <?php 
                                                $reponsea = $bdd->prepare('SELECT * FROM ordre WHERE ID_logement=:ID_logement AND ID_type_de_capteur=:ID_type_de_capteur AND nom_salle=:nom_salle ORDER BY ID_ordre DESC LIMIT 1');
                                                $reponsea->execute(array(
                                                    'ID_logement' => $_SESSION['ID_logement'],
                                                    'ID_type_de_capteur' => $donneesg['ID_type_de_capteur'],
                                                    'nom_salle' => $_GET['reaction']
                                                    ));
                                                $donneesa = $reponsea->fetch();

                                                if ($donneesa['valeur_ordre']==NULL){//Affichage de l'unité
                                                    echo '<h3></h3>';
                                                } else if ($element=='Humidité'){
                                                    echo "<span class='Titre'>Ordre</span><h3 class='Affichage'>".$donneesa['valeur_ordre']."%</h3>";
                                                } else if ($element=='Température'){
                                                    echo "<span class='Titre'>Ordre</span><h3 class='Affichage'>".$donneesa['valeur_ordre']."°C</h3>";
                                                } else {
                                                    echo "<span class='Titre'>Ordre</span><h3 class='Affichage'>".$donneesa['valeur_ordre']."</h3>";
                                                }
                                            ?>
                                            
                                        </div><br>
                                        <?php
                                        if ($element=='Température'){//Troisième ligne : formulaire pour entrer un ordre
                                            ?> 
                                            <form method="post" action="index.php?target=compte&action=connecte&reaction=nouvel_ordre&anticipation=<?php echo $_GET['reaction'] ?>&comprehension=<?php echo $element; ?>">
                                                <input type="range" name="ordre" min="15" max="30" onchange="updateTextInput2(this.value);">
                                                <input type="text" id="textInput2" size='2' value="">&nbsp;°C&nbsp;
                                                <input type='submit' value='Envoyer' id='bouton'>
                                            </form>
                                            <?php
                                        } else if ($element=='Humidité'){
                                            ?>
                                            <form method="post" action="index.php?target=compte&action=connecte&reaction=nouvel_ordre&anticipation=<?php echo $_GET['reaction'] ?>&comprehension=<?php echo $element; ?>">
                                                <input type="range" name="ordre" min="0" max="100" onchange="updateTextInput(this.value);">
                                                <input type="text" id="textInput" size='2' value="">&nbsp;%&nbsp;
                                                <input type='submit' value='Envoyer' id='bouton'>
                                            </form>
                                            <?php
                                        } else if ($element=='Volets'){
                                            ?><br>
                                            <form method="post" action="index.php?target=compte&action=connecte&reaction=nouvel_ordre&anticipation=<?php echo $_GET['reaction'] ?>&comprehension=<?php echo $element; ?>">
                                                <select name="ordre" required>
                                                    <option value="Ouvrir">Ouvrir</option>
                                                    <option value="Fermer">Fermer</option>
                                                </select>
                                                <input type='submit' value='Envoyer' id='bouton'>
                                            </form>
                                            <?php
                                        } else if ($element=='Lumière'){
                                            ?><br>
                                            <form method="post" action="index.php?target=compte&action=connecte&reaction=nouvel_ordre&anticipation=<?php echo $_GET['reaction'] ?>&comprehension=<?php echo $element; ?>">
                                                <select name="ordre" required>
                                                    <option value="Allumer">Allumer</option>
                                                    <option value="Eteindre">Eteindre</option>
                                                </select>
                                                <input type='submit' value='Envoyer' id='bouton'>
                                            </form>
                                            <?php
                                        } else {
                                            ?><br>
                                            <form method="post" action="index.php?target=compte&action=connecte&reaction=nouvel_ordre&anticipation=<?php echo $_GET['reaction'] ?>&comprehension=<?php echo $element; ?>">
                                                <select name="ordre" required>
                                                    <option value="ON">ON</option>
                                                    <option value="OFF">OFF</option>
                                                </select>
                                                <input type='submit' value='Envoyer' id='bouton'>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php 
                                }
                            } else {
                                echo '<p class=\'message\'> L\'utilisateur principal n\'a pas encore ajouté de fonction dans votre foyer.</p>';
                            }
                            ?>
                </div>
			</article>
		</section>
		<?php include("vues/v_footer.php"); ?>
	</body>
</html>
