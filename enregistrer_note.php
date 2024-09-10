 <?php
/*
    Controleur :  // crée une nouvelle ligne d'évaluation avec id (enregistre la note, le user et le produirt par leur id dans la bdd et affiche la note sur la page 'note' 
   
    Parametres: POST $note: la note donnée au produit 
                ID du produit (dns le post : id)
*/

/**
 * Initialisation
 */
// include du programme d'intialistion
require_once "utils/init.php";

// verifier si l'user est connecté 
require_once "utils/verif_connexion.php";

/**
 * Récupération des paramètres:
 */
    //  la note dans le formulaire
    if (isset($_POST['note'])) {

        $note = $_POST['note'];
        echo $_POST['note'] ;
        echo "<br>";
    }

    // le id du produit (caché) dans le formulaire 
    if (isset ($_POST ['produit'])) {
        $idProduit =$_POST ['produit'];
        echo $_POST['produit'];
        echo "<br>";
    }

//$produit = new produit; 

/**
 * Traitement à réaliser
 */
    //Créer un objet évaluation
    $evaluation = new evaluation();

    //j'appelle la méthode creerEval pour enregistrer cette évaluation
    $evaluation->creerEval($user->id(), $idProduit, $note);
    //$evaluation-> creerEval($user, $produit, $note);

/**
 * Affichage
 */
//print_r($evaluation);
include "templates/pages/note.php";





/*

** verifier si user connecté pour récupérer son id
** récupérer le id produit noté  ($_POST['produit']);
**récupérer la note ($_POST['note'])
** créer une nouvelle évaluation avec id et enregistrer la note dans la bdd (insert) avec la function creerEval()
** afficher la note sur la page note.php

*/






