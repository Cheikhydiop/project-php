<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



?>

                  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .a{
            background-color:gray;
            color:white;
            cursor: pointer;
            position: inherit;
            font-size:20px;
           margin:4px;
        }
       
    </style>
</head>
<body>
    <div class="container">
       
       <div class="space"></div>

       <div class="right">
            <div class="right-top">
               
            </div>
            <div class="interne" style="background-color: whitesmoke;"> <b>Presence</b></div>
            <div class="right-bas">
            <form action="http://www.cheikh.diop:8001/project/public/?page=presence "  name="etat"  method="POST">
                     <input type="hidden" value="filter" name="page">
                    <div class="bas-top">
                            <span class="">
                         <select name="status" id="">
                             <option value="salut">Salut</option>
                             <option value="Present">Present</option>
                             <option value="Absent">Absent</option>
                         </select>
                     </span>
                     <span> 
                       <select name="ref" id="">
                         <option value="referent">Referentiels</option>
                         <option value="data">data</option>
                         <option value="data">web</option>
                         <option value="data">refDig</option>
                        </select>
                     </span>
                     <span> 
                         <input type="date" name="date" >
                     </span>
                     <span> 
                         <button type="submit">Rafrchir</button>
                        </span>
                   </form>
                </div>
                <div class="tableau">


            <?php









                require_once '../modeles/front-data.php';
                $limit = 6; 
                $page = isset($_GET['Page']) ? $_GET['Page'] : 1;
                $start = ($page - 1) * $limit;
                // étudiants actuelle
                $students = array_slice(promoStude(), $start, $limit);

                // nombre total d'étudiants
                $total_students = count(promoStude());
                $total_pages = ceil($total_students / $limit);
            ?>
             
                 <table height='20%' width="95%" align="center" cellpadding='25' frame="">
                     <tr style="background-color: #cdedfa " class="tr1">
                       <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Matriule</td>
                         <td>&nbsp;&nbsp;&nbsp;Nom</td>
                         <td>&nbsp;&nbsp;&nbsp;&nbsp;Prenom</td>
                         <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telephone</td>
                         <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Referentiel</td>
                         <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Heure d'arrivee </td>
                         <td>Status</td>
                      </tr>
                       
                 
                    <?php 
                                        
                    if($_SESSION['connect']==1){
                    
                       
                        $presents= presence_filter($_POST["status"]);
                  
                         if(isset($_POST["status"])){
                            
                              $presents =   presence_filter($_POST["status"]);
                           }
                           else{if(empty($_POST)){
                                  $presents= actuel($_POST["date"]);
                          
                          }else{if(isset($_POST["search"])){
  
                             $presents1= recherche($_POST["search"]);
                                   
                                   }
                                   
                            }
      
                           }
                           if(!empty($_POST) && !empty($_POST["date"])){
                              $presents= actuel($_POST["date"]);
                           
                          }
                          
                            $day=obtenirDateDuJour();
  
                      
                       }


                     



                       if($_SESSION['connect']==0){
                      
                          $presents= presence_filter2($_POST["status"]);
                        //   var_dump($presents);
                          if(isset($_POST["status"])){
                              $presents =   presence_filter2($_POST["status"]);
                             }

                          else{if(empty($_POST)){
                                 $presents= actuel2($_POST["date"]);
                    
                         
                         }else{if(isset($_POST["search"])){
 
                                     $presents1= rechercheU($_POST["search"]);
                                  }
                                  
                                }
                          }    
                        if(!empty($_POST) && !empty($_POST["date"])){
                             $presents= actuel2($_POST["date"]);    
                         }
                         
                           $day=obtenirDateDuJour();
 
                        
                      }
                           
                  ?>
 
                  
                   <?php foreach($presents as $student ) :  ?>
                        
                        <tr>
                            <td class="mat">&nbsp; <?=$student["mat"]?></td>
                            <td>&nbsp;&nbsp;<?=$student["nom"]?></td>
                            <td>&nbsp;&nbsp;&nbsp;<?=$student["prenom"]?></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$student["tel"]?></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$student["email"]?></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$student["day"]?></td>
                            <?php 
                            if($student["status"]=="Absent"){?>
                                <td style="color: red;" >&nbsp;<?=$student["status"]?></td> 
                            <?php }

                            if($student["status"]=="Present"){?>
                                <td  style="color: green;">&nbsp;<?=$student["status"]?></td> 
                            <?php }
                            ?>
                            
                            
                        </tr>
                    <?php endforeach ; ?>



                <?php

                foreach($presents1 as $student ) : ?>
                                    
                   <tr>
                    <td class="mat">&nbsp; <?=$student["mat"]?></td>
                    <td>&nbsp;&nbsp;<?=$student["nom"]?></td>
                    <td>&nbsp;&nbsp;&nbsp;<?=$student["prenom"]?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$student["email"]?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$student["referentiel"]?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$student["day"]?></td>
                    <?php 
                    if($student["status"]=="Absent"){?>
                        <td style="color: red;" >&nbsp;<?=$student["status"]?></td> 
                    <?php }

                    if($student["status"]=="Present"){?>
                        <td  style="color: green;">&nbsp;&nbsp;<?=$student["status"]?></td> 
                    <?php }

                    ?>  
                    </tr>
                <?php endforeach ; ?>
    
                </table>
                    
                </div>

            <div class="tfoot" style="background-color: whitesmoke;">
                <select name="" id="">
                    <option value=""><b>item per page 10</b></option>
                    <option value="">20</option>
                </select>
            &nbsp;&nbsp; &nbsp;   &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;   &nbsp;&nbsp; &nbsp;&nbsp;    &nbsp;&nbsp; &nbsp;   &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;   &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;   &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;   &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;      &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                
                <div class="pagine">
             
                <button style="background-color: white; color: black;height: 60%; width: 15%;" > <b>

    
            <div class="pagination">
                <?php if ($Page > 1) : ?>
                  <a href="?page=presence&Page=<?= $Page - 1; ?>">&laquo;</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>

                  
                    <?php if($Page!=$i)  :?>
                   <a  class='a'  style='' href="?page=presence&Page=<?=$i;?>"><?= $i; ?></a>
                     <?php  endif  ;?>
                  
                <?php endfor; ?>

                <?php if ($Page < $total_pages) : ?>
                  <a href="?page=presence&Page=<?= $Page + 1; ?>">&raquo;</a>
                <?php endif; ?>
            </div>
         
       </div>
     

    </div>
              
    
</body>
</html>