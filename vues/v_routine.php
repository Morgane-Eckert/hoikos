<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_utilisateur.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
	
	<body>
		<?php include("vues/v_header_bouton.php"); ?>
		<nav>
             <?php //Affichage des onglets
            include("accueil_onglets.php");
            ?>
            <a href="index.php?target=compte&action=connecte&reaction=<?php echo $_GET['anticipation']; ?>" class="Onglet"> Retour </a>
            <a class="actuel"> Routine <?php echo $_GET['anticipation']; ?> </a>
        </nav>

		<section class="section_routine">
			
                     <!-- Tout ce qu'il y a dans le rectangle blanc-->
                    <?php 
                    if (isset($_GET['comprehension'])){
                        if ($_GET['comprehension']=='confirme'){
                            echo "<p class='message_suppression'>La routine a bien été supprimée.</p><br>";
                        }
                    }
                    $compteur=compteur();
                    if ($_GET['anticipation']=='home' AND $compteur==0) {
                        echo '<p class=\'message_d_erreur\'> Il est nécessaire d\'avoir au moins une pièce pour définir une routine dans votre maison. Veuillez ajouter une pièce </p>'.'<br>';
                        $routines=NULL;
                    }elseif ($_GET['anticipation']=='home' AND $compteur!=0) {
                        $routines = afficher_routines_home();
                    }elseif ($_GET['anticipation']!='home' AND $compteur==0) {
                         echo '<p class=\'message_d_erreur\'> Il est nécessaire d\'avoir au moins une fonction pour définir une routine dans cette pièce. Veuillez ajouter une fonction </p>'.'<br>';
                         $routines=NULL;
                    }elseif ($_GET['anticipation']!='home' AND $compteur!=0) {
                        $routines = afficher_routines_salle();
                    }
                    if ($routines!=NULL){
                        foreach($routines as $ID_routine => $nom_routine){ //On parcourt le tableau ?>     
                            <article>
                                <div id="titre"><?php echo $nom_routine; ?> </div>
                                <br/><!-- Titre dans le bandeau rouge-->
                                <div id="corps">
                                 <!-- Tout ce qu'il y a dans le rectangle blanc-->
                                    <div class="Capteurs2">
                                        <?php 
                                        $horaires = afficher_horaire_routine($ID_routine);
                                        $jours = afficher_jours_routine($ID_routine);
                                        ?>
                                        <div class = "BoiteVide2">
                                            <h3 class="Titre"> Jour(s) : </h3>
                                            <span class="Titre">
                                                <ul>
                                                    <?php foreach ($jours as $jour) { ?>
                                                    <li> <?php echo $jour ; ?>
                                                    <?php } ?>
                                                </ul>
                                            </span>
                                        </div>
                                        <?php foreach ($horaires as $debut =>$fin) { ?>
                                            <div class = "BoiteVide2">
                                                <h3 class="Titre"> Heure de début : </h3>
                                                <span class="Titre">
                                                    <ul>
                                                        <li> <?php echo $debut ; ?>
                                                    </ul>
                                                </span>
                                            </div>
                                            <div class = "BoiteVide2">
                                                <h3 class="Titre"> Heure de fin : </h3>
                                                <span class="Titre">
                                                    <ul>
                                                        <li> <?php echo $fin ; ?>
                                                    </ul>
                                                </span>
                                            </div>
                                        <?php } ?>
                                        <span class="supprimer_conteneur"><a href="index.php?target=compte&action=connecte&reaction=nouvelle_routine_horaire&comprehension=<?php echo $nom_routine; ?>&anticipation=<?php echo $_GET['anticipation']; ?>" class="supprimer">Modifier les horaires</a></span>
                                    </div>
                        
                                    <div class="Capteurs2">
                                        <?php 
                                        $salles = afficher_salle_routine($ID_routine);
                                        ?>
                                        <div class = "BoiteVide2">
                                            <h3 class="Titre"> Salle(s) : </h3>
                                            <span class="Titre">
                                                <ul>
                                                    <?php foreach ($salles as $salle) { ?>
                                                        <li> <?php echo $salle ; ?>
                                                    <?php } ?>
                                                </ul>
                                            </span>
                                        </div>
                                        <span class="supprimer_conteneur"><a href="index.php?target=compte&action=connecte&reaction=nouvelle_routine_salle&comprehension=<?php echo $nom_routine; ?>&anticipation=<?php echo $_GET['anticipation']; ?>" class="supprimer">Modifier les salles</a></span>
                                    </div>

                                    <div class="Capteurs2">
                                        <?php 
                                        $consignes = afficher_consigne_routine($ID_routine);
                                        ?>
                                        <div class = "BoiteVide2">
                                            <h3 class="Titre"> Ordre(s) : </h3>
                                            <span class="Titre">
                                                <ul>
                                                    <?php foreach ($consignes as $capteur => $consigne) {  ?>

                                                        <?php if ($capteur!='null'  && $consigne!='non') {
                                                            if ($capteur=='Température')   { ?>
                                                                <li> <?php echo $capteur ; ?> : <?php echo $consigne ; ?> °C
                                                            <?php } else if ($capteur=='Humidité') { ?>
                                                                <li> <?php echo $capteur ; ?> : <?php echo $consigne ; ?> %
                                                            <?php }  else{ ?>
                                                                <li> <?php echo $capteur ; ?> : <?php echo $consigne ; ?>
                                                        <?php }} ?>
                                                        <?php if ($capteur!='null'  && $consigne=='non') {
                                                            if ($capteur=='Température')   { ?>
                                                                <li> <?php echo $capteur ; ?> :  
                                                            <?php } else if ($capteur=='Humidité') { ?>
                                                                <li> <?php echo $capteur ; ?> : 
                                                            <?php }  else{ ?>
                                                                <li> <?php echo $capteur ; ?> : 
                                                        <?php }} ?>
                                                    <?php } ?>
                                                </ul>
                                            </span>
                                        </div>
                                        <span class="supprimer_conteneur"><a href="index.php?target=compte&action=connecte&reaction=nouvelle_routine_capteur&comprehension=<?php echo $nom_routine; ?>&anticipation=<?php echo $_GET['anticipation']; ?>" class="supprimer">Modifier les fonctions</a></span>
                                        <span class="supprimer_conteneur"><a href="index.php?target=compte&action=connecte&reaction=nouvelle_routine_consigne&comprehension=<?php echo $nom_routine; ?>&anticipation=<?php echo $_GET['anticipation']; ?>" class="supprimer">Modifier les ordres</a></span>
                                    </div>
                                    <div class="suppression_routine_conteneur"><a href="index.php?target=compte&action=connecte&reaction=suppression_routine&anticipation=<?php echo $_GET['anticipation']; ?>&comprehension=<?php echo $nom_routine ?>" class="suppression_onglet">Supprimer cette routine</a></div>
                                </div>
                            </article>
                        <?php }
                    } ?>

                    <?php if ( $compteur!=0) { ?>
                        <article class="Capteurs">
                        <div ><h1 class="Titre">Ajouter une routine</h1><br>
                            <?php if ($_GET['anticipation']== 'home') { ?>
                                <a href="index.php?target=compte&action=connecte&reaction=nouvelle_routine_salle&anticipation=<?php echo $_GET['anticipation']; ?>" class='plus'>+</a>
                            <?php } else { ?>
                                <a href="index.php?target=compte&action=connecte&reaction=nouvelle_routine_capteur&anticipation=<?php echo $_GET['anticipation']; ?>" class='plus'>+</a>
                            <?php } ?>
                        </div>
                        </article>
                    <?php } ?> 
		</section>



		<?php include("vues/v_footer.php"); ?>
		
	</body>
</html>