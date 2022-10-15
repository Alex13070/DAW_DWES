<?php 
// Crea una página web que escriba span con números aleatorios entre 0 y 100, 
// el proceso parará cuando el número acabe en 17 o sea primo.

function numerosPrimos($numero) {

    $retorno = true;

    for ($i = 2; $i <= $numero/2 && $retorno; $i++) {
        if ($numero % $i == 0) {
            $retorno = false;
        }
    }
    
    return $retorno;
}

function pintarNumerosAleatorios() {

    do {
        $numero = mt_rand(0, 100);
        echo "<span>$numero</span> <br>";              
    } while (!numerosPrimos($numero) && !str_ends_with($numero, "17"));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php pintarNumerosAleatorios()?>
</body>
</html>