<?php 
include ('modeles/m_commercial.php');

function commercial_cemac(){
    include ('vues/v_commercial_cemac.php');
}

function nouveau_cemac2($nom_nouveau_type_de_salle){
    $affectedLines = nouveau_cemac($_POST['numero_cemac']);
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le nouveau cemac !');
    } else{
        header("Location: index.php?target=compte&action=connecte&reaction=cemac&anticipation=nouveau_cemac");
    }
}
?>