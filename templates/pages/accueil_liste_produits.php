<?php
/*

Template de page complète : la page d'accueil de l'utilisateur avec la liste des produits à évaluer
Paramètres :
    $listeProduits : tableau d’objets produits indexes par leur id
    
*/ 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page produits a evaluer</title>

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <h1> Produits à évaluer </h1>

    <!-- Fragment de l'en-tête affichant l'utilisateur connecté ou un bouton pour se connecter-->
    <?php 

    include "templates/fragments/div_user_connected.php";

    ?>

    <!-- ici un foreach-->

    <?php 
    // pour chaque produit de la liste - afficher la div 
    foreach($listeProduits as $id=> $produit ) {
        // affiche la div_detail_produit.php

        include "templates/fragments/div_detail_produit.php";
    }

    ?>
    
    <!--  
     <div class="affiche flex spaceBetween">
              <p> <strong> produit </strong></p> 
              <a href="afficher_detail_produit.php"> voir détail</a> 
              <a href="afficher_form_note.php"> noter ce produit </a> 
              <div class="encadre"> ma note est: 'note' </div>
              <a href="afficher_form_note.php"> modifier ma note </a>  
    </div>  -->

</body>
</html>