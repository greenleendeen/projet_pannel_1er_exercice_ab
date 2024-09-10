<?php
/*

Template de page complète : la page avec le détail d'un produit
Paramètres :
   $produit : objet produit avec ses détails à afficher (nom, description, prix, note)

*/ 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail produit</title>

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <h1> Détail d'un produit </h1>
    <?php 
    include "templates/fragments/div_user_connected.php";
    ?>

<div class="affiche flex spaceBetween">

<a href="afficher_detail_produit.php?id=<?= $produit->id()?>"> 
    <p> <strong> <?= $produit->get("nomprod")?></p> </strong></p> 
    <p>description: <?= $produit->get ("description")?></p> <br>   
    <p>prix: <?= $produit->get("prix")?></p> <br> 
   
    <p>la note moyenne: <?= $produit->getMoyenne()?></p> <br> 
   
    <a href="afficher_form_note.php?id=<?= $produit->id()?>"> <button>noter ce produit </button> </a> 
    
    <a href="modifier_note.php?id=<?= $produit->id()?>"> <button> modifier ma note</button>  </a>
       

        
</div>



    
</body>
</html>