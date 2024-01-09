<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    echo $latitude . ' and ' . $longitude;
    
    ?>
</body>
</html>