<?php include("accueil_onglets.php");?>
<!DOCTYPE html>
<html>

	<head>
  	<link rel="stylesheet" href="public/css/consommation.css">
  	<link rel="stylesheet" href="public/css/base-header-sans-bouton.css">
  	<link rel="stylesheet" href="public/css/footer.css">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    <title>Votre Consommation</title>
  </head>
	<body>
    <?php 
            include("vues/v_header_bouton.php");
            //Affichage d'un message d'erreur si un capteur ne fonctionne pas
            list($erreur_capteur,$erreur_salles,$a) = afficher_erreur_capteur();
            for($i=0;$i<$a;$i++){
                echo "<p class='erreur_capteur'>Attention : La fonction ".$erreur_capteur[$i]." de la pièce ".$erreur_salles[$i]." rencontre un dysfonctionnement. <a href='index.php?target=sav' class='lien_message_etat_capteur'>Contactez le SAV en cliquant ici</a>";
            }
        ?>
    <nav>
            <a href="index.php?target=compte&action=connecte&reaction=home" class="Conso">Home</a>
             <?php //Affichage des onglets                
                $onglets = afficher_onglets();
                if ($onglets!=NULL)
                foreach($onglets as $element){//On parcourt le tableau
                    if ($_GET['reaction']==$element){
                    ?>
                        <a href="index.php?target=compte&action=connecte&reaction=<?php echo $element; ?>" class="actuel"> <?php echo $element; ?> </a>
                    <?php
                    } else {
                        ?>
                        <a href="index.php?target=compte&action=connecte&reaction=<?php echo $element; ?>" class="Onglet"> <?php echo $element; ?> </a>
                        <?php
                    }
                }
             ?>
            <a href="index.php?target=compte&action=connecte&reaction=nouvel_onglet" class="nouvel_onglet" id='nouvel_onglet'>+</a>
            <div class="Vide"></div>
            <a href="index.php?target=compte&action=connecte&reaction=consommation" class="actuel">Consommations</a>
            <a href="index.php?target=compte&action=connecte&reaction=profil" class="Conso">Profil</a>
        </nav>
				<section>	
					<article>
						<div id="titre">Consommation du foyer
            </br>
        <form>
          <label for="from">De</label>
          <input type="text" id="from_date" size='10' name="from_date" class="form-control"/>
          <label for="to">à</label>
          <input type="text" id="to_date" size='10' name="to_date" class="form-control"/>
<!-- <button onclick="javascript:randomize();">RANDOM!</button>-->
         <!-- <input type="button" name="date" id="date" value="Date" class="btn btn-info" /> -->
        </form>
            </div> 
                		    <br/><!-- Titre dans le bandeau rouge-->
                 		   <div id="corps"> <!-- Tout ce qu'il y a dans le rectangle blanc-->
              		
                        		        <div class="consommation">
                       	 		             <?php //Affichage des données de consommation
								$donnees=NULL;
                           					list($i,$donnees_recue_donnees) = afficher_consommation_eau();
								     if($i!=0){
                            						foreach($donnees_recue_donnees as $donnees);
								     }
                                        ?>

                             		       <div class = "BoiteVide">
                               		         <span class="Titre"></span><h3 class="Affichage"><?php echo "Votre consommation d'eau s'élève à ".$donnees." "; ?>
                                           </h3>
                               		     </div><br>

                               		       <script>
											       $(document).ready(function(){  
											           $.datepicker.setDefaults({  
											                dateFormat: 'dd-mm-yy'   
											           });  
											           $(function(){  
											                $("#from_date").datepicker();  
											                $("#to_date").datepicker();  
											           });  
											           $('#date').click(function(){  
											                var from_date = $('#from_date').val();  
											                var to_date = $('#to_date').val();  
											                if(from_date != '' && to_date != '')  
											                {  
											                     $.ajax({  
											                          url:"test.php",  
											                          method:"GET",  
											                          data:{from_date:from_date, to_date:to_date},  
											                          success:function afficher_graph_elec(date,statut)  
											                          {  
											                             document.write(statut);
											                          }  
											                     });  
											                }  
											                else  
											                {  
											                     alert("Please Select Date");  
											                }  
											           });  
											      });  
											 
											  </script>
                                                        <div id="mydiv2"><!-- Plotly chart will be drawn inside this DIV --></div>
                                                           <script>
                                                           var trace1 = {
                                                            x: [1, 2, 3, 4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30], 
                                                            y: [10, 15, 13, 17,14,13,12,15,18,17,5,8,7,14,12,10,11,13,16,18,9,6,7,4,12,20,17,14,15,12], 
                                                            type: 'scatter',
                                                            name:'Eau(m3)',
                                                            connectgaps: true
                                                          };
                                                            var data = [trace1];
                                                        var layout = {
                                                        title:"Consommation d'eau "};
                                                        Plotly.newPlot('mydiv2',data,layout);
                                                        </script>
                                                                       		

                    			<div class="consommation"> 
                          		   <?php //Affichage des données de consommation
							$donnees1=NULL;
                                		         list($i,$donnees_recue_donnees1) = afficher_consommation_elec();
							      if($i!=0){
                                  		          foreach($donnees_recue_donnees1 as $donnees1);//On parcourt le tableau
							      }
                                 		         ?>
                    		 		 <div class = "BoiteVide">
                                  		      <span class="Titre"></span><h3 class="Affichage"> <?php echo "Votre consommation d'eau s'élève à ".$donnees."" ; ?>
                                           </h3>
		                                    </div><br>
                                                       
								
											           

                                                      </div>
		                        		 <div id="mydiv">
                                 <script>
                                                           var trace2 = {
                                                            x: [1, 2, 3, 4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30], 
                                                            y: [10, 15, 13, 17,14,13,12,15,18,17,5,8,7,14,12,10,11,13,16,18,9,6,7,4,12,20,17,14,15,12], 
                                                            type: 'scatter',
                                                            name:'Électricité(kWh)',
                                                            connectgaps: true
                                                          };
                                                            var data = [trace2];
                                                        var layout = {
                                                        title:"Consomation d'électricité "};
                                                        Plotly.newPlot('mydiv',data,layout);
                                                        </script>
                                          
                		


				</article>
				</section>

		    <?php include("v_footer.php"); ?>

		</body>
</html>
