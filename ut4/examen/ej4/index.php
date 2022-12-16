<?php

namespace examen\ej4;

print_r($_POST);

spl_autoload_register(function ($class) {
    $classPath = "../../";
    require("$classPath${class}.php");
});


$formulario = new FormularioExamen();

function pintar(FormularioExamen $formulario): string {

    $pintarErrores = false;

    if (isset($_POST["enviar"])) {

        if ($formulario->validarFormulario()) {
            echo "<h1>Gracias por su pedido</h1>";
        } 
        $pintarErrores = true;  
    }

    return $formulario->crearFormulario($pintarErrores);
}



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../ValidarUsuario/css/bootstrap.css" rel="stylesheet">  
    <title>Prueba formulario</title>
</head>

<body>
    <div class='container'>
        <div class='row p-4'>
            <div class='col-lg-8 offset-lg-2'>
                <?= pintar($formulario) ?>
            </div>
        </div>
    </div>

    <script src="../../ValidarUsuario/js/formularioBootsrap.js"></script>
</body>

</html>