<?php
//* florian koning
namespace klacht;
require 'connect.php';

class klacht {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // *create klant
    public function create(string $titel, string $omschrijving, string $tijdstip, string $Coordinaten, int $klantID) {
        
    }

    // *delete klant
}



