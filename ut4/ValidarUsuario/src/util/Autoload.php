<?php 

namespace ut4\ValidarUsuario\src\util;

spl_autoload_register(function ($class) {
    $classPath = "../../";
    $file = str_replace('\\', '/', $class);
    require("$classPath$file.php");
});

?>