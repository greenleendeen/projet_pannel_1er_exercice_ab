<?php
/*

Template de page complète :  formulaire pour noter un produit

Paramètres :
    $produit: l'objet produit qui est noté (par l'utilisateur connecté $user)
    
*/ 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire de notation</title>

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <h1>Evaluation d'un produit</h1>

    <?php 
    include "templates/fragments/div_user_connected.php";
    ?>

    <h2>Produit noté: <?= $produit->get("nomprod")?></h2>
    <h2>Note actuelle:<?= $produit->get("note") ?></h2>
    
   <!--FORMULAIRE -->
   <form method= "POST" action= "enregistrer_note.php?idProduit=<?= $produit->id() ?>" class= "affiche ">

        <?php 
            include "templates/fragments/div_form_note.php";
        ?>
        
    </form>
        <a href="afficher_liste_produits.php"><button>revenir à la liste</button></a>

</body>
</html>