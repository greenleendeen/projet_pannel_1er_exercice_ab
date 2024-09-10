<?php
/*

Template de page complète : affiche une liste de produits sous forme d'une table html ayant les colonnes "description" et prix" 
Paramètres :
    $liste: tableau d’objets (de la classe "produit" indexes par leur id) à afficher
    
*/ 

// faire le test unitaire avec le controloeur de test de ce template
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>liste des produits</title>

    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
    <h1> Liste des produits </h1>    

<table class="" >
    <thead >
        <tr>
            <th scope="col"> <strong> Nom du produit</strong> </th>
            <th scope="col"> <strong> Description</strong> </th>
            <th scope="col"> <strong> Prix </strong> </th>
        </tr>
    </thead>


    <?php 

    // pour chaque produit de la liste - afficher la ligne: 

    foreach($liste as $id=> $produit ) { 
     ?>

    <tbody>
        <tr>
            <th scope="row" ><?= $produit->get("nomprod")?></th>
            <td><?= $produit->get ("description")?></td>
            <td ><?= $produit->get("prix")?></td>
        </tr>
    
    </tbody>
   
    <?php
    } 
    ?>

</table>
   
 

</body>
</html>