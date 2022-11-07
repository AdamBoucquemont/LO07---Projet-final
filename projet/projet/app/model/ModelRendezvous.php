<!-- ----- debut ModelRendezvous -->


<?php
    require_once 'Model.php';
    
    class ModelRendezvous {
        private $centre_id, $patient_id, $injection, $vaccin_id;
        
    // Constructeur
    public function __construct($centre_id = NULL, $patient_id = NULL, $injection = NULL, $vaccin_id = NULL) {
     // valeurs nulles si pas de passage de parametres
        if (!is_null($centre_id)) {
            $this->centre_id = $centre_id;
            $this->patient_id = $patient_id;
            $this->injection = $injection;
            $this->vaccin_id = $vaccin_id;
        }
    }

    function setCentre_id($centre_id) {
        $this->centre_id = $centre_id;
    }
    
    function setInjection($injection) {
        $this->injection = $injection;
    }
    
    function setPatient_id($patient_id) {
        $this->patient_id = $patient_id;
    }

    function setVaccin_id($vaccin_id) {
        $this->vaccin_id = $vaccin_id;
    }

    function getCentre_id() {
     return $this->centre_id;
    }
    
    function getInjection() {
     return $this->injection;
    }
    
    function getPatient_id() {
     return $this->patient_id;
    }

    function getVaccin_id() {
     return $this->vaccin_id;
    }
    
    // --- Fonction pour récupérer l'ensemble du tableau
    public static function getAll() {
        try {
            
         $database = Model::getInstance();
         $query = "select * from rendezvous";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
         
         return $results;
         
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    // --- Fonction pour récupérer les infos d'un client
    public static function getOne($id) {
        try {
            
         $database = Model::getInstance();
         $query = "select * from rendezvous where patient_id = :id";
         $statement = $database->prepare($query);
         $statement->execute([
              'id' => $id
            ]);
         $tuple = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
         $results = $tuple['0'];
         
         return $results;
         
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    // -- Vérifier ligne existe
    public static function existance($id_patient) {
        try {
         $database = Model::getInstance();
         $query = "select count(*) from rendezvous where patient_id = :id_patient";
         $statement = $database->prepare($query);
         $statement->execute([
              'id_patient' => $id_patient
            ]);
         $tuple = $statement->fetch();
         $exist = $tuple['0'];
         return $exist;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    // --- Insert un nouveaux Rendez vous
    public static function insert($id_centre, $id_patient, $nbr, $id_vaccin) {
        try {
            $database = Model::getInstance();

            // ajout d'un nouveau tuple;
            $query = "insert into rendezvous value (:id_centre, :id_patient, :nbr, :id_vaccin)";
            $statement = $database->prepare($query);
            $statement->execute([
              'id_centre' => $id_centre,
              'id_patient' => $id_patient,
              'nbr' => $nbr,
              'id_vaccin' => $id_vaccin
            ]);
            return $id_centre;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    public static function update() {
     echo ("ModelStock : update() TODO ....");
     return null;
    }

    public static function delete() {
     echo ("ModelStock : delete() TODO ....");
     return null;
    }

   }
?>
<!-- ----- fin ModelRendezvous -->