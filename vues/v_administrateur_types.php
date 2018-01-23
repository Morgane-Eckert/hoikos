<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_administrateur.css">
	</head>
	
	<body>
		<?php include("vues/v_header_bouton.php"); ?>
		<nav>
            <a href="index.php?target=compte&action=connecte&reaction=conditions_generales" class="Onglet">Conditions générales d'utilisation</a>
            <a href="index.php?target=compte&action=connecte&reaction=mentions_legales" class="Onglet">Mentions légales</a>
            <a href="index.php?target=compte&action=connecte&reaction=slogan" class="Onglet">Slogan</a>
            <a href="index.php?target=compte&action=connecte&reaction=types" class="actuel">Types de pièces et de fonctions</a>
            <a href="index.php?target=compte&action=connecte&reaction=FAQ" class="Onglet">F.A.Q.</a>
        </nav>

        <section class="section">
            <article class="article_etroit">
                    <div id="corps">
                        <p>
                            <?php 
                            if (isset($_GET['anticipation'])){
                                if ($_GET['anticipation']=='nouveau_type_de_salle_deja_existant'){
                                    echo "<p class='message'>Le nom du nouveau type de pièce entré existe déjà.</p>";
                                } else if ($_GET['anticipation']=='nouveau_type_de_salle_rempli'){
                                    echo "<p class='message'>Le nom du nouveau type de pièce a bien été ajouté.</p>";
                                } else if ($_GET['anticipation']=='nouveau_type_de_capteur_deja_existant'){
                                    echo "<p class='message'>Le nom du nouveau type de capteur entré existe déjà.</p>";
                                } else if ($_GET['anticipation']=='nouveau_type_de_capteur_rempli'){
                                    echo "<p class='message'>Le nom du nouveau type de capteur a bien été ajouté.</p>";
                                }
                            }
                            ?><p id ='message_d_erreur'></p>
                            <div class='categorie'>Pièces</div><br>
                            <div class='sous-titre'>Type de pièces existants :</div>
                                <ul>
                                <?php 
                                $bdd=connexion_bdd();
                                $reponse1 = $bdd->query('SELECT * FROM type_de_salle');
                                while ($donnees1 = $reponse1->fetch()){
                                    echo '<li>'.$donnees1['nom_type_de_salle'].'</li>'; 
                                } ?>
                                </ul>
                        
                            <form method="post" action="index.php?target=compte&action=connecte&reaction=nouveau_type_de_salle">
                                <fieldset>
                                    <legend><div class='sous-titre'>Ajouter un nouveau type de pièce : </div></legend><br>
                                    <label>Nom du type de pièce : </label><br/>
                                    <input type="text" name="nom_nouveau_type_de_salle" maxlength='20' required />
                                    <input type='submit' value='Valider' class='editer' id='bouton'>
                                </fieldset>
                            </form> 
                        </p><br>
                        <p>
                            <div class='categorie'>Fonctions</div><br>
                            <div class='sous-titre'>Types de fonctions existants :</div>
                            <ul>
                            <?php 
                            $reponse2 = $bdd->query('SELECT * FROM type_de_capteur');
                            while ($donnees2 = $reponse2->fetch()){
                                echo '<li>'.$donnees2['nom_type_de_capteur'].'</li>';
                            } ?>
                            </ul>

                            <form method="post" action="index.php?target=compte&action=connecte&reaction=nouveau_type_de_capteur">
                                <fieldset>
                                    <legend><div class='sous-titre'>Ajouter un nouveau type de fonction : </div></legend><br>
                                    <label>Nom du type de fonction : </label><br/>
                                    <input type="text" name="nom_nouveau_type_de_capteur" maxlength='20' required />
                                    <input type='submit' value='Valider' class='editer' id='bouton'>
                                </fieldset>
                            </form> 
                        </p>                       
                    </div>
			</article>
		</section>
	</body>
</html>