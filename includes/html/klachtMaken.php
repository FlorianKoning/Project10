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
    <title>Gemeetne Rotterdam Klachten | Kacht Aanmaken</title>
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
                <h1>Hier kunt u uw klacht aanmaken!</h1>
                <p>gemeente rotterdam</p>
            </div>
        </div>
    </header>

    <!-- al het andere van de website -->
    <main class="userpaginaMain">

        <div class="container">
            <div class="formContainer" style="height: 480px;">
                <form action="#" method="post" class="form">
                    <h2 style="color: #86C232;">Maak hier uw klacht aan</h2>
                    <div class="input-box">
                        <label>Wat is uw Klacht</label>
                        <input type="text" placeholder="Typ hier de klacht in">
                    </div>

                    <div class="input-box">
                        <label>omschrijving van uw klacht</label>
                        <input type="text" placeholder="typ hier een kleine beschrijving">
                    </div>

                    <div class="input-box">
                        <label>Wat is de datum van uw klacht</label>
                        <input type="date" placeholder="typ hier uw emailadress in">
                    </div>

                    <button>Submit</button>
                </form>
            </div>
        </div>

        <div class="newsContainer">
            <h2 style="text-align: center;">News</h2>
            <div class="newsboxContainer">
                <div class="newsbox">
                    <img width="400px" height="150px" src="./includes/images/newFoto1.jpg" alt="foto van een hal">
                    <h4>Heel veel eten enzo weet je wel!</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic atque distinctio aspernatur magnam, reprehenderit, quaerat eligendi aliquid iste nam enim neque quae mollitia inventore vitae odio blanditiis. Praesentium, dicta minus.</p>
                </div>
                <div class="newsbox">
                    <img width="400px" height="150px" src="./includes/images/newFoto2.jpg" alt="foto van een hal">
                    <h4>We hebben oude huizen!!!!!</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic atque distinctio aspernatur magnam, reprehenderit, quaerat eligendi aliquid iste nam enim neque quae mollitia inventore vitae odio blanditiis. Praesentium, dicta minus.</p>
                </div>
                <div class="newsbox">
                    <img width="400px" height="150px" src="./includes/images/newFoto3.jpg" alt="foto van een hal">
                    <h4>NEWS!!!!</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic atque distinctio aspernatur magnam, reprehenderit, quaerat eligendi aliquid iste nam enim neque quae mollitia inventore vitae odio blanditiis. Praesentium, dicta minus.</p>
                </div>
            </div>
        </div>


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