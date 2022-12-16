<?php


function pintarCabecera(...$args) {
    return "<tr>" . 
        array_reduce($args, function($acumulador, $arg){
            return $acumulador . "<th>" . $arg . "</th>";
        }, "") . 
        "</tr>"
    ;
}

function pintarContenido(...$args) {
    return "<tr>" . 
        array_reduce($args, function($acumulador, $arg) {
            return $acumulador . "<td>" . $arg . "</td>";
        }, "") . 
        "</tr>"
    ;
}

const HORA_INICIAL = 9;
const HORA_FINAL = 22;

function pintarHorarioVacio() {
    $array = [];

    for($i = HORA_INICIAL; $i <= HORA_FINAL; $i++) {
        array_push($array, $i);
    }

    echo 
    "<table>" . 
    "<thead>" .
    pintarCabecera("horas", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes") .  
    "</thead>".
    "<tbody>" .
    array_reduce(
        array_map(function($valor) {
            return pintarContenido("$valor:00", "", "", "", "", "");
        }, $array), 
        function($acumulador, $arg) {
            return $acumulador . $arg ;
        }, 
        ""
    ) .
    "</tbody>" .
    "</table>";
}
// Cada cabecera es clave y el resto es valor
function pintarHorizontal(array $array) {
    echo 
    "<table>" . 
    "<thead>" .
    pintarCabecera(...array_keys($array)) .  
    "</thead>".
    "<tbody>" .
    pintarContenido(...array_values($array)) .
    "</tbody>" .
    "</table>";
}

function pintarVertical(array $array) {
    $retorno = "<table><tbody>";
    
    array_walk($array, function($value, $key) use (&$retorno) {
        $retorno .= pintarContenido($key, $value);
    }); 
    $retorno .=  "</tbody></table>";

    echo $retorno;
}

$array = [
    "clave1" => "Valor1",
    "clave2" => "Valor2",
    "clave3" => "Valor3",
    "clave4" => "Valor4",
]

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <main>
        <div><?php pintarHorarioVacio() ?></div>
        <div><?php pintarHorizontal($array) ?></div>
        <div><?php pintarVertical($array) ?></div>
    </main>
</body>
</html>