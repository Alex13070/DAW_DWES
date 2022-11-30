<?php

namespace ValidarUsuario\src\controllers;

require("../util/Autoload.php");

use ValidarUsuario\src\data\AccesoADatosBBDD;


/** Simulacion de web service */

header('Content-Type: application/JSON'); 

echo AccesoADatosBBDD::getSingletone()->recogerUsuariosJSON();