<?php

/*
Controleur de test :  récupere et affiche le id de user connceté et celui du produit noté
Paramètres : $user
*/

// Initalisations
include "utils/init.php";
//verification si user connecté  ->(session_userconnected()) 
require_once "utils/verif_connexion.php";

include "templates/fragments/div_user_connected.php";


//$evaluation = new evaluation;
//$evaluation->afficheMessage() ;
//print_r ($evaluation);
 //$evaluation->  getEvalesByUser($user);
 //print_r ($evaluation);


//$produit = new produit(3);
//$moyenne = $produit -> getMoyenne();
//print_r ($moyenne);


//$evaluation = new evaluation;
//$evaluation-> calculMoyenne (3);
//$evaluation-> doSomme();
//$evaluation ->getEvalesByUser($user);


// POUR TESTER :
//$produit = new produit(3);
//$moyenne = $produit -> getMoyenne();
//print_r ($moyenne);
// ok


$evaluation = new evaluation;
$evaluation-> getEvaleUserProduit($idProduit);
//print_r ($evaluation);


 // Récupère le id du produit */
 if (isset($_GET["id"])) {
    // recupete le id du produit dans le GET -> variable $idProduit
    $idProduit= $_GET["id"];
} else {
    $idProduit=0;
}
echo"L'ID du produit est: $idProduit <br> <br>";

// charger l'objet produit et vérifier si c'est ok: avec fonction is()
$produit = new produit();
$produit ->load($idProduit);
if (! $produit->is()) {

echo "pas chargé: le id $idProduit n'existe pas";
}

// il ne faut pas créer l'objet $user, puisque il est déjà dans la methode session is connected

/** triatement */
// créer l'objet evaluation:
$evaluation = new evaluation();

// appeller la méthode 
$evaluation->getEvaleUserProduit($idProduit) ; 
//print_r ($evaluation);

// SI déja évalué : si l'évaluation existe dans la BDD
if ($evaluation->is()) {
//  echo "$produit a été évalué par $user id numero $evaluation";

// récupère le détail de l'évaluation

// affiche le formulaire de modification 
// inclut le template
echo "Coucou";

//include "templates/pages/form_modif_note.php";
//echo "ce produit a été déjà évalué par $user ";

} 




