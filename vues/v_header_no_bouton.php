<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/header_no_bouton.css">
</head>

<header>

	<a href="index.php" class= "logoslogan">
		<img alt="Logo"  src="public/images/logo.png" id="Logo"><!--Photo du logo-->
	<br/>
	<span class = "slogan">
	<?php
	if (isset($slogan)) //Si le slogan de la bdd existe
	{ 
	echo $slogan;	
	}
	else
	{
	echo "Pour que la maison idéale soit votre maison de demain !";
	} ?>
	</span>
	</a>
	<img alt="Maisons"  src="public/images/petitesmaisons.png" id="Maisons">

</header>