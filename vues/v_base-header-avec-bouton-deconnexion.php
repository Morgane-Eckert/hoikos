<header>
	<img alt="Logo"  src="public/images/logo.png" id="Logo"><!--Photo du logo-->
	<br/>
	<p class="slogan">
	<?php 
	include ('modeles/m_slogan.php');
	echo slogan(); ?><p>
	<img alt="Maisons"  src="public/images/petitesmaisons.png" id="Maisons">
	<span class="nom_compte">
		<?php echo $_SESSION["prenom_utilisateur"]; ?>
		<a href="index.php?target=deconnexion" class="deconnex">Déconnexion</a>
	</span>
</header>