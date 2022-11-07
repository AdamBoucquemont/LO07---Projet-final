<!-- ----- debut ModelStock -->


<?php
    require_once 'Model.php';
    
    class ModelStock {
        private $centre_id, $vaccin_id, $quantite;
       
    public function __construct($centre_id = NULL, $vaccin_id = NULL, $quantite = NULL) {
     // valeurs nulles si pas de passage de parametres
        if (!is_null($centre_id)) {
            $this->centre_id = $centre_id;
            $this->vaccin_id = $vaccin_id;
            $this->quantite = $quantite;
        }
    }

    function setCentre_id($centre_id) {
        $this->centre_id = $centre_id;
    }

    function setVaccin_id($vaccin_id) {
        $this->vaccin_id = $vaccin_id;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    function getCentre_id() {
     return $this->centre_id;
    }

    function getVaccin_id() {
     return $this->vaccin_id;
    }

    function getQuantite() {
     return $this->quantite;
    }
    
    // -- Fonction pour récupérer l'ensemble du tableau
    public static function getAll() {
        try {
         $database = Model::getInstance();
         $query = "select * from stock";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    public static function getByCentre() {
        try {
         $database = Model::getInstance();
         $query = "select centre_id, sum(quantite) as all_quant from stock group by centre_id";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    // -- Vérifier si une ligne existe
    public static function existance($id_centre, $id_vaccin) {
        try {
         $database = Model::getInstance();
         $query = "select count(*) from stock where centre_id = :id_centre and vaccin_id = :id_vaccin";
         $statement = $database->prepare($query);
         $statement->execute([
              'id_centre' => $id_centre,
              'id_vaccin' => $id_vaccin
            ]);
         $tuple = $statement->fetch();
         $exist = $tuple['0'];
         return $exist;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    // -- Change la valeur des doses du vaccin en ajoutant nouvelles doses
    public static function modifDoses($id_centre, $id_vaccin, $doses){
        try {
            $database = Model::getInstance();
            
            //On recherche la quantité déjà présente de vaccin
            $query1 = "select quantite from stock where centre_id = :id_centre and vaccin_id = :id_vaccin";
            $statement1 = $database->prepare($query1);
            $statement1->execute([
              'id_centre' => $id_centre,
              'id_vaccin' => $id_vaccin
            ]);
            $tuple = $statement1->fetch();
            $quantite = $tuple['0'];
        
            $query2 = "update stock set quantite = :doses where centre_id = :id_centre and vaccin_id = :id_vaccin";
            $statement2 = $database->prepare($query2);
            $statement2->execute([
              'doses' => $quantite + $doses,
              'id_centre' => $id_centre,
              'id_vaccin' => $id_vaccin
            ]);
            return $id_centre;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    // --- Ajouter une nouvelle ligne aux tableaux des stocks
    public static function insert($id_centre, $id_vaccin, $doses) {
        try {
            $database = Model::getInstance();

            // ajout d'un nouveau tuple;
            $query = "insert into stock value (:id_centre, :id_vaccin, :doses)";
            $statement = $database->prepare($query);
            $statement->execute([
              'id_centre' => $id_centre,
              'id_vaccin' => $id_vaccin,
              'doses' => $doses
            ]);
            return $id_centre;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }   
    
    function getAll_quant() {
     return $this->all_quant;
    }
    
    // --- Récupére le vaccin avec le plus de dose pour un centre
    public static function getMaxVaccin($id_centre) {
        try {
         $database = Model::getInstance();
         $query = "select vaccin_id, max(quantite) from stock where centre_id = :id_centre";
         $statement = $database->prepare($query);
            $statement->execute([
              'id_centre' => $id_centre
            ]);
         $tuple = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
         $results = $tuple['0'];
         $vaccin_id = $results->getVaccin_id();
         return $vaccin_id;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    // --- Récupére la liste de centre possédant un vaccin
    public static function getCentreWithVaccinDoses($id_vaccin) {
        try {
         $database = Model::getInstance();
         $query = "select centre_id from stock where vaccin_id = :id_vaccin and quantite >= 1";
         $statement = $database->prepare($query);
            $statement->execute([
              'id_vaccin' => $id_vaccin
            ]);
         $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
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
<!-- ----- fin ModelStock -->
