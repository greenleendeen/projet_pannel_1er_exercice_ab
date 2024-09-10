<?php
/*

Code à inclure dans les controleurs qui ont besoin de la connexion (juste après include de init.php)

*/


// Si on n'est pas connecté : rediriger / afficher le formulaire de connexion
if ( ! session_isconnected()) {
    
    include "templates/pages/formulaire_connexion.php";
    exit;
}
else {
    $user = session_userconnected();
}