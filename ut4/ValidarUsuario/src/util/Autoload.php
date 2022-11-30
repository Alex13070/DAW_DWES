<?php 

namespace ValidarUsuario\src\util;

spl_autoload_register(function ($class) {
    $classPath = "../";
    require("$classPath${class}.php");
});

?>