<?php include("accueil_onglets.php");?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/profil.css">
		<link rel="stylesheet" href="public/css/footer.css">
		<title>Votre Profil</title>
	</head>

	<body>
	<?php include("vues/v_header_bouton.php");
            //Affichage d'un message d'erreur si un capteur ne fonctionne pas
            list($erreur_capteur,$erreur_salles,$a) = afficher_erreur_capteur();
            for($i=0;$i<$a;$i++){
                echo "<p class='erreur_capteur'>Attention : La fonction ".$erreur_capteur[$i]." de la pièce ".$erreur_salles[$i]." rencontre un dysfonctionnement. <a href='index.php?target=sav' class='lien_message_etat_capteur'>Contactez le SAV en cliquant ici</a>";
            }
		?>
        <nav>

            <a href="index.php?target=compte&action=connecte&reaction=home" class="Conso">Home</a>
             <?php //Affichage des onglets
                $onglets = afficher_onglets();
                if ($onglets!=NULL)
                foreach($onglets as $element){//On parcourt le tableau
                    ?>
                        <a href="index.php?target=compte&action=connecte&reaction=<?php echo $element; ?>" class="Onglet"> <?php echo $element; ?> </a>
                    <?php
                }
             ?>
            <a href="index.php?target=compte&action=connecte&reaction=nouvel_onglet" class="nouvel_onglet" id='nouvel_onglet'>+</a>
            <div class="Vide"></div>
           		 <?php
					list($ID_logement,$nom,$prenom,$telephone,$adresse_mail,$date_de_naissance,$date_d_ajout) = donnees_utilisateur($_SESSION['adresse_mail_utilisateur']);
					list($i,$table_nom,$table_prenom,$table_id) = donnees_utilisateur_secondaire($ID_logement,$_SESSION['adresse_mail_utilisateur']);
					if(isset($_GET['ajout'])){
					if($_SESSION["mailcheck"]==0 AND $_GET["test"]==0) {
							echo "<p class='m'>L'ajout de votre utilisateur secondaire ".$_GET["ajout"]." est un succès !</p><br><br/>";
						} elseif($_SESSION["mailcheck"]==1) {
							echo "<p class='m'>L'ajout de votre utilisateur secondaire ".$_GET["ajout"]." est un échec !<br>Son adresse mail existe déjà dans notre base de donnée !</p><br><br/>";
						} else{
							echo "<p class='m'>L'ajout de votre utilisateur secondaire ".$_GET["ajout"]." est un échec !</p><br><br/>";
						}
					} elseif(isset($_GET['suppression'])){
						echo "<p class='m'>La suppression de votre utilisateur secondaire ".$_GET["suppression"]." est un succès !</p><br><br/>";
					} elseif(isset($_GET["Mail"])){
						echo "<p class='m'>Nous venons d'envoyer un mail à ".$adresse_mail." pour le changement de votre mot de passe.<br> Surveillez votre boite de réception ainsi que vos courriers spams/indésirables !</p><br/><br/>";
					} elseif (isset($_GET["conflit"])) {
						echo "<p class='m'>L'adresse mail ".$_GET["conflit"]." est déjà présente dans notre base de donnée!</p><br/><br/>";
					}
				?>
            <a href="index.php?target=compte&action=connecte&reaction=consommation" class="Conso">Consommations</a>
            <a href="index.php?target=compte&action=connecte&reaction=profil" class="actuel">Profil</a>
		</nav>
        <section>
			<article>
				<div id="titre">Données de votre compte
				<?php
				if(isset($_GET['edition'])){
					echo '';
					if($_GET['edition']=='principal'){
						echo "<a href='index.php?target=compte&action=connecte&reaction=profil' class='editer'>Profil</a>";
						?>
				</div>
				<div id='corps'>
					<br/><!-- Titre dans le bandeau rouge-->
                        <form method='post' action='index.php?target=compte&action=connecte&reaction=profil&rempli=compte' id='Formulaire'>
                            <label for='nom' class='intitule'> Nom : </label>
														<span id ="missNom"></span><br>
                            <input type='text' id='nom1' name='nom' pattern='^[a-zA-Z]+$' value ="<?php echo $nom;?>" required><br><br>
                            <label for='prénom' class='intitule'> Prénom : </label>
														<span id ="missPrenom"></span><br>
                            <input type='text' name='prenom' pattern='^[a-zA-Z]+$' id='prenom' value="<?php echo $prenom;?>" required><br><br />
                            <label for='telephone' class='intitule'> Téléphone :  </label>
														<span id ="missTel"></span><br>
                            <input type='text' name='telephone1'  pattern='^0[1-9]\d{8}$' id='telephone1' maxlength="10" value ="<?php echo $telephone;?>" required><br><br />
														<label for='adresse_mail' class='intitule'> Adresse mail :  </label>
														<span id ="missMail"></span><br>
														<input type='email' name='adresse_mail'  id='adresse_mail' value ="<?php echo $adresse_mail;?>" required><br><br />
                            <label for='date_naissance' class='intitule'> Date de naissance:  </label><br>
                            <input type='date' name='date_naissance' id='date_naissance' value ="<?php echo $date_de_naissance;?>" required><br />
                            <br/>
								<span class='intitule'>Date de création du compte :</span>
		                        <?php
		                        echo $date_d_ajout;
		                        ?>
														<br><br>

                            <input type='submit' value='Confirmer' onclick='verification()'id='modifier'>
                    </form>
                        <br>
                        <a href ="index.php?target=compte&action=connecte&reaction=profil&mdp=<?php echo $adresse_mail;?>"  class="supprimer">Modifier le mot de passe</a>
						</div>
						<?php
					} else {
						echo '';
						?>
				</div>
					<br/><!-- Titre dans le bandeau rouge-->
							<div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
								<span class='intitule'>Nom :</span>
								<?php
								echo $nom;
								?>
								<br><br>

								<span class='intitule'>Prénom :</span>
								<?php
								echo $prenom;
								?>
								<br><br>

								<span class='intitule'>Téléphone :</span>
								<?php
								echo $telephone;
								?>
								<br><br>

								<span class='intitule'>Adresse mail :</span>
								<?php
								echo $adresse_mail;
								?>
								<br><br>

								<span class='intitule'>Date de naissance :</span>
								<?php
								echo $date_de_naissance;
								?>
								<br><br>

								<span class='intitule'>Date de création du compte :</span>
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
								 <span class='intitule'>Nom :</span>
								<?php
								echo $nom;
								?>
								<br><br>

								<span class='intitule'>Prénom :</span>
								<?php
								echo $prenom;
								?>
								<br><br>

								<span class='intitule'>Téléphone :</span>
								<?php
								echo $telephone;
								?>
								<br><br>

								<span class='intitule'>Adresse mail :</span>
								<?php
								echo $adresse_mail;
								?>
								<br><br>

								<span class='intitule'>Date de naissance :</span>
								<?php
								echo $date_de_naissance;
								?>
								<br><br>

								<span class='intitule'>Date de création du compte :</span>
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

			<article>
				<div id="titre">Données de l'appartement
				<?php
				list($numerorue,$nomrue,$codepostal,$ville,$pays,$telephonelogement)= donnees_logement($ID_logement);
				if(isset($_GET['edition'])){
					echo '';
					if($_GET['edition']=='adresse'){
						echo "<a href='index.php?target=compte&action=connecte&reaction=profil' class='editer'>Profil</a>";
						?>
				</div>
                    <br/><!-- Titre dans le bandeau rouge-->
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
						<form method='post' action='index.php?target=compte&action=connecte&reaction=profil&rempli=adresse'>
							<label for='telephone_fixe' class='intitule'> Téléphone fixe :  </label><br/>
							<span id ="missTel"></span><br>
							<input type='text' pattern='^0[1-9]\d{8}$' name='telephone_fixe' id='telephone_fixe' maxlength="10" value = "<?php echo $telephonelogement?>"  required><br><br />

							<label class='intitule'>Addresse</label><br>
							<input id="autocomplete" placeholder="Taper votre adresse..."
				 onFocus="geolocate()" type="text" class='adresse' style="width:300px;"><br><br>

							<label for='numero_rue_logement' id='numero_rue_logement' class='intitule'> Numéro de rue : </label>
							<span id ="missNumrue"></span><br>
							<input type='text' name='numero_rue_logement' id='street_number' value = "<?php echo $numerorue;?>"required ><br><br>
							<label for='nom_rue_logement' id='nom_rue_logement' class='intitule'> Nom de rue : </label>
							<span id ="missRue"></span><br>
							<input type='text' name='nom_rue_logement' id='route' value="<?php echo $nomrue;?>" required><br><br>
							<label for="ville_logement" class='intitule'>Ville :</label>
							<span id ="missVille"></span><br>
							<input type='text' name="ville_logement" id="locality" value ="<?php echo $ville;?>"required >   <br><br>
							<label for='code_postale_logement' id='code_postale_logement' class='intitule'> Code postal : </label>
							<span id ="missCp"></span><br>
							<input type='text' name='code_postale_logement' id='postal_code' value="<?php echo $codepostal;?>" required><br><br>
							<label for="pays_logement" class='intitule'>Pays :</label>
							<span id ="missPays"></span><br>
							<input type='text' name="pays_logement" id="country" required value='<?php echo $pays;?>' /><br><br>
							<label for="id_cemac" class='intitule'>Numéro de série de votre nouveau CeMac :</label><br>
							<input type='text' name='id_cemac' id='id_cemac' maxlength="5"><br><br />
							<input type='submit' value='Confirmer' onclick="validation()" id='bouton' >
					</form>
				</div>

						<?php
					} else {
						echo '';
						?>
				</div>
                    <br/><!-- Titre dans le bandeau rouge-->
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                        <span class='intitule'>Adresse :</span>
                        <?php
                        echo $numerorue.' rue '.$nomrue.', '.$codepostal.' '.$ville.' '.$pays;
                        ?>
                        <br><br>

                        <span class='intitule'>Numéro de téléphone du logement :</span>
                        <?php
                        echo $telephonelogement;
                        ?>
												<br><br>
												<?php
												list($table_cemac,$c) = cemac($ID_logement);
												echo "<span class='intitule'>CeMAC de l'appartement :</span>";
												?>
												<ul>
												<?php
												for($i=0;$i<$c;$i++){
													?>
													<li>
														<?php
					 								echo $table_cemac[$i]."<br>";
													?>
												</li>
													<?php
					 							}
												?>
											</ul>
                    </div>
					<?php
					}
				} else {
					echo '';
					?>
					<a href="index.php?target=compte&action=connecte&reaction=profil&edition=adresse" class="editer">Editer</a>
				</div>
                    <br/><!-- Titre dans le bandeau rouge-->
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                        <span class='intitule'>Adresse :</span>
                        <?php
                        echo $numerorue.' rue '.$nomrue.', '.$codepostal.' '.$ville.' '.$pays;
                        ?>
                        <br><br>

                        <span class='intitule'>Numéro de téléphone du logement :</span>
                        <?php
                        echo $telephonelogement;
                        ?>
												<br><br>
												<?php
												list($table_cemac,$c) = cemac($ID_logement);
												echo "<span class='intitule'>CeMAC de l'appartement :</span>";
												?>
												<ul>
												<?php
												for($i=0;$i<$c;$i++){
													?>
													<li>
														<?php
					 								echo $table_cemac[$i]."<br>";
													?>
												</li>
													<?php
					 							}
												?>
											</ul>
                    </div>
					<?php
				}
				?>

            </article>

			<article>
				<div id="titre">Utilisateurs secondaires

                <?php
				list($i,$table_nom,$table_prenom,$table_id) = donnees_utilisateur_secondaire($ID_logement,$_SESSION['adresse_mail_utilisateur']);
				if(isset($_GET['edition'])){
					if($_GET['edition']=="modifier_secondaire"){
					?>
					<a href="index.php?target=compte&action=connecte&reaction=profil" class="editer">Profil</a>
					<?php
				}
				} else {
					if ($i==False){
                            ?>
                            <a href="index.php?target=inscription&action=utilisateurs_secondaires&profil" class="editer">Ajouter</a>
                            <?php
                        } else {
                            ?>
                            <a href="index.php?target=compte&action=connecte&reaction=profil&edition=modifier_secondaire" class="editer">Editer</a>
                            <?php
                        }
				}
                ?>

                </div>
                    <br/><!-- Titre dans le bandeau rouge-->
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
                        <?php
                        if ($i==0){
                            echo 'Pour ajouter un utilisateur secondaire cliquer sur le bouton "Ajouter" ci-dessus';
                        } else{
                        	echo "<ul>";
							for ($c=0;$c<$i;$c++){
								echo "<li>".$table_nom[$c]."  ".$table_prenom[$c];
								if(isset($_GET["edition"])){
									if($_GET["edition"]=="modifier_secondaire"){
									?>
										<a  class ="supprimer" href="index.php?target=compte&action=connecte&reaction=profil&supprimer=<?php echo $table_id[$c];?>" style='margin:5%'>Supprimer</a>
									<?php
								}
								}
								echo "</li>";
								?>
								<br><br>
								<?php
							}
							echo "</ul>";
						}
                        ?>
												<?php
												if(isset($_GET["edition"])){
													if($_GET["edition"]=="modifier_secondaire"){
											 ?>
												<a class = "supprimer" style='margin:5%' href ="index.php?target=inscription&action=utilisateurs_secondaires&profil">Ajouter un utilisateur secondaire</a>
												<?php
											}
										}
										?>
                    </div>
            </article>

        </section>
		<?php include("vues/v_footer.php"); ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz2XZbaRtoXDEpEBz7QqqmMEORtzrU7Dk&libraries=places&callback=initAutocomplete"
        async defer></script>
		<script type='text/javascript' src='public/js/adresse.js'></script>
		<script type='text/javascript' src='public/js/verification_adresse.js'></script>
		<script type='text/javascript' src='public/js/profil.js'></script>
	</body>
</html>
