<?php
// phpinfo();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Vérifier si le bouton toggle est coché
    $valeur = isset($_POST['toggle']) ? 1 : 0;

    // Stocker la valeur dans la session
    $_SESSION['toggle_valeur'] = $valeur;
    var_dump(  $_SESSION['toggle_valeur']);
    // $tempsAttente = 5; // en secondes

    // Rediriger vers une autre page après le délai spécifié
    // header("http://www.cheikh.diop:8001/project/public/?page=referent");// Assurez-vous de terminer le script après la redirection
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nouveau référentiel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Votre CSS */
    </style>
</head>
<body>
    <!-- Votre HTML -->
</body>
</html>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nouveau référentiel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 10px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
  border-radius: 34px;
  width: 41px;
}

.slider:before {
  position: absolute;
  top: .2px;;
  content: "";
  height: 10px;
  width: 10px;
  left: 4px;
  bottom: 4px;
  background-color: black;
  -webkit-transition: .4s;
  transition: .4s;
  border-radius: 50%;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
        </style>

</head>

<body>
    <div id="bh-reference" class="flex-sbc">
        <div class="first">
            <span class="bold">Référentiels</span>
        </div>
        <div class="second">
            <span>Référentiels ></span>
            <span class="bold">Liste</span>
        </div>
    </div>
    <section id="section-referentiel" class="flex">
        <div class="content-ref flex">
        <?php 
           
       if(isset($_POST)){
        var_dump(  $_SESSION['toggle_valeur']);
       }
            
          ?>

<?php
// Vérifier si des données ont été soumises

      


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if( $_SESSION['toggle_valeur']==1){


 
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


    $cheminFichierJSON = '/var/www/html/project/modeles/promotionaires.json';
    $contenuFichierJSON = file_get_contents($cheminFichierJSON);
    $donneesExistantes = json_decode($contenuFichierJSON, true);
    $donneesExistantes[] = $nouvelleDonnee;
    $donneesMisesAJourJSON = json_encode($donneesExistantes);
    file_put_contents($cheminFichierJSON, $donneesMisesAJourJSON);
   
   
}

}
?>


















        <?php
$referentiel_deja_vu = array(); // Tableau pour stocker les référentiels déjà rencontrés

