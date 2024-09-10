<?php

/*
Controleur de test :   affiche le template_liste une table avec une liste des produits
Paramètres : neant
*/

// Initalisations
include "utils/init.php";

// récupération / analyse des paramètres : néant

// création de l'objet produit pour lui demander la liste des produits

echo "coucou";

$produit = new produit();

// on lui demande la liste
$liste = $produit ->listAll();

// Affichage de la liste : template de page : accueil_liste_produits.php
include "exercices/template_liste.php";

