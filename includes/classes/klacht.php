<?php
//* florian koning
//! niet vergeten om een session te hebben om het accountID te krijgen

require_once 'connect.php';

class klacht
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // *create klant
    public function create(string $titel, string $omschrijving, string $tijdstip, string $latitude, string $longitude, int $accountID)
    {
        //* de sql code en de prepare om een nieuwe klacht te maken
        $sql = "INSERT INTO klacht (Titel, Omschrijving, Tijdstip, latitude, longitude, accountID) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$titel, $omschrijving, $tijdstip, $latitude, $longitude, $accountID]);

        //* checkt of $stmt is executed en laat dan weten of de klacht is aangemaakt of niet
        if ($stmt) {
            echo "<p style='color: white;'>Gelukt om Nieuwe klacht in te dienen</p>";
        } else {
            echo "<p>Er is iets fout gegaan, kon geen nieuwe klacht aanmaken!</p>";
        }
    }

    // *admin read klachten
    public function readAdmin(){
        
        $db = new Database("localhost","root","","project_10");
        $klachtList = $db->SQLCommando("select * from klacht where 1",[]);
        
        // Alle klacht gegevens laten zien
        foreach($klachtList as $klacht){
            $titel = json_encode($klacht['Titel']);
            $omschrijving = json_encode($klacht['Omschrijving']);
            $latitude = $klacht['latitude'];
            $longitude = $klacht['longitude'];

            $jsTitel = str_replace('"', "'", $titel);
            $jsOmschrijving = str_replace('"', "'", $omschrijving);
            
            echo "<script> 
                    ReadCreateMarker($jsTitel, $jsOmschrijving, $latitude, $longitude);
                </script>";
        }
    }

    // * Read klacht
    public function readKlacht()
    {
        $db = new Database("localhost","root","","project_10");

        // Alle klacht gegevens in de database
        $klachtlijst = $db->SQLCommando("select * from klacht where 1",[]);

        foreach($klachtlijst as $klacht){
            echo "<p>ID: " . $klacht["ID"] . "<br>";
            echo "Titel: " . $klacht["Titel"] . "<br>";
            echo "Omschrijving: " . $klacht["Omschrijving"] . "<br>";
            echo "Tijdstip: " . $klacht["Tijdstip"] . "<br>";
            echo "Coordinaten: " . $klacht["Coordinaten"] . "<br>";
            echo "klantID: " . $klacht["klantID"] . "<br></p>";
        }
    }

    // *update klacht
    public function update(string $titel, string $omschrijving, string $tijdstip, string $latitude, string $longitude, $ID)
    {
        //* de sql code en de prepare om een klacht te updaten
        $sql = "UPDATE klacht SET Titel = ?, Omschrijving = ?, Tijdstip = ?, latitude = ?, longitude = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$titel, $omschrijving, $tijdstip, $latitude, $longitude, $ID]);

        //* checkt of $stmt is executed en laat dan weten of de klacht is geupdate of niet
        if ($stmt) {
            echo 'Je klacht is bij gewerkt';
        } else {
            echo "Er is iets fout gegaan, kon de klacht niet bijwerken!";
        }
    }
}
