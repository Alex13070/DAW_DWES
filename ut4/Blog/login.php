<?php

use ut4\Blog\src\controllers\AccesoADatos;

require_once("./Autoload.php");
require_once("./funciones.php");

session_start();

$errores = [];

$correo = "";
$clave = "";

if (isset($_POST["enviar"])) {
    $correo = isset($_POST["correo"]) ? clean_input($_POST["correo"]) : "";
    $clave = isset($_POST["clave"]) ? clean_input($_POST["clave"]) : "";

    if (!empty($correo) && !empty($clave)) {

        $db = AccesoADatos::getSingletone();

        $array = $db->buscarUsuario($correo);

        if (count($array) > 0) {
            
            if (password_verify($clave, $array["clave"])) {
                $_SESSION["id"] = $array["id"];
                $_SESSION["correo"] = $correo;

                $location = "/ut4/Blog/index.php";
                $parametros = "";

                if (isset($_SESSION["pagina"])) {
                    $location = $_SESSION["pagina"];
                    unset($_SESSION["pagina"]);
                }

                if (isset($_SESSION["parametros"])) {
                    $parametros = $_SESSION["parametros"];
                    unset($_SESSION["parametros"]);
                }

                header("Location: " . URL_RAIZ . "$location$parametros");
                die();
            }
            else {
                $errores[] = "Las credenciales son incorrectas.";
            }


        }
        else {
            $errores[] = "No existe ninguna cuenta con el correo introducido.";
        }
    }
    else {
        $errores[] = "Faltan campos por rellenar.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main class="centrar">
        
        <article class="formulario">
            <h1 class="pad-10">Login</h1>
            <form action="login.php" method="post" id="formulario">
                <section>
                    <label for="correo">Correo: </label>
                    <input type="text" name="correo" id="correo" value="<?= $correo ?>">
                </section>
    
                <section>
                    <label for="clave">Clave: </label>
                    <input type="password" name="clave" id="clave">
                </section>    

                <?php require_once("./Errores.php") ?>
                
                <section class="centrar">
                    <a class="boton" href="<?= URL_RAIZ ?>/ut4/Blog/register.php">Registro</a>
                </section>

                <section class="centrar">
                    <a class="boton" href="<?= URL_RAIZ ?>/ut4/Blog/index.php">Inicio</a>
                </section>

                <section class="centrar">
                    <input name="enviar" type="submit" value="Enviar" id="enviar">
                </section>
    
            </form>
        </article>
    </main>
</body>
</html>