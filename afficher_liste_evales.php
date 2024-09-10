<?php
/*
    Controleur : affiche la liste des évaluations
    Parametres: neant

/**
 * Initialisation
 */
require_once "utils/init.php";

// Si on n'est pas connecté : rediriger / afficher le formulaire de connexion
if ( ! session_isconnected()) {
    
    include "templates/pages/formulaire_connexion.php";
    exit;
}
else {
    $user = session_userconnected();
}

 /**
 * Récupération des paramètres
 */
        //néant

 /**
 * Traitement à réaliser
 */
        // créer l'objet evaluation
        $evaluation= new evaluation;
  
        // lui demander la liste avec la fonction getEvalesByUser qui a le rôle de préparer la liste des evaluations faites par un utilisateur donné
        $listEval = $evaluation->getEvalesByUser($user);
        
        //print_r ($listEval);

        //$listEval = $evaluation ->recupereEvaluationPar(session_userconnected());
      // $listEval = $user -> getEvales();
     
        
 /**
 * Affichage
 */

 include "templates/pages/eval_by_user.php";