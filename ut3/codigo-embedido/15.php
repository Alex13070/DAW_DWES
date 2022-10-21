<?php 

// Crea una función recursiva que devuelva una cadena invertida. No puedes usar funciones de cadena

function invertirCadena(string $cadena_a_invertir, string $cadena_invertida, int $posicion) {
    return ($posicion >= 0) ? invertirCadena($cadena_a_invertir, $cadena_invertida.$cadena_a_invertir[$posicion], --$posicion) : $cadena_invertida;
}

$cadena = "Zorra";
echo invertirCadena($cadena, "", strlen($cadena)-1);

?>