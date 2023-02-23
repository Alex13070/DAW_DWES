<?php

namespace ut4\ValidarUsuario\src\controllers;

require("../util/Autoload.php");

use ut4\ValidarUsuario\src\data\AccesoADatosBBDD;


/** Simulacion de web service */

header('Content-Type: application/JSON'); 
header("Access-Control-Allow-Origin: *");


print_r(
    AccesoADatosBBDD::getSingletone()->recogerUsuariosJSON()
);