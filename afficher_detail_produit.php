<?php
/*
Controleur : affiche la page de détail d'un produit
parametres: le ID du produit: GET:id


*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

// récupération des paramètres / vérification
// récupére l'id fourni, ou 0 si pas d'id
// si l'index "id" existe dans le tableau $_GET

if (isset($_GET["id"])){
    // récupere dans le tableau $_GET l'index "id" -> dans la variable $idProduit
    $idProduit = $_GET["id"];
} else {
    //sinon la variable $idAppart recoit 0
   $idProduit = 0;
}
// vérifer si il le trouve:
echo "l'id du produit est $idProduit ";

// traitement sur la bdd
// je crée l'objet produit
$produit = new produit();
//charge avec le id prévu
$produit->load($idProduit);


//si le produit n'existe pas, on affiche la liste (avec le template accueil_liste_produits.php et le message 'ce produit n'est pas dans la liste' )

if(! $produit->is()){
    //affiche message: appelle la function is() dont le rôle est de dire si l'objet est chargé (si il y a un contact de la BDD dedans)
    
    echo "ce produit n'existe pas dans la liste";
    
    } else {
    //sinon génère la page de détail appartement.
    // on utilise le template détail_appartement.php
    
    include "templates/pages/detail_produit.php";
    
    }

