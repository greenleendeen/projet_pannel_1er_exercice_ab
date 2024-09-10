<?php
// Classe evaluation2 : gestion des objets evaluations des produits

class evaluation2 extends _model {

    // attributs à valoriser
    protected $table = "evaluation";               // Nom de la table
    protected $fields = [ "user", "produit", "note" ];       // par exemple
    protected $links = ["produit" => "produit" , "user" => "user"];


function listAllEvalesProduit ($produit) {
    // role: extraire les évaluations sur un produit donné
    // parametres: 
        //$produit: objet "produit" dont on veut les évaluations
    // retour: tableau d'objets "evaluation" trouvés 

//requette sql pour trouver les évaluations qui ont été faites pour ce produit (id)
        // requette sql: $sql = "SELECT... FROM `$this->table` 
        $sql = "SELECT `id`, `user`, `produit`, `note` FROM `evaluation` WHERE `produit`= :id ";
 
        // valorisér la requette dans un tableau
        $param = [":id" => $Produit];

        //Préparer / exécuter avec  global $bdd:  $bdd->prepare($sql) et $req->execute($param)
           // La prépare
           global $bdd;
           $req = $bdd->prepare($sql);

           // L'exécuter
           $req->execute($param);

           // Récupère le tableaux des lignes (avec fetchAll)
           $lignes = $req->fetchAll(PDO::FETCH_ASSOC);
               //print_r ($lignes);
    
       // extraire la liste des évaluations ou une liste vide
           // Transformer son résulat en tableu d'objets "evaluation"
       // Pour chaque ligne récupérée : générer l'objet evaluation correspondant dans le résultat

       $result = [];       // tableau de résultat vide
       foreach($lignes as $detail) {

           // générer un objet evaluation chargé avec son $detail
           $evaluation = new evaluation();
           $evaluation->loadFromTab($detail);
           // L'ajouter dans $result
           $result[$evaluation->id()] = $evaluation;
       }

       // Retourner ce résultat : tableau d'objets "evaluation" trouvés 
       return $result;

    }



    function getEvaleUserProduit($idProduit) {
        //role: férifie si ce produit a été noté par cet user 
        //parametres: $userId : id de l'utilisateur connecté; $idProduit id de l'objet produit;
        //retour: true si l'évaluation existe - false sinon
        $userId = session_idconnected();


        //faire une requette sql pour vérifier si une évale pour ce produit par cet user existe:
        //$sql = "SELECT `id`, `user`, `produit`, `note` FROM `evaluation` WHERE `user`=1 AND `produit`=2";

       // $sql = "UPDATE  `$this->table` SET " . $this->makeRequestSet() . " WHERE `id` = :id "; $this-> returnThisUser($userId)
                 
         $sql = "SELECT `id`, `user`, `produit`, `note` FROM $this->table  WHERE `user`=:id  AND `produit`=:id ";

         $param = [":id" => $userId, 
                    ":id" => $idProduit] ;

        //Préparer / exécuter avec  global $bdd:  $bdd->prepare($sql) et $req->execute($param)
            // prépare
            global $bdd;
            $req = $bdd->prepare($sql);

            // exécute
            $req->execute($param);

            // Récupère la ligne
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
               // print_r ($ligne);

            $this->loadFromTab($ligne);

                    // L'ajouter dans $result
        $result= [$ligne] ;
        //print_r ($result);
       

        // verification et condition: si la ligne existe retourne true, false  sinon
        if ($ligne-> is()){
             return true;
              } else {
                return false;
                exit;
              }
            }
}