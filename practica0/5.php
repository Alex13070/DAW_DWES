<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="5.css" type="text/css">
    <title>Quinto</title>
</head>
<body>
    <?php 
        $radio = 5;
        $nombre = "Pepe";
        $pi = 3.14;

        echo "<p class='perimetro'>El perímetro del circulo es: ".(2*$radio*$pi)."</p>";
        echo "<p class='area'> El área ".($pi*pow($radio, 2))."</p>"
    ?>
    
</body>
</html>