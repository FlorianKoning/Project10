<?php
//* florian koning

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
        $sql = "INSERT INTO klacht (Titel, Omschrijving, Tijdstip, Coordinaten, accountID) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$titel, $omschrijving, $tijdstip, $coordinaten, $accountID]);

        if ($stmt) {
            echo "<p style='color: white;'>Gelukt om Nieuwe klacht in te dienen</p>";
        } else {
            echo "<p>Er is iets fout gegaan, kon geen nieuwe klacht aanmaken!</p>";
        }
    }

    public function update(string $titel, string $omschrijving, string $tijdstip, string $coordinaten)
    {
    }

    // *update klant

}
