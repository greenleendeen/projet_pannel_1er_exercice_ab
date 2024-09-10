<?php
/*
    Controleur :Récupère la nouvelle note et l'enregistre dans la bdd (met à jour la bdd) affiche la page note actualisée

    Parametres: POST : $note :la nouvelle note donnée au produit 
                 ID de l’évaluation à actualiser (GET : id)

/**
 * Initialisation
 */
require_once "utils/init.php";

// verifier si l'user est connecté 
require_once "utils/verif_connexion.php";

/**
* Récupération des paramètres
*/
// le id de l'évaluation:
if(isset($_GET["id"])) {
    
    $idEval=$_GET["id"];
}else {
   $idEval=0;
  
}
echo "vous modifiez l'evale $idEval" ;
echo "<br>";

//objet evaluation
$evaluation = new evaluation();

// charger avec le id prévu:
$evaluation->load($idEval);
//print_r ($evaluation);

// si l'evalaution n'existe pas
 if (! $evaluation ->is()) {
    echo "$idEval'existe pas";
    //on ne peut pas modifier
    exit;
 }
// la nouvelle note  dans le formulaire

// si il accèpte les nouvelles valeurs
if ($evaluation->loadFromTab($_POST)) {

    // la bdd est actualisée
    $evaluation->update();

// affiche la page 
    include "templates/pages/note.php";
}  else {
    // si la valeur est refusée, message d'erreur // ou formulaire
    //include "templates/pages/form_modif_appartement.php";
    echo "erreur";
    exit; 
}
    


 