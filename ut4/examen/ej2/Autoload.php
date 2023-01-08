<?php

namespace ej2;

spl_autoload_register(function ($class) {
    $classPath = "../";
    require("$classPath${class}.php");
});
