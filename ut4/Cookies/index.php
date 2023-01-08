<?php
const ACEPTAR = "Aceptar";
const RECHAZAR = "Rechazar";

const NOMBRE_COOKIE = "Verificado";
const ERROR_VACIO = "";
$pintarForm = true;
$error = ERROR_VACIO;



if (isset($_GET["aceptar"])) {

    switch($_GET["aceptar"]) {
        case ACEPTAR: 
            setcookie(NOMBRE_COOKIE, "¿Datos?");
            $pintarForm = false;
            break;
        case RECHAZAR:
            $error = "¡Cookies rechazadas!";
            break;
        default:
            $error = "No metas datos en el formulario.";         
    }

}

function pintarFormulario (bool $pintarForm) {
    $pintar = "";
    if (!isset($_COOKIE[NOMBRE_COOKIE]) && $pintarForm) {

        $pintar = "
            <form action='index.php' method='get'>
                ¿Aceptar cookies?
                <input name='aceptar' type='submit' value='" . ACEPTAR . "'>
                <input name='aceptar' type='submit' value='" . RECHAZAR . "'>
            </form>
        ";
    } 
    else {
        $pintar = "<h3>Cookies ya aceptadas</h3>";
    }

    echo $pintar;
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    <?php 
        if ($error != ERROR_VACIO) {
            echo "<h3 class='error'>$error</h3>";
        }
        pintarFormulario($pintarForm);
    ?>
    
    <br>

    <a href="http://localhost:8000/ut4/Cookies/Configurado.php">Redireccion</a>
    
</body>
</html>