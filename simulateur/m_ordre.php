<?php
        try
        {
          $bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }


        $reponse = $bdd->prepare("SELECT * FROM capteur WHERE id_logement = :id");
        $reponse->execute(array(
          'id' => $_SESSION["id_logement"],
        ));

        $i = 0;

        while ($donnees = $reponse->fetch()){
          $table_capteur[] = $donnees['nom_capteur'];
          $table_ordre_capteur[$i] = $donnees['donnee_envoyee_capteur'];
          $table_valeur_capteur[$i] = $donnees['donnee_recue_capteur'];
          $table_id_capteur[$i] = $donnees['ID_capteur'];
          $table_type[$i] = $donnees["ID_type_de_capteur"];
          $i = $i+1;
        }

        $i=0;
        foreach ($table_capteur as $element) {
          $valeur = $_POST[$table_id_capteur[$i]];

          #$valeur = genererTRAME($_POST[$table_id_capteur[$i]],$table_type[$i]);
          $req = $bdd->prepare("INSERT INTO donnees_capteur(ID_capteur,donnee_envoyee_donnees,donnee_recue_donnees) VALUES(:id,:o,:valeur)");
          $req->execute(array(
           'id'=> $table_id_capteur[$i],
           'o'=>NULL,
            'valeur'=>$valeur
          ));

        #  echo $valeur;
        #  echo $table_id_capteur[$i];
        #  echo $_POST['etat'.$table_id_capteur[$i]]."<br/>";
          $req = $bdd->prepare('UPDATE capteur SET etat_capteur = :nvnomrue, donnee_recue_capteur = :nvville WHERE ID_capteur = :id');
        	$req->execute(array(
        		'nvnomrue' => $_POST["etat".$table_id_capteur[$i]],
        		'nvville' => $valeur,
        		'id' => $table_id_capteur[$i],
        	));
          #$update = $bdd->prepare("UPDATE capteur SET etat_capteur = :etat, donnee_recue_capteur = :valeur WHERE ID_capteur = :id)");
          #$update->execute(array(
          #  'etat'=>$_POST['etat'.$table_id_capteur[$i]],
          #  'valeur'=>$valeur,
          #  'id'=>$table_id_capteur[$i]
          #));
          $i=$i+1;
        }
      header("Location:index.php?capteur");


?>
