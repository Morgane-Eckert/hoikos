<header>
	<img alt="Logo"  src="public/images/logoo.png" id="Logo"><!--Photo du logo et du slogan-->
	<img alt="Maisons"  src="public/images/petitesmaisons.png" id="Maisons">
	<span class="nom_compte">
		<?php echo $_SESSION["prenom_utilisateur"]; ?>
		<a href="index.php?target=deconnexion" class="deconnex">Déconnexion</a>
	</span>
</header>