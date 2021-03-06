<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_utilisateur_confirmation_suppression.css">
		<link rel="stylesheet" href="public/css/footer.css">
	</head>
	
	<body>
		<?php include("vues/v_header_bouton.php"); ?>
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
            <a href="index.php?target=compte&action=connecte&reaction=consommation" class="Conso">Consommations</a>
            <a href="index.php?target=compte&action=connecte&reaction=profil" class="Conso">Profil</a>
        </nav>

		<section>
            <article>
                <div id="titre">Suppression de la pièce <?php echo $_GET['reaction']; ?><a href="" class="Routine">Routine</a></div> <div class='conteneur'>
                    <span class=gros_attention> Attention ! </span><br><br>
                    Vous vous apprêtez à supprimer cette pièce. Cette pièce peut être impliquer dans une routine. Êtes-vous sûr de vouloir continuer ? <br><br>
                    <span class='attention'>
                        <a href="index.php?target=compte&action=connecte&reaction=<?php echo $_GET['reaction']; ?>" class="bouton_confimer_suppression">Annuler</a> <a href="index.php?target=compte&action=connecte&reaction=<?php echo $_GET['reaction']; ?>&anticipation=suppression_onglet_confirme" class="bouton_confimer_suppression">Confirmer</a>
                    </span>
                </div>
            </article>
		</section>



		<?php include("vues/v_footer.php"); ?>
		
	</body>
</html>
