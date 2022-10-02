<?php 

const PERSONAS = [
    ["Jorge", 1],
    ["Bea", 0],
    ["Paco", 1],
    ["Amparo", 0],
];

//Muestras los datos mediante un array_walk
function mostrarDatos (array $array) {
    array_walk(
        $array,
        function ($valor) { 
            echo $valor."</br>";
        }
    );
}

function map () {
    //Conviertes el array de arrays en un array de strings
    $resultado = array_map(function (array $persona): string {
            return (($persona[1])?"Señor":"Señora")." ".$persona[0];
        }, PERSONAS );

    echo "<h1> array_map() </h1>";

    mostrarDatos($resultado);
}
    
function filter () {
    echo "<h1> array_filter() </h1>";
    echo "<h3> Hombres </h3>";

    //Filtras las personas
    $hombres = array_filter(PERSONAS, function($persona) { return $persona[1]; });

    $hombres = array_map(function (array $persona): string {
            return ($persona[0]);
        }, $hombres
    );

    mostrarDatos($hombres);

    echo "<h3> Mujeres </h3>";

    //Filtras las personas
    $mujeres = array_filter(PERSONAS, function($persona) { return !($persona[1]); });

    $mujeres = array_map(function (array $persona): string {
            return ($persona[0]);
        }, $mujeres
    );

    mostrarDatos($mujeres);
}

function reduce () {

    echo "<h1> array_reduce() </h1>";

    $comida = [
        0 => ["Banana", 3, 56],
        1 => ["Chuleta", 1, 256],
        2 => ["Pan", 1, 90]
    ];

    $callback = function (mixed $carry,  mixed $value) {
        // $carry es el acumulado con las iteraciones anteriores.
        // $key $value son los valores de la iteracion actual
        return $carry + ($value[1]*$value[2]);
    };

    echo array_reduce($comida, $callback, 0)." calorías";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profe</title>
</head>
<body>
    <?php map()?>
    <?php filter()?>
    <?php reduce()?>
</body>
</html>