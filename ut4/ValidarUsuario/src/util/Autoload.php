<?php 



namespace ut4\ValidarUsuario\src\util;

spl_autoload_register(function ($class) {
    $classPath = "";
    $array = explode("/", __DIR__);

    for ($i=0; $i < count($array)-4; $i++) {
        $classPath .= $array[$i] . "/";
    }
    
    $file = str_replace('\\', '/', $class);
    // echo "$classPath$file.php";
    
    require("$classPath$file.php");
});

?>