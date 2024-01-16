<?php
session_start();
require_once '../classes/klacht.php';
$db = new Database("localhost", "root", "", "project_10");
$klacht = new klacht();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $titel = $_POST['title'];
    $omschrijving = $_POST['omschrijving'];
    $datum = $_POST['datum'];
    $latitude = 4.793248;
    $longitude = 7.0834;
    $accountID = 1;

    if (empty($titel) || empty($omschrijving) || empty($datum)) {
        echo "Er is iets mis gegaan, probeer het nog een keer.";
    } else {
        $klacht->create($titel, $omschrijving, $datum, $latitude, $longitude, 1);
    }
}
