<?php
/*
    Controleur : vérifie si le produit séléctionné a été noté par l'utilisateur connecté et affiche le bon formulaire (note ou modif note)

    Parametres: produt : l'id du produit noté récupére avec  GET 
              
** avant de donner la note, le controleur doit vérifier si l'utilisateur est connecté avec require_once "utils/verif_connexion.php";
*/

/**
 * Initialisation
 */

        require_once "utils/init.php";
        //verification si user connecté
        require_once "utils/verif_connexion.php";

// 1 récupérer le id du produit
//vérifier dans la bdd si le produit a été évalué 
// ! par cet user connecté
//afficher le bon ecran


/** récupération des parametres:  */
   
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
    //echo "Coucou";

    include "templates/pages/form_modif_note.php";
    //echo "ce produit a été déjà évalué par $user ";

} else {
    // Si pas évalué :
    // Formulaire d'évaluation
    // On inclut le template
    include "templates/pages/form_note.php";
    
}










