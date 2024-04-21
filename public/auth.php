<?php
session_start();
include('/var/www/html/project/modeles/front-data.php');

if(isset($_POST['valider'])) {
    $utilisateurs_correspondants = []; 

    foreach ($promotionaire as $personne) {
        if ($personne["email"] == $_POST['email'] && $personne["mat"] == $_POST['password']) {
  
            $utilisateurs_correspondants[] = $personne;
            $nom[]=$personne['nom'];
            $prenom[]=$personne['prenom'];
            $img[]=$personne['img'];
    
          
        } elseif($_POST['email'] == "admin" && $_POST['password']== "admin" ){
            
        }
    }

    if (!empty($utilisateurs_correspondants)) {
    
        $_SESSION['utilisateur'] = $utilisateurs_correspondants;
        $_SESSION['nom']=$nom; 
        $_SESSION['img']=$img; 
        $_SESSION['prenom']=$prenom; 
        
        $_SESSION['connect'] = 0;

        header("Location: http://www.cheikh.diop:8001/project/public/?page=presence");
        exit();
    } elseif($_POST['email'] == "admin" && $_POST['password']== "admin" ){
        $_SESSION['connect'] = 1;
        header("Location: http://www.cheikh.diop:8001/project/public/?page=presence");
        exit();
    } else {

        echo "Identifiants incorrects";
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
    *{
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      /* background-color: black; */
      z-index: -3;
    }

    body{
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1;
      width: 100vw;
      
    }
    
  



    .my-div{
      width: 56%;
      height: 65%;
      background-color: whitesmoke;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 2;
      box-sizing: border-box;

    
    }

form{
    background-color: white;
}
.input{
    background-color: white;
    height: 40%;
    width: 98%;
    padding: 10px;
    border-radius: 10px;
    
}
.checkbox{

   

}
input[type="text"]{
    height: 4vh;
    width: 95%;
    margin-left: 0.6rem;
    border-radius: 5px;
    
}

button{
    height: 4vh;
    width: 90%;
    margin-left: 1rem;
    background-color: green;
    color: white;
    
}
i{
    font-size: 1.2rem;
    
}


p{
    margin-left: 10px;
}
img{
  position: relative;
  left: 50px;
}
  </style>
</head>
<body>

  <div class="my-div">   

          <div class="div2">
            
            <div class="photos"><img src="logo.png" width="30%" alt=""></div>
          <div class="input">
             <form action="#" method="POST">
                   <input type="hidden"  name="form">
                    <input type="text" readonly placeholder="Email et de Passe Requis"    style="background-color: salmon;"><br><br>
                    <p>Email Addresse <b style="color: red;">*</b> </p><br>

                    <input type="text" placeholder="Email Addresse" name="email"><br><br>
                    <p>Password <b style="color: red;">*</b> </p><br>
                    <input type="text"  name="password">
                 
                    
         
          </div>
          <br>
          <div class="checkbox"> <input type="checkbox">  <i class="i">Remember me &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;mot passe oublier</i> </div><br>
          <div class="button"><a href="#"><button type="submit" name="valider"><b>LOGIN</b></button></a></div>
          </form>

          </div>


  </div>
  </div>
</body>
</html>







