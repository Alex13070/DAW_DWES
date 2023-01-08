<?php

use ut4\PlantillaFormulario\Campos\CampoNumber;
use ut4\PlantillaFormulario\Campos\CampoSelect;
use ut4\PlantillaFormulario\Campos\CampoTexto;
use ut4\PlantillaFormulario\Formulario;
use ut4\PlantillaFormulario\Utilidades\Error;
use ut4\PlantillaFormulario\Utilidades\HttpMethod;
use ut4\PlantillaFormulario\Utilidades\InputType;
use ut4\PlantillaFormulario\Utilidades\RegexPhp;

spl_autoload_register(function ($class) {
    $classPath = "../";
    require("$classPath${class}.php");
});


if (isset($_POST["enviar"])) {

    if (isset($_POST["nombre"]) && isset($_POST["hora"]) && isset($_POST["minuto"])) {

        // Si los datos que me llegan de la petición son buenos, los guardo en el fichero

        $mins = intVal(date('i'));
        $horas = intval(date('H'));


        if (intVal($_POST["hora"]) > $horas || (intVal($_POST["hora"]) == $horas && intVal($_POST["minuto"]) > $mins)) {
            file_put_contents("./hora.csv", $_POST["nombre"].",".$_POST["hora"].",".$_POST["minutos"], FILE_APPEND);            
        }
        else {
            $errorHora->setActivado(true);
        }


    }
    
}

// $formulario = new Formulario ("Concierto", "index.php", HttpMethod::POST);


// $campoCancion = new CampoTexto ("Nombre de la canción", "nombre", InputType::TEXT, "Nombre de la canción", "nombre", "Nombre no valido", RegexPhp::NOMBRE);
// $campoHora = new CampoNumber("Hora fiesta", "hora", "Hora fiesta", "hora", 0, 23, "La hora introducida tiene que ser mayor a la actual");

// $campoMinutos = new CampoSelect("Minutos", "minutos", "Especifica los minutos", "minutos", "La hora introducida tiene que ser mayor a la actual");
// $campoMinutos->crearSelect("00", "00");
// $campoMinutos->crearSelect("15", "15");
// $campoMinutos->crearSelect("30", "30");
// $campoMinutos->crearSelect("45", "45");

// $formulario->addCampo($campoCancion);
// $formulario->addCampo($campoHora);
// $formulario->addCampo($campoMinutos);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temitas</title>
</head>
<body>
    <?php //echo $formulario->crearFormulario() ?>
    <pre>
        <p><?php print_r($_POST)?></p>
    </pre>
</body>
</html>