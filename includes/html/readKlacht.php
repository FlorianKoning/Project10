<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Valentijn Standaart -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gemeente Rotterdam Klachten | Kacht updaten</title>
    <title>Read klacht</title>
</head>
<body>
    <?php
        include_once('./components/navbar.php');
    ?>
    <main>
        <div>
            <h1>Read Klacht</h1>
            <p>
                Lijst van klachten.
            </p>

            <?php
            require "klacht.php";

            echo "<a href='index.php'> Terug naar het menu </a>";

            $klacht = new Klacht();
            $klacht->readKlacht();
            
            ?>
        </div>
    </main>
</body>
</html>