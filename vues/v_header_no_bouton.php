<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/header_no_bouton.css">
</head>

<header>
	<?php if(isset($_SESSION["connect"]) && ($_SESSION["connect"] == true)){?>
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