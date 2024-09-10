<?php

/* template de fragment: une div avec les détails d'un produit
Parametres: 
    $produit: objet produit
    */

    ?>


<div class="affiche flex spaceBetween">

 <a href="afficher_detail_produit.php?id=<?= $produit->id()?>"> 
    <p><strong> produit:<?= $produit->get("nomprod")?></p> </strong></p> 
    <p>description: <?= $produit->get("description")?></p> <br>   
    <p>prix: <?= $produit->get("prix")?></p> <br> 

    <a href="afficher_detail_produit.php?id=<?= $produit->id()?>"><button>voir détail</button> </a> 
    <a href="afficher_form_note.php?id=<?= $produit->id()?>"> <button>noter ce produit</button>  </a> 
    
    <a href="modifier_note.php?id=<?= $produit->id()?>"> <button>modifier ma note </button> </a>
           

            
</div>