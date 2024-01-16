<?php
session_start();
$_SESSION['email'];

require_once '../classes/klacht.php';
require_once '../classes/account.php';
$klacht = new klacht();
$account = new Account();
$account->searchAccountEmail($_SESSION['email']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $titel = $_POST['title'];
    $omschrijving = $_POST['omschrijving'];
    $datum = $_POST['datum'];
    $latitude = 4.793248;
    $longitude = 7.0834;
    $accountID = $account->getAccountID();

    if (empty($titel) || empty($omschrijving) || empty($datum)) {
        echo "Er is iets mis gegaan, probeer het nog een keer.";
    } else {
        $klacht->create($titel, $omschrijving, $datum, $latitude, $longitude, $accountID);
    }
}
