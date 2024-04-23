<?php
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
// // include ("auth.php");
// // auth_user();
// if(!$_SESSION['connect']){
//    header("location:auth.php");
//  exit;
// }

// if($_SESSION['connect']){
//   header("location:http://www.cheikh.diop:8001/project/public/?page=presence");
//   exit;
// }


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