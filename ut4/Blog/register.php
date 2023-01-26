<?php

use ut4\Blog\src\controllers\AccesoADatos;
use ut4\Blog\src\model\Usuario;

require("./Autoload.php");
require("./funciones.php");

session_start();

$errores = [];

$correo = "";
$nombre = "";
$apellidos = "";
$clave = "";
$rclave = "";

if (isset($_POST["enviar"])) {
    $correo = isset($_POST["correo"]) ? clean_input($_POST["correo"]) : "";
    $nombre = isset($_POST["nombre"]) ? clean_input($_POST["nombre"]) : "";
    $apellidos = isset($_POST["apellidos"]) ? clean_input($_POST["apellidos"]) : "";
    $clave = isset($_POST["clave"]) ? clean_input($_POST["clave"]) : "";
    $rclave = isset($_POST["rclave"]) ? clean_input($_POST["rclave"]) : "";

    if (!empty($correo) && !empty($nombre) && !empty($apellidos) && !empty($rclave) && !empty($clave)) {
        
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "Correo no válido.";
        }

        if ($clave != $rclave) {
            $errores[] = "Las contraseñas no coinciden.";
        }

        if (count($errores) == 0) {
            $db = AccesoADatos::getSingletone();

            if (!$db->existeUsuario($correo)) {
                $db->insertarUsuario(new Usuario($correo, password_hash($clave, PASSWORD_BCRYPT), $nombre, $apellidos));

                header("Location: " . URL_RAIZ . "/ut4/Blog/login.php");
                die();
            }
            else {
                $errores[] = "El correo introducido ya ha sido usado.";
            }
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
    <title>Registro de usuarios</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main class="centrar">
        <article class="formulario">
            <h1 class="pad-10">Registro de usuarios</h1>
            <form action="register.php" method="post" id="formulario">
                <section>
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" value="<?= $nombre ?>">
                </section>
    
                <section>
                    <label for="apellidos">Apellidos: </label>
                    <input type="text" name="apellidos" id="apellidos" value="<?= $apellidos ?>">
                </section>
    
                <section>
                    <label for="correo">Correo: </label>
                    <input type="text" name="correo" id="correo" value="<?= $correo ?>">
                </section>
    
                <section>
                    <label for="clave">Clave: </label>
                    <input type="password" name="clave" id="clave">
                </section>    
                
                <section>
                    <label for="clave">Repetir clave: </label>
                    <input type="password" name="rclave" id="rclave">
                </section>

                <?php require_once("./Errores.php") ?>

                <section class="centrar">
                    <a class="boton" href="<?= URL_RAIZ ?>/ut4/Blog/login.php">Login</a>
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