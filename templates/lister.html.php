<?php

include("../modeles/data-apprenant.php");

@$page = $_GET["page"];

if(empty($page)) $page = 1;

$nepg = 9;

$nbr = ceil(count($students) / $nepg);


$debut = ($page - 1) * $nepg;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Apprenants</title>
    <style>
      
    </style>
</head>
<body>
    <div class="container">
      
        <div class="tableau">
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                
                </tr>
                <?php
                for ($i = $debut; $i < $debut + $nepg && $i < count($students); $i++) {
                    $student = $students[$i];
                    echo "<tr>";
                    echo "<td>" . $student["nom"] . "</td>";
                    echo "<td>" . $student["prenom"] . "</td>";
                    echo "<td>" . $student["email"] . "</td>";
                 
                    echo "</tr>";
                }
                ?>
            </table>

        
            <ul class="pagination">
                <?php
               
                for ($i = 1; $i <= $nbr; $i++) {
                    echo "<li><a href='?page=$i'>$i</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>
