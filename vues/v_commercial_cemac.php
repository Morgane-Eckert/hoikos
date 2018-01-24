<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/page_commercial.css">
        <link rel="stylesheet" href="public/css/footer.css">
	</head>
	<body>
		<?php include("vues/v_header_bouton.php"); ?>
		<nav>
            <a href="index.php?target=compte&action=connecte&reaction=cemac" class="Onglet">CeMac</a>
        </nav>
        <section class="section">
            <article class="article_etroit">
                    <div id="corps">
                            <?php 
                            if (isset($_GET['anticipation'])){
                                if ($_GET['anticipation']=='nouveau_cemac'){
                                    echo "<p class='message'>Le nouveau cemac a bien été ajouté.</p>";
                                }
                            }
                            ?>
                            <form method="post" action="index.php?target=compte&action=connecte&reaction=nouveau_cemac">
                                <fieldset>
                                    <legend><div class='sous-titre'>Ajouter un CeMac : </div></legend><br>
                                    <label>Numéro client du nouveau CeMac : </label><br/>
                                    <input type="text" name="numero_cemac" maxlength='5' required />
                                    <input type='submit' value='Valider' class='editer' id='bouton'>
                                </fieldset>
                            </form>               
                    </div>
			</article>
		</section>
        <?php include("vues/v_footer.php"); ?>
	</body>
</html>