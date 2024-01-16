<?php
session_start();
$_SESSION['email'] = "";
$_SESSION['ingelogt'] = false;

require_once '../classes/klacht.php';
$klacht = new klacht();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <title>Gemeetne Rotterdam Klachten | UserPagina</title>
</head>

<body>
    <!-- navbar en header img van website -->
    <header style="background-color: #222629;">
        <!-- navbar met foto -->
        <nav class="navbar navbar-expand-lg " style="border-bottom: #86C232 solid 2px; background-color: #222629;">
            <div class="container-fluid">
                <img src="../images/logo-gemeente-rotterdam.png" alt="Logo" width="80px" class="d-inline-block align-text-top">
                <a class="navbar-brand" style="font-size: 18px; color: #61892F; margin-left: 20px;"><b>Gemeente Rotterdam</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div style="letter-spacing: 1px; text-transform: uppercase;" class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a style="color: white;" class="nav-link smallerText" href="klachtMaken.php"><i>Klacht aanmaken</i></a>
                        </li>
                        <li class="nav-item">
                            <a style="color: white;" class="nav-link smallerText" href="#"><i>Contact</i></a>
                        </li>
                        <li class="nav-item smallerText">
                            <a style="color: white;" class="nav-link" href="https://www.google.com/maps/d/viewer?mid=1-LWtYaeSCcpYJZcBAqD9EZqlKyY&hl=nl&ll=51.903391420345116%2C4.445905000000003&z=14"><i>Kaart</i></a>
                        </li>
                        <li class="nav-item">
                            <a style="color: white;" class="nav-link active" href="#">Log uit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container-fluid">
            <div class="titleContainer">
                <h1>Gelukt om klacht aan te maken!</h1>
                <a href="userPagina.php"><button type="button" class="btn btn-primary">Terug</button></a>
            </div>
        </div>
    </header>

    <!-- al het andere van de website -->
    <main style="height: 150vh;" class="userpaginaMain">

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
            <p>Copyright &copy;<?php echo date("Y"); ?>; Designed bij <span class="designers">Vincent, Valentijn en Florian</span></p>
        </div>
    </footer>


</body>

</html>