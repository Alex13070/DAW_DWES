<?php

require_once("./funciones.php");

session_start();
session_unset();
header("Location: ".URL_RAIZ."/ut4/Blog/index.php");
die();
?>