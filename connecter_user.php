<?php
/*
Controleur : Valide l’identification et affiche la liste des produits à noter 
            OU affiche le formulaire de connexion si l'identification n'est pas reussie
parametres: néant

** après la validation de l’identification ce controleur charge la page d'accueil personnelle de l'utilisateur

*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";
    
    /*identifiant et mot de passe pour les tests
        $id = 2;
        $login_valide = "duchamp@gmail.com";
        $motdepasse_valide = "password2";*/

// verification des données insérées dans le input : si les valeurs ne sont pas nulles
    if(isset($_POST['login']) && isset($_POST['motdepasse'])) {

    // vérifie si les données login et mot de passe sont corrècts.  j'appelle la fonction verifier_connexion() dans user.php

    // création de l'objet user pour recupérer les données 
    $user=new user();

    // met dans $reponse ce qui a été posté dans le input (formulaire)
    $reponse = $user->verifier_connexion($_POST['login'],$_POST['motdepasse']);

    // si l'idenetnification est corecte, commence la session et affiche la page d'accueil
    if($reponse === true) {
        session_connect($user->id());
        include "templates/pages/accueil.php";
        exit;
    }
    else {
        // si idenetnification incorrecte: message d'erreur
        include "templates/pages/formulaire_connexion.php";
        echo 'vous devez vous connecter';
        exit;
    }

}

else {
    // si idenetnification incorrecte: message d'erreur
    include "templates/pages/formulaire_connexion.php";
    exit;
}






    // Rôle : connecter un utilisateur
// verification de la connexion : function session_isconnected() 
//avec le rôle de donner l'objet correspondant à l'utilisateur connecté et retourne un objet de la calsse qui gère les utilisateurs de l'application

// Si on n'est pas connecté : rediriger / afficher le formulaire de connexion

/*function session_activation() {
    // Rôle : active le mécanisme de session
    */
  
/*
// Si on n'est pas connecté : rediriger / afficher le formulaire de connexion
if ( ! session_isconnected()) {
    include "templates/pages/formulaire_connexion.php";
    echo "coucou";
    exit;
} 
else {
// si on est connecté affiche la liste des produits à évaluer

echo "chargé";

}

*/
    

/* function session_connect($id) {
    // Rôle : connecter un utilisateur
    */



// récupération et analyse les parametres (?l'id de l'adhérent pour afficher sa page personnelle?)

// création de l'objet $produit pour lui demander la liste des produits
/*
echo "coucou";

$produit = new produit();

// on lui demande la liste
$listeProduits = $produit ->listAll();

include "templates/pages/accueil_liste_produits.php";

//$user=new user();

*/

/*
if($login_valide == $_POST['login'] && $motdepasse_valide == $_POST['motdepasse']) {
    // demarer la session

    session_connect($id);

    // enregistrer les parametres de session
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['motdepasse'] = $_POST['motdepasse'];
    

    echo 'connecté en tant que ' .$_SESSION['login'] . '<br />';
    include "templates/pages/accueil.php";
    
} else {
    // si idenetnification incorrecte: message d'erreur
    include "templates/pages/formulaire_connexion.php";
    echo 'vous devez vous connecter';
} */
