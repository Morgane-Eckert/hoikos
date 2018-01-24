<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="public/css/inscription_secondaire.css">
        <link rel="stylesheet" href="public/css/footer.css">

    </head>
    
    <body>
       <?php include("vues/v_header_no_bouton.php"); ?>
        
        <nav>
            <a href="index.php?target=inscription&action=utilisateurs_secondaires" class="Onglet">Retour</a>
        </nav>
        
       <section>
            <article class="petit_article">
                <div id="titre">Utilisateurs secondaires déjà créés</div>
                <div class="liste_utilisateurs">
                <?php
                $bdd=connexion_bdd();
                $reponse = $bdd->prepare('SELECT prenom_utilisateur FROM utilisateur WHERE ID_logement=:ID_logement and type_utilisateur=:type_utilisateur');
                $reponse->execute(array(
                    'type_utilisateur' => '2',
                    'ID_logement' => $_SESSION['ID_logement']
                    ));
                    while ($donnees = $reponse->fetch()){
                        echo $donnees['prenom_utilisateur'].'<br><br>';
                    }
                    ?>
                </div>
            </article>  
            <article class="grand_article">
                <div id="titre">Ajouter un nouvel utilisateur secondaire</div><br/>
                <form method='post' action='index.php?target=inscription&action=autres_utilisateurs_secondaires&reaction=rempli' id='corps'>
                       <label for='nom' id='test'> Nom : </label><br/>
                        <input type='text' pattern='^[a-zA-Z]+$' name='nom' id='nom' required><br><br>
                        <label for='prenom'> Prénom :  </label><br/>
                        <input type='text' pattern='^[a-zA-Z]+$' name='prenom' id='prenom' required><br><br />
                        <label for='telephone'> Téléphone personnel :  </label><br/>
                        <input type='tel'  name='telephone1' id='telephone1' maxlength='10' required><br><br />
                        <?php verif_mail();?>
                        <label for='adresse_mail'> Adresse mail :  </label><br/>
                        <input type='email' name='adresse_mail' id='adresse_mail'  required><br><br />
                        <label for='date_naissance'> Date de naissance:  </label><br/>
                        <input type='date' name='date_naissance' id='date_naissance'  required><br><br />
                        <?php verif_mdp();?>
                        <label for='mot_de_passe'>Mot de passe : </label><br/>
                        <input type='password' name='mot_de_passe' id='mot_de_passe'  required><br><br />

                        <label for='mot_de_passe2'>Confirmation du mot de passe : </label><br/>
                        <input type='password' name='mot_de_passe2' id='mot_de_passe2'  required><br><br />
    
                        <label for='Conditions'></label><input type='checkbox'  id='Conditions' required><a href='index.php?target=conditions_generales' id='Condition' target=_blank>J'ai lu et accepté les conditions générales d'utilisation</a><br><br><br/>
                        <input type='submit' value='Valider' id='bouton'>
            </form>
            <p id='NB'> Tous les champs sont obligatoires.<br></p>
            </article>
            <aside>
                <a href="index.php?target=compte&action=connecte&reaction=home" class="Grandonglet">Ignorer et finir l'inscription</a>
            </aside>
        </section>
        <?php include("vues/v_footer.php"); ?>
        <script src="public/js/valider_formulaire_inscription.js" ></script> <!-- Verifications formulaire en JS -->
    </body>
</html>