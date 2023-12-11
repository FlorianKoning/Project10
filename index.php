<?php
session_start();
$_SESSION['email'] = "";

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Gemeetne Rotterdam Klachten | Home</title>
</head>
<body>
    <!-- navbar en header img van website -->
    <header>
    <!-- navbar met foto -->
    <nav class="navbar navbar-expand-lg " style="padding: 15px; border-bottom: 3px solid #00AB5B; background-color: #E7EEF7;">
        <div class="container-fluid">
            <img src="includes/images/logo-gemeente-rotterdam.png" alt="Logo" width="100" height="30" class="d-inline-block align-text-top">
            <a class="navbar-brand" style="font-size: 18px; color: #041456; margin-left: 20px;"><b>Gemeente Rotterdam</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link smallerText" href="#"><i>Contact</i></a>
                    </li>
                    <li class="nav-item smallerText">
                        <a class="nav-link" href="https://www.google.com/maps/d/viewer?mid=1-LWtYaeSCcpYJZcBAqD9EZqlKyY&hl=nl&ll=51.903391420345116%2C4.445905000000003&z=14"><i>Kaart</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Log in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="banner">
            <div class="banner-text">
                <h2>Gemeente Rotterdam</h2>
                <h3>klachten Centrum</h3>
            </div>
        </div>
    </div>

    </header>

    <!-- al het andere van de website -->
    <main>

    <div class="container">
        <div class="formContainer">
            <h2>Log hier in</h2>
            <form action="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Vul hier uw email in.</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>



    </main>

    <!-- footer van de website -->
    <footer>
        <div class="footerContainer">
            <h2>Gemeente Rotterdam</h2>
            <p>Klachten Centrum</p>
        </div>
    </footer>
</body>
</html>