<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
    if($_SESSION['connect']==0){
      $lien='disabled-link';
    }elseif($_SESSION['connect']==1){

      $lien ="enabled-link ";  
    }
  
    ?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Sonatel Admin</title>
    <link rel="stylesheet" href="styleref.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="popup.css"> -->
      <link rel="stylesheet" href="css/<?=$page?>.css">
    
    <style>
  
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.sidebar{
  position: fixed;
  height: 100%;
  width: 240px;
  background: #fbfdff;
  transition: all 0.5s ease;
}
/* .sidebar.active{
  width: 60px;
  border-radius: 20px;
} */
.sidebar .logo-details{
  height: 80px;
  display: flex;
  align-items: center;
}
.sidebar .logo-details i{
  font-size: 28px;
  font-weight: 500;
  color: #fff;
  min-width: 60px;
  text-align: center
}
.sidebar .logo-details .logo_name{
  color: #000000;
  font-size: 24px;
  font-weight: 500;
}
.sidebar .nav-links{
  margin-top: 10px;
}
.sidebar .nav-links li{
  position: relative;
  list-style: none;
  height: 50px;
}
.sidebar .nav-links li a{
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;

}

/*  */
.home-section .calender input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  outline: none;
  font-size: 16px;
  color:  #67b7af;;
}


