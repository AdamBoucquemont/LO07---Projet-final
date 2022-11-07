<!-- ----- debut ModelPatient -->


<?php
    require_once 'Model.php';
    
    class ModelPatient {
        private $id, $nom, $prenom, $adresse;
        
    // Constructeur  
    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
        }
    }
    function setNom($nom) {
            $this->nom = $nom;
    }
    function setId($id) {
        $this->id = $id;
    }

    
    function setAdresse($adresse) {
        $this->dose = $adresse;
    }
    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    
    function getId() {
     return $this->id;
    }
    function getNom() {
     return $this->nom;
    }
    function getPrenom() {
     return $this->prenom;
    }
    function getAdresse() {
     return $this->adresse;
    }
    // -- Fonction pour récupérer l'ensemble du tableau
    public static function getAll() {
        try {
         $database = Model::getInstance();
         $query = "select * from patient";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPatient");
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    // -- Fonction pour récupérer tous les noms et les prénoms
    public static function getAllNomPrenom() {
        try {
            $database = Model::getInstance();

            // ajout d'un nouveau tuple;
            $query = "select nom, prenom from patient order by nom";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPatient");
            
            $RES = array();
            $ind = 0;
            foreach ($results as $element){
                $nom = $element->getNom();
                $prenom = $element->getPrenom();
                $RES[$ind] = $nom.' '.$prenom;
                $ind = $ind + 1;
            }
            
            return $RES;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    // Trouver l'id du patient avec sont nomprenom
    public static function getIdByName($nomprenom) {
        try {
            $database = Model::getInstance();

            // ajout d'un nouveau tuple;
            $query = "select id, nom, prenom from patient";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPatient");
            
            foreach($results as $element){
                $nomtest = $element->getNom().' '.$element->getPrenom();
                if ($nomtest == $nomprenom){
                    $id = $element->getId();
                }
            }
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function update() {
     echo ("ModelPatient : update() TODO ....");
     return null;
    }

    public static function delete() {
     echo ("ModelPatient : delete() TODO ....");
     return null;
    }

   }
?>
<!-- ----- fin ModelPatient -->