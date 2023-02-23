<?php

use ut4\ValidarUsuario\src\data\AccesoADatosBBDD;


/** Simulacion de web service */
header('Content-Type: application/JSON'); 
header("Access-Control-Allow-Origin: *");

$usuarios = ['Pepe', 'Paco', 'Juan'];

/** Objeto en el que puedes poner los campos que quieras */
$respuesta = new \stdClass();

if (isset($_POST['nombre'])) {
    if (!in_array($_POST['nombre'], $usuarios)) {
        $exito = true;
        $mensaje = 'El usuario introducido no existe';
    }
    else {
        $exito = false;
        $mensaje = 'El usuario introducido ya existe';
    }
}
else {
    $exito = false;
    $mensaje = "No se ha pasado el nombre de usuario";
}

$respuesta->exito = $exito;
$respuesta->mensaje = $mensaje;

print_r(
    json_encode(
        $respuesta
    )
);
