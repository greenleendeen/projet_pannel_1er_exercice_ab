<?php
/*

Template de page complète : page d'identification avec le formulaire de connexion au compte personnel de l'utilisateur

Paramètres :
    $user : objet user (adherent) non chargé

*/ 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire de connexion</title>

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <h1> CONNEXION </h1>

    <h2> Bonjour, pour continuer, identifiez vous</h2>

    <div class="affiche">
            <form action="connecter_user.php" method="POST">
            <div>
                <label for="login">votre adresse email:</label>
                <input type="text" id="login" name="login" required /> <br> <br>
            </div>

            <div>
                <label for="motdepasse">votre mot de passe:</label>
                <input type="password" id="motdepasse" name="motdepasse" required /> <br> <br>
            </div>

            
                <input type="submit" value="se connecter" />
            </form>
        </div>
    
</body>
</html>