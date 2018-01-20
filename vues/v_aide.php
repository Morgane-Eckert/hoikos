<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/pagedaide.css">
		<link rel="stylesheet" href="public/css/base-header-sans-bouton.css">
		<link rel="stylesheet" href="public/css/footer.css">
		<title>Page d'aide</title>
	</head>
	<body>
		<?php include("vues/v_base-header-sans-bouton-deconnexion.php"); ?>
		<nav>
			<a href="index.php" class="Onglet">Retour</a>
		</nav>		
		
		<section class= "overall">
			<section class= "right">
			<article class="articlea">
				<div class="titre"> F.A.Q.</div><br/><!-- Titre dans le bandeau rouge-->
				<div class="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
					<?php 	include ("modeles/m_faq.php");
						$question = afficher_question();
						$reponse = afficher_reponse();
						for ($i=0;$i<sizeof($question);$i++){
							$question_reponse[$i] = $question[$i]."</br>".$reponse[$i];
						} 
						foreach ($question_reponse as $element){
							echo "</br>".$element."</br>";
						}
						echo "</br>";
			               	?>

				</div>
			</article>
			<a href="" class="boutonb">Voir le tutoriel</a>
			</section>
			
			<section class= "right">
			<article class="articleb">
				<div class="titre"> Nos coordonnées :</div><br/><!-- Titre dans le bandeau rouge-->
				<div class="corps2"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
					<p><strong>Téléphone : </strong>06 59 91 80 18 &ensp;&ensp;&ensp;&ensp;                                       <strong>Adresse :</strong> 10, rue de Vanves Issy-les-Moulineaux (92130)</p>
				</div>
			</article>

			<article class="articlec">
			<div class="titre"> Contactez-nous :</div><br/><!-- Titre dans le bandeau rouge-->
			<form action="index.php?target=aide_message" method="post">
			<section class="form">
			<label for="prenom"><strong>Prénom&ensp;</strong></label> <input class="input" type="text" name="prenom" required>&ensp;&ensp;&ensp;&ensp;
			<label for="nom"><strong>Nom&ensp;</strong></label> <input class="input" type="text" name="nom" required><br/>
			<p><label for="mail"><strong>Adresse Mail&ensp;</strong></label> <input class="input" type="email" name="mail" required><br/></p>
			<p><strong class="vmessage">Votre message</strong></p>
			<textarea class="inputm" name="message" rows='8' cols='60' required></textarea><br/> 

			<?php if ($_GET['target']=='aide_message_envoyé')
			{
				echo "Votre message a bien été envoyé !";
			}
			?>

			<?php if ($_GET['target']=='aide_message_bug')
			{
				echo "Erreur ! Veuillez contacter directement hoikosg4c@gmail.com";
			}
			?>

			<input class="boutonc" type="submit" value="Envoyer">
			</section>
			</form>
			</article>

		</section>
		</section>
		
		<?php include("vues/v_footer.php"); ?>
		
	</body>
</html>

