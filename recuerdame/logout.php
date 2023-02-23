<?php 

require('init.php');

require('./AccesoADatos.php');

AccesoADatos::getSingletone()->borrarToken($_SESSION[ID_USUARIO]);
setcookie(TOKEN_RECUERDAME, null, time() -1000);
session_destroy();

header("Location: index.php");

?>