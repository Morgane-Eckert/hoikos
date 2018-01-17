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
            <a href="index.php?target=compte&action=connecte&reaction=home" class="Onglet">Home</a>
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
                                    <!--<span  class="supprimer_conteneur"><a href="index.php?target=compte&action=connecte&reaction=<?php echo $_GET['reaction']; ?>&anticipation=suppression_onglet" class="supprimer">x</a></span>-->
                                    
                                    <div class = "BoiteVide">
                                        <h3 class="Titre"> <?php echo $element; ?> </h3><h3 class="Affichage">25°C</h3>
                                    </div>
                                    <div class = "BoiteVide">
                                        <span class="Titre">Ordre</span><h3 class="Affichage">27°C</h3>
                                    </div><br>
                                    <form method="post" action="index.php?target=compte&action=connecte&reaction=nouvel_ordre&anticipation=<?php echo $_GET['reaction'] ?>&comprehension=<?php echo $element; ?>">
                                        <input type="range" name="ordre" min="15" max="30">
                                        <input type='submit' value='Envoyer' id='bouton'>
                                    </form>
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



		<?php include("vues/v_footer.php"); ?>
		
	</body>
</html>