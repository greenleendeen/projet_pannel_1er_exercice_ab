<?php
/*
    Controleur :  // crée une nouvelle ligne d'évaluation (enregistre la note, le user et le produirt(par leur id) dans la bdd avec un nouvel ID) et permet l'affichage de la note sur la page 'note' // liste des produits...
   
    Parametres: POST $note: la note donnée au produit 
                ID du produit (GET : id)
              


** verifier si user connecté pour récupérer son id
** récupérer le id produit noté  ($_GET['idProduit']);
** créer une nouvelle évaluation (attribuer) un id à l'évaluation 
** enregistrer la note dans la bdd (insert) avec la function creerEval()
    // Rôle : créer une évaluation et mettre à jour la BDD

    ** afficher la note sur la page note.php

*/

/**
 * Initialisation
 */
// include du programme d'intialistion
require_once "utils/init.php";

// verifier si l'user es connecté 
require_once "utils/verif_connexion.php";


/**
 * Récupération des paramètres
 */
//Récupérer l'id du produit passé en GET et la note passé dans le formulaire en POST
 if(isset($_GET['idProduit']) && isset($_POST['note'])) {
    //echo $_GET['idProduit'] . " " . $_POST['note'];
    $idProduit = $_GET['idProduit'];
    $note = $_POST['note'];
 }

/**
 * Traitement à réaliser
 */
//Créer un objet évaluation
$evaluation = new evaluation();

//On appelle la méthode creerEval pour enregistrer notre évaluation
$evaluation->creerEval($user->id(),$idProduit,$note);

//print_r($evaluation);

////ça marche..


/**
 * Affichage
 */
//print_r($evaluation);
include "templates/pages/note.php";
