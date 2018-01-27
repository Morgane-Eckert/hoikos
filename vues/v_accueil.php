<?php include("accueil_onglets.php");?>
<!DOCTYPE html>
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
            <a href="index.php?target=compte&action=connecte&reaction=home" class="Conso">Home</a>
             <?php //Affichage des onglets                
                $onglets = afficher_onglets();
                if ($onglets!=NULL)
                foreach($onglets as $element){//On parcourt le tableau
                    if ($_GET['reaction']==$element){
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
            <a href="index.php?target=compte&action=connecte&reaction=nouvel_onglet" class="nouvel_onglet" id='nouvel_onglet'>+</a>
            <div class="Vide"></div>
            <a href="index.php?target=compte&action=connecte&reaction=consommation" class="Conso">Consommations</a>
            <a href="index.php?target=compte&action=connecte&reaction=profil" class="Conso">Profil</a>
        </nav>
		<section>
            <article>
                <?php $bdd=connexion_bdd();?>
                <div id="titre">Fonctions de la pièce <?php echo $_GET['reaction']; ?><a href="index.php?target=compte&action=connecte&reaction=routine&anticipation=<?php echo $_GET['reaction']; ?>" class="Routine">Routine</a></div> <br/>
                <?php 
                    if (isset($_GET['anticipation'])){
                        if ($_GET['anticipation']=='fonction_supprimee'){
                            echo "<p class='message_suppression'>La fonction a bien été supprimée.</p><br>";
                        }
                    }
                ?>
                <div id="corps">
                    <?php 
                        $capteurs = afficher_fonctions();
                        if ($capteurs!=NULL){
                            foreach($capteurs as $element){//On parcourt le tableau
                                ?>
                                <div class="Capteurs" id='capteur_panne'>
                                    <div class = "BoiteVide">
                                        <h3 class="Titre"> <?php echo $element; ?> </h3><h3 class="Affichage">
                                            <?php
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
                                            echo 'X';
                                        } else {
                                            echo $donneesh['donnee_recue_capteur'];
                                            if ($element=='Humidité'){
                                                echo "%";
                                            } else if ($element=='Température'){
                                                echo "°C";
                                            } else if ($element=='Eau'){
                                                echo "kWh";
                                            } else if ($element=='CO2'){
                                                echo "ppm";
                                            } else if ($element=='Electricité'){
                                                echo "m<sup>3</sup>";
                                            }
                                        }
                                        ?>
                                        </h3>
                                    </div>
                                    <div class = "BoiteVide">
                                        <?php 
                                            if ($donneesh['etat_capteur'] =='2'){//Si le capteur ne marche pas
                                                echo '<div class=\'erreur_capteur_boite\'><br>Cette fonction rencontre un dysfonctionnement.<br><a href="index.php?target=sav" class="lien_message_etat_capteur">Contactez le SAV</a></div>';
                                            } else if ($donneesh['donnee_envoyee_capteur']==NULL){
                                                echo '<h3></h3>';
                                            } else if ($element=='Humidité' and $donneesh['donnee_envoyee_capteur']!=$donneesh['donnee_recue_capteur']){
                                                echo "<span class='Titre'>Ordre</span><h3 class='Affichage'>".$donneesh['donnee_envoyee_capteur']."%</h3>";
                                            } else if ($element=='Température'and $donneesh['donnee_envoyee_capteur']!=$donneesh['donnee_recue_capteur']){
                                                echo "<span class='Titre'>Ordre</span><h3 class='Affichage'>".$donneesh['donnee_envoyee_capteur']."°C</h3>";
                                            } else if ($element=='Eau' or $element=='Electricité'){
                                                echo '<h3></h3>';
                                            } else if ($donneesh['donnee_envoyee_capteur']!=$donneesh['donnee_recue_capteur']){
                                                echo "<span class='Titre'>Ordre</span><h3 class='Affichage'>".$donneesh['donnee_envoyee_capteur']."</h3>";
                                            } else {
                                                echo '<h3></h3>';
                                            }
                                        ?>
                                    </div><br>
                                    <?php
                                    if ($donneesh['etat_capteur'] =='2'){
                                    } else if ($element=='Température'){
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
                                            <input type="range" name="ordre" min="0" max="100"  onchange="updateTextInput(this.value);">
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
                                    } else if ($element=='Eau' or $element=='Electricité'){
                                        echo '<h3></h3><br>';
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
                                    <span class="supprimer_conteneur"><a href="index.php?target=compte&action=connecte&reaction=<?php echo $_GET['reaction']; ?>&anticipation=suppression_fonction&comprehension=<?php echo $element; ?>" class="supprimer">Supprimer cette fonction</a></span>
                                </div>
                                <?php
                                }
                            }  
                            ?>
                        <div class="petit_capteur"><h1 class="Titre">Ajouter une fonction</h1><a href="index.php?target=compte&action=connecte&reaction=nouvelle_fonction&anticipation=<?php echo $_GET['reaction']; ?>" class='plus'>+</a>
                        </div>
                </div>
                <div class="suppression_onglet_conteneur"><a href="index.php?target=compte&action=connecte&reaction=<?php echo $_GET['reaction']; ?>&anticipation=suppression_onglet" class="suppression_onglet">Supprimer cette pièce</a>
                </div>
            </article>
		</section>
        <script>
            function updateTextInput(val) {
                document.getElementById('textInput').value=val; 
            }
            function updateTextInput2(val) {
                document.getElementById('textInput2').value=val; 
            }
        </script>
		<?php include("vues/v_footer.php"); ?>	
	</body>
</html>
