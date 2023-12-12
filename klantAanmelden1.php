<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Maak uw account aan</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div>
            <h1>Vul uw gegevens in</h1>
            <form action="klantAanmelden2.php" method="post">
                Naam: <br>
                <input type="text" name="naamvak" placeholder="Naam" required><br>
                Email: <br>
                <input type="email" name="emailvak" placeholder="Email" required><br>
                Wachtwoord: <br>
                <input type="password" name="wachtwoordvak" placeholder="Wachtwoord" required><br><br>
                <input type="submit" value="Maak een account">
                <br><br>
            </form>
            <a href="index.php"><button>Annuleren</button></a>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>