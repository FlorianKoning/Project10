<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <title>Index</title>
</head>
<body>
    <h1>BRUH</h1>
    <a href="accountAanmelden1.php">Aanmelden</a>

    <form action="accountGegevenVeranderen1.php" method="post">
        Account updaten met Email: <input type="text" name="email" required>
        <input type="submit">
    </form>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="scripts.js"></script>

    <div class="wrap">
        
        <form action="test.php" method="post" class="form">
            <input type="hidden" id="latitude" name="latitude" placeholder="latitude">
            <input type="hidden" id="longitude" name="longitude" placeholder="longitude">
            <input type="submit">
        </form>
    
        <div id="map"></div>

    </div>
</body>
</html>