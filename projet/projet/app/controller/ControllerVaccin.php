<!-- ----- debut ControllerVaccin -->


<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin {
    
    // --- Page d'acceuil
    public static function SiteAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewSiteAccueil.php';
        if (DEBUG)
          echo ("ControllerSite : siteAccueil : vue = $vue");
        require ($vue);
    }
    
    // --- Liste des vaccins
    public static function vaccinReadAll() {
        $results = ModelVaccin::getAll();
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewAll.php';
        if (DEBUG)
         echo ("ControllerVaccin : vaccinReadAll : vue = $vue");
        require ($vue);
    }
    
    // --- Affiche le formulaire de creation d'un vaccin
    public static function vaccinCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInsert.php';
        require ($vue);
    }
    public static function vaccinCreate2() {
        // ajouter une validation des informations du formulaire
        $results = ModelVaccin::insert(
            htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInserte2.php';
        require ($vue);
    }
    
    
    // --- Affiche un formulaire pour changer le nombre de dose d'un vaccin précis
    public static function vaccinModif() {
        $results = ModelVaccin::getAllId();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewModif.php';
        require ($vue);
    }
    public static function vaccinModif2(){
        $results = ModelVaccin::modifDoses(
            htmlspecialchars($_GET['id']), htmlspecialchars($_GET['doses'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewModif2.php';
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerVaccin -->