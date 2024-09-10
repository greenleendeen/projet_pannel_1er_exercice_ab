<?php
// Classe evaluation : gestion des objets evaluations (des produits)

class evaluation extends _model
{

    // attributs à valoriser
    protected $table = "evaluation";               // Nom de la table
    protected $fields = ["user", "produit", "note"];       // par exemple
    protected $links = ["produit" => "produit", "user" => "user"];




    function getInfosEval()
    {
        // role: lister les infos sur une évaluation dont on connati le id.

        $this->id();

        echo " utilisateur: $this->user <br>";
        echo "produit: $this->produit <br>";
        echo "note: $this->note";
    }

    function returnThisEval($eval)
    {
        // Rôle : récupère l'objet 'evaluation' pour une modification 
        // Paramètres : $eval
        // Retour : l'id de l'evaluation

        // demander à l'objet eval de récupérer l'id de l'evale selectionnée en get 
        $eval = new evaluation();
        return $eval->id();
    }

    function setInfosEval()
    {
        $eval = new evaluation();
        //rôle: référencer l'objet evaluation pour acceder ses propriétés
        $this->evaluation = $evaluation;
    }

    function creerEval($user, $produit, $note)
    {
        // Rôle : créer une évaluation et mettre à jour la BDD
        // Paramètres : infos de l'évalaution
        //      $user : id de l'utilisateur
        //      $produit : id du produit
        //      $note
        // Retour : true si ok, false sinon

        // Mettre à jour les attrributs
        $this->set("user", $user);
        $this->set("produit", $produit);
        $this->set("note", $note);
        // Enregistter les modifs dabs la BDD
        $this->insert();

        return true;
    }

    function modifEval($id, $note)
    {
        // Rôle : modifier une évaluation(une note) et mettre à jour la BDD
        // Paramètres : 
        //      $note: post dans le formulaire
        //      $id evaluation à modifier        
        // Retour : true si ok, false sinon

        // Mettre à jour les attrributs
        // UPDATE `evaluation` SET `note` = 5 ($_POST) WHERE id = 1 
        //$sql = "UPDATE `evaluation` SET `note` = 5" . "WHERE id = 1";

        $sql = "UPDATE `evaluation ` SET `note` = :note WHERE `id` = :id";

        $this->set("note", $note);
        // Enregistter les modifs dabs la BDD
        $this->update();

        //$evaluation = new evaluation();

        //$evaluation->loadFromTab($note);
        return true;
    }


    function getEvalesByUser($user)
    {
        //role: préparer la liste des evaluations faites par un utilisateur donné
        // parametres: le id de user 
        // retour: tableau (liste) des evaluations avec produits et notes  faites par un utilisateur 

        $user = session_idconnected();
        // la requette: extraire les evaluations dont le id 'user' est celui demandé 

        //(voir si récupérer le id de user_connected ??? )
        //$sql = "SELECT `id`, `user`, `produit`, `note` FROM `evaluation` WHERE`user`=2";

        // construir la requette SQL
        $sql = "SELECT `id`, `user`, `produit`, `note`
                     FROM `$this->table` WHERE `user`= :id ";

        $param = [":id" => $user];

        //  préparer la requette
        global $bdd;
        $req = $bdd->prepare($sql);
        // L'exécuter
        $req->execute($param);

        // Récupérer la liste 
        $listeEval = $req->fetchAll(PDO::FETCH_ASSOC);
        //   print_r ($listeEval); echo"<br><br>";
        //echo "j'ai récupéré la liste  <br> <br>";
        ///////////////////////////

        $result = [];       // tableau de résultat vide
        foreach ($listeEval as $detail) {

            // générer un objet evaluation chargé avec son $detail
            $evaluation = new evaluation();
            $evaluation->loadFromTab($detail);
            // L'ajouter dans $result
            $result[$evaluation->id()] = $evaluation;
        }

        // Retourner ce résultat
        return $result;
    }

    ///////////////////////////////////////

