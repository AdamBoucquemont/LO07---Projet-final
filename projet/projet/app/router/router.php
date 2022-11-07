<!-- ----- debut Router -->
<?php
    require '../controller/ControllerVaccin.php';
    require '../controller/ControllerCentre.php';
    require '../controller/ControllerPatient.php';
    require '../controller/ControllerStock.php';
    require '../controller/ControllerRendezvous.php';

    // --- récupération de l'action passée dans l'URL
    $query_string = $_SERVER['QUERY_STRING'];

    // fonction parse_str permet de construire 
    // une table de hachage (clé + valeur)
    parse_str($query_string, $param);

    // --- $action contient le nom de la méthode statique recherchée
    $action = htmlspecialchars($param["action"]);

    switch($action){
        //Partie Vaccin
        case "vaccinReadAll" :
        case "vaccinCreate" :
        case "vaccinCreate2" :
        case "vaccinModif" :
        case "vaccinModif2" :
        ControllerVaccin::$action();
        break;
        //Partie Centre
        case "centreReadAll" :
        case "centreCreate" :
        case "centreCreate2" :
        ControllerCentre::$action();
        break;
        //Partie Patient
        case "patientReadAll" :
        case "patientCreate" :
        case "patientCreate2" :
        ControllerPatient::$action();
        break;
        //Partie Stock
        case "stockReadAll" :
        case "stockReadByCentre" :
        case "stockModif" :
        case "stockModif2" :
        ControllerStock::$action();
        break;
        //Partie Rendez - Vous
        case "rendezvousChoixPatient" :
        case "rendezvousNVRDV" :
        case "rendezvousInserte2" :
        ControllerRendezvous::$action();
        break;
        // Tache par défaut
        default:
         $action = "SiteAccueil";
         ControllerVaccin::$action();
    }
?>
<!-- ----- fin Router -->