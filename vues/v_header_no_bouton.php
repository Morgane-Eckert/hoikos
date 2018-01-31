<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/header_no_bouton.css">
</head>

<header>
	<?php if ((((isset($_GET["action"])) && ($_GET['action']=='logement')) || ((isset($_GET["action"])) && ($_GET['action']=='utilisateurs_secondaires'))) && (!(isset($_GET['profil'])))){?>
	<a href="index.php?target=inscription&action=<?php echo $_GET['action']?>" class= "logoslogan">
	<?php }else if (isset($_GET["profil"])){?>
	<a href="index.php?target=inscription&action=<?php echo $_GET['action']?>&profil" class= "logoslogan">
	<?php }else if ((isset($_SESSION["connect"])) && ($_SESSION["connect"] == true) && ((isset($_SESSION["type_utilisateur"])) && (($_SESSION["type_utilisateur"])==4))) {?>
	<a href="index.php?target=compte&action=connecte&reaction=cemac" class= "logoslogan">
	<?php }else if ((isset($_SESSION["connect"])) && ($_SESSION["connect"] == true) && ((isset($_SESSION["type_utilisateur"])) && (($_SESSION["type_utilisateur"])==3))) {?>
	<a href="index.php?target=compte&action=connecte&reaction=conditions_generales" class= "logoslogan">
	<?php }else if((isset($_SESSION["connect"])) && ($_SESSION["connect"] == true) && ((isset($_SESSION["type_utilisateur"])) && (($_SESSION["type_utilisateur"]==1) || ($_SESSION["type_utilisateur"]==2)))) {?>
	<a href="index.php?target=compte&action=connecte&reaction=home" class= "logoslogan">
	<?php }else{ ?>
	<a href="index.php" class= "logoslogan">
	<?php }?>
		<img alt="Logo"  src="public/images/logo.png" id="Logo"><!--Photo du logo-->
	<br/>
	<span class = "slogan">
	<?php
	if (isset($_SESSION['slogan'])) //Si le slogan de la bdd existe
	{ 
	echo $_SESSION['slogan'];	
	}
	else
	{
	echo "Pour que la maison idéale soit votre maison de demain !";
	} ?>
	</span>
	</a>
	<img alt="Maisons"  src="public/images/petitesmaisons.png" id="Maisons">
	<block></block>

</header>

