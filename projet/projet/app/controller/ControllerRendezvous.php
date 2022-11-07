<!-- ----- debut ControllerRendezvous -->
<?php
require_once '../model/ModelRendezvous.php';
require_once '../model/ModelCentre.php';
require_once '../model/ModelVaccin.php';
require_once '../model/ModelPatient.php';
require_once '../model/ModelStock.php';

class ControllerRendezvous {
    
    // --- Affiche le formulaire de choix de patient
    public static function rendezvousChoixPatient() {
        
        $nomprenom = ModelPatient::getAllNomPrenom();
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezvous/viewChoixPatient.php';
        require ($vue);
    }
    
    // --- Renvoie à la bonne page en fonction des rendez-vous déjà pris
    public static function rendezvousNVRDV(){
        
        $id_patient = ModelPatient::getIdByName(htmlspecialchars($_GET['nom']));   
        $exist = ModelRendezvous::existance($id_patient);
        
        if ($exist != 0){
            $patient = ModelRendezvous::getOne($id_patient);
            $id_centre = $patient->getCentre_id();
            $label_centre = ModelCentre::getLabelById($id_centre);
            $id_vaccin = $patient->getVaccin_id();
            $label_vaccin = ModelVaccin::getLabelById($id_vaccin);
            
            $injection_necessaire = ModelVaccin::getDosesById($id_vaccin);
            
            if($exist == $injection_necessaire){
                $way = 'viewVaccine';
            }
            else {
                $id_centre = ModelStock::getCentreWithVaccinDoses($id_vaccin);
                $label_centre = array();
                $ind = 0;
                foreach ($id_centre as $element){
                    $label_centre[$ind] = ModelCentre::getLabelById($element);
                    $ind = $ind + 1;
                }
                if ($label_centre != NULL){
                    $exist = $exist + 1;
                    $way = 'viewNouveauRDV';
                }
                else{
                    $way = 'viewAttendre';
                }
            }
        }
        else{
            $label_centre = array();
            $ind = 0;
            $stock_centre = ModelStock::getByCentre();
            foreach($stock_centre as $element){
                if ($element->getAll_quant() >= 1){
                    $id = $element->getCentre_id();
                    $label_centre[$ind] = ModelCentre::getLabelById($id);
                    $ind = $ind + 1 ;
                }
            }
            //Chemins vers un formulaire pour avoir les infos sur le permier rendez-vous
            $way = 'viewpreRDV';
        }
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezvous/'.$way.'.php';
        require ($vue);
    }
    
    // --- Créé un RDV
    public static function rendezvousInserte2(){
        
        $id_patient = $_GET['id_patient'];
        $label_centre = $_GET['label_centre'];
        $id_centre = ModelCentre::getIdByLabel($label_centre);
        $id_vaccin = $_GET['id_vaccin'];
        if ($id_vaccin == 0){
            $id_vaccin = ModelStock::getMaxVaccin($id_centre);
        }
        $nbr = $_GET['nbr'];
        
        $nouveaux = ModelRendezvous::insert($id_centre, $id_patient, $nbr, $id_vaccin);
        
        // On change la valeur des stocks
        $changement = ModelStock::modifDoses($id_centre, $id_vaccin, -1);
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezvous/viewInserte2.php';
        require ($vue);
    }
    
}
?>
<!-- ----- fin ControllerRendezvous -->
