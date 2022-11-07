<!-- ----- debut ControllerStock -->
<?php
require_once '../model/ModelStock.php';
require_once '../model/ModelCentre.php';
require_once '../model/ModelVaccin.php';

class ControllerStock {
    
    
    // --- Liste des Stocks en fonction des centre et des vaccins
    public static function stockReadAll() {
        $stocks = ModelStock::getAll();
        $nbrVacc = ModelVaccin::getNbrVacc();
        $TabVaccins = ModelVaccin::getAllLabel();
        $TabCentres = ModelCentre::getAllLabel();
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewAll.php';
        if (DEBUG)
         echo ("ControllerStock : stockReadAll : vue = $vue");
        require ($vue);
    }
    
    // --- Liste du nombre de vaccins par centre
    public static function stockReadByCentre() {
        $stocks = ModelStock::getByCentre();
        $TabCentres = ModelCentre::getAllLabel();
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewByCentre.php';
        if (DEBUG)
         echo ("ControllerStock : stockReadByCentre : vue = $vue");
        require ($vue);
    }
    
    // --- Affiche un formulaire pour changer le nombre de dose d'un vaccin par centre
    public static function stockModif() {
        $vaccins = ModelVaccin::getAllLabel();
        $centres = ModelCentre::getAllLabel();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewModif.php';
        require ($vue);
    }
    
    // --- Permet de modifier le stock
    public static function stockModif2(){
        $centre = htmlspecialchars($_GET['centre']);
        $id_centre = ModelCentre::getIdByLabel($centre);
        $vaccin = htmlspecialchars($_GET['vaccin']);
        $id_vaccin = ModelVaccin::getIdByLabel($vaccin);
 
        $existance = ModelStock::existance($id_centre, $id_vaccin);
        
        if ( $existance != 0){
            $results = ModelStock::modifDoses(
                $id_centre, $id_vaccin, htmlspecialchars($_GET['doses'])
            );
        }
        else {
            $results = ModelStock::insert($id_centre, $id_vaccin, htmlspecialchars($_GET['doses']));
        }
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewModif2.php';
        require ($vue);
    }
    
    
}
?>
<!-- ----- fin ControllerStock -->