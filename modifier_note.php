<?php
/*
Controleur: affiche le formulaire de modification d'une note (une évaluation ) déjà donnée  à un produit

Paramètres : le id de l'évaluation:  get idEval              
*/

// initialisation
require_once "utils/init.php";
//verification si user connecté
require_once "utils/verif_connexion.php";

//echo $user->id();

/**
 * Récupération des paramètres
 */

// récupérer l'evaluation avec son id ( les  champs produit, user et note)
// récupération dans le tableau $_GET de l'index "id" qui sera mis dans la variable $idEval

if (isset($_GET["id"])) {

    $idEval = $_GET["id"];
} else {
    $idEval = 0;
}
echo "l'id de l'évaluation' est $idEval <br> <br>";

/**
 * Traitement à réaliser sur la BDD
 */

//objet evaluation
$evaluation = new evaluation();

// charger avec le id prévu: (load($id): chargement d'un objet depuis la BDD par son id)
$evaluation->load($idEval);
print_r($evaluation);

// SI déja évalué : cad si l'évaluation vient de la BDD
if ($evaluation->is()) {

    // Formulaire de modification 
    // On a $evaluation
    // On inclut le template
    include "templates/pages/form_modif_note.php";
    echo "vous pouvez modifier votre note";
} else {
    // Si pas évalué :
    // Formulaire d'évaluation
    // On a $evaluation
    // On inclut le template
    include "templates/pages/form_note.php";
    echo "vous n'avez pas encore noté ce produit ";
}

/**
 * Affichage
 */

//affichage formulaire modification note
 //include "templates/pages/form_modif_note.php";
