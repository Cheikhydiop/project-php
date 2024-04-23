<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .boule{
      height: 30px;
      width: 30px;
      border-radius: 50%;
      background-color: green;
      border: solid 1px;
      position: relative;
      left: 35px;
      color: white;
      top: 13px;
      z-index: 2;}
      img{
        border-radius:50%;
      }
      img:hover{
            scale:5;
            border-radius:50%;
      }
      .fiterRef{
        background-color: #ffffff;
        width: 93.4%;
        position: relative;
        left: 43px;
        height: 48px;
        border-radius:10px;
        padding:6px;
      }
   #myForm{
    position: relative;
    left:90px;
    top:25px;
   }
      </style>
  

</head>
<body>
<div class="home-content">
       <div>
       <p style="margin-left: 20px; margin-bottom: 35px; margin-top: 30px;">Apprenants </p>
               
  <?php 
  
  
  // if(isset($_POST['button_id'])){
  //   var_dump ($_POST['button_id']) ;
  //   $value=$_POST['button_id'];
         
      
  //   //var_dump($paramRef);
 
  //    $resultatSelect = filtrerParReferentiel(utilisateurs(),$value);
  

  //    var_dump ($resultatSelect) ;


  // }
  
  
  
  
  
  ?>


    
       </div>

       <div class="fiterRef">
        <span>Promotion <?=isset($_GET["p"]) ? substr($_GET["p"], 1, 2) : "6";?></span>
        <span style="width: fit-content; float : right; margin-right : 50px;height:15px; margin-top : 14px;border-raduis:50px;" name="ref" id="ref">
        <b style="color:black">Referentiel&nbsp;
      
        <form id="myForm" method="post" action="http://www.cheikh.diop:8001/project/public/?page=apprenant">
  
      <select name="button_id" onchange="submitForm()" style="width: fit-content; float: right; margin-right: 60px; height: 45px; margin-top: -62px; border-radius: 50px;" id="ref">
        <option value="All" name="all" <?php if ($_GET["ref"] == "" || $_GET["ref"] == "All") echo "selected"; ?>>All</option>
        <option value="DATA" <?php if ($_GET["ref"] == "DATA") echo "selected"; ?>>Data</option>
        <option value="WEB" <?php if ($_GET["ref"] == "WEB") echo "selected"; ?>>Web</option>
        <option value="AWS" <?php if ($_GET["ref"] == "AWS") echo "selected"; ?>>Aws</option>
        <option value="RefDig" <?php if ($_GET["ref"] == "RefDig") echo "selected"; ?>>RefDig</option>
   
    </select>
  
         </form>
      
      </span>
    </div>


        <div class="boule" ></div>

        <div class="sales-boxes" style="display: flex; justify-content: space-between;">
          <div class="recent-sales box" style="display: flex;  width: 100%; ">
            <div class="card "  style="  box-shadow: 0 5px 10px rgba(0,0,0,0.1);background : white; padding: 15px; border-radius: 10px; width: 100%;position: relative;top:-20px">
              <!-- <i class="bx bx-color"></i> -->
              <div class="text" style="display: flex; justify-content: flex-start; ">Liste Des Apprenants <span>(50)</span>
              </div>
              <div class="bl" style="display: flex; justify-content: flex-end;">
                <button> <a href="#popup-apprenant" class="b1" style="text-decoration: none; color: white;"><i class="fa-regular fa-add"></i> Nouveau</a> &nbsp; &nbsp;</button>
                <button style="background-color : orange;  "> <a href="#popup-insertion-masse" class="b2" style="text-decoration: none; color: white;">Insertion en masse</a>&nbsp; &nbsp;</button>
                <button style="background-color: #48c0ec;"> <a href="#" class="b3" style="text-decoration: none; color: white;"><i class="fa-solid fa-download"></i>  Liste model</a> &nbsp; &nbsp;</button>
                <button style="background-color: #1e359a;">   <a href="#" class="b4" style="text-decoration: none; color: white;">Liste des exclus</a> &nbsp; &nbsp;</button>
              </div>
              <div class="search-box" >
               <form action="http://www.cheikh.diop:8001/project/public/?page=apprenant" method="POST">
                <input type="hidden" value="filter2" name="page">
               <input type="text" name="filter2" style="outline: none; border-radius: 10px; background-color: #f8f4f4; width: 100%; margin-top: 12px;" type="submit" placeholder="Filtre ici..." />
               </form>
                <!-- <i style="margin-left: -555px; position: absolute; top: 200px; color: #239b8f; font-weight: bold; " class="bx bx-search"></i> -->
              </div>
              <i class="fa-regular fa-folder-open" style="color: #63E6BE; font-size: 45px;"></i>
              
             
              <table>
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Nom </th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Genre</th>
                    <th>Telephone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php     
          
          // var_dump($_SERVER['REQUEST_URI'] );
       
                  
     $utilisateurss2 = null; // Déclaration de la variable en dehors de toute condition
     $utilisateurs2 = null;
     $utilisateurs = null;


      
       if ($_SERVER['REQUEST_URI'] == "/project/public/?page=apprenant") {
           // La variable $utilisat est accessible ici aussi
           if(empty($_POST))

           $utilisateurs= utilisateurs();
           
           //  if(isset($_POST['button_id'])){
           //   // var_dump ($_POST['button_id']) ;
           //   $value=$_POST['button_id'];
           //   $resultatSelect = filtrerParReferentiel(utilisateurs(),$value);
             //  $utilisateursee = $resultatSelect;
 
 
 
 
             foreach ($utilisateurs as $categorie => $utilisateur) {
 
               foreach ($utilisateur as $info) {
                
                  echo "<tr>";
                  echo "<td><img src=\"{$info["img"]}\" alt=\"\" width=\"50px\" height=\"50px\"></td>";               
                  echo "<td>{$info["nom"]}</td>";                
                  echo "<td>{$info["prenom"]}</td>";                
                  echo "<td>{$info["email"]}</td>";                      
                  echo "<td>{$info["genre"]}</td>";               
                  echo "<td>{$info["tel"]}</td>";                
                  echo "</tr>";             
                }

              }


              if(isset($_POST['button_id'])){

                $resultatSelect =  filtrerParReferentiel(utilisateurs(),$_POST['button_id']);
                $utilisateurs2= $resultatSelect ;
                $utilisateurs = null;
              
                
               }  





          
            

           $rapprenant= recherche_apprenant($_POST["search"]);
        
               
           if(isset($_POST["search"])){
             $utilisateurs= $rapprenant;
             // var_dump( $utilisateurs );
           }
        

          $utilisateurs1= recherche2($_POST["filter2"]);
          if(isset($_POST["filter2"])){
           $utilisateurs= $utilisateurs1;
          }
         

       } else{
        

        $user=null;
        $paramRef=$_GET["ref"];
     
         $resultatsRef = filtrerParReferentiel(utilisateurs(),$paramRef);
         $utilisateurs2 = $resultatsRef;
  

       }


      
       


           ?>

          
          
