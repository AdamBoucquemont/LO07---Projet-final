<!-- ----- debut ControllerPatient -->
<?php
require_once '../model/ModelPatient.php';

class ControllerPatient {
    
    // --- Liste des patients
    public static function patientReadAll() {
        $results = ModelPatient::getAll();
        include 'config.php';
        $vue = $root . '/app/view/patient/viewAll.php';
        if (DEBUG)
         echo ("ControllerPatient : patientReadAll : vue = $vue");
        require ($vue);
    }
    
    // -- Affiche le formulaire de creation d'un patient
    public static function patientCreate() {
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInsert.php';
        require ($vue);
    }
    public static function patientCreate2() {
        $results = ModelPatient::insert(
            htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse'])
        );
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInserte2.php';
        require ($vue);
    }
    
}
?>
<!-- ----- fin ControllerPatient -->
