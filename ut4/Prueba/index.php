<?php

namespace Prueba;

spl_autoload_register(function ($class) {
    $classPath = "../";
    require("$classPath${class}.php");
});

$formulario = new FormularioPersona();

function pintar(FormularioPersona $formulario) : string {

    $retorno = "";

    if (isset($_GET["enviar"])) {
        if ($formulario->validarFormulario()) {
            echo "<p>Hola</p>";
            redirect("www.google.com");
        }
        else {
            echo "<p>Hola no valido</p>";
            $retorno = $formulario->crearFormularioValidado();
        }
    }
    else {
        echo "<p>Hola por defecto</p>";
        $retorno = $formulario->crearFormulario();
    }

    return $retorno;
}

function redirect($url, $statusCode = 303) {
    header('Location: ' . $url, true, $statusCode);
    die();
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