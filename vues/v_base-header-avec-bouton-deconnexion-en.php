<?php session_start(); ?>
<header>
	<a href="connexion.php" >
		<img alt="Logo"  src="public/images/logoo-en.png" id="Logo"><!--Photo du logo et du slogan-->
	</a>
	<img alt="Maisons"  src="public/images/petitesmaisons.png" id="Maisons">
	<span class="nom_compte">
		<?php echo $_SESSION["prenom_utilisateur"]; ?>
		<a href="deconnexion.php" class="deconnex">Sign Out</a>
	</span>
</header>