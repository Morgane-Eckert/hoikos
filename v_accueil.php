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
            <a href="index.php" class="Onglet">Profil</a>
        </nav>

		<section>
            <article>
                <div id="titre">Fonctions de la pièce <?php echo $_GET['reaction']; ?><a href="" class="Routine">Routine</a></div> 
                    <br/><!-- Titre dans le bandeau rouge-->
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                        <?php //Affichage des onglets
                            $capteurs = afficher_fonctions();
                            if ($capteurs!=NULL){
                            foreach($capteurs as $element){//On parcourt le tableau
                                ?>
                                <div class="Capteurs">
                                    <div class = "BoiteVide">
                                        <h3 class="Titre"> <?php echo $element; ?> </h3><h3 class="Affichage">25°C</h3>
                                    </div>
                                    <div class = "BoiteVide">
                                        <span class="Titre">Ordre</span><h3 class="Affichage">27°C</h3>
                                    </div><br>
                                    <form method="post" action="traitement.php">
                                        <input type="range" min="15" mex="30">
                                        <input type='submit' value='Valider' id='bouton'><br>
                                    </form>
                                </div>
                                <?php 
                                }
                            }  
                            ?>

                        <div class="Capteurs"><h1 class="Titre">Ajouter une fonction</h1><br><a href="index.php?target=compte&action=connecte&reaction=nouvelle_fonction&anticipation=<?php echo $_GET['reaction']; ?>"><img alt="Add" id = "Add" src="public/images/Ajouter.png"></a>
                        </div>
                </div>


            </article>
		</section>



		<?php include("vues/v_footer.php"); ?>
		
	</body>
</html>