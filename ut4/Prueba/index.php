<?php

use PlantillaFormulario\Campos\CampoCheckBox;
use PlantillaFormulario\Campos\CampoNumber;
use PlantillaFormulario\Campos\CampoRadio;
use PlantillaFormulario\Campos\CampoSelect;
use PlantillaFormulario\Campos\CampoTexto;
use PlantillaFormulario\Formulario;
use PlantillaFormulario\Utilidades\HttpMethod;
use PlantillaFormulario\Utilidades\InputType;

spl_autoload_register(function ($class) {
    $classPath = "../";
    require("$classPath${class}.php");
});

$formulario = new Formulario("Prueba formulario", "index.php", HttpMethod::GET, "formularioPrueba");

$campoUsuario = new CampoTexto("Usuario", "usuario", InputType::TEXT, "Usuario", "usuario", "El nombre de usuario no es correcto");
$campoClave = new CampoTexto("Contraseña", "password", InputType::PASSWORD, "Contraseña", "password", "La clave debe de tener *sample text*");

$campoSexo = new CampoRadio("Sexo", "sexo", "Debes marcar al menos un sexo.");
$campoSexo->crearRadio("Hombre", "H", "sexo");
$campoSexo->crearRadio("Mujer", "M", "sexo");


$campoEdad = new CampoNumber("Edad", "edad", "Diga su edad", "edad", 18, 100, "La edad debe estar comprendida entre 18 y 100");

$campoEstudios = new CampoSelect("Estudios", "estudios", "Especifique sus estudios", "estudios", "Los estudios introducidos no son válidos");
$campoEstudios->crearSelect("Informatica", 1);
$campoEstudios->crearSelect("Electrónica", 2);
$campoEstudios->crearSelect("Matemáticas", 3);

$campoIdiomas = new CampoCheckBox("Idiomas", "idiomas", "Los idiomas introducidos no existen");
$campoIdiomas->crearCheckbox("Inglés", "I", "ingles", "ingles");
$campoIdiomas->crearCheckbox("Español", "E", "spanish", "spanish");
$campoIdiomas->crearCheckbox("Chino", "C", "chino", "chino");

$formulario->addCampo($campoUsuario);
$formulario->addCampo($campoClave);
$formulario->addCampo($campoSexo);
$formulario->addCampo($campoEdad);
$formulario->addCampo($campoEstudios);
$formulario->addCampo($campoIdiomas);

$errorEdad->setActivado(true);
// $errorUsuario->setActivado(true);




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
    <?php //$formulario->pintarFormulario() ?>
    <pre>
        <?php print_r($_GET) ?>
    </pre>

</body>
</html>