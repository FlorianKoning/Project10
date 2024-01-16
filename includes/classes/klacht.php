<?php
//* florian koning
//! niet vergeten om een session te hebben om het accountID te krijgen

require_once 'connect.php';

class klacht
{

    public function __construct()
    {
        
    }

    // *create klant
    public function create(string $titel, string $omschrijving, string $tijdstip, string $latitude, string $longitude, int $accountID)
    {
        //* de sql code en de prepare om een nieuwe klacht te maken
        $db = new Database("localhost", "root", "", "project_10");
        $db->SQLCommando('INSERT INTO klacht (Titel, Omschrijving, Tijdstip, latitude, longitude, accountID) VALUES (?, ?, ?, ?, ?, ?)', 
            [$titel, $omschrijving, $tijdstip, $latitude, $longitude, $accountID]);

        // Redirect naar klachtGelukt.php
        header("Location: http://localhost/Project10/includes/html/klachtGelukt.php");
    }

    // *update klant
    public function update(string $titel, string $omschrijving, string $tijdstip, string $coordinaten, $ID)
    {
        //* de sql code en de prepare om een klacht te updaten
        $sql = "UPDATE klacht SET Titel = ?, Omschrijving = ?, Tijdstip = ?, Coordinaten = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$titel, $omschrijving, $tijdstip, $coordinaten, $ID]);

        //* checkt of $stmt is executed en laat dan weten of de klacht is geupdate of niet
        if ($stmt) {
            echo 'Je klacht is bij gewerkt';
        } else {
            echo "Er is iets fout gegaan, kon de klacht niet bijwerken!";
        }
    }
}
