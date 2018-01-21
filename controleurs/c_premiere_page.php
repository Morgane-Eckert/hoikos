<?php
function afficher_premiere_page(){
	include ('vues/v_premiere_page.php');
}

function deconnexion(){
    session_unset();
    session_destroy();
}
?>