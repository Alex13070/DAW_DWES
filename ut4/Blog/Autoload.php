<?php 

spl_autoload_register(function ($class) {
    $classPath = "../../";
    $file = str_replace('\\', '/', $class);
    require("$classPath$file.php");
});


?>