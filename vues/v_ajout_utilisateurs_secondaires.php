<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="public/css/inscription_secondaire.css">
        <link rel="stylesheet" href="public/css/footer.css">
    </head>

    <body>
        <?php   include("vues/v_header_no_bouton.php");
                verif_cond_utilisateur();
        ?>
        <nav>
            <?php
              if(isset($_GET["profil"])){
                ?>
                <a href="index.php?target=compte&action=connecte&reaction=profil" class="Onglet">Profil</a>
                <?php
              } else {
                ?>
                <a href="index.php?target=inscription&action=logement" class="Onglet">Retour</a>
              <?php
              }
            ?>
        </nav>

        <section>
            <article>
                <div id="titre">Ajouter un utilisateur secondaire</div><br/>
               <form id='corps' method='post' action=<?php if(isset($_GET['profil'])){echo "index.php?target=inscription&action=utilisateurs_secondaires&reaction=rempli&profil";}else{echo "index.php?target=inscription&action=utilisateurs_secondaires&reaction=rempli";}?> onsubmit="return verifForm(this)">
                        <label for='nom'> Nom : </label><br/>
                        <span id='missNom'></span><br>
                        <input type='text' pattern='^[a-zA-Z]+$' name='nom' id='nom' required><br><br>
                        <label for='prenom'> Prénom :  </label><br/>
                        <span id='missPrenom'></span><br>
                        <input type='text' pattern='^[a-zA-Z]+$' name='prenom' id='prenom' required><br><br />
                        <label for='telephone'> Téléphone portable :  </label><br/>
                        <span id='missTel'></span><br>
                        <input type='tel'  name='telephone1' id='telephone1' maxlength='10' required><br><br />
                        <?php verif_mail();?>
                        <label for='adresse_mail'> Adresse mail :  </label><br/>
                        <span id='missMail'></span><br>
                        <input type='email' name='adresse_mail' size='30' id='adresse_mail'  required><br><br />
                        <label for='date_naissance'> Date de naissance:  </label><br/>
                        <span id='missDate'></span><br>
                        <input type='date' name='date_naissance' id='date_naissance'  required><br><br />
                        <?php verif_mdp();?>
                        <label for='mot_de_passe'>Mot de passe : </label><br/>
                        <span id='missMdp'></span><br>
                        <input type='password' name='mot_de_passe' id='mot_de_passe'  required><br><br />

                        <label for='mot_de_passe2'>Confirmation du mot de passe : </label><br/>
                        <span id='missMdp2'></span><br>
                        <input type='password' name='mot_de_passe2' id='mot_de_passe2'  required><br><br />

                        <label for='Conditions'></label><input type='checkbox'  id='Conditions' required><a href='index.php?target=conditions_generales' id='Condition' target=_blank>J'ai lu et accepté les conditions générales d'utilisation</a><br><br><br/>
                        <input type='submit' value='Valider'  onclick='verification()' id='bouton'>
            </form>

            <p id='NB'> Tous les champs sont obligatoires.<br> </p>
            </article>
            <?php
            if(isset($_GET["profil"])){
            echo "";
            } else {
            ?>
            <aside>
                <a href="index.php?target=compte&action=connecte&reaction=home" class="Grandonglet">   Ignorer et finir l'inscription   </a>
            </aside>
             <?php
            }
            ?>
        </section>
        <?php include("vues/v_footer.php"); ?>
        <script src="public/js/verification_ajout.js" ></script> <!-- Verifications formulaire en JS -->
    </body>
</html>
