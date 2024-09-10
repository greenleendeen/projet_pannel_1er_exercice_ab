<?php
/*

Template de fragment : fragment du formulaire d'evaluation d'un produit

Paramètres :
    $evaluation : objet evalaution  

*/ 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire de notation</title>

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

   <!--FORMULAIRE NOTE-->
  

     <p> veuillez choisir une note :</p> 
      <!-- supprimer le p et mettre type hidden dans le input-->
       <!-- <p>id produit dans le input: </p> -->
     <input type="hidden" name = "produit" value= " <?= $evaluation->getTarget("produit")->id()?>" >
                          
     
        <div class= "flex  formRadio">
            <label for="note1"> 1 </label>
            <input type="radio" id="note1" name="note" value="1"/>
        </div>

        <div class= "flex  formRadio">
            <label for="note2">2</label>
            <input type="radio" id="note2" name="note" value="2"/>
            
        </div>

        <div class= "flex  formRadio">
            <label for="note3">3</label> 
            <input type="radio" id="note3" name="note" value="3"/>
            
        </div>

        <div class= "flex  formRadio">
            <label for="note4">4</label>
            <input type="radio" id="note4" name="note" value="4"/>
            
        </div> 
        
        <div class= "flex  formRadio">
            <label for="note5">5</label>
            <input type="radio" id="note5" name="note" value="5"/>
        
        </div>

        <div>
            <button type="submit">valider</button>
        </div>






</body>
</html>