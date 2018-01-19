<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_utilisateur.css">
		<link rel="stylesheet" href="public/css/base-header-avec-bouton.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
	
	<body>
		<?php include("vues/v_base-header-avec-bouton-deconnexion.php"); ?>
		<nav>
            <a href="index.php?target=compte&action=connecte&reaction=home" class="Conso">Home</a>
             <?php //Affichage des onglets
                include("accueil_onglets.php");
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
            <a href="index.php?target=compte&action=connecte" class="Conso">Consommations</a>
            <a href="index.php?target=compte&action=connecte&reaction=profil" class="Conso">Profil</a>
        </nav>

		<section>
            <article>
                <div id="titre">Fonctions de la pièce <?php echo $_GET['reaction']; ?><a href="" class="Routine">Routine</a></div> 
                    <br/><!-- Titre dans le bandeau rouge-->
                    <?php 
                        if (isset($_GET['anticipation'])){
                            if ($_GET['anticipation']=='fonction_supprimee'){
                                echo "<p class='message_suppression'>La fonction a bien été supprimée.</p><br>";
                            }
                        }
                    ?>
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                        <?php 
                            $capteurs = afficher_fonctions();
                            if ($capteurs!=NULL){
                            foreach($capteurs as $element){//On parcourt le tableau
                                ?>
                                <div class="Capteurs">
                                    <div class = "BoiteVide">
                                        <h3 class="Titre"> <?php echo $element; ?> </h3><h3 class="Affichage">
                                            <?php
                                            /*
                                            Affichage statique au cas ou le donnees_recue_capteur marche pas
                                            if ($element=='Température'){
                                                echo '21°C';
                                            } else if ($element=='Humidité'){
                                                echo '54%';
                                            } else if ($element=='Eau' or $element=='Electricité' or $element=='Fumée' or $element=='VMC' or $element=='Mouvement' or $element=='Caméra'){
                                                echo 'ON';
                                            } else if ($element=='Volets'){
                                                echo 'Ouverts';  
                                            } else if ($element=='Lumière'){
                                                echo 'Allumé';
                                            }*/     
                                        try
                                        {
                                            $bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
                                        }
                                        catch(Exception $e)
                                        {
                                            die('Erreur : '.$e->getMessage());
                                        }

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
                                            }
                                        }
                                        
                                ?>
                                        </h3>
                                    </div>
                                    <div class = "BoiteVide">
                                        <?php 

                                            /*POSSIBILITE 1 : RECUPERER ORDRE DANS TABLE ORDRE
                                            $reponsea = $bdd->prepare('SELECT * FROM ordre WHERE ID_logement=:ID_logement AND ID_type_de_capteur=:ID_type_de_capteur AND nom_salle=:nom_salle ORDER BY ID_ordre DESC LIMIT 1');
                                            $reponsea->execute(array(
                                                'ID_logement' => $_SESSION['ID_logement'],
                                                'ID_type_de_capteur' => $donneesg['ID_type_de_capteur'],
                                                'nom_salle' => $_GET['reaction']
                                                ));
                                            $donneesa = $reponsea->fetch();

                                            if ($donneesa['valeur_ordre']==NULL){
                                                echo '<h3></h3>';
                                            } else if ($element=='Humidité'){
                                                echo "<span class='Titre'>Ordre</span><h3 class='Affichage'>".$donneesa['valeur_ordre']."%</h3>";
                                            } else if ($element=='Température'){
                                                echo "<span class='Titre'>Ordre</span><h3 class='Affichage'>".$donneesa['valeur_ordre']."°C</h3>";
                                            } else {
                                                echo "<span class='Titre'>Ordre</span><h3 class='Affichage'>".$donneesa['valeur_ordre']."</h3>";
                                            }*/

                                            /*POSSIBILITE 2 : RECUPERER ORDRE DANS TABLE ORDRE*/
                                            if ($donneesh['donnee_envoyee_capteur']==NULL){
                                                echo '<h3></h3>';
                                            } else if ($element=='Humidité'){
                                                echo "<span class='Titre'>Ordre</span><h3 class='Affichage'>".$donneesh['donnee_envoyee_capteur']."%</h3>";
                                            } else if ($element=='Température'){
                                                echo "<span class='Titre'>Ordre</span><h3 class='Affichage'>".$donneesh['donnee_envoyee_capteur']."°C</h3>";
                                            } else {
                                                echo "<span class='Titre'>Ordre</span><h3 class='Affichage'>".$donneesh['donnee_envoyee_capteur']."</h3>";
                                            }
                                        
                                        ?>
                                        
                                    </div><br>
                                    <?php
                                    if ($element=='Température'){
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
                                        } else if ($element=='Eau' or $element=='Electricité' or $element=='Fumée' or $element=='VMC' or $element=='Mouvement' or $element=='Caméra'){
                                        ?><br>
                                        <form method="post" action="index.php?target=compte&action=connecte&reaction=nouvel_ordre&anticipation=<?php echo $_GET['reaction'] ?>&comprehension=<?php echo $element; ?>">
                                            <select name="ordre" required>
                                                <option value="ON">ON</option>
                                                <option value="OFF">OFF</option>
                                            </select>
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

                <div class="suppression_onglet_conteneur"><a href="index.php?target=compte&action=connecte&reaction=<?php echo $_GET['reaction']; ?>&anticipation=suppression_onglet" class="suppression_onglet">Supprimer cet onglet</a>
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