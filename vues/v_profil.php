<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/profol.css">
		<link rel="stylesheet" href="public/css/base-header-avec-bouton.css">
		<link rel="stylesheet" href="public/css/footer.css">
		<script type='text/javascript' src='public/javascript/adresse.js'></script>
		<script type='text/javascript' src='public/javascript/mdp.js'></script>
	</head>
	
	<body>
	<?php include("vues/v_base-header-avec-bouton-deconnexion.php"); ?>
        <nav>
            <a href="index.php?target=compte&action=connecte&reaction=home" class="Onglet">Home</a>
             <?php //Affichage des onglets
                include("accueil_onglets.php");
                $onglets = afficher_onglets();
                foreach($onglets as $element){//On parcourt le tableau
                        ?>
                        <a href="index.php?target=compte&action=connecte" class="Onglet"> <?php echo $element; ?> </a>
                        <?php
                    }
             ?>
            <a href="index.php?target=compte&action=connecte&reaction=nouvel_onglet" class="Onglet" id='nouvel_onglet'>+</a>
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
                            <input type='submit' value='Confirmer' id='bouton'>
                    </form>
                        <br>
                        Date de création du compte :
                        <?php
                        echo $date_d_ajout;
                        ?>
                        <br>
                        <a href ="" onclick='mdpreset()'>Modifier le mot de passe</a>
						</div>
						<?php
					} else {
						echo '';
						?>
				</div>
					<br/><!-- Titre dans le bandeau rouge-->
							<div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
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
								
								Téléphone : +33 
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
								<br><br>
		
								Modifier le mot de passe
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
								
								Téléphone : +33 
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
								<br><br>
		
								Modifier le mot de passe
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
						echo '';
						?>
				</div> 
                    <br/><!-- Titre dans le bandeau rouge-->
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
						<form method='post' action='index.php?target=compte&action=connecte&reaction=profil&rempli=adresse'>
							<label for='telephone_fixe'> Téléphone fixe :  </label><br/>
							<input type='text' name='telephone_fixe' id='telephone_fixe' maxlenght='10' value = "<?php echo $telephonelogement?>"' required><br><br />
							
							<label>Addresse</label><br>
							<input id="autocomplete" placeholder="Taper votre adresse..."
				 onFocus="geolocate()" type="text" class='adresse' style="width:300px;"><br><br>
				
							<label for='numero_rue_logement' id='numero_rue_logement'> Numéro de rue : </label><br/>
							<input type='text' name='numero_rue_logement' id='street_number' value = "<?php echo $numerorue;?>"required disabled = 'true' ><br><br>
							<label for='nom_rue_logement' id='nom_rue_logement'> Nom de rue : </label><br/>
							<input type='text' name='nom_rue_logement' id='route' value="<?php echo $nomrue;?>" required disabled = 'true'><br><br>
							<label for="ville_logement">Ville :</label><br>
							<input type='text' name="ville_logement" id="locality" value ="<?php echo $ville;?>"required disabled = 'true'>   <br><br>
							<label for='code_postale_logement' id='code_postale_logement'> Code postal : </label><br/>
							<input type='text' name='code_postale_logement' id='postal_code' value="<?php echo $codepostal;?>" required disabled = 'true'><br><br>
							<label for="pays_logement">Pays :</label><br>
							<input type='text' name="pays_logement" id="country" value='<?php echo $pays;?>' disabled = 'true'/><br><br>
							<input type='submit' value='Confirmer' id='bouton' onclick='activate()'>
					</form>
					</div>
						
						<?php
					} else {
						echo '';
						?>
				</div> 
                    <br/><!-- Titre dans le bandeau rouge-->
                    <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->                        
                        Adresse :  
                        <?php
                        echo $numerorue.' rue '.$nomrue.', '.$codepostal.' '.$ville.' '.$pays;
                        ?>
                        <br><br>
                        
                        Numéro de téléphone du logement : +33
                        <?php
                        echo $telephonelogement;
                        ?>
                        
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
                        Adresse :  
                        <?php
                        echo $numerorue.' rue '.$nomrue.', '.$codepostal.' '.$ville.' '.$pays;
                        ?>
                        <br><br>
                        
                        Numéro de téléphone du logement : +33
                        <?php
                        echo $telephonelogement;
                        ?>
                        
                    </div>
					<?php
				}
				?>
				
            </article>

			<article>
				<div id="titre">Utilisateurs secondaires
                
                <?php
				list($i,$table_nom,$table_prenom) = donnees_utilisateur_secondaire($ID_logement,$_SESSION['ID_utilisateur']);
				if(isset($_GET['edition'])){
					echo '';
				} else {
					echo '';	
					if ($i==False){
                            ?>
                            <a href="index.php?target=compte&action=connecte&reaction=profil&edition=ajouter_secondaire" class="editer">Ajouter</a>
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
							for ($c=0;$c<$i;$c++){
								echo $table_nom[$c]."  ".$table_prenom[$c];
								?>
								<br><br>
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
	</body>
</html>