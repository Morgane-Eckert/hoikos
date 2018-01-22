<?php
session_start();
include("chercher_logement.php");

function bdd(){
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=hoikos;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
  return $bdd;
}

function recupererTRAME($team){
    $ch = curl_init();
    curl_setopt(
            $ch,
            CURLOPT_URL,
            "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=".$team);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
    return $data;
  }

  function analyserTRAME($data){
      $data_tab = str_split($data, 33);
      $donnees = array();
      for($i=0, $size=count($data_tab); $i<$size; $i++){
        #echo "Trame $i: $data_tab[$i]<br/>";
        list($t, $o, $r, $c, $n, $v, $a, $x, $année, $mois, $jours, $heure, $min, $sec) =
              sscanf($data_tab[$i],"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        if($r==1){
          $donnees = "C'est une valeur reçue du capteur ".$a.", ";
        } else {
          $donnees = "C'est un ordre envoyé à l'actionneur ".$a.", ";
        }
        if($t==0){
          $donnees = " c'est à taille variable";
        } else {
          $donnees = " taille de 33bits ";
          if($c==3){
            $v = (int)$v;
            $v = $v/10;
            $donnees = 'Température '.$v.'°C enregistré le '.$jours.'/'.$mois.'/'.$année.' à '.$heure.'h '.$min.'m '.$sec.'s <br/><br/>';
          } elseif($c==4){
            $v = (int)$v;
            $donnees = 'Humidité '.$v.'% enregistré le '.$jours.'/'.$mois.'/'.$année.' à '.$heure.'h '.$min.'m '.$sec.'s <br/><br/>';
          } elseif($c==5) {
            $v = (int)$v;
                if($v=1111){
                $donnees = 'La lumière vient d\'être allumé le '.$jours.'/'.$mois.'/'.$année.' à '.$heure.'h '.$min.'m '.$sec.'s <br/><br/>';
              } else {
                $donnees = 'La lumière vient d\'être allumé le '.$jours.'/'.$mois.'/'.$année.' à '.$heure.'h '.$min.'m '.$sec.'s <br/><br/>';
              }
          } elseif ($c==1) {
            $donnees = 'Capteur de distance de modèle 1: '.$v.' enregistré le '.$jours.'/'.$mois.'/'.$année.' à '.$heure.'h '.$min.'m '.$sec.'s <br/><br/>';
          } elseif ($c==2) {
            $donnees = 'Capteur de distance de modèle 2: '.$v.' enregistré le '.$jours.'/'.$mois.'/'.$année.' à '.$heure.'h '.$min.'m '.$sec.'s <br/><br/>';
          } elseif ($c==6) {
            $donnees = 'Capteur de couleur: '.$v.' enregistré le '.$jours.'/'.$mois.'/'.$année.' à '.$heure.'h '.$min.'m '.$sec.'s <br/><br/>';
          } elseif ($c==7) {
            $donnees = 'Capteur de présence: '.$v.' enregistré le '.$jours.'/'.$mois.'/'.$année.' à '.$heure.'h '.$min.'m '.$sec.'s <br/><br/>';
          }
        }
      }
      return $donnees;
    }

    function genererTRAME($ordre,$c){
      $t = '1';
      $o = '0000';
      $r = '2';
      $v = '00'.$ordre;
      $x = '00';
      $n = '00';
      $a = '0000';
      $date = date("YmdHis");
      $trame = $t. $o. $r.$c. $n. $v. $a. $x. $date;

      return $trame;
    }


if(isset($_GET['capteur'])){
  include("afficher_capteur.php");
} elseif(isset($_GET["donnees"])){
  include("m_ordre.php");
}


?>
