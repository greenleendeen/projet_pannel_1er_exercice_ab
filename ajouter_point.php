<?php
/*
    Controleur : ajouter un point à une évaluation si le nombre des points est strictement inférieure à 5

    Parametres: id de l'évaluation (reçu en GET: clé primaire de l'evaluation concernée)       
*/

/**
 * Initialisation
 */

require_once "utils/init.php";

// vérification / Récupération des paramètres  

if(isset($_GET["id"])) {
    // récupération dans le tableau $_GET de l'index "id" -> dans la variable $idEval
    $idEval=$_GET["id"];
}else {
    $idEval=0;
}
echo "l'id evaluation est $idEval <br> <br>" ;

/** 
 * traitement
*/ 

// récupérer la ligne de l'évaluation avec le id donné
        $evaluation = new evaluation();
        $evaluation-> load($idEval);
        if(! $evaluation->is()){
            // appelle la function is() dont le rôle est de dire si l'objet est chargé (si il y cette evale dans la BDD )
            echo "pas d'évale";
        }
       // print_r ($evaluation); echo" <br>";

// récupérer la valeur du champ 'note': avec la méthode 'get(nomChamp)' : récupération de la valeur d'un champ 

                // vérifier que ce champ ne soit pas vide (!null)

$note= $evaluation -> get("note");
echo"la note est $note <br>";

// si la valeur dans le champ 'note' est <5 
if ($note < 5 ){
    $note++;



    echo "nouvelle note est $note";
} else {
    echo "cette note ne peut pas être changée";
}


// ajouter 1 point à cette valeur
// mettre à jour la bdd (sql update) ($sql = SELECT * FROM `evaluation` WHERE `note` < 5 )



// affichage
