<?php

namespace ut4\ValidarUsuario;

use ut4\ValidarUsuario\src\data\AccesoADatos;

require("./src/util/Autoload.php");

$formulario = new FormularioUsuario();

function pintar(FormularioUsuario $formulario): string
{

    $mostrarErrores = false;

    if (isset($_POST["enviar"])) {

        if ($formulario->validarFormulario()) {
            $usuario = $formulario->crearObjeto();
            if (!is_null($usuario)) {
                AccesoADatos::getSingletone()->escribirFichero($usuario);
            }
            header("Location: \\ut4\\ValidarUsuario\\RepresentarDatos.php");
            exit();
        } else {
            $mostrarErrores = true;
        }
    }

    return $formulario->crearFormulario($mostrarErrores);
}



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.css" rel="stylesheet">  
    <link rel="stylesheet" href="../PlantillaFormulario/estilos.css">
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

    <!-- <pre>
        <?php //print_r($_POST) ?>
    </pre> -->

    <script src="./js/formularioBootsrap.js"></script>
</body>

</html>