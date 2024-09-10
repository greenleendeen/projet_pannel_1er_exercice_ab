<?php
/*

Template de page complète : la page d'accueil de l'utilisateur connecté avec les liens vers d'autres pages
Paramètres :
   néant
    
*/ 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page d'accueil</title>

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <h1> Accueil </h1>

    <?php 
            include "templates/fragments/div_user_connected.php";
        ?>

    <h2> Bonjour, vous pouvez évaluer nos produits. </h2> <!-- 'client' affiche le nom du client (php)-->

              <a href="afficher_liste_produits.php"><button>voir la liste des produits</button> </a> <br> <br>
              <a href="afficher_liste_evales.php"><button> voir mes évaluations</button> </a> 
 

</body>
</html>