/*  */
.sidebar .nav-links li a.active{
  background:  #67b7af;
  border-radius: 50px !important;
  /* color: #fff; */
}
.sidebar .nav-links li a:hover{
  color: #fff;
  background:   #67b7af;
  border-radius: 50px !important;
}
.sidebar .nav-links li i{
  min-width: 60px;
  text-align: center;
  font-size: 18px;
  color: #000000;
}
.sidebar .nav-links li a .links_name{
  color: #000000;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
}
.sidebar .nav-links .log_out{
  position: absolute;
  bottom: 0;
  width: 100%;
}
.home-section{
  position: relative;
  background: #f5f5f5;
  min-height: 100vh;
  width: calc(100% - 240px);
  left: 240px;
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section{
  width: calc(100% - 60px);
  left: 60px;
}
.home-section nav{
  display: flex;
  justify-content: space-between;
  height: 80px;
  background: #fff;
  display: flex;
  align-items: center;
  position: fixed;
  width: calc(100% - 240px);
  left: 240px;
  z-index: 100;
  padding: 0 20px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  transition: all 0.5s ease;
}
/*  */
.sidebar.active ~ .home-section nav{
  left: 60px;
  width: calc(100% - 60px);
}
.home-section nav .sidebar-button{
  display: flex;
  align-items: center;
  font-size: 24px;
  font-weight: 500;
}
nav .sidebar-button i{
  font-size: 35px;
  margin-right: 10px;
}
.home-section nav .search-box{
  position: relative;
  height: 50px;
  max-width: 550px;
  width: 100%;
  margin: 0 20px;
}
nav .search-box input{
  height: 100%;
  width: 100%;
  outline: none;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 15px;
  font-size: 18px;
  padding: 0 15px;
}
nav .search-box .bx-search{
  position: absolute;
  height: 40px;
  width: 40px;
  /* background: #ffffff; */
  right: 5px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 4px;
  line-height: 40px;
  text-align: center;
  color: #67b7af;
  font-size: 22px;
  transition: all 0.4 ease;
}
.home-section nav .profile-details{
  display: flex;
  align-items: center;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  height: 50px;
  min-width: 190px;
  padding: 0 15px 0 2px;
}
nav .profile-details img{
  height: 40px;
  width: 40px;
  border-radius: 6px;
  object-fit: cover;
}

nav .profile-details .admin_name{
  font-size: 15px;
  font-weight: 500;
  color: #333;
  margin: 0 10px;
  white-space: nowrap;
}
nav .profile-details i{
  font-size: 25px;
  color: #333;
}




.home-section .home-content{
  position: relative;
  padding-top: 104px;
}







.home-content .overview-boxes{
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  padding: 0 20px;
  margin-bottom: 26px;
}
.overview-boxes .box{
  display: flex;
  align-items: center;
  justify-content: center;
  width: calc(100% / 4 - 15px);
  background: #fff;
  padding: 15px 14px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.overview-boxes .box-topic{
  font-size: 20px;
  font-weight: 500;
}
.home-content .box .number{
  display: inline-block;
  font-size: 35px;
  margin-top: -6px;
  font-weight: 500;
}
.home-content .box .indicator{
  display: flex;
  align-items: center;
}
.home-content .box .indicator i{
  height: 20px;
  width: 20px;
  background: #8FDACB;
  line-height: 20px;
  text-align: center;
  border-radius: 20px;
  color: #fff;
  font-size: 20px;
  margin-right: 5px;
}
.box .indicator i.down{
  background: #e87d88;
}
.home-content .box .indicator .text{
  font-size: 12px;
}
.home-content .box .cart{
  display: inline-block;
  font-size: 32px;
  height: 50px;
  width: 50px;
  background: #cce5ff;
  line-height: 50px;
  text-align: center;
  color: #66b0ff;
  border-radius: 12px;
  margin: -15px 0 0 6px;
}
.home-content .box .cart.two{
   color: #2BD47D;
   background: #C0F2D8;
 }
.home-content .box .cart.three{
   color: #ffc233;
   background: #ffe8b3;
 }
.home-content .box .cart.four{
   color: #e05260;
   background: #f7d4d7;
 }
.home-content .total-order{
  font-size: 20px;
  font-weight: 500;
}
.home-content .sales-boxes{
  display: flex;
  justify-content: space-between;
  /* padding: 0 20px; */
}

/* left box */
.home-content .sales-boxes .recent-sales{
  width: 58%;
  /* background: #fff; */
  padding: 20px 30px;
  margin: 0 20px;
  border-radius: 12px;
  /* box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); */
}
.home-content .sales-boxes .sales-details{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.sales-boxes .box .title{
  font-size: 24px;
  font-weight: 500;
  /* margin-bottom: 10px; */
}
.sales-boxes .sales-details li.topic{
  font-size: 20px;
  font-weight: 500;
}
.sales-boxes .sales-details li{
  list-style: none;
  margin: 8px 0;
}
.sales-boxes .sales-details li a{
  font-size: 18px;
  color: #333;
  font-size: 400;
  text-decoration: none;
}
.sales-boxes .box .button{
  width: 100%;
  display: flex;
  justify-content: flex-end;
}
.sales-boxes .box .button a{
  color: #fff;
  background: #0A2558;
  padding: 4px 12px;
  font-size: 15px;
  font-weight: 400;
  border-radius: 4px;
  text-decoration: none;
  transition: all 0.3s ease;
}
.sales-boxes .box .button a:hover{
  background:  #e2e2e4;
}

/* Right box */
.home-content .sales-boxes .top-sales{
  width: 35%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px 0 0;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.sales-boxes .top-sales li{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 10px 0;
}
.sales-boxes .top-sales li a img{
  height: 40px;
  width: 40px;
  object-fit: cover;
  border-radius: 12px;
  margin-right: 10px;
  background: #333;
}
.sales-boxes .top-sales li a{
  display: flex;
  align-items: center;
  text-decoration: none;
}
.sales-boxes .top-sales li .product,
.price{
  font-size: 17px;
  font-weight: 400;
  color: #333;
}
/* Responsive Media Query */
@media (max-width: 1240px) {
  .sidebar{
    width: 60px;
  }
  .sidebar.active{
    width: 220px;
  }
  .home-section{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section{
    left: 220px;
    width: calc(100% - 220px);
    overflow: hidden;
  }
  .home-section nav{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section nav{
    width: calc(100% - 220px);
    left: 220px;
  }
}
@media (max-width: 1150px) {
  .home-content .sales-boxes{
    flex-direction: column;
  }
  .home-content .sales-boxes .box{
    width: 100%;
    overflow-x: scroll;
    margin-bottom: 30px;
  }
  .home-content .sales-boxes .top-sales{
    margin: 0;
  }
}
@media (max-width: 1000px) {
  .overview-boxes .box{
    width: calc(100% / 2 - 15px);
    margin-bottom: 15px;
  }
}
@media (max-width: 700px) {
  nav .sidebar-button .dashboard,
  nav .profile-details .admin_name,
  nav .profile-details i{
    display: none;
  }
  .home-section nav .profile-details{
    height: 50px;
    min-width: 40px;
  }
  .home-content .sales-boxes .sales-details{
    width: 560px;
  }
}
@media (max-width: 550px) {
  .overview-boxes .box{
    width: 100%;
    margin-bottom: 15px;
  }
  .sidebar.active ~ .home-section nav .profile-details{
    display: none;
  }
}
@media (max-width: 400px) {
  .sidebar{
    width: 0;
  }
  .sidebar.active{
    width: 60px;
  }
  .home-section{
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section{
    left: 60px;
    width: calc(100% - 60px);
  }
  .home-section nav{
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section nav{
    left: 60px;
    width: calc(100% - 60px);
  }
}

.f{
  position: relative;
}



.disabled-link {
    pointer-events: none; /* Empêche le clic */
    opacity: 0.5; /* Réduit l'opacité pour indiquer qu'il est désactivé */
    cursor: not-allowed; /* Change le curseur pour indiquer qu'il est désactivé */
}

.enabled-link {
    pointer-events: auto; /* Permet les événements du pointeur */
    opacity: 1; /* Augmente l'opacité pour indiquer qu'il est activé */
    cursor: pointer; /* Change le curseur pour indiquer qu'il est autorisé */
}
.dropbtne {
      background-color: white;
      color: white;
      padding: 10px;
      font-size: 16px;
      border: none;
    }

    .dropdowne-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 100px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdowne-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdowne-content a:hover {
      color: #fff;
  background:   #67b7af;
  border-radius: 50px !important;
    }

    .dropdowne:hover .dropdowne-content {
      display: block;
    }
    #img:hover{
      scale:2;
    }

    </style>
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <!-- <i class="bx bxl-c-plus-plus"></i> -->
        <img src="Logo-Sonatel-Academy-480_1-1.png" style="height: 100px; width: 80%; padding: 25px;" alt="Logo_sonatel">
      </div>
      <ul class="nav-links">
        <li>
          <a href="#" >
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="?page=promos" class="<?=$lien?>" >
            <!-- class="active" -->
            <i class="bx bx-calendar-event"></i>
           
            <span class="links_name">Promos</span>
          </a>
        </li>
        <li>
          <a href="?page=referent" class="<?=$lien?>" >
            <i class="bx bx-calendar-event" type='solid'></i>
            <!-- calendar-event -->
            <span class="links_name">Référentiels</span>
          </a>
        </li>
        <li>
        <a href="?page=apprenant" class="<?=$lien?>">
           <i class="bx bx-user-circle"></i>
           <span class="links_name">Utilisateurs</span>
        </a>

        </li>
        <li>
          <a href="#" class="<?=$lien?>">
            <i class="bx bx-user-circle" ></i>
            <span class="links_name">Visiteurs</span>
          </a>
        </li>
        <li>
          <a href="?page=presence ">
            <i class="bx bx-user-circle"></i>
            <span class="links_name">Presence</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-calendar-event"></i>
            <span class="links_name">Evenements</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
        
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
        
        </div>
        
        <form action="http://www.cheikh.diop:8001/<?=$_SERVER['REQUEST_URI'];?>" method="POST">
            <input type="hidden" value="search" name="page">
            <!-- <input type="hidden" value="search_apprenant" name="page"> -->
            <div class="search-box">
            <input type="text" name="search" placeholder="Search..." type="submit"/>
            <i class="bx bx-search"></i>
            </div>
       </form>
     
        <div class="calender" style="margin-right: -300px; margin-top: 10px;">
          <input type="date" name="" id="">
        </div>
        <div class="profile-details">
          <img src= "<?=$_SESSION['img'][0]?>" id="img"  alt="" />
          <span class="admin_name"><?=$_SESSION['prenom'][0]?><br>&nbsp;
          <?=$_SESSION['nom'][0]?>
         
        </span><br>
          
          


          <div class="dropdowne" >
            <button class="dropbtne" id="dropdowne-btn"><i class="bx bx-chevron-down"></i></button>
            <div class="dropdowne-content" id="dropdowne-content">
              <a href="#">Profil</a>
              <a href="#">Parametre</a>
              <a href="deconect.php">Logout</a>
            </div>
          </div>
        </div>
      </nav>

 
        </body>
        