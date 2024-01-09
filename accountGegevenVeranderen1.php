<?php
session_start();

require "account.php";

//! Vergeet niet POST te veranderen naar SESSION bij merge en links naar pagina"s :P

$account = new Account($_POST["email"]);
$account->searchAccountEmail($_POST["email"]);

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
            <h1>Welke gegevens wilt u wijzigen?</h1>
            <form action="accountGegevenVeranderen2.php" method="post">
                ID: <?php echo $account->getAccountID(); ?><br>
                Naam: <input type="text" name="naamvak" value="<?php echo $account->getAccountNaam()?>" required> <br>
                Email: <input type="email" name="emailvak" value="<?php echo $account->getAccountEmail()?>" required> <br><br>
                Vul uw wachtwoord in als bevestiging. <br>
                Wachtwoord: <input type="password" name="wachtwoordvak" required><br>
                <input type="submit">
            </form>
            <a href="index.php"><button>Annuleren</button></a>
        </div>
        
    </main>
</body>
</html>