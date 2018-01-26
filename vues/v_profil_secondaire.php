<?php include("accueil_onglets.php");?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/profil.css">
		<link rel="stylesheet" href="public/css/footer.css">
		<script type='text/javascript' src='public/js/adresse.js'></script>
		<title>Votre Profil</title>
	</head>

	<body>
	<?php include("vues/v_header_bouton.php"); ?>
        <nav>
            <a href="index.php?target=compte&action=connecte&reaction=home" class="Onglet">Home</a>
		<?php
            //Affichage d'un message d'erreur si un capteur ne fonctionne pas
		include("vues/v_header_bouton.php");
            list($erreur_capteur,$erreur_salles,$a) = afficher_erreur_capteur();
            for($i=0;$i<$a;$i++){
                echo "<p class='erreur_capteur'>Attention : La fonction ".$erreur_capteur[$i]." de la pièce ".$erreur_salles[$i]." rencontre un dysfonctionnement. <a href='index.php?target=sav' class='lien_message_etat_capteur'>Contactez le SAV en cliquant ici</a>";
            }
        ?>
            <a href="index.php?target=compte&action=connecte&reaction=nouvel_onglet" class="nouvel_onglet" id='nouvel_onglet'>+</a>
            <div class="Vide"></div>
            <a href="index.php?target=compte&action=connecte" class="Conso">Consommations</a>
            <a href="index.php?target=compte&action=connecte&reaction=profil" class="actuel">Profil</a>
		</nav>
        <section>
			<article>
				<div id="titre">Données de votre compte
				<?php
				list($ID_logement,$nom,$prenom,$telephone,$adresse_mail,$date_de_naissance,$date_d_ajout) = donnees_utilisateur($_SESSION['ID_utilisateur']);
				if(isset($_GET['edition'])){
					echo '';
					if($_GET['edition']=='principal'){
						?>
				</div>
				<div id='corps'>
					<br/><!-- Titre dans le bandeau rouge-->
                        <form method='post' action='index.php?target=compte&action=connecte&reaction=profil&rempli=compte'>
                            <label for='nom'> Nom : </label><br>
                            <input type='text' name='nom' id='nom' value ="<?php echo $nom;?>"required><br><br>
                            <label for='prénom'> Prénom :  </label><br>
                            <input type='text' name='prenom' id='prenom' value="<?php echo $prenom;?>" required><br><br />
                            <label for='telephone'> Téléphone :  </label><br>
                            <input type='text' name='telephone1' id='telephone1' maxlenght='10' value ="<?php echo $telephone;?>"required><br><br />
                            <label for='adresse_mail'> Adresse mail :  </label><br>
                            <input type='email' name='adresse_mail' id='adresse_mail' value ="<?php echo $adresse_mail;?>" required><br><br />
                            <label for='date_naissance'> Date de naissance:  </label><br>
                            <input type='date' name='date_naissance' id='date_naissance' value ="<?php echo $date_de_naissance;?>" required><br />
                            <br/>
														Date de création du compte :
		                        <?php
		                        echo $date_d_ajout;
		                        ?>
														<br><br>

                            <input type='submit' value='Confirmer' id='bouton'>
                    </form>
                        <br>
                        <a href ="index.php?target=compte&action=connecte&reaction=profil&mdp=<?php echo $adresse_mail;?>" onclick="alert(Vous allez recevoir un mail pour changer votre mot de passe)" class="supprimer">Modifier le mot de passe</a>
						</div>
						<?php
					} else {
						echo '';
						?>
				</div>
					<br/><!-- Titre dans le bandeau rouge-->
							<div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
								<?php if(isset($_GET["Mail"])){
								echo "Vous avez reçu un mail pour changer votre mot de passe";
							} else {
								echo "";
							}?>
								 Nom :
								<?php
								echo $nom;
								?>
								<br><br>

								Prénom :
								<?php
								echo $prenom;
								?>
								<br><br>

								Téléphone :
								<?php
								echo $telephone;
								?>
								<br><br>

								Adresse mail :
								<?php
								echo $adresse_mail;
								?>
								<br><br>

								Date de naissance :
								<?php
								echo $date_de_naissance;
								?>
								<br><br>

								Date de création du compte :
								<?php
								echo $date_d_ajout;
								?>

							</div>

						<?php
					}
				} else {
					echo '';
					?>
					<a href = "index.php?target=compte&action=connecte&reaction=profil&edition=principal" class="editer">Editer</a>
				</div>
					<br/><!-- Titre dans le bandeau rouge-->
							<div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
								<?php if(isset($_GET["Mail"])){
								echo "<i>Vous avez reçu un mail pour changer votre mot de passe</i><br/><br/>";
							} else {
								echo "";
							}?>
								 Nom :
								<?php
								echo $nom;
								?>
								<br><br>

								Prénom :
								<?php
								echo $prenom;
								?>
								<br><br>

								Téléphone :
								<?php
								echo $telephone;
								?>
								<br><br>

								Adresse mail :
								<?php
								echo $adresse_mail;
								?>
								<br><br>

								Date de naissance :
								<?php
								echo $date_de_naissance;
								?>
								<br><br>

								Date de création du compte :
								<?php
								echo $date_d_ajout;
								?>

							</div>
					<?php
				}
				?>
				</div>
                    <br/><!-- Titre dans le bandeau rouge-->
            </article>

        </section>
		<?php include("vues/v_footer.php"); ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz2XZbaRtoXDEpEBz7QqqmMEORtzrU7Dk&libraries=places&callback=initAutocomplete"
        async defer>
			</script>
	</body>
</html>
