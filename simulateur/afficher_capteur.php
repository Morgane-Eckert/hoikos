<?php
if(!isset($_SESSION["email"])){
$_SESSION['email'] = $_POST['email'];
} else {
  echo "MAJ des valeurs";
}
$bdd = bdd();
$reponse = $bdd->prepare("SELECT * FROM utilisateur WHERE adresse_mail_utilisateur = :email");
$reponse->execute(array(
  'email' => $_SESSION['email'],
));

$c = 0;
while ($donnees = $reponse->fetch()){
$id_logement = $donnees['ID_logement'];
$c = 1;
}

if($c==1){
$reponse = $bdd->prepare("SELECT * FROM capteur WHERE id_logement = :id");
$reponse->execute(array(
  'id' => $id_logement,
));
$_SESSION["id_logement"] = $id_logement;
$i = 0;

while ($donnees = $reponse->fetch()){
  $table_capteur[] = $donnees['nom_capteur'];
  $table_ordre_capteur[$i] = $donnees['donnee_envoyee_capteur'];
  $table_valeur_capteur[$i] = $donnees['donnee_recue_capteur'];
  $table_id_capteur[$i] = $donnees['ID_capteur'];
  $table_salle[$i] = $donnees["nom_salle"];
  $table_etat[$i] = $donnees["ID_etat_capteur"];
  $table_type_capteur[$i] = $donnees["ID_type_de_capteur"];
  $i = $i+1;
}
} else {
  echo "L'email n'est pas dans la bdd";
}

$reponse->closeCursor();


?>
<form method="post" action="index.php?donnees">
<?php
$i= 0;
foreach ($table_capteur as $element) {
  #$table_ordre_capteur[$i] = analyserTRAME($table_ordre_capteur[$i]);
  #$table_valeur_capteur[$i] = analyserTRAME($table_valeur_capteur[$i]);
  if($table_type_capteur[$i]==4){

  echo "Capteur d'Humidité dans la salle ".$table_salle[$i];
  ?>
  <input type="range" name="ordre" min="0" max="30" onchange="afficher(this.value,<?php echo $table_id_capteur[$i];?>);" value="<?php echo $table_valeur_capteur[$i];?>">
  <input type="text"  name ="<?php echo $table_id_capteur[$i];?>" id = "<?php echo $table_id_capteur[$i];?>" size='2' value="<?php echo $table_valeur_capteur[$i];?>">&nbsp;%&nbsp;
  <?php
} elseif ($table_type_capteur[$i]==3) {
  echo "Capteur de Température dans la salle ".$table_salle[$i];
  ?>
  <input type="range" name="ordre" min="0" max="30" onchange="afficher(this.value,<?php echo $table_id_capteur[$i];?>);" value="<?php echo $table_valeur_capteur[$i];?>">
  <input type="text" name ="<?php echo $table_id_capteur[$i];?>" id = "<?php echo $table_id_capteur[$i];?>" size='2' value="<?php echo $table_valeur_capteur[$i];?>">&nbsp;°C&nbsp;
  <?php
} else {
  if($table_type_capteur[$i]==1||$table_id_capteur[$i]==2){
     echo "Capteur de Distance dans la salle ".$table_salle[$i];
  } elseif($table_type_capteur[$i]==5){
     echo "Capteur de Lumière dans la salle ".$table_salle[$i];
  } elseif($table_type_capteur[$i]==6){
     echo "Capteur de Couleur dans la salle ".$table_salle[$i];
  } elseif($table_type_capteur[$i]==7){
     echo "Capteur de Présence dans la salle ".$table_salle[$i];
  }
  if($table_valeur_capteur[$i]=="ON"){
  ?>
  <select name = "<?php echo $table_id_capteur[$i];?>" id = "<?php echo $table_id_capteur[$i];?>" required>
      <option value="ON" selected>ON</option>
      <option value="OFF">OFF</option>
  </select>
  <?php
} else{
  ?>
  <select name = "<?php echo $table_id_capteur[$i];?>" id = "<?php echo $table_id_capteur[$i];?>" required>
      <option value="ON">ON</option>
      <option value="OFF" selected>OFF</option>
  </select>
  <?php
}
}
if($table_etat[$i]==1){
?>
  <select name ="etat<?php echo $table_id_capteur[$i];?>" id = "etat<?php echo $table_id_capteur[$i];?>">
    <option value="2">Panne</option>
    <option value="1" selected>En marche</option>
  </select><br><br>
  <?php
}else{
  ?>
  <select name ="etat<?php echo $table_id_capteur[$i];?>" id = "etat<?php echo $table_id_capteur[$i];?>">
    <option value="2" selected>Panne</option>
    <option value="1">En marche</option>
  </select><br><br>
  <?php
}
  $i = $i+1;
}

?>
  <input type='submit' value='Envoyer' id='bouton'>
</form>
<script>
    function afficher(val,id) {
        document.getElementById(id).value=val;
    }
</script>
