<?php 

require('./AccesoADatos.php');

// Validar token recuerdame
if (!isset($_SESSION[ID_USUARIO])) {
    if (isset($_COOKIE[TOKEN_RECUERDAME])) {
        $tokenBBDD = AccesoADatos::getSingletone()->buscarToken($_COOKIE[TOKEN_RECUERDAME]);
        AccesoADatos::getSingletone()->borrarToken($tokenBBDD['usuario']);
        crearToken($tokenBBDD['usuario']);
    }
    else {
        header('Location: login.php');
    }
} 

?>