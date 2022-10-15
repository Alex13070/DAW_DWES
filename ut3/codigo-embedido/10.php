<?php 
//Crea una función que genera un array aleatorio con parámetros variables

// Por defecto generará 10 valores entre 0 y 10
// Puedes especificar el número de valores como primer parámetro,
// Puedes especificar el valor máximo como segundo parámetro
// o Puedes especificar número de valores, máximo y mínimo

function colocarNumeros(&$numeroMayor, &$numeroMenor) {
    if ($numeroMayor < $numeroMenor) {
        $aux = $numeroMayor;
        $numeroMayor = $numeroMenor;
        $numeroMenor = $aux; 
    }
}

function generarArray(int $numVar = 10,int  $mxVar = 10,int  $minVar = 0) {
    colocarNumeros($mxVar, $minVar);
    $array = [];

    for ($i = 0; $i < $numVar; $i++) {
        $array[$i] = mt_rand($minVar, $mxVar);    
    }    

    print_r($array);

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
</head>
<body>
    <?php generarArray()?>
</body>
</html>
