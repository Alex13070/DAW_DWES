<?php

use PlantillaFormulario\Campo;
use PlantillaFormulario\CampoNumber;
use PlantillaFormulario\CampoRadio;
use PlantillaFormulario\CampoSelect;
use PlantillaFormulario\Error;
use PlantillaFormulario\Formulario;
use PlantillaFormulario\HttpMethod;
use PlantillaFormulario\InputType;

spl_autoload_register(function ($class) {
    $classPath = "../";
    require("$classPath${class}.php");
});

$formulario = new Formulario("Prueba formulario", "index.php", HttpMethod::GET, "formularioPrueba");

$errorUsuario = new Error ("El nombre de usuario no es correcto");
$errorClave = new Error ("La clave debe de tener *sample text*");
$errorSexo = new Error ("El sexo introducido no es válido");
$errorEdad = new Error ("La edad debe estar comprendida entre 18 y 100");
$errorEstudios = new Error ("Los estudios introducidos no son válidos");

$campoUsuario = new Campo("Usuario", "usuario", InputType::TEXT, "Usuario", "usuario", $errorUsuario);
$campoClave = new Campo("Contraseña", "password", InputType::PASSWORD, "Contraseña", "usuario", $errorClave);

$campoSexo = new CampoRadio("Sexo", "sexo", $errorSexo);
$campoSexo->addOpcion("Hombre", "hombre", "H");
$campoSexo->addOpcion("Mujer", "mujer", "M");


$campoEdad = new CampoNumber("Edad", "edad", "Diga su edad", "edad", 18, 100, $errorEdad);

$campoEstudios = new CampoSelect("Estudios", "estudios", "Especifique sus estudios", "estudios", $errorEstudios);
$campoEstudios->addOpcion("Informatica", 1);
$campoEstudios->addOpcion("Electrónica", 2);
$campoEstudios->addOpcion("Matemáticas", 3);

$formulario->addCampo($campoUsuario);
$formulario->addCampo($campoClave);
$formulario->addCampo($campoSexo);
$formulario->addCampo($campoEdad);
$formulario->addCampo($campoEstudios);

$errorEdad->setActivado(true);






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
    <?php //print_r($_SERVER["HTTP_SEC_CH_UA_PLATFORM"]) ?>
    <?= $formulario->pintarFormulario() ?>
</body>
</html>