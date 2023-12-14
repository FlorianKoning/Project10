<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Verandert</title>
</head>
<body>
<header>
    
</header>

    <main>
        <div>
            <h1>Resultaat</h1>
            <?php
            // accountgegevens uit het formulier halen
            $accountID = $_SESSION["id"];
            $accountNaam = $_POST["naamvak"];
            $accountEmail = $_POST["emailvak"];
            $accountWachtwoord = $_POST["wachtwoordvak"];

            // account class aanvragen
            require_once "account.php";

            $account = new Account($accountNaam, $accountWachtwoord, $accountEmail, $accountID);
            
            $account->GegevenVeranderenWachtWoordCheck($_SESSION["email"], $accountWachtwoord, $accountID);

            echo "<br>";
            echo "<button><a href='index.php'> Terug naar het menu </a></button>";

            $_SESSION["naam"] = $account->getaccountNaam();
            ?>
        </div>

    </main>
</body>
</html>