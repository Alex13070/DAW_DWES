<?php

namespace ut4\ValidarUsuario\src\controllers;

require("../util/Autoload.php");

use ut4\ValidarUsuario\src\data\AccesoADatosBBDD;


/** Simulacion de web service */
header('Content-Type: application/JSON'); 
header("Access-Control-Allow-Origin: *");

$respuesta = "";

if (isset($_POST['nombre'])) {
    $respuesta = AccesoADatosBBDD::getSingletone()->existeNombreUsuario($_POST['nombre']);
}
else {
    $respuesta = new \stdClass ();
    $respuesta->exito = false;
    $respuesta->mensaje = "No se ha pasado el nombre de usuario";
}


print_r(
    json_encode(
        $respuesta
    )
);
