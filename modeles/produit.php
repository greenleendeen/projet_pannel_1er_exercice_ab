<?php
// Classe produit : gestion des objets produits 

class produit extends _model {

    // attributs à valoriser
    protected $table = "produit";               // Nom de la table
    protected $fields = [ "nomprod", "description" , "prix" ];       //noms des champs
   
  


    //Faire une méthode dans la classe "produit" :
    function getMoyenne(){

    //Rôle : retourner la note moyenne des évaluations donées à un produit
    // Paramètres : néant (le id du produit est récupéré et socké la function moyenneEvales()appelée de la classe evaluation)
    //Retour : une note qui represente la moyenne des evaluations

    $evaluation = new evaluation();
    $moyenne = $evaluation ->calculMoyenne ($this->id());
      return $moyenne;

   
/* POUR TESTER :
$produit = new produit(3);
$moyenne = $produit -> getMoyenne();
print_r ($moyenne);
*/


    }

    function getNote() {
        //role: retorner la note (unique) donnée à ce produit par cet utilisateur
        // parametres: néant (j'appelle getEvalesUserProduit qui a en paramètres le id du produit)
        // retour: la note donnée

        $evaluation = new evaluation();
        /////////
    }
        }

