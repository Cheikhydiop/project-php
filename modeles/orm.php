<?php
function load_file($file_path) {
    $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
    switch ($file_extension) {
        case 'csv':

            return load_csv($file_path);
            break;
        case 'json':
            return load_json($file_path);
            break;
        default:
            return null;
            break;
    }
}
function load_Students($file_path) {
    $donnees=[];
    if (($handle = fopen($file_path, "r")) !== FALSE) {
        $headers = fgetcsv($handle, 1000, ",");
        while (($data = fgetcsv($handle, 100000, ",")) !== FALSE) {
        
            $donnee=array_combine($headers,$data);
            $donnees[]=$donnee;
        }
        fclose($handle);
    }
    return $donnees;
}
function load_referents($file_path) {
    $donnees=[];
    if (($handle = fopen($file_path, "r")) !== FALSE) {
        $headers = fgetcsv($handle, 1000, ",");
        while (($data = fgetcsv($handle, 100000, ",")) !== FALSE) {
        
            $donnee=array_combine($headers,$data);
            $donnees[]=$donnee;
        }
        fclose($handle);
    }
    return $donnees;
}
function load_promotions($file_path) {
    $donnees = [];
    
    // Vérifier si le fichier existe
    if (!file_exists($file_path)) {
        // Créer le fichier s'il n'existe pas
        $handle = fopen($file_path, "w");
        fclose($handle);
    }
    
    // Charger les données du fichier CSV
    if (($handle = fopen($file_path, "r")) !== FALSE) {
        $headers = fgetcsv($handle, 1000, ",");
        while (($data = fgetcsv($handle, 100000, ",")) !== FALSE) {
            $donnee = array_combine($headers, $data);
            $donnees[] = $donnee;
        }
        fclose($handle);
    }
    
    return $donnees;
}




function load_json($file_path) {
    $donnees = array();
    $nom_fichier_json = __DIR__ .'/presence.csv';
    $chemin_fichier_json = $nom_fichier_json;
    if (!file_exists($chemin_fichier_json)) {    
        file_put_contents($chemin_fichier_json, '[]');
    }

    $contenu_json = file_get_contents($chemin_fichier_json);

    $donnees = json_decode($contenu_json, true);
    return $donnees;

}








?>

<?php
function load_promo($file_path) {
    $donnees = array();
    $nom_fichier_json = __DIR__ .'/promotionaires.json';
    $chemin_fichier_json = $nom_fichier_json;

    if (!file_exists($chemin_fichier_json)) {    
        file_put_contents($chemin_fichier_json, '[]');
    }

    $contenu_json = file_get_contents($chemin_fichier_json);

    $donnees = json_decode($contenu_json, true);
    return $donnees;
}
?>