foreach(promoStude() as $referent):
    // Vérifier si le référentiel a déjà été rencontré
    if (!in_array($referent["referentiel"], $referentiel_deja_vu)) {
        // Si le référentiel n'a pas encore été rencontré, l'afficher et le stocker dans le tableau
        $referentiel_deja_vu[] = $referent["referentiel"];
?>
        <div class="box">
            <div class="head">
                <span class="icon"><i class="fa-solid fa-ellipsis"></i></span>
            </div>
            <div class="head-content flex-col">
                <div class="box-img">
                    <a href="http://www.cheikh.diop:8001/project/public/?page=apprenant&ref=<?=$referent["referentiel"]?>&p=<?=$referent["promo"]?>"  onclick=" return confirm()"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMQEhUSEhITFRUXFhUXFRUWFhgXFRUXGBIXFhYXFhgYKCggGBolGxYVIjEhJikrLi4uFx8zODMtNygtLisBCgoKDg0OGxAQGislHyUtKy0tLS0xLS0tLS0tLS0tLS0tLS0rLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAKgBLAMBIgACEQEDEQH/xAAcAAEAAgMBAQEAAAAAAAAAAAAABgcDBAUBAgj/xABPEAABAwEDBwcHCAYHCQEAAAABAAIDEQQSIQUGEzFBUpEUFiJRYZLRFRcyU1Rx4QdydIGhsbLCIzNCc6LBQ2KCg5Oz8CQlNDVjo8PS8YT/xAAaAQEAAwEBAQAAAAAAAAAAAAAAAQIDBAYF/8QANREAAgEBBQUHAwQCAwEAAAAAAAECEQMSIVFhBBMxkaEUIkFxgZLRMrHhBTNCwXLwFSNiFv/aAAwDAQACEQMRAD8AulpXqxROWVZJ1NQiIpARFHs7svvsQjuMa6/freJFLt3VT5yrKSiqsmMXJ0RIUVYj5VK6mRH/ABF750juRf8AcVN9HXkybusfcvks1FWXnSO5FwkTzpHci4SJvo68mLusfcvks1FWXnSO5FwkTzpHci4SJvo68mLusfcvks1FWXnSO5FwkTzpHci4SJvo68mLusfcvks1FWXnSO5FwkTzpHci4SJvo68mLusfcvks1FWXnSO5FwkTzpHci4SJvo68mLusfcvks1FWXnSO5FwkTzpHci4SJvo68mLusfcvks1FWXnSO5FwkTzpHci4SJvo68mLusfcvks1FWXnSO5FwkTzpHci4SJvo68mLusfcvks1FWXnSO5FwkTzpHci4SJvo68mLusfcvks1FWXnSO5FwkTzpHci4SJvo68mLusfcvks1FWXnSO5FwkTzpHci4SJvo68mLusfcvks1FWXnSPq4v+4trJvyiume0COMtL2tcQXVFSK69tCodvBca8mSoN4Jp+TT/ssNF8RPvNDusA8QvtbFAiIgPCsRcvZH7FjVJMlHNynlhsJEbWulmd6MTNZ952Dt40WvDy2cm9LFBSvRYwyOoDTFzqCteqq+M2bC/RCcOAllbfeXAFwa4h0bR1ACteskqS0HUqxheVW+Ph8+JraWsbNuEEnTBtpOudE8FTyqR+Kx2u8Ryl2FcXRgtwdQYCmsY6167KVps5OmjbKxtLz4gbzQdrmHZhsr2kLYyTGBabWd6SMjtAs7AfqrUe+q67hgaa+v7leUIr6Hl418NarDh96GUbeT+uKfol1il/fka9itrJ2B8bg5p2j+aiHym6rP75PyLO48itsIa4GO0VbIBqbLUVIGype00+d1rX+U3VZ/fL+RYWsq2Uk+Kw+33R0ws1G0hKP0yVVn4pp6pprXiU7k39W36/xFbK08lyAxgbcfxFbi0PLSWLCIigigREQUCIiCgREQUCIiCgREQUCIiCgREQUCIiCgREQUCIiCgW/mj+sd9Ib/AONaC380f1jvpDf/ABrG3+g+l+lr/v8ARl9Wf9U35rfwhcu32wwimlkLqYANbj9YaaLrWf8AVN+a37goxljJ84c+cS4DEAEgho2dWC1tpyjHunVNtLA+Rl6Sn9KdZDgG0IG3FoXzLnXJ+yxo7SSfBauSrK60P6ZPR9Ik0dQg9Gh16iuvLm5GS6lQKdEDWHdpOsasPeuSLt5xrF/b4Mk5yWDNKDOWUkDRtcT1Xh4rr8ptHqWHtDzT7liyZZGQNoQcaVLv2jT9ltT1kUXVjN4VGo9i2soTp3pY+mHQvG9TFkdzMysx0TY3tItEV2CRtOkLputcRu0AxUjyhZNMy5pJI8QSYzdcQNba6wD2UPauNlnN5szxPE90NoGqVm3seP2h/rFajLZb4DWSzsnwpejddNB1tO3gtoWjgqSXDxWPT8HbbWMbWTlBpV4xbpTOj4NZY18yS2OwxwikbA3rOsnbiTicSda2CVFG5xWmrqWKZxJwDi1rW4aq9S1JLDb7WXaQtsrH0vtiJ0hAFKEn+QCl2sf4pv0+/wAlFs0v5tJeafJRq+lM2kY3TcuyhCI20ZATJMQajSAjo3hrNWN+1ffym6rP75fyKT5DyXDZYxHE26Np2uPWTtUY+U3VB75fyLK0i1ZSb4vHqjdWilaQjH6Yqirx8W2/Crbbw4cNSj7H6I9x/EVux2jr4rRsnoD3H8RWZG6M8s+LOg11dS9Wg1xGpZ47T1qykQbCLxrgdS9VgEREAREQBERAEREAREQBERAERCUARfDp2jbX3LA60nYEqgbRWJ84HatVzydZXyqXgZX2gnsXZzK9I/SG/excFd7Mr0v/ANDfvYsrV93kfR/TP3vRl9MvaEXaXrgperSt0UrTGi0S20HCTkxYfSAElSKYgVNKrfs7/wBG35rfuCwWodE3XUcQQ01wBIwNF1PE7r11PBGOx2eOMXWN21qcTWlK1OOpbRK41jsl26NEWyD0pS4UPWa1qa+5dVxwNNeypUd1OkeBRRlFd+ldHXrwNO2ZOhmN54JNKDpEU16hqrr4LassNxobVxptccetcaPJZJLu00BJwO1wB2nrWXyc8/tO/wAR6zrFS+mXL8llZulax5/g3XWwMLr0ldrWtFS0UxGGvFZbFaxKwPG3ZtA2VGw0pguHlRt19bpbeoSSOiDtx2/FfOTzUh7TU7KDXikdkcoKUbRqudGvwXvxVVy4/wC6knvr6WtZrxJvU7KDUCBr6zW9xC2VTZ5SlBORIUM+Ul1RB75PyKZKGfKRqg/vPyKbf9tmlj9aKTsnoD3H8RWVYrJ6A9x/EVlUvieblxYREUFT0FZG2gjtWJEBsi09YX2J29a00VrzBviQdYXt4da56JfB0UXORL4OjVeF46wueiXwbxlb1hfJtDVpol4G0bSOor4NpOwBYEUXmDIZnHavgleIoqAiIgCIiALu5l+kfpDfyLhLu5l+kfpDfyLO1+nkfR/TP3n/AIstrK+cIsbYw5l4OY3UKn0cdoXL59Rep/gHitPP/VB80fhCh65rfaLSNo4p4fg9Js+zWc7NSksSec+YvU/wDxTn1F6n+AeKga3si2UTTsjdqcSDT3E/yWEtttIxcm8FobPY7FJuj5ku59Rep/gHivOfUXqf4B4rLzQs3/U7w8E5n2b/AKneHgvn/wD0EM3yXyYbvZsmS4xnsPYRSqwwWUR1usArrunhgaLWtNtlbIW0bcANDw1g9leCiOU8/S0kQxyStbTSP9BgbtINCXUw2da9HLZ7JR73dT1ePp4nHZ2M54pE/jHXgvXPA1kD6woTkjOyC1P0bXkPpW67bhU3XajT+S7DXA6iCuqzso3Uoy8i/Z2uLJCCoX8pGqD+8/IpTk59WU6sP5qLfKRqg/vPyLn2jCDRnZKlokUnZPQHuP4isqxWT0B7j+IrKj4nmpcWERFBUIiIAiIgCIiAIiIAiIgCIiAIiIAiIgCIiAIiIAu9mX6R+kN/IuCu9mX6R+kN/Is7X6eR9H9M/ef+LJzn9qg+aPwhQ9TLPxtRZwMTdH4QoraMnysaXltWt9Jwc1135wBqOC4Npi943r/SPV7LKMbBNtLzdPE11vZFtbYZ2SOqWtJJpifRIwr718WTJ0swJjYXAbRq7MVr2iF0brr2OaaVoRTCusdmGtJ7Faux3ko9x4cY+XBOvQntVjK0djXveT+9KdScc9bPuT92P/2TnrZ9yfux/wDsoMyJzgSGkgayASB7+pfC+L/xOz68/wAE9nhrzLUzvyc60ROjbIYy9tA8bCDXHsOo9lVXrrDbrFA5hs8cwDqB4e26G0OJZSobqrWp7VbOUmVZXqNf5KO2uyvkdTSARkUcwM6Tsd+uAOA1da9la2ELazpJV/37Z0xOHZ7RqKx4ECzTyC+J5tEjtI97TdEYJDQTV1dmOGyikVmtRoHmKQFpIc2lHXi03WjqJNF3LNkwhjm3nkuoLzG3CAAAA276NKLYiyNQtIY6rTUEuOJ3iCeke0rg/wCNrNWs5d9OvhRJPBUo/N444pPGq6ntUIpxXA28gzlzRVpaXNa4tdS8DTEGm3H7Fw/lI1Qf3n5FIrLY3tcHYduOxZMpZLitAAlZepW6dorStOAXftEbyaR81zStLyPznBY5WtoYpNuwdZWTk0nqpOA8VfPNGy7h4/BOaVl3Dx+CypaZLqcD2HZ34y6FDcmk9VJwHinJpPVScB4q+eaVl3Dx+Cc0rLuHj8FF20yRHYNnzl0KG5NJ6qTgPFOTSeqk4DxV880rLuHj8E5pWXcPH4JdtMkOwbPnLoUNyaT1UnAeK85LJ6mTgPFX1zSsu4ePwTmlZdw8fgl20yQ7Bs+cuhQ3JpPVScB4pyaT1UnAeKvnmlZdw8fgnNKy7h4/BKWmSHYNnzl0KF5LJ6mTgPFe8mk9VJwHir55pWXcPH4JzSsu4ePwS7aZIdg2fOXQobk0nqpOA8U5NJ6qTgPFXzzSsu4ePwTmlZdw8fgl20yQ7Bs+cuhQ3JpPVScB4pyaT1UnAeKvnmlZdw8fgnNKy7h4/BLtpkh2DZ85dChuTSeqk4DxXnJZPUycB4q+uaVl3Dx+Cc0rLuHj8EpaZIdg2fOXQobk0nqpOA8U5NJ6qTgPFXzzSsu4ePwTmlZdw8fgl20yQ7Bs+cuhQ3JpPVScB4pyaT1UnAeKvnmlZdw8fgnNKy7h4/BLtpkh2DZ85dChuTSeqk4DxXnJZPUycB4q+uaVl3Dx+Cc0rLuHj8Eu2mSHYNnzl0KG5NJ6qTgPFdzNGBzHdNpbWdpAOunQFfsKt3mlZdw8fgjM07MCCGEEGoNdRH1KJQnJUwNtn2exsJXo3uDWNCO57QufoQwVIY0kVAIq3A4+5czLWSSI5pGTNkkl0WkYHjpBhBo0VoNQ/wDmBs3k7aAFoNAAKgE0CcmZuM7oUSsG5qV50rVrNYYPHhqqPXA6d7KiSbVMvOuOGPlw5lT2KzSGOWJ+Eb2jo3qVIe2gaWkXTStesCi+cr2eaSW8emA0NaQRdaGktoKmuN0OqcTfxVs8nZuM7oTk7NxndCjs/wD1bquHGtMTftbv37uPm6Y08PRFWZG0kD6uYS0ggirdo1nHFbHIbP6o8T4qy+TM3Gd0Jydm4zuhYP8AT0/5sv291rdRlIrgjWgagB7gvUX0TgPEXqIAi8XqAIiIAiIgCLxeqAEREAREUgIiIAiIgCIiAIiIAiIoAREUgIiIAiIgCIiAIiKAEREBi07d4cU07d4cVy14uffs23azOqbQzebxVc5fzmllmOhleyMYNuki9TW406/uW5nrlfQsEWIvg3jQ0Da0pXtKhHL4977Cs52k5YGkLOKxZ2vLlp9ol75Xnly0+0S98rQja5wBF2hxGJ1cF7oX9Te8fBY3nmbXVkb3ly0+0S98r3y5afaJe+VoaF/U3vHwTQv6m94+Ci88+ouLI3/Llp9ol75Ty5afaJe+Vxn2xjSQ40IwOsrzl8e99hVu/qV7mh2vLlp9ol75UyzDtskkL5JZS8GQtZecSQGC67X/AFr3BVlytr6MjcL73NY2taXnODRXsqVa2T7G2CJkTPRY0NHbTWT2k1P1rSzlKLqylpFPBHc07d4cU07d4cVy0Wu/lkZ7pGpnrlMxQDRvIe54ALTQgAEnV7gPrUH8uWn2iXvlb+fduDXsYa9FpccDTpGgx/sqLcvj3vsKxnKUnU1hGKR2fLlp9ol75Ty5afaJe+VyYrU15usIJ6jULY0L+pvePgs25Liy91Pgjf8ALlp9ol75Xnly0+0S98rR0L+pvePgmhf1N7x8FF559SbiyN7y5afaJe+V75ctPtEvfK5kxLBefdA6wSf5LBy+Pe+wqayIaiuKJhmrluU2ljZZnuY680hziRWlQce0DirB07d4cVSljykxr2uaSS1wdgCdRCtYGuI2raFpKKozKcIt1R1dO3eHFYLc6/G9rJA15Y4NdXU4tIaeNFpIr795Ge6WZXMWX7S4A6eX3X3YHURxX35ctPtEvfKxZ0wtstqfU0ZL+laOpxNJBQdvS/tFcrl8e99hWDvVwqdCuteB2vLlp9ol75Xnly0+0S98rjcvj3vsK2Y2ucA5t2h1YnVwVW5LiSlF8EdDy5afaJe+U8uWn2iXvlaOhf1N7x8E0L+pvePgovPPqTcWRv8Aly0+0S98r6jy9aWkHTyGhBoXEg0O0bQudoX9Te8fBaz7YxpIcaEaxiVKcnwZFEuKLjyRlZloibICAT6Ta+i4ax/rrC3NO3eHFVTmrlxscwYCS2QhpABwJNGu4n7VYS6VbypijndkvBnU07d4cU07d4cVy0U7+WQ3SzNtERQQR/PzJT7XYpIIm3nOMZAqG1uytccXYagqhydmRaLRf0UZdccWO6bBRw1jE4q/woj8nuq1/SX/AHK0eDIbo0iJQQOgjEbxRzG3SKjW3Aio16l9RNc4B14444ALvfKlEXNstNkrnHsAZUn/AF1r4ybnc6KJkYhabrWtreIrQUrqWbgoQvV4vKv+44mkZuUqU4LM4+idvHuheWd5NQf2TRSLns/1De+fBaGSs5nQumcImnSSF5q4ildmrFVopRddPDXQvVxkqLjXx01IraMwbVO50zISWvJc06SMVB1YE1C5+UcyLRZ7mljLb7gxvTYauOoYHBXjki2meFkrmhpcCaVrheIGPaKH61HflCOFl+ks+4reFW0qmE20myvbNmjNYbRZZJm3L1phY0XmuJ6VSatrSlAPrV2GAdqifyhO/SZP+mx/yUwVZYpVIjxZjMC80HasqKl1F6s4edWS3z2OeFgvOeyjRUCpvA6zgNSp6PMid0zrOIzpWtDnNvswBpQ1rT9obVfyiOTj/vi0/uG/dEtILB0Kyk1QrmyZty2G0xiZha5zXlovNdUDA+jVdyVxvBowqCa+5SHOm1NiypYZHnotjtBP+G7AdtcFpWjOdzrTHPogCxr2ht40N6uJNO1VlBXk2/4t58Klozldos0c3RO3j3QsU5cwXr1cRgRTWVJuez/UN758Fz8u5zOtEJjMTW1LTUOJODgepUs6Smk6YvJfBpOqi2l1ZwM4YdJCWbzmAe8vFBxXFt+Y9ogYZJYi1jaVOkYaVIAwBrrIUxzry6LTDC0sDHNtcBwNQW0eK195HFSj5QWAWGanXH/mtV7KOCSfF/Bna2jrKqIn8nGbE1lnM72FrHwkNN9precxwwBqMAVYqxZJhBgix/oo/wAAW3oO1UkpNkpowovoxFeFh6lWhapXPyk5Lda7VZoWUvGKUtGqt03qVOqoCh8mZc7ZWwGM6RzS5rb7MQK41rT9kqycsn/e1h/dz/hK+8of82s/7l33SreuCX/lvlUyeFXqV95urX6k/wCJH4rtWWzOgiEbhR0bbrhgaFuBxGB1Kz1EMp5yuIliMTR+sjJvGu1pOpYSd5pM2jVVocKEOcA69SorgAvrRu3jwC6mTc53RRMj0TTdbSt4iv2LZ53u9S3vHwScqSaw4vwWfkTBVinovFnAgkJJadYNPf8AUuLlHMy0Sl9oERLDV96+wdEDE0JrsK7eTXulypDNSgL5a0xoTC80VgZX/UTfupPwFaSioTrHxoUU3KNH4VIL8lmQ5IXvnLSI5Iy1rrzTUiQVwGI1FWMuBmN/wUX9v/Mcu+q2n1sQximERFQsbaIi2MjBa7WIxU4nYOv4Kvc1nV5QeuZx4qwbbZtI2mAOFCRqxUJzKyeZBaKOApO4Y12BaQpdfoZy4r1NHOzSNbpBdcwXW3NTquNCanDq4LnzWKSOaKCsdZA8g40FwVNeK7+etkdHZzepS+wA9fSWxacgzyWmzTtaDGxkt43gD02gNwU3YOOOvRYE3pJ4afc43kObfi4OXGygZIHStIadGIyXDUb7mtAG3C8NasjyXJ1DiFDcrZHltM9qhiaC+7BgXADoyMJxPYCos4QdU+H5QnaTwdSRwsDWho1AAD6guHnXqg/fN+4qYMyO6gq5o7MVHM9snmMWergaztH2FXs33kVmnRm7NZ2vIvMa4tNW1AJDthbXUVJsnWbRsodZxPgue+wmJzCSDV7Rh712li3gXSCIigscvLk9AGdeJ9w1fb9yhdk/5hL+7b9zFYNrswe0igqRQEjVioTYcnk5TnjvCoiaa401R+K1s3g/L4M5LFeZq5z2d13TNDDo2OOI6Z20adgXJyPYpLVGJgWNxc2hrUUNDqUszpsZjgkBINY3HDsC5eYlnc6zNA2vmpj1SGqXY3XLx4egvyrd9TV8hzb8XBy8OQZjrfH/ABKY+S5OocQsc1hewVcBTDaNpWaUU6ou7STVGyv8iiS0ve0NYBG4YvFWuIeRgPe3apFnV/wr/wCx/mNXLzHjOltHzyOM0ngVIc9MmGOxyOLgaFmqu2RoWygoTSjoZylKUavU2MhTXBEdlxgPuLQFLFxMgZOpHG511wMTMKdbWnau2sZcTSPALx7agg6iKL1FBJFLbk9rZAXMaXNrceQKgHqOxR+2N/2+H92fuepzlSHSSMbWlQcftUUt2TyMpwR3hUxONcaf0ngtrP8ApmU/7RumLtUPzhmdHLKGtDrsbJCNpvPuUHCqsfyM7fb9qheduQ5o3WicgaIwxMDg4VLhPX0de0KsIQlJJkylJLAwjJE1B0o/4lqW6zyQmMExnSSNjFK4E1xPZgp1Z8nvcxrgBQgUxHUudlvNyeV1nLGt6E7Hv6QFGgGpHWcVRQi5Ymm8klREYs8ErbRom3AQ0SX8buulANe1SC3H9HJ8x34SteKxuOUHRj0tCNvU4LsZRyQ9sMjiQKRvNPcwqZKjT8iE6p+phzGtg5NHGcD0qHr6Zw96k6jGYtl/2aN5oah1BTV+kPgpOs7X635svZ/SgiIsy5toiLYyPVz8kWLQ36Ma288u6IArXaabURSDl57ZOmtMNyJgcQ5p1gE4468MAsvkqTqHFES+6U8yt3Gp75Jk/q8VyrPkGcWqWQsFxzGAOvDEilRTWvUUqTxDisCW2eIMaGjYP/q1Mr2ETXKsa668O6QBpTaK7URQsCTatFnDy0knomoWVEUEoIiIAtCGwgWh81xoLmgXqC8fRwJ10w+xEQM086snyTwvbEKuLHNAqBWuwVXPyLm6+GFjA0Nwq4F1aOdi7r21RFKm7tCriq1N7yTJ/V4rzyVJ/V4oiVZa6cjIebctntExDKRuLHAl4N41LnU1kYuOtSrK1l00TmFodWnRcAQaOB24bF6ilzcnVlVFJGazsusa2lKNAoNQoKUWREVWWQREQGJ9nBe19TVtcNmK1ZrCDaGTXGktaW36C8K3sAde37URSiGb6imdmQ5ZYpGwtvF10gVAPpAnX9a9RIujTElVG4zJMlBg3UNvYvTkqTqHFeIpbF00LFkeeO3Ga4LmiDb14UJvCo6607FKrSy8xzaVq0ih1GopQoihurQSoamTbCI4msuhlK4NpQVJOoYLK6MheoqtVdS0Wz4REWRof//Z" alt=""></a>
                </div>
                <div class="info  flex-col">
                    <div class="info-name"><?=$referent["referentiel"]?></div>
                    <div class="status"><?=$referent["promo"]?></div>
                </div>
            </div>
        </div>
<?php
    }
