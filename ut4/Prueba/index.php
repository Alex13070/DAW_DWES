<?php

namespace Prueba;

spl_autoload_register(function ($class) {
    $classPath = "../";
    require("$classPath${class}.php");
});

$formulario = new FormularioUsuario();

function pintar(FormularioUsuario $formulario) : string {

    $retorno = "";

    if (isset($_GET["enviar"])) {
        if ($formulario->validarFormulario()) {
            $usuario = $formulario->crearObjeto();
            if (!is_null($usuario)) {
                AccesoADatos::getSingletone()->escribirFichero($usuario);
            }       
            header("Location: \\ut4\\Prueba\\RepresentarDatos.php");     
        }
        else {
            $retorno = $formulario->crearFormularioValidado();
        }
    }
    else {
        $retorno = $formulario->crearFormulario();
    }

    return $retorno;
}



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba formulario</title>
</head>

<body>

    <div class='container'>
        <div class='row p-4'>
            <div class='col-lg-6 offset-lg-3'>
                <?= pintar($formulario) ?>
            </div>
        </div>
    </div>

    <pre>
        <?php print_r($_GET) ?>
    </pre>


    <pre>
        <?= $formulario->validarFormulario() ? "Valido" : "No valido" ?>
    </pre>
</body>

</html>