    function getEvalesForProduit($idProduit)
    {
        //role: fournir la liste des evaluations données à un produit par les utilisateurs du site
        // parametres: $idProduit: le produit qui a été évalué
        // retour: liste des evaluations ou tableau vide (si pas d'evales)

        //*faire une requette sql pour trouver toutes les évaluations qui ont été faites pour ce produit (id)
        // requette sql: $sql = "SELECT... FROM `$this->table` 
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
        //               print_r ($lignes);
        //ça marche///

        // extraire la liste des évaluations ou une liste vide
        // Transformer son résulat en une liste d'objet evaluation
        // Pour chaque ligne récupérée : générer l'objet evaluation correspondant dans le résultat

        $result = [];       // tableau de résultat vide
        foreach ($lignes as $detail) {

            // générer un objet evaluation chargé avec son $detail
            $evaluation = new evaluation();
            $evaluation->loadFromTab($detail);
            // L'ajouter dans $result
            $result[$evaluation->id()] = $evaluation;
        }

        // Retourner ce résultat
        return $result;
        // la fonction marche, je l'ai appelée sur la page test avec: $evaluation = new evaluation;
        ///$evaluation->getEvalesForProduit($idProduit=2) ;    
        //elle affiche Array ( [0] => Array ( [id] => 1  [user] => 1 [produit] => 2 [note] => 5 ) 
        //                     [1] => Array ( [id] => 3  [user] => 2 [produit] => 2 [note] => 5 ) 
        //                     [2] => Array ( [id] => 30 [user] => 2 [produit] => 2 [note] => 1))
    }


    function afficheMessage()
    {
        //role:afficher le message 'bonjour'
        // parametres: néant
        // retour: le message en echo
        $message = "bonjour";
        echo $message;
    }

    function getEvaleUserProduit($idProduit)
    {
        //role: vérifie si ce produit a été noté par cet user 
        //parametres: $userId : id de l'utilisateur connecté; $idProduit id de l'objet produit;
        //retour: true si l'évaluation existe - false sinon
        $userId = session_idconnected();


        //faire une requette sql pour vérifier si une évale pour ce produit par cet user existe:
        //$sql = "SELECT `id`, `user`, `produit`, `note` FROM `evaluation` WHERE `user`=1 AND `produit`=2";

        // $sql = "UPDATE  `$this->table` SET " . $this->makeRequestSet() . " WHERE `id` = :id "; $this-> returnThisUser($userId)

        $sql = "SELECT `id`, `user`, `produit`, `note` FROM $this->table  WHERE `user`=:id  AND `produit`=:id ";

        $param = [
            ":id" => $userId,
            ":id" => $idProduit
        ];

        //Préparer / exécuter avec  global $bdd:  $bdd->prepare($sql) et $req->execute($param)
        // prépare
        global $bdd;
        $req = $bdd->prepare($sql);

        // exécute
        $req->execute($param);

        // Récupère la ligne
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        //print_r($ligne);

        // ??  

        // L'ajouter dans $result
        $result = [$ligne];
       //print_r($result);

        // générer un objet evaluation chargé avec son $detail
        $evaluation = new evaluation();
        $this->loadFromTab($ligne);

        // L'ajouter dans $result
        $result[$evaluation->id()] = $evaluation;

        // verification et condition: si la ligne existe retourne true, false  sinon
        // if ($ligne-> is()){
        //      return true;
        //        } else {
        //        return false;
        //      exit;
        //   }
        return $result;
    }

    // méthode pour calculer la moyenne des evaluaiton pour l'utiliser dans la classe "produit" :
    function moyenneEvales($idProduit)
    {

        //Rôle : calculer la note moyenne des évaluations donées à un produit avec la fonction d’agrégation AVG()
        // Paramètres : $idProduit: le id du produit dont on veut extraire les evaluations
        //Retour : la moyenne des notes

        //La fonction d’agrégation AVG() dans le langage SQL permet de calculer 
        //une valeur moyenne sur un ensemble d’enregistrement de type numérique et non nul.
        //SELECT AVG(nom_colonne) FROM nom_table

        // dans mon cas: SELECT AVG (`note`) FROM `evaluation` WHERE `produit`=3 (3=id du produit) 

        // construir la requette SQL dans le bdd des évaluations (`$this->table`=evaluation)

        $sql = "SELECT AVG (`note`) FROM `$this->table` WHERE `produit`= :id";

        // récupérér les parametres (l'id du produit)
        $param = [":id" => $idProduit];

        //  préparer la requette
        global $bdd;
        $req = $bdd->prepare($sql);

        // L'exécuter
        $req->execute($param);

        $moyenne = $req->fetch();

        // L'ajouter dans $result
        $result = [$moyenne];
        //print_r($result);

        //  verifier si la moyenne  n'est pas null-> si le produit a été noté
        if ($moyenne === null) {
            echo "ce produit n'a pas encore été noté";
        }
    }


