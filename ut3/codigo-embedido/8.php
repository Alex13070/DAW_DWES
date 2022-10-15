<?php 
// Crea una función que genere un array asociativo que contenga información del tipo de los parámetros. 
// La función irá descubriendo los tipos, comenzará con un array vacío. Cada vez que vea un tipo creará 
// un clave con valor 1, si el tipo ya existía incrementará su valor en 1.

// Funciones: gettype, array_key_exists o in_array o isset

// $analisis = analizParámetros(3, "h", 'hola', [1,2,3], [1], "h");
// print_r($analisis)

/**
 *  [
 *      'int' => 1,
 *      'string' => 3,
 *      'array' => 2
 *  ]
 */

function crearArray() {
    $array = func_get_args();

    $retorno = [];

    foreach($array as $valor) {
        $retorno[gettype($valor)] += 1;
    }

    return $retorno;

}

print_r(crearArray(3, "h", 'hola', [1,2,3], [1], "h"));


?>