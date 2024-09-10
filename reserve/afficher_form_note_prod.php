<?php
/*
    Controleur : génère et affiche le formulaire pour attribuer une note à un produit séléctionné

    Parametres: $ produit :ID du produit noté (GET : id)
              

** avant de donner la note, le controleur doit vérifier si l'utilisateur est connecté avec require_once "utils/verif_connexion.php";

*/

// initialisation

require_once "utils/init.php";
//verification si user connecté
require_once "utils/verif_connexion.php";

//echo $user->id();

// récupérer le id du produit qui sera noté

if (isset($_GET["id"])){
    // récupere dans le tableau $_GET l'index "id" -> dans la variable $idProduit
    $idProduit=$_GET["id"];
} else {
    //sinon la variable $idProduit recoit 0
   $idProduit=0;
}

echo ("le id du produit évalué est $idProduit <br> <br> "); 


///// ca marche

// création de lobjet produit
$produit= new produit($idProduit);




//affichage formulaire note
include "templates/pages/form_note.php";