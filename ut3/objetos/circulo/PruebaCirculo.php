<?php

require('Circulo.php');

$circulo = new Circulo(5);

var_dump($circulo);
print_r("<br>".$circulo->calcularArea());

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
        <p></p>
    </main>
</body>
</html>