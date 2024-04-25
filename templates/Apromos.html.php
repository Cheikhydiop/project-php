<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $libelle = $_POST["libelle"];
    $promo = $_POST["promo"];
    $debut = $_POST["debut"];
    $fin = $_POST["fin"];
    $referentiels = $_POST["referentiels"];

    // Convertir les dates en objets DateTime pour calculer la différence
    $date_debut = new DateTime($debut);
    $date_fin = new DateTime($fin);
    
    // Calculer la différence en mois
    $difference = $date_debut->diff($date_fin);
    $difference_en_mois = $difference->m + ($difference->y * 12);

    // Vérifier si la différence est supérieure à 4 mois
    if ($difference_en_mois >= 4) {
        // Vérifier si le fichier CSV existe
        $fichier_csv = "/var/www/html/project/modeles/promotions.csv";
        $nouvelle_ligne = "$libelle,$promo,$debut,$fin,\"$referentiels\"";
        if (!file_exists($fichier_csv)) {
            // Si le fichier n'existe pas, créer le fichier et ajouter l'entête
            $entete = "libelle,promo,debut,fin,referentiels";
            $fichier = fopen($fichier_csv, "a");
            fwrite($fichier, $entete . PHP_EOL);
            fclose($fichier);
        }

        // Ajouter une nouvelle ligne au fichier CSV
        $fichier = fopen($fichier_csv, "a");
        fwrite($fichier, $nouvelle_ligne . PHP_EOL);
        fclose($fichier);
        // header("location:http://www.cheikh.diop:8001/project/public/?page=promos");

        echo "Les données ont été ajoutées avec succès au fichier CSV.";
    } else {
        echo "Erreur : La différence entre la date de début et la date de fin doit être supérieure ou égale à 4 mois.";
    }
}
?>





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
                        <div><input type="text"  id='tp'placeholder="titre Promo" name="libelle"></div>
                        <div>logo</div>
                        <span><input type="date" name="debut"></span>
                        <span><input type="date" name="fin"></span>
                        <span><input type="button" value="Ajouter Referentiel"></span> 
                        <span  class="lef"><input type="submit"  value="Creer Promotion"  name="validerP"></span>
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