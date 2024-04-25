<?php
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
// include("auto_deconnexion.php");
include('/var/www/html/project/modeles/front-data.php');


$fichier=[
    "apprenant",
    "presence",
    "referent",
    "promos",
    "Apromos",
    "filter",
    "dasbord",

    ];

   if(isset($_GET["page"])){

    $page=$_GET["page"];
      if(in_array($page,$fichier)){
         // include("auto_deconexion.php");
           include("../templates/layout.html.php");
             require_once '../templates/'.$page.'.html.php';
        }else{
         
           }
        
   }else{

    if(isset($_POST["page"])){
   
        $page=$_POST["page"];
        if($page=="filter"){

                include("../templates/layout.html.php");
                require_once '../templates/'.$page.'.html.php';
    } else if($page=="search"){
            
          include("../templates/layout.html.php");
          require_once '../templates/'.$page.'.html.php';
          }else if($page=="filter2"){
            
          include("../templates/layout.html.php");
          require_once '../templates/'.$page.'.html.php';
          }
       }


       if($_POST["status"]=="salut"){
        $presents=$students;
       }
     
   
    
    //amadousy343@gmaol.com lettre ,otive
   }

?>