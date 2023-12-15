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
    public function create(string $titel, string $omschrijving, string $tijdstip, string $coordinaten, int $accountID)
    {
        //* de sql code en de prepare om een nieuwe klacht te maken
        $sql = "INSERT INTO klacht (Titel, Omschrijving, Tijdstip, Coordinaten, accountID) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$titel, $omschrijving, $tijdstip, $coordinaten, $accountID]);

        //* checkt of $stmt is executed en laat dan weten of de klacht is aangemaakt of niet
        if ($stmt) {
            echo "<p style='color: white;'>Gelukt om Nieuwe klacht in te dienen</p>";
        } else {
            echo "<p>Er is iets fout gegaan, kon geen nieuwe klacht aanmaken!</p>";
        }
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
