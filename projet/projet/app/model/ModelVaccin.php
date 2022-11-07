<!-- ----- debut ModelVaccin -->

<?php

    require_once 'Model.php';
    
    class ModelVaccin {
        private $id, $label, $doses;
        
    // Constructeur
    public function __construct($id = NULL, $label = NULL, $doses = NULL) {
     // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->doses = $doses;
        }
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLabel($label) {
        $this->label = $label;
    }

    function setDose($doses) {
        $this->dose = $doses;
    }

    function getId() {
     return $this->id;
    }

    function getLabel() {
     return $this->label;
    }

    function getDoses() {
     return $this->doses;
    }
    
    // -- récupérer le tableau
    public static function getAll() {
        try {
         $database = Model::getInstance();
         $query = "select * from vaccin";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVaccin");
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    //nombre vaccins
    public static function getNbrVacc() {
        try {
         $database = Model::getInstance();
         $query = "select max(id) from vaccin";
         $statement = $database->query($query);
         $tuple = $statement->fetch();
         $nbrVaccin = $tuple['0'];
         return $nbrVaccin;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    //-- ajouter un vaccin
    public static function insert($label, $doses) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from vaccin";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into vaccin value (:id, :label, :doses)";
            $statement = $database->prepare($query);
            $statement->execute([
              'id' => $id,
              'label' => $label,
              'doses' => $doses
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    //Récupère liste des ID
    public static function getAllId() {
        try {
         $database = Model::getInstance();
         $query = "select id from vaccin";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    //Change la valeur des dose du vaccin de ID
    public static function modifDoses($id, $doses){
        try {
            $database = Model::getInstance();
            $query = "update vaccin set doses = :doses where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
              'id' => $id,
              'doses' => $doses
            ]);
            return $id;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    // labels vaccins
    public static function getAllLabel() {
        try {
        $database = Model::getInstance();
        $query = "select label from vaccin order by id";
        $statement = $database->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
        return $results;
       } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
       }
    }
    
    // --- Trouver l'id à partir d'un label
    public static function getIdByLabel($label){
       try {
        $database = Model::getInstance();
        $query = "select id from vaccin where label=:label";
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
    
    // --- Trouver le label a partir d'un id
    public static function getDosesById($id){
       try {
        $database = Model::getInstance();
        $query = "select doses from vaccin where id=:id";
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
     echo ("ModelVaccin : update() TODO ....");
     return null;
    }

    public static function delete() {
     echo ("ModelVaccin : delete() TODO ....");
     return null;
    }

   }
?>
<!-- ----- fin ModelVaccin -->