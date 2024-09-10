<?php
/*
Controleur: vérifie si l'utilisateur est connecté. 
    si connecté: il affiche la page d'accueil de l'utilisateur avec la liste des produits à évaluer. 
    si pas connecté il affiche le formulaire de connexion
parametres: néant

*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

// verification de la connexion : function session_isconnected() 
//avec le rôle de donner l'objet correspondant à l'utilisateur connecté et  le retour: un objet de la calsse qui gère les utilisateurs de l'application

// Si on n'est pas connecté : rediriger / afficher le formulaire de connexion
if ( ! session_isconnected()) {
    include "templates/pages/formulaire_connexion.php";
    exit;
} else {
    include "templates/pages/accueil.php";
}
