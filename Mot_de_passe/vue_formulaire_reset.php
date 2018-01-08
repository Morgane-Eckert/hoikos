<!DOCTYPE HTML>

<HTML>
<head>
	<title>Oublie du mot de passe</title>
	<meta charset="utf-8">
</head>

<body>
	<form action="mail_reset.php" method="post">
	
	<label for="nom">Votre adresse mail:</label> <input type="email" name="mail"><br>

	<?php if ($_SESSION["mailexist"]==0)
	{
	?>
		<span>Adresse mail non existante.</span><br/><br/> 
	<?php 
	}
	?>

	<input type="submit" value="valider">
	
	</form>
</body>
</HTML>