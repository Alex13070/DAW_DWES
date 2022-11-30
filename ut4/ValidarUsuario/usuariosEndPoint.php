<?php

spl_autoload_register(function ($class) {
    $classPath = "../";
    require("$classPath${class}.php");
});

/** Simulacion de web service */

header('Content-Type: application/JSON'); 
use ValidarUsuario\AccesoADatosBBDD;
echo AccesoADatosBBDD::getSingletone()->recogerUsuariosJSON();