<?php
/*
Controleur : génère la liste des produits
Paramètres : néant

*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

// récupération / analyse des paramètres : néant

// création de l'objet produit pour lui demander la liste des produits

echo "coucou";

$produit = new produit();

// on lui demande la liste
$listeProduits = $produit ->listAll();


// Affichage de la liste : template de page : accueil_liste_produits.php
include "templates/pages/accueil_liste_produits.php";