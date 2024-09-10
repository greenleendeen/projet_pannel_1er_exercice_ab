<?php

// template de fragment: met en forme une evaluation
// Parametres:   $eval objet évaluation
//               $withUser : true pour afficher le nom de l'utilisateur, false sinon


//$evaluation = $produit->getTarget("produit");
//$note = $eval->get("note");

?>

<link rel="stylesheet" href="/css/style.css">
<div class= "affiche "> 

<table class="" >
    <thead >
        <tr>
            <th scope="col"> <strong> Evaluation N°:</strong> </th>
            <th scope="col"> <strong>  Evalué par:</strong> </th>
            <th scope="col"> <strong> Nom du produit:</strong> </th>
            <th scope="col"> <strong> Note: </strong> </th>
            <th scope="col"> <strong> Points: </strong> </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row" ><?= $evaluation->id()?> </th>
            <td><?= $evaluation->getTarget("user")-> get ("nom") ?></td>
            <td ><?= $evaluation->getTarget ("produit")->get("nomprod")?></td>
            <td> <?= $evaluation->get("note") ?></td>

            <!-- l'affichage de la note avec des points -->
        <td> <div class= " flex spaceBetween"> 
                   <?php      // récuperer la note dans l'évaluation
        $note = $evaluation->get("note");
        echo " la note du produit est : $note"; echo "<br> <br>";

        $pointVide = '&#9898;';
        $pointPlein ='&#9899;';

     //Initialiser un tableau vide
     $tableau= array();
     //récupérer la note
     $note= $evaluation->get("note");

            // partir de 0; remplir avec des points pleins jusqu'à la valeur de la note
            $case=0;
            for ($case=0; $case < $note; $case++) {
                $tableau[$case] = $pointPlein;

            }
        // ajouter des points vides pour arriver à 5
            for ($case=$note; $case < 5; $case++) {
                $tableau[$case]= $pointVide;
            }

            // remplir chaque champ du tableau avec sa valeur (point plein ou point vide)
            foreach($tableau as $champ => $value) {
                echo "\t".$value."\n"  ; 

                
            }  ?>

                </div>
            </td>
        </tr>
    
    </tbody>
    <br><br>
   
 
</table>
 <br><br>


 <a href="modifier_note.php?id=<?= $evaluation->getTarget("produit")->id()?>"> <button>modifier ma note </button> </a>
 </div>



<?php 

    // //// version 2...
/*
    // je commence avec 0 cases et la note; tant que le numéro de cases est < que la note, j'ajoute un point plein. 
    $case = 0;
    for ($case = 0; $case < $note; $case++) {
        echo   "\t " .$pointPlein. "\n"  ;
    }
    //il y a 5 points dans une note
    $points =5;

    // il reste à ajouter les cases manquantes en points vides - si besoin  x -= y 	x = x - y 
    if($points -= $note ) {
// echo $points; echo "<br><br>";
echo $pointVide ; echo "<br><br>";
 }
*/
////

?>

