<?php 
// Crea una función que reciba dos variables cualesquiera e intercambie su valor. Las variables 
// tendrá ese valor fuera de la función. PRUEBA: Crea una web en la que se muestre cómo se comporta esta función con variables de distinto tipo.

function intercambiar(mixed &$v1, mixed &$v2) {
    $aux = $v1;
    $v1 = $v2;
    $v2 = $aux; 
}

$primero = "wvdibj";

$segundo = 2948;

echo "<p>Primera: $primero, Segunda: $segundo</p>";

intercambiar($primero, $segundo);

echo "<p>Primera: $primero, Segunda: $segundo</p>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>
    <?php ?>
</body>
</html>