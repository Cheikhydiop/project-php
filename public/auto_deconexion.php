<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message centré</title>
    <style>
        /* CSS pour centrer le message */
       
            .center-message {
  /* text-align: center; */
  margin-top: 100px;
  position: absolute;
  top: 406px;
  left: 597px;
}
            
        
    </style>
</head>
<body>

<div class="center-message">
    <?php
 



// Vérifier l'activité de la session et déconnecter si inactif
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 10)) {
    echo "VOUS VENEZ D'ETRE DECONNECTER!";
    session_unset();
    session_destroy();

    header("Location: http://www.cheikh.diop:8001/project/public/auth.php?msg=Vous avez été déconnecté en raison d'une inactivité prolongée!"); // Redirection vers la page de connexion
    exit();
}

// Mettre à jour le temps de dernière activité
$_SESSION['last_activity'] = time();
    ?>
</div>



</body>
</html>
