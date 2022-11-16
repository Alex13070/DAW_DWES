<?php 

namespace Prueba;

spl_autoload_register(function ($class) {
    $classPath = "../";
    require("$classPath${class}.php");
});

$accesoADatos = AccesoADatos::getSingletone();

$usuarios = $accesoADatos->leerFichero();

function pintarUsuarios(array $usuarios) { 
    $datos = "";
    foreach($usuarios as $usuario) {
        $datos .= "<p> " . $usuario->toCSV() . "</p>";
    }

    return $datos;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Representar datos</title>
</head>
<body>
    <h1>Usuarios</h1>

    <?= pintarUsuarios($usuarios) ?>

</body>
</html>