<?php 

// Vincent Kroon

class Database{
    public $conn;

    public function __construct(
        $IP, $username, $password, $DBName
    ){
        // Connectie maken met de database
        try {
            // Maak een PDO-verbinding
            $this->conn = new PDO("mysql:host=$IP;dbname=$DBName", $username, $password);
            // Als de verbinding succesvol is, kun je deze gebruiken voor databasebewerkingen
        } catch (PDOException $e) {
            die("Fout bij de verbinding met de database: " . $e->getMessage());
        }
    }

    // Commando voor sql code. Geen SQL injection met dit
    public function SQLCommando($sqlCommando, $values){
        $query = $this->conn->prepare($sqlCommando);
        $query->execute($values);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>