endforeach;
?>

 
            
        </div>
        <div class="add-ref flex">
            <form class="box" method="POST" action="">
                     <div class="head">
                         <span>Nouveau Referentiel</span>
                     </div>
                     <div class="head-content flex-col">
                    <label for="libelle">Libelle</label>
                    <div class="saisie">
                        <span class="box-icon">
                            <i class="fa-regular fa-user"></i>
                        </span>
                        <input type="text" name="referentiel" placeholder="Entrer le libelle">
                    </div>
                    <label for="desc">Description</label>
                    <div class="saisie">
                        <span class="box-icon">
                            <i class="fa-regular fa-user"></i>
                        </span>
                        <textarea name="promo" cols="30" placeholder="Entrer le Description"></textarea>
                    </div>
                  <form method="POST" >
                    <label for="in" style = 'visiblity:hidden ' ></label>
                        <input id="in" type="checkbox" id="toggle" name="toggle" <?php if(isset($_SESSION['toggle_valeur']) && $_SESSION['toggle_valeur'] == 1) echo "checked"; ?>>
                        <input type="submit" value="Enregistrer">
                    </form>

                <label class="switch">
                <!-- <input type="checkbox" id="toggleButton"> -->
                <input type="checkbox" id="toggle" name="toggle" <?php if(isset($_SESSION['toggle_valeur']) && $_SESSION['toggle_valeur'] == 1) echo "checked"; ?>>

               
                <span class="slider"></span>


   
                </label> 
                <button type="submit" name="valider" value="Enregistrer">Enregistrer</button>
                        
                </div>
            </form>
        </div>
    </section>
    <footer id="footer" class="flex-cc">
        <!-- <div class="content">&copy; Sonatel Academy</div> -->
    </footer> 
   

    <form method="POST">
    <label for="toggle">Toggle Button</label>
    
</form>



    
</body>


</html>
