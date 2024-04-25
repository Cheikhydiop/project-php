<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('/var/www/html/project/modeles/orm.php');

$file_path = '/var/www/html/project/modeles/presence.csv';
$file_path_promotionaire= '/var/www/html/project/modeles/promotionaires.json';
$file_path_students= '/var/www/html/project/modeles/students.csv';
$file_path_referents= '/var/www/html/project/modeles/referents.csv';
$file_path_promotions= '/var/www/html/project/modeles/promotions.csv';
$file_path_promotionaire= '/var/www/html/project/modeles/promotionaire.csv';
/*-----------------------------------------------*/


$dataStudents=load_Students($file_path_students);
$dataRef=load_referents($file_path_referents);

$dataPromo= load_promotions($file_path_promotions);

$json_data = load_json($file_path);



$promotionaire=load_promo($file_path_promotionaire);
/*-----------------------------------------------*/
$data=$json_data;
?>


<?php

function promoStude(){
    global $promotionaire;
   
    $$promotionaire=[];
    $students=$promotionaire;
    return $students;
}
?>
<?php

function studentse() {
    global $dataStudents;
   
    $students=[];
    $students=$dataStudents;
    return $students;
}
?>

<?php
function students() {
   
    $students = array();
    $donnees = studentse();
   
    $students=$donnees;
    return $students;
}
?>

<?php
function utilisateurs() {
   
    $utilisateurs = array();

    $donnees = promoStude() ;
    $utilisateurs[] = $donnees;
        
   
 
    return $utilisateurs;
}
?>



<?php
function referents() {

    $referents = array();

    global $dataRef;
    
    $donnees = $dataRef;


    $referents[] =  $donnees;

    return $referents;
}
?>



<?php
function promotions() {
   
    $promotions = array();
    global $dataPromo;
    
    $promotions   = $dataPromo;

  

    return $promotions;
}
?>


<?php
function obtenirDateDuJour() {
    return date("Y-m-d");
}
?>

<?php
  function presence_filter($status){
  
     $presents=promoStude();
     
     $result=[];
   
    foreach( $presents as $present){
        if($present['status']==$status){
            $result[]=$present;
        }
    }
    
    return $result;
  }

?>




<?php
  function presence_filter2($status){
  
     $presents=  $_SESSION['utilisateur'] ;
     
     $result=[];
   
    foreach( $presents as $present){
        if($present['status']==$status){
            $result[]=$present;
        }
    }
    
    return $result;
  }

?>



<?php
  function recherche($search){
     $recherches= promoStude();
     $result=[];
    foreach($recherches as $clef => $recherche ) {  

        if($recherche["mat"]==trim($search)){
            $result[]=$recherche;
        }       
    }  
    return $result;
   }

?>

<?php
  function rechercheU($search){
     $recherches=   $_SESSION['utilisateur'] ;
     $result=[];
    foreach($recherches as $clef => $recherche ) {  

        if($recherche["mat"]==trim($search)){
            $result[]=$recherche;
        }       
    }  
    return $result;
   }

?>

<?php
    function paginer(&$page){
    
    $page = $_GET["page"];

    if(empty($page)) $page = 1;

    $nepg = 5;

    $nbr = ceil(count($students) / $nepg);

    $debut = ($page - 1) * $nepg;
    return $page;
    }
?>

<?php
    function recherche2($search){

     $recherches=utilisateurs();
     $result=[];
    
    foreach($recherches as $clef => $recherche ) {
            
        if($recherche["email"]==trim($search)){
            $result[]=$recherche;
        }
            
      }
    
    return $result;
 
  }
?>


<?php
  function recherche_apprenant($search){

    $recherches=utilisateurs();
    $result=[];
   foreach($recherches as $clef => $recherche ) {

    if($recherche["email"]==trim($search) || $recherche["tel"]==trim($search) ){
       
           $result[]=$recherche;
       }
           
       }
   
    return $result;
    }

?>

<?php
function actuel($d) {
    $jour=obtenirDateDuJour();
    $date=$d ?? $jour;
    $presents=promoStude();
    $result=[];
 

    var_dump($date);
   foreach($presents as $present) {  
  
       if($present["day"]==$date){
           $result[]=$present;
       }       
   }  
   return $result;

}
?>
<?php
function actuel2($d) {
    $jour=obtenirDateDuJour();
    $date=$d ?? $jour;
    $presents=  $_SESSION['utilisateur'] ;
    $result=[];
 

    var_dump($date);
   foreach($presents as $present) {  
  
       if($present["day"]==$date){
           $result[]=$present;
       }       
   }  
   return $result;

}
?>
<?php
function ajouterReferent($nouveauReferent) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nouvelleDonnee = array(
        "mat" => $_POST["mat"],
        "nom" => $_POST["nom"],
        "prenom" => $_POST["prenom"],
        "day" => $_POST["day"],
        "email" => $_POST["email"],
        "genre" => $_POST["genre"],
        "tel" => $_POST["tel"],
        "status" => $_POST["status"],
        "referentiel" => $_POST["referentiel"],
        "img" => $_POST["img"],
        "libelle" => $_POST["libelle"],
        "promo" => $_POST["promo"]
    );

  
    $cheminFichierJSON = '/var/www/html/project/modeles/promotionaire0.json';
    $contenuFichierJSON = file_get_contents($cheminFichierJSON);
    $donneesExistantes = json_decode($contenuFichierJSON, true);
    $donneesExistantes[] = $nouvelleDonnee;
    $donneesMisesAJourJSON = json_encode($donneesExistantes);
    file_put_contents($cheminFichierJSON, $donneesMisesAJourJSON);
}

}





?>

<?php

function findStudentsAndReferentByPromotion($promotionNumber) {
    $studentsWithReferent = [];


    $studentsData = students();

    $referentsData = referents();


    $promotionsData = promotions();
    $promotion = null;
    foreach ($promotionsData as $promo) {
       
        if ($promo['promo'] === $promotionNumber) {
            $promotion = $promo;
            break;
        }
    }

    
    if (!$promotion) {
        return $studentsWithReferent;
    }

    
    foreach ($studentsData as $student) {
        if (substr($student['mat'], 0, 2) === $promotionNumber) {
        
            $referentiel = null;
           
$count = count($referentsData[0]); // Obtient le nombre d'éléments dans le tableau

for ($i = 0; $i < $count; $i++) {
 
    $referent = $referentsData[0][$i];
 
    if ($referent['promo'] === $promotionNumber) {
     
        $referentiel = $referent['libelle'];
    
         

      
        break;
    }
}

            if ($referentiel) {
                $studentsWithReferent[] = [
                    'mat' => $student['mat'],
                    'nom' => $student['nom'],
                    'prenom' => $student['prenom'],
                    'day' => $student['day'],
                    'email' => $student['email'],
                    'genre' => $student['genre'],
                    'tel' => $student['tel'],
                    'status' => $student['status'],
                    'referentiel' =>$student['referentiel'],
                    'img' =>$student['img'],
                    'libelle' => $referent['libelle'],
                    'promo' => $referent['promo'],


                ];
            }
        }
    }

    return $studentsWithReferent;
}

?>


<?php
  function presence_filteref($para1=0,$para2=0){
  
     $presents=promoStude();
    
     
     $result=[];
   
    foreach( $presents as $present){
     
       
        if($present["referentiel"]==$para1){
            $result[]=$present;
        }
    }
    
    return $result;
  }

?>
