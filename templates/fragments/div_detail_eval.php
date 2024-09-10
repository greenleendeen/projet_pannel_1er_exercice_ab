<?php

// template de fragment: détails sur une évaluation
// Parametres:  / $evaluation


// ??j'ai besoin du produit noté

//$evaluation = $produit->getTarget("produit");

?>


<div class= "affiche"> 

<p> <strong> produit:</strong>  <?= $evaluation-> getTarget("produit")-> get("nomprod") ?> 
    <strong> évalué par:</strong>  <?= $evaluation->getTarget("user")-> get("nom") ?>
    <strong>id evaluation:</strong> <?= $evaluation->id() ?>    
    <strong>note: </strong> <?= $evaluation->get("note") ?></p>

    <a href="modifier_note.php?id=<?= $evaluation->id()?>"> <button>modifier ma note </button> </a>
</div>





