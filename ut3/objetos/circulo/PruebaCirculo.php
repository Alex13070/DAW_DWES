<?php

require('Circulo.php');

$circulo = new Circulo(5);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circulo</title>
</head>
<body>
    <main>
        <p>Mi radio es: <?= $circulo->getRadio() ?></p>
        <p>Mi area es: <?= $circulo->calcularArea() ?></p>
    </main>
</body>
</html>