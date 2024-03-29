<?php
session_start();

require "account.php";

// Maakt de class aan
$account = new Account($_SESSION["email"]);
$account->searchAccountEmail($_SESSION["email"]);

// Met de search hierboven haalt het de gegevens op uit de database en stopt specifieke gegevens in sessions
$_SESSION["id"] = $account->getAccountID();
$_SESSION["email"] = $_POST["email"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="">
    <title>Gegevens Veranderen</title>
</head>
<body>
    <main>
        <header>

        </header>

        <div>
            <!-- Vraagt de gegevens op vanuit de database om in de values te zetten -->
            <h1>Welke gegevens wilt u wijzigen?</h1>
            <form action="accountGegevenVeranderen2.php" method="post">
                ID: <?php echo $account->getAccountID(); ?><br>
                Naam: <input type="text" name="naamvak" value="<?php echo $account->getAccountNaam()?>" required> <br>
                Email: <input type="email" name="emailvak" value="<?php echo $account->getAccountEmail()?>" required> <br><br>
                Vul uw wachtwoord in als bevestiging. <br>
                Wachtwoord: <input type="password" name="wachtwoordvak" required><br>
                <input type="submit">
            </form>
            <a href="userPagina.php"><button>Annuleren</button></a>
        </div>
        
    </main>
</body>
</html>