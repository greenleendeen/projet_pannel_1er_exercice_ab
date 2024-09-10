<?php

/*
Controleur de test :  affiche le template fragment pour une évaluation
Paramètres : $eval : objet evaluation
             $withUser (true pour afficher le nom de l'utilisateur - par defaut, false sinon)   
*/

/* affiche une évaluation :
- nom du produit
- nom de l'utilisateur ayant évalué si l'option "withUser" vaut true
- note sous la forme de points
*/

// Initalisations
include "utils/init.php";


// récupération des paramertes et vérification
    // le id fourni ou 0 si il n'y a pas de id
    // vérifie si l'index "id" existe dans le tableau $_GET
    if(isset($_GET["id"])) {
    // récupération dans le tableau $_GET de l'index "id" -> dans la variable 
    $idEval=$_GET["id"];
    }else {
    $idEval=0;
    }
    echo "l'id eval est $idEval <br> <br>" ;
    //ok

/** triatement */
// créer l'objet evaluation:
$evaluation = new evaluation;

// appeller la méthode  load(id)
$evaluation-> load($idEval); 

//print_r ($evaluation);


// SI déja évalué : si l'évaluation existe dans la BDD
if ($evaluation->is()) {

// récupère le détail de l'évaluation
//echo "voici  l'eval:";

$note = $evaluation->get("note");
    echo "la note est: $note";



// affiche le fragment avec la note
include "templates/fragments/div_eval_produit.php";
//echo "ce produit a été déjà évalué par $user ";

} 