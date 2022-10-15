<?php 
// Crea una función que concatene todas las cadenas pasadas como parámetro 
// utilizando el primer parámetro como seprador. PRUEBAS: Escribe una web que llame a la función 3 veces con cadenas.

// echo concatena(" ", "Hola", "mundo", "!"); // Hola mundo !
// echo concatena(".", "Esto", "son", "varias", "cadenas", "puntos"); //Esto.son.varias.cadenas.puntos

function concatena() {
    $array = func_get_args();

    $concatenado = "";

    if (count($array) > 1) {
        $concatenado = $array[1];
        for($i = 2; $i < count($array); $i++) {
            $concatenado .= $array[0].$array[$i];
        }
    }

    return $concatenado;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <?= concatena(".", "Esto", "son", "varias", "cadenas", "puntos")?>
</body>
</html>