<?php
session_start();

require_once '../classes/klacht.php';
$db = new Database("localhost", "root", "", "project_10");
$klacht = new klacht($db->conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <title>ReadAdmin</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div id="map"></div>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script src="../html/scripts.js"></script>
        <?php
        
        $klacht->readAdmin();
        
        ?>
    </main>
    <footer>

    </footer>
</body>
</html>