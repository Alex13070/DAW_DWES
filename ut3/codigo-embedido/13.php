<?php 
// Crea una función para escribir select de HTML, la función recibe un asociativo con el nombre y el value, también recibe el elemento seleccionado 
// como un entero (que representa su value)

// /*** 
// $opciones = [
//   "Madrid" => 28,
//   "Sevilla" => 17,
//   "Cáceres" => 56,
// ]
// ***/
// function genera_select(array $opciones, int seleccionada = -1)
// {
//   ...
// }

$opciones = [
  "Madrid" => 28,
  "Sevilla" => 17,
  "Cáceres" => 56,
];

function genera_select(array $opciones, int $seleccionada = 2) {
    $select = "<select name='select'>";
    $i = 1;

    array_walk($opciones, function ($valor, $clave) use (&$select, &$i, $seleccionada) {
        $select .= "<option value='$valor' ". (($i == $seleccionada)?"selected":"") .">$clave</option>";
        $i++;
    });

    $select .= "</select>";

    return $select;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>
<body>
    <?= genera_select($opciones, 1)?>
</body>
</html>


