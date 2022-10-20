<?php 
// Crea una función que reciba un array con distintos tipos de valores de tal forma que:

// Si son enteros: el primer entero sea elevado al cuadrado, el segundo entero sea elevado al cubo y así sucesivamente con los números enteros.
// Si el valor es un double lo convertirá a su valor negativo (si es negativo al positivo)
// Si es una cadena cambiará las mayúsuclas por minúsculas y viceversa.
// En caso de no estar entre estos valores lo dejará sin modificar.

function cambiarLetras(string $var) {
    $retorno = "";

    for ($i=0; $i < strlen($var); $i++) { 
        if ($var[$i] == strtoupper($var[$i])) {
            $retorno .= strtolower($var[$i]);
        }
        else {
            $retorno .= strtoupper($var[$i]);
        }
    }



    return $retorno;

}

function cosasRaras(array &$array) {
    $numEntero = 2;

    foreach($array as &$value) {
        if (gettype($value) == "integer") {
            $value = pow($value, $numEntero++);            
        }
        else {
            $numEntero = 2;

            if (gettype($value) == "double") {
                $value = - $value;
            }
            else if(gettype($value) == "string") {
                $value = cambiarLetras($value);

            }

        }

    }

}

$array = [3, 4, "h", 3, 'hola', [1,2,3], [1], "h"];

cosasRaras($array);


print_r($array);

//cambiarLetras("Hola me LLamo Pepe")


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11</title>
</head>
<body>
    <?php ?>
</body>
</html>
