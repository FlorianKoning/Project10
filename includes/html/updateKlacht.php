<?php
session_start();

require_once '../classes/klacht.php';
$db = new Database("localhost", "root", "", "project_10");
$klacht = new klacht($db->conn);
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gemeetne Rotterdam Klachten | Kacht updaten</title>
</head>

<body>

    <!-- navbar en header img van website -->
    <header style="background-color: #222629;">
        <!-- navbar met foto -->
        <?php
        include_once('./components/navbar.php');
        ?>

        <div class="container-fluid">
            <div class="titleContainer">
                <h1>Welkom bij de userpagina!</h1>
                <p>gemeente rotterdam</p>
            </div>
        </div>
    </header>

    <!-- al het andere van de website -->
    <main class="userpaginaMain">

        <?php

        $klacht->update("Te veel Tijgers", "er zijn allemaal gorilla's uit blijdorp ontsnapt", "2024-20-04", "z243 x546 y-6", 1);

        ?>

    </main>

    <!-- footer van de website -->
    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">user Pagina</a></li>
                    <li><a href="">Kaart</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <p>Copyright &copy;2023; Designed bij <span class="designers">Vincent, Valentijn en Florian</span></p>
        </div>
    </footer>

</body>

</html>