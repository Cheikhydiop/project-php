<?php   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Sonatel admin</title>
    <link rel="stylesheet" href="../public/css/stylepro.css"/>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
    <style>
 
 .home-section .home-content{
    position: relative;
padding-top: 63px;
left: -242px;
width: 1621px;


 }
table{
    width: 106%;
border-collapse: collapse;
}


        .promo-button.active {
    background-color: yellow; /* Couleur verte pour indiquer l'activation */
    color: white; /* Texte en blanc pour contraster */
    /* Ajoutez d'autres styles au besoin */
}

        
    </style>
  </head> 
  <body>


    <section class="home-section">
     

      <div class="home-content">
        <p style="margin-left: 20px; margin-bottom: 35px; margin-top: 30px;">Promotions </p>

        <div class="sales-boxes" style="display: flex; justify-content: space-between;">
          <div class="recent-sales box" style="display: flex; gap: 10px; width: 100%; ">
            <!-- <div class="title">Les cards</div> -->
            <div class="card " style="  box-shadow: 0 5px 10px rgba(0,0,0,0.1);background : white; padding: 15px; border-radius: 10px; width: 100%;">
              <!-- <i class="bx bx-color"></i> -->
              <div class="text" style="display: flex; justify-content: flex-start; ">Liste Des Promotions
              <span>
                (<?=isset($_GET["promo"]) ? substr($_GET["promo"], 1, 2) : "6";?>)
             </span>
              </div>
              <div class="bl" style="display: flex; justify-content: flex-end;">
                <div class="search-box">
                  <input style="outline: none; border-radius: 10px; background-color: #f8f4f4;" type="text" placeholder="Rechercher ici..." />
                  <i style="margin-left: -25px; color: #239b8f; font-weight: bold;" class="bx bx-search"></i>
                </div>
                <button>
                <a href="?page=Apromos" style="list-style: none; text-decoration: none; color: white;">+ Nouveau</a>
              </button>
              </div>

              <table>
                        <thead>
                        <tr>
                            <th>Libellé</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $email = "moussa@gmail.com";
                            $motDePasse = "P5_DEVweb_2094_129"; 
                            
                            
                         
                           
                              if(isset($_GET["promo"])){
                            
                                $numP = substr($_GET["promo"], 1,2);
                                $_GLOBALS['NU'] = $numP;

                                $studentsWithReferent = findStudentsAndReferentByPromotion($_GET["promo"]);
                           
                               
                             
                                $_SESSION['resultat_promotion'] = $studentsWithReferent;
                      
                            // $result = findStudentsAndReferentByPromotion($promotionNumber);
                            // var_dump($result);
                          echo"<pre>";
                                   var_dump(  $_SESSION['resultat_promotion']);
                          echo"</pre>";

                                

                            // Convertir le résultat en JSON
                            $jsonResult = json_encode( $_SESSION['resultat_promotion'] );

                            // Nom du fichier
                            $filename = '/var/www/html/project/modeles/promotionaires.json';

                            // Ouvrir le fichier en mode écriture pour écraser le contenu existant
                            $file = fopen($filename, 'w');

                            // Écrire le JSON dans le fichier
                            fwrite($file, $jsonResult);

                            // Fermer le fichier
                            fclose($file);

                              }
                            
                            ?>

                        <?php   foreach(promotions() as $promo):?>
                          <tr>
                            <td><span><?=$promo["libelle"]?></span></td>
                            <td><?=$promo["debut"]?></td>
                            <td><?=$promo["fin"]?></td>

                            <td>     
                            <a href="http://www.cheikh.diop:8001/project/public/?page=promos&promo=<?=$promo["promo"]?>"><button class="p" id="<?= $promo["promo"] ?>" class="promo-button"></button></a>                            
                            </td>
                          </tr>
                          <?php   endforeach;?>
            
                               
                        </tbody>
                    </table>
             


                        
              <br><br>
              <?php
// Vérifie si l'ID du bouton a été reçu
if (isset($_POST['button_id'])) {
    // Récupère l'ID du bouton cliqué
    $buttonId = $_POST['button_id'];
    
}
?>
             
              <div class="pagination">  
    <span class="arrow">&#10094;</span>
    <span class="page-number">
      <select>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </span>
    <span class="arrow">&#10095;</span>
  </div>
            </div>
         
          </div>

                    </div>
                    
        </div>
      </div>
      
    </section>

    <!-- <div class="footer" style="color: #68706f; text-align: center; padding: 15px ;">
      © Sonatel Academy
      </div> -->
      <script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.promo-button');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                // Désactive tous les boutons
                buttons.forEach(btn => btn.classList.remove('active'));
                // Active le bouton cliqué
                this.classList.add('active');
                // Envoie l'ID du bouton à PHP pour enregistrement
                const buttonId = this.getAttribute('id');
                // Effectuer une requête AJAX pour envoyer l'ID au script PHP
                // ...
            });
        });
    });
  </body>
</html>

// Vérifie si l'ID du bouton a été reçu
if (isset($_POST['button_id'])) {
    // Récupère l'ID du bouton cliqué
    $buttonId = $_POST['button_id'];
    
}
?>