<?php
/*

Template de page complète : page qui affiche la note donnée à un produit

Paramètres :
    $evaluation: objet evaluation (une note) 

*/ 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage note</title>

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <h1>Note donnée à un produit </h1>
    
    <div class="affiche">

    <?php 

    include "templates/fragments/div_user_connected.php";

    ?>
        
        <h2> Vous avez noté le produit: <?= $evaluation->getTarget("produit")->get("nomprod")?> </h2>
        <h2>  ID evale:<?= $evaluation->id() ?>  </h2>
        <h2> la note que vous avez attribué est: <?= $evaluation->get("note")?> </h2> <br> <br>
        <h2>Merci pour votre participation!</h2>


    </div>


    <a href="afficher_liste_produits.php"><button>revenir à la liste</button></a>
    <a href="form_modif_note.php"><button>modifier ma note</button></a>

    

    </body>
</html>