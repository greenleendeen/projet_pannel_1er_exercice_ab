<?php

// Fragment de l'en-tête affichant l'utilisateur connecté ou un bouton pour se connecter
// Paramètres : néant

if (session_isconnected()) {
    ?>
    <div class="user">
        <h2> utilisateur: <?= session_userconnected()->get("nom") ?></h2>
    </div>
<?php } else { ?>
    <a href="afficher_formulaire_connexion.php" class="button">Se connecter</a>
<?php } ?>