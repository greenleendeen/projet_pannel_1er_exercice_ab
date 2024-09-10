<?php
/*

Template de page complète :  formulaire pour modifier la note d'un produit

Paramètres :
      le id de l'évaluation à modifier (get:id)
*/ 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification note</title>

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <h1>Modification d'une note</h1>
    <h3> Vous avez déjà évalué ce produit, vous pouvez modifier votre note, si vous le souhaietez</h3>

     <!-- Fragment de l'en-tête affichant l'utilisateur connecté ou un bouton pour se connecter-->
    <?php 
        include "templates/fragments/div_user_connected.php";
    ?>
    
    <h2>Produit noté: <?= $evaluation->getTarget("produit")->get("nomprod")?></h2>
    <h2>Note actuelle:<?= $evaluation->get("note") ?></h2>
    
   <!--FORMULAIRE -->
   <form method="POST" action="enregistrer_modif_note.php?id=<?= $evaluation->id()?>">
        
        <!-- Fragment formulaire note-->
        <?php 
                include "templates/fragments/div_form_note.php";  
            ?>
   </form>
    <a href="afficher_liste_produits.php"><button>revenir à la liste</button></a>


</body>