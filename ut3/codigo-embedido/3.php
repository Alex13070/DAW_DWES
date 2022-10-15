<?php 
// Crea una web similar a la anterior pero que pare al finalizar la cadena o al encontrar el carácter 'a', 
// tanto minúscula como mayúscula. Usa While

$variable = "Hola mundo";

function pintarLetras(string $variable) {
    $letra = "";
    $i = 0;

    while (strtolower($variable[$i]) != "a" && $i < strlen($variable)) {

        echo "<h4>".$variable[$i]."</h4>";
        $i++;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php pintarLetras($variable)?>
</body>
</html>