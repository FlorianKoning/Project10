<?php 
session_start();

$_SESSION["email"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="">
    <title>Weet u het zeker?</title>
</head>
<body>
<header>

</header>

<main>
    <div>
        <h1>Wilt u uw account verwijderen</h1>
        <?php
        // email uit de session halen
        $accountEmail = $_SESSION["email"];

        // account gegevens uit de tabel halen
        require_once "../classes/account.php";
        
        $account = new Account();
        $account->searchAccountEmail($accountEmail);
        $account->afdrukkenAccount();

        ?>

        <form action='accountDelete2.php' method='post'>
            <input type='hidden' name='emailvak' value='<?php echo $accountEmail; ?>'><br>
            Vul hier uw wachtwoord in voor bevestiging.
            <input type='password' name='wachtwoordvak' required><br><br>
            <input type='submit'>
        </form> 
        <a href="userPagina.php"><button>Annuleren</button></a>
    </div>
    
</main>
</body>
</html>