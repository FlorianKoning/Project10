<?php
//* florian koning
namespace klacht;

require 'connect.php';

class klacht
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // *create klant
    public function create(string $titel, string $omschrijving, string $tijdstip, string $coordinaten, int $klantID)
    {
        $sql = "INSERT INTO klacht (Titel Omschrijving, Tijdstip, Coordinaten, klantID) VALUES = (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$titel, $omschrijving, $tijdstip, $coordinaten, $klantID]);
    }

    // *delete klant
}
