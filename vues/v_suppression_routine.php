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
            <?php if ($_GET['anticipation']=='home') { ?>
                <a href="index.php?target=compte&action=connecte&reaction=home" class="actuel">Home</a>
            <?php } else { ?>
            <a href="index.php?target=compte&action=connecte&reaction=home" class="Conso">Home</a>
             <?php } //Affichage des onglets
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
                <div id="titre">Suppression de la routine <?php echo $_GET['comprehension']; ?></div> <div class='conteneur'>
                    <span class=gros_attention> Attention ! </span><br><br>
                    Vous vous apprettez à supprimer cette routine. Êtes-vous sûr de vouloir continuer ? <br><br>
                    <span class='attention'>
                        <a href="index.php?target=compte&action=connecte&reaction=routine&anticipation=<?php echo $_GET['anticipation']; ?>" class="bouton_confimer_suppression">Annuler</a> <a href="index.php?target=compte&action=connecte&reaction=suppression_routine_confirme&anticipation=<?php echo $_GET['anticipation']; ?>&comprehension=<?php echo $_GET['comprehension'] ?>" class="bouton_confimer_suppression">Confirmer</a>
                    </span>
                </div>
            </article>
		</section>



		<?php include("vues/v_footer.php"); ?>
		
	</body>
</html>