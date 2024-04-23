<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
 .lef{
    position: relative;
    left: 712px;
 }
    

     
    </style>
</head>
<body>
    <div class="container">
        <div class="apprenant"><b>Promotions</b></div>
        <span class="left-liste">Promos . Liste . Details .Apprenants </span>
        <div class="tete">
             <span class="rit">  Promotion <i style="color: green;">Promotion 6</i></span>
             <span class="left-span">  Referentiel <i style="color: green;">Dev Web /Mobile</i></span>
             
             
        </div>
        <div class="gap"></div>
        <div class="bas">
            <div class="cadre1">
                <div class="boule">
                    <div class="num"><b style="background-color: green;">1</b></div>     
                </div>  
                
                <div class="app">Promotion</div>
                <div class="boule2">
                    <div class="num"><b style="background-color: darkgray;">2</b></div>     
                </div>
                 <div class="bar">&nbsp;&nbsp;&nbsp;
                    <span>Liste Des Apprenants</span>
                


    
                        <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal()">&times;</span><br>
                            <p>Nouvel Apprenant</p>
                            <div class="gap1">
                                <div class="cercle"></div>
                                <div class="app1">Information Perso</div>
                                <div class="cercle1"></div>
                                <div class="app2">Information Supplementaire</div>


                                
                                      
                                      
                                    <button class="mybutton" style="background-color: green;">&nbsp;&nbsp;+ Creer un nouvel apprenant&nbsp;&nbsp;</button>
                               
                               
                        
                            </div>   
                        </div>
                        
                        </div>



                     
                 </div>
                   
                    <div class="tableau"  >
                        <form  method="POST">
                        <div><input type="text" placeholder="titre Promo" name="libelle"></div>
                        <div>logo</div>
                        <span><input type="date" name="debut"></span>
                        <span><input type="date" name="fin"></span>
                        <span><input type="button" value="Ajouter Referentiel"></span> 
                        <span  class="lef"><input type="submit" value="Creer Promotion"  name="validerP"></span>
                        </form>
                      
                    </div>
                   
            </div>
          
        </div>
        
    </div>
    


    
<script>
    // Fonction pour ouvrir la boîte modale
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }
  
    // Fonction pour fermer la boîte modale
    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }
  </script>
  
</body>
</html>