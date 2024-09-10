<?php

// template : détail d'une évaluation faite par un utilisateur (l'utilisateur 'user' a donné la note 'note' au produit 'produit')
// parametres: $listEval

// je récupère l'utilisateur connecté () include "templates/fragments/div_user_connected.php";)

// je récupère le produit
//$produit = $evaluaiton ->getTarget("produit");
// je récupère la note
//$note = $evaluation-> get("note");


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des évaluations</title>

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <h1> Liste des évaluations </h1>

        <?php 
            include "templates/fragments/div_user_connected.php";
        ?>

    <h2>Voici la liste de vos évaluations: </h2> <!-- 'client' affiche le nom du client (php)-->
<!-- pour chaque évaluation-->

    <?php
    // Pour chaque evaluation: 
    foreach ($listEval as $id => $evaluation) {

        // Afficher la DIV :  div_detail_eval.php
        // il faut lui préparer son parametre $evaluation (object evaluation à afficher : fait)
       include "templates/fragments/div_detail_eval.php";
    }
    ?>
  
              <a href="afficher_liste_produits.php"><button>revenir à la liste des produits</button> </a> <br> <br>
              

</body>
</html>


