<!-- ----- debut ControllerCentre -->
<?php


require_once '../model/ModelCentre.php';

class ControllerCentre {
    
    // --- Liste des centres
    public static function centreReadAll() {
        $results = ModelCentre::getAll();
        include 'config.php';
        $vue = $root . '/app/view/centre/viewAll.php';
        if (DEBUG)
         echo ("ControllerCentre : centreReadAll : vue = $vue");
        require ($vue);
    }
    
    // --- Affiche le formulaire de creation d'un centre

    public static function centreCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/centre/viewInsert.php';
        require ($vue);
        
        
    }    
     public static function centreCreate2() {
        $results = ModelCentre::insert(
            htmlspecialchars($_GET['label']), htmlspecialchars($_GET['adresse'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/centre/viewInserte2.php';
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerCentre -->
