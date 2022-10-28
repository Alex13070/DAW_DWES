<?php

use common\Posicion;
use personajes\Humano;
use personajes\MagoBlanco;
use personajes\MagoOscuro;
use personajes\Personaje;

spl_autoload_register(function ($class) {
    $classPath = "./";
    require("$classPath${class}.php");
});

function probarPersonajes(Personaje $personaje) {
    $personaje->atacar();
    $personaje->defender();
    $personaje->pintarDatos();   
}

$humano = new Humano(new Posicion(0,0,0));
$magoBlanco = new MagoBlanco(new Posicion(0,0,0));
$magoOscuro = new MagoOscuro(new Posicion(0,0,0));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosas</title>
</head>
<body>
    <main>
        <div>
            <?php probarPersonajes($humano) ?>
        </div>
        <hr>
        <div>
            <?php probarPersonajes($magoOscuro) ?>
        </div>
        <hr>
        <div>
            <?php probarPersonajes($magoBlanco) ?>
        </div>
    </main>
    
</body>
</html>