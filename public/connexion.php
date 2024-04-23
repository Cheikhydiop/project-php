
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
      /* background-color: black; */
    }
    

    /* .my-div{
      width: 62%;
      height: 65%;
      background-color: orangered;
      display: inline;
      justify-content: center;
      align-items: center;
      z-index: 2;
      box-sizing: border-box;

    
    } */



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
                    <input type="submit" name="valider">
                    
             </form>
          </div>
          <br>
          <div class="checkbox"> <input type="checkbox">  <i class="i">Remember me &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;mot passe oublier</i> </div><br>
          <div class="button"><a href="#"><button><b>LOGIN</b></button></a></div>
       

          </div>

  </div>
  </div>
</body>
</html>


