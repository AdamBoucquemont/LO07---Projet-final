<!-- ----- debut ModelCentre -->


<?php
    require_once 'Model.php';
    
    class ModelCentre {
        private $id, $label, $adresse;
        
    // Constructeur
    public function __construct($id = NULL, $label = NULL, $adresse = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->adresse = $adresse;
        }
    }
    
    function setLabel($label) {
        $this->label = $label;
    }
    function getId() {
     return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setAdresse($adresse) {
        $this->dose = $adresse;
    }
    function getLabel() {
     return $this->label;
    }
    function getAdresse() {
     return $this->adresse;
    }
    public static function getAll() {
        try {
         $database = Model::getInstance();
         $query = "select * from centre";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    // --- ajouter un centre
    public static function insert($label, $adresse) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé
            $query = "select max(id) from centre";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout tuple
            $query = "insert into centre value (:id, :label, :adresse)";
            $statement = $database->prepare($query);
            $statement->execute([
              'id' => $id,
              'label' => $label,
              'adresse' => $adresse
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    // Trouver labels
    public static function getAllLabel() {
        try {
        $database = Model::getInstance();
        $query = "select label from centre order by id where doses";
        $statement = $database->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
        return $results;
       } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
       }
    }
    
    //Trouver l'id à partir d'un label
    public static function getIdByLabel($label){
       try {
        $database = Model::getInstance();
        $query = "select id from centre where label=:label";
        $statement = $database->prepare($query);
        $statement->execute([
          'label' => $label,
        ]);
        $tuple = $statement->fetch();
        $results = $tuple['0'];
        return $results;
       } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
       }
    }
    
    //Trouver le label à partir d'un id
    public static function getLabelById($id){
       try {
        $database = Model::getInstance();
        $query = "select label from centre where id=:id";
        $statement = $database->prepare($query);
        $statement->execute([
          'id' => $id,
        ]);
        $tuple = $statement->fetch();
        $results = $tuple['0'];
        return $results;
       } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
       }
    }
    
    

    public static function update() {
     echo ("ModelCentre : update() TODO ....");
     return null;
    }

    public static function delete() {
     echo ("ModelCentre : delete() TODO ....");
     return null;
    }

   }
?>
<!-- ----- fin ModelCentre -->