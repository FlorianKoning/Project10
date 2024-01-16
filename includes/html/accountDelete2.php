<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="">
    <title>Verwijderen</title>
</head>
<body>
<header>
    
</header>

<main>
    <div>
        <h1>Verwijderen</h1>
        <?php 
        // gegevens uit het formulier halen
        $accountEmail = $_POST["emailvak"];
        $accountWachtwoord = $_POST["wachtwoordvak"];

        require_once "../classes/account.php";
        require_once "../classes/klacht.php";
        $db = new Database("localhost", "root", "", "project_10");
        $klacht = new klacht($db->conn);

        $account = new Account();
        $account->searchAccountEmail($accountEmail);
        $accountID = $account->getAccountID();

        // account gegevens verwijderen
        if ($account->VerwijderCheck($accountEmail, $accountWachtwoord) == true){
            $account->deleteAccount($accountEmail);
            $klacht->deleteAllAccountId($accountID);
            echo "<p>De gegevens zijn verwijderd. <br></p>";
        }
        else{
            echo "<p>De gegevens zijn niet verwijderd. <br></p>";
        }

        echo "<br>";
        ?>

        <button><a href='userPagina.php'> Terug naar het menu </a></button><br><br>
    </div>
    
</main>
</body>
</html>