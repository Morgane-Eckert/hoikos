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
            <a href="index.php?target=compte&action=connecte&reaction=home" class="actuel">Home</a>
             <?php //Affichage des onglets
                include("accueil_onglets.php");
                $onglets = afficher_onglets();
                foreach($onglets as $element){//On parcours le tableau
                        ?>
                        <a href="index.php?target=compte&action=connecte" class="Onglet"> <?php echo $element; ?> </a>
                        <?php
                    }
             ?>
            <a href="index.php?target=compte&action=connecte&reaction=nouvel_onglet" class="Onglet" id='nouvel_onglet'>+</a>
            <a href="index.php?target=compte&action=connecte" class="Conso">Consommations</a>
            <a href="index.php" class="Onglet">Profil</a>
        </nav>

		<section>
			<article>
				<div id="titre">Fonctions de la maison<a href="" class="Routine">Routine</a></div> 
                    <br/><!-- Titre dans le bandeau rouge-->
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                    	<div class="Capteurs">
                    		<div class = "BoiteVide">
                    			<h3 class="Titre">Température</h3><h3 class="Affichage">25°C</h3>
                    		</div>
                    		<div class = "BoiteVide">
                    			<span class="Titre">Ordre</span><h3 class="Affichage">27°C</h3>
                    		</div><br>
                    		<form method="post" action="traitement.php">
                    			<input type="range" min="15" mex="30">
                    		</form>
                    	</div>

                        <div class="Capteurs">
                            <div class = "BoiteVide">
                                <h3 class="Titre">VMC</h3><h3 class="Affichage">ON</h3>
                            </div><br><br>
                            <div>
                               <span class="bouton_gris">ON</span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="bouton">OFF</span>
                            </div><br>
                        </div>
                    	
                    	<div class="Capteurs">
                    		<div class = "BoiteVide">
                    			<h3 class="Titre">Musique</h3><h3 class="Affichage">5</h3>
                    		</div><br><br>
                    		<form method="post" action="traitement.php">
                    			<input type="range" min="15" mex="30">
                    		</form>
                    	</div>

                        <div class="Capteurs">
                            <div class = "BoiteVide">
                                <h3 class="Titre">Volets</h3><h3 class="Affichage">OUVERTS</h3>
                            </div><br><br>
                            <div>
                               <span class="bouton_gris">OUVRIR</span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="bouton">FERMER</span>
                            </div><br>
                        </div>

                        <div class="Capteurs">
                            <div class = "BoiteVide">
                                <h3 class="Titre">Humidité</h3><h3 class="Affichage">65%</h3>
                            </div>
                            <div class = "BoiteVide">
                                <span class="Titre">Ordre</span><h3 class="Affichage">60%</h3>
                            </div><br>
                            <form method="post" action="traitement.php">
                                <input type="range" min="15" mex="30">
                            </form>
                        </div>

                    	<div class="Capteurs"><h1 class="Titre">Ajouter une fonction</h1><br><a href=""><img alt="Add" id = "Add" src="public/images/Ajouter.png"></a></div>
                	</div>

			</article>
		</section>



		<?php include("vues/v_footer.php"); ?>
		
	</body>
</html>