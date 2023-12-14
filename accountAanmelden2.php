<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title></title>
</head>
<body>
    <header>

    </header>
    <main>
        <div>
            <h1>Gefeliciteerd</h1>
            <?php
            require_once "account.php";

            $accountID = NULL;
            $accountNaam = $_POST ["naamvak"];
            $accountEmail = $_POST ["emailvak"];
            $accountWachtwoord = $_POST ["wachtwoordvak"];

            $accountWWHash = password_hash($accountWachtwoord, NULL);

            // account gegevens invoeren
            $account = new account($accountNaam, $accountWWHash, $accountEmail);
            
            // account in de database zetten
            $account->createaccount();
            echo "<p>Uw account is toegevoegd</p><br>";
            ?>

            <button><a href='index.php'> Terug naar het menu </a></button><br><br>
        </div>
        
    </main>
    <footer>

    </footer>
</body>
</html>