<?php






if(isset($_POST['button_id'])){


  foreach ($utilisateursee as $info) {
 
    echo "<tr>";
    echo "<td><img src=\"{$info["img"]}\" alt=\"\" width=\"50px\" height=\"50px\"></td>";               
    echo "<td>{$info["nom"]}</td>";                
    echo "<td>{$info["prenom"]}</td>";                
    echo "<td>{$info["email"]}</td>";                      
    echo "<td>{$info["genre"]}</td>";               
    echo "<td>{$info["tel"]}</td>";                
    echo "</tr>";             
  }



}

foreach ($utilisateurs2 as $info) {
 
echo "<tr>";
echo "<td><img src=\"{$info["img"]}\" alt=\"\" width=\"50px\" height=\"50px\"></td>";               
echo "<td>{$info["nom"]}</td>";                
echo "<td>{$info["prenom"]}</td>";                
echo "<td>{$info["email"]}</td>";                      
echo "<td>{$info["genre"]}</td>";               
echo "<td>{$info["tel"]}</td>";                
echo "</tr>";             
}

?>


                </tbody>

              </table><br><br>
              <div class="pagination">
    <!-- <span class="arrow">&#10094;</span> -->
    <span class="page-number">
      <select>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </span>
    <!-- <span class="arrow">&#10095;</span> -->
  </div>
            </div>
          </div>
           
                    </div>
                    
        </div>
      </div>

      <div id="popup-apprenant" class="modal">
        <div class="modal_content">
          <header class="modal-header">
            <!-- <h1>Nouvel Apprenant</h1> -->
          </header>
  
          <section>
            <div class="popup">
              <div class="popup-content">
                <!-- Etape 1 -->
                <div id="step1" class="step">
                  <!-- <label for="popup-toggle" class="close-btn">×</label> -->
                  <div class="text">
                    <div class="number">1</div>
                    <span>Nouvel apprenant</span>
                  </div>
                  <form>
                    <div class="separe" >
                        <div>
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" placeholder="Nom" required>
                        </div>
                        <div>
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" placeholder="Prénom" required>
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Email" required>
                        </div>
                        <div>
                            <label for="telephone">Téléphone</label>
                            <input type="tel" id="telephone" placeholder="Téléphone" required>
                        </div>
                        <div>
                            <label>Sexe</label>
                            <select required>
                              <option value="">Sélectionner</option>
                              <option value="homme">Homme</option>
                              <option value="femme">Femme</option>
                              <option value="autre">Autre</option>
                            </select>
                        </div>
                        <div>
                            <label for="date_naissance">Date de naissance</label>
                            <input type="date" id="date_naissance" required>
                        </div>
                        <div>
                            <label for="lieu_naissance">Lieu de naissance</label>
                            <input type="text" id="lieu_naissance" placeholder="Lieu de naissance" required>
                        </div>
                        <div>
                            <label for="cni">N° CNI</label>
                            <input type="text" id="cni" placeholder="N° CNI" required>
                        </div>
                    </div>
                  
                  </form>
                  <button class="next-btn" onclick="nextStep()">Suivant</button>
                </div>
        
                <!-- Etape 2 -->
                <div id="step2" class="step">
                  <!-- <label for="popup-toggle" class="close-btn">×</label> -->
                  <div class="text">
                    <div class="number">2</div>
                    <span>Information supplémentaire</span>
                  </div>
                  <form>
                    <div class="separe">
                        <div>
                            <label for="nom_tuteur">Nom du tuteur</label>
                            <input type="text" id="nom_tuteur" placeholder="Nom du tuteur" required>
                        </div>
                        <div>
                            <label for="prenom_tuteur">Prénom du tuteur</label>
                            <input type="text" id="prenom_tuteur" placeholder="Prénom du tuteur" required>
                        </div>
                        <div>
                            <label for="contact_tuteur">Contact du tuteur</label>
                            <input type="tel" id="contact_tuteur" placeholder="Contact du tuteur" required>
                        </div>
                        <div>
                            <label for="photocopie_cni">Photocopie CNI</label>
                            <input type="file" id="photocopie_cni" required>
                        </div>
                        <div>
                            <label for="extrait_naissance">Extrait de naissance</label>
                            <input type="file" id="extrait_naissance" required>
                        </div>
                        <div>
                            <label for="diplome">Diplôme</label>
                            <input type="file" id="diplome" required>
                        </div>
                        <div>
                            <label for="casier_judiciaire">Casier judiciaire</label>
                            <input type="file" id="casier_judiciaire" required>
                        </div>
                        <div>
                            <label for="visite_medical">Visite médicale</label>
                            <input type="file" id="visite_medical" required>
                        </div>
                    </div>
                  </form>
                  <button class="back-btn"  onclick="previousStep()">Retour</button>
                  <!-- <button class="cancel-btn">Annuler</button> -->
                  <button class="create-btn"><a href="#" style="color: white;" class="b1">Créer nouvel apprenant</a></button>
                </div>
              </div>
            </div>
            <script>
              function nextStep() {
                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'block';
              }
          
              function previousStep() {
                document.getElementById('step1').style.display = 'block';
                document.getElementById('step2').style.display = 'none';
              }
              </script>
          </section>
          
  
          <a href="#" class="modal_close">&times;</a>
        </div>
      </div>


      <div id="popup-insertion-masse" class="modal">
        <div class="modal_content">
          <header class="modal-header">
            <!-- <h1>Modal 2</h1> -->
          </header>
  
          <section>
            <div class="popup">
              <div class="popup-content">
                <!-- <label for="popup-toggle" class="close-btn">×</label> -->
                <div class="text">
                  <!-- <div class="number">1</div> -->
                  <span>Choisir un fichier Excel</span>
                </div>
                <div class="dropzone"  id="dropzone">
                  <input type="file" id="fileInput" multiple>
                    <!-- <p class="" for="fileInput" >Glisser-déposer des fichiers ici ou cliquer pour télécharger</p> -->
                    <label for="fileInput" class="" style="font-size: 12px;">Glisser-déposer des fichiers ici ou cliquer pour télécharger</label>


                    <script>
    function submitForm() {
        document.getElementById("myForm").submit();
    }
</script
</body>
</html>