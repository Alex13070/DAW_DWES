<?php 
// Crea una función que sume todos los números entre dos parámetros dados: 
// inicio y fin. PRUEBAS: Escribe una web que llame a la función 10 veces con números aleatorios entre 0 y 20.

function sumarNumeros() {
    $numeroMayor = mt_rand(0, 20);
    $numeroMenor = mt_rand(0, 20);
    $resultado = 0;

    colocarNumeros($numeroMayor, $numeroMenor);

    for($i = $numeroMenor; $i <= $numeroMayor; $i++) {
        $resultado += $i;
    }

    echo "<p>Rango de $numeroMenor a $numeroMayor. Su suma es: $resultado.</p>";

}

function colocarNumeros(&$numeroMayor, &$numeroMenor) {
    if ($numeroMayor < $numeroMenor) {
        $aux = $numeroMayor;
        $numeroMayor = $numeroMenor;
        $numeroMenor = $aux; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php for ($i = 0; $i < 10; $i++) {
        sumarNumeros();
    }?>
</body>
</html>