    function calculMoyenne($idProduit)
    {

        //Rôle : calculer 'manuellement' (sans avg) la note moyenne des évaluations donées à un produit 
        //Paramètres : $idProduit: le id du produit dont on veut extraire les evaluations
        //Retour : la moyenne des notes

        // SELECT  `note` FROM `evaluation` WHERE `produit`=3 (:id)
        //ça m'affiche toutes les notes que le produit avec le id proposé a reçu 

        $sql = "SELECT `note` FROM `$this->table` WHERE `produit`= :id";

        // récupérér les parametres (l'id du produit)
        $param = [":id" => $idProduit];

        //  préparer la requette
        global $bdd;
        $req = $bdd->prepare($sql);

        // L'exécuter
        $req->execute($param);

        //recuperer les notes dans un tableau
        $notes = $req->fetchAll(PDO::FETCH_ASSOC);

        //         print_r ($notes); // resultat: Array( [0]=>Array([note]=>5) 
        //                                    [1]=>Array([note]=>4) 
        //                                    [2]=>Array([note]=>5) 
        //                                    [3]=>Array([note]=>5) 
        //                                    [4]=>Array([note]=>5)  ) 
        //             echo ("<br> <br>"); 


        $evals = $this->getEvalesForProduit($idProduit);

        // $notes est un tableau contenant des notes dans le champ 'note'

        // créer un objet $nombreChamps pour pour compter le nombre de champs du tableau 'notes' et stocker le résultat 
        $nombreChamps = count($notes);
        //              print_r ($nombreChamps);
        echo "<br>";

        //j'ai $nombreChamps ;
        // $tableau à parcourir as $valeur de l'élément ( $somme=  $somme + $note;) $this->values[$nomChamp]

        //  il me faut $somme:  la somme des notes dans le tableau $notes
        // $somme = doSomme();

        $somme = 0;
        foreach ($evals as $eval) {
            //         echo "$note";
            // $somme=  $somme+$note;
            $somme += $eval->get("note");
            //          echo  "$somme"; echo "<br>";
        }

        // je calcule la moyenne des notes : $somme / $nombreChamps
        //$x = 10; $x /= 5; echo $x; resultat: 2

        $moyenne = $somme / count($notes);

        //print_r($moyenne);
        echo "<br>";
    }


    function doSomme()
    {
        // role: aditionne les valeurs de tous les champs d'un tableau
        //paramètre: 
        //retour: la somme
        // $notes  = [5, 4, 5];
        $somme = 0;
        foreach ($notes as $note) {
            $somme =  $somme + $note;
        }
        echo  "$somme";
        echo "<br>";
    }


    function sommeNotes($idProduit)
    {
        //role: calculer la somme des notes (valeurs du champ 'note') donnée à un produit 
        // parametre: $idProduit - le id du produit 
        // retour: la somme

        //requette sql: SELECT SUM(`note`) FROM `evaluation` WHERE `produit`=3 

        $sql = "SELECT SUM(`note`) AS `somme` FROM `evaluation` WHERE `produit`= :id";

        // récupérér les parametres (l'id du produit)
        $param = [":id" => $idProduit];

        //  préparer la requette
        global $bdd;
        $req = $bdd->prepare($sql);

        // L'exécuter
        $req->execute($param);

        //recuperer la 1ere ligne  dans une variable
        $sommeNotes = $req->fetch();

        // L'ajouter dans $result
        $result = [$sommeNotes];
        //print_r($result);
        return $sommeNotes["somme"];
    }


    function getLigneEval($idEval)
    {
        //Role: récupérer une ligne d'evaluation par son id 
    }
}
