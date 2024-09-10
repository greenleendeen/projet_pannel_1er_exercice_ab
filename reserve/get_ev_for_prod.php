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


function getEvalesForProd($idProduit) {
    // 
    //role: fournir la liste des evaluations données à un produit par les utilisateurs du site
    // parametres: $idProduit: le produit qui est évalué
    // retour: liste des evaluations ou tableau vide (si pas d'evales)
    
   
    // Récupère le id du produit 
    $idProduit = $_GET["id"];
    // crée l'objet produit pour charger le id
    $produit = new produit($idProduit);
    $produit->load($idProduit);
    echo "l'id du prod noté est: " . $idProduit;

    // faire la requette

    // extraire du tableau evaluation les lignes avec les détails concernant l'evales de ce produit
 

    // je fais une requette BDD pour vérifier si ce produit(id) a été noté :
    // dans le tableau 'evaluation' je récupère les evaluations qui contiennent le id du produit 
    // j'affiche le resultat de ma requette: liste ou ou tableau vide


   // $sql = "SELECT `id`, `user`, `produit`, `note` FROM `evaluation` WHERE `produit`= 3";
 
         // requette sql: $sql = "SELECT...
         $sql = "SELECT `id`, `user`, `produit`, `note` FROM `evaluation` WHERE `produit`= :id ";
 
         // valorisée dans un tableau
         $param = [":id" => $idProduit];

         //Préparer / exécuter avec  global $bdd:  $bdd->prepare($sql) et $req->execute($param)
                // La prépare
                global $bdd;
                $req = $bdd->prepare($sql);
                // L'exécute
                $req->execute($param);

                // Récupère le tableaux des lignes 
                $lignes = $req->fetchAll(PDO::FETCH_ASSOC);
                //print_r ($lignes);
       //ça marche..
                
        // Transformer son résulat en une liste d'objet evaluation
        // Pour chaque ligne récupérée : générer l'objet evaluation correspondant dans le résultat
        $result = [];       // tableau de résultat vide
        foreach($lignes as $detail) {

            // générer un objet evaluation chargé avec son $detail
            $evaluation = new evaluation();
            $evaluation->loadFromTab($detail);
            // L'ajouter dans $result
            $result[$evaluation->id()] = $evaluation;

        }
        // Retourner ce résultat
        return $result;

    }

    getEvalesForProduit($idProduit);

