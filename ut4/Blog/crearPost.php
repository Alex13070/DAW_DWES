<?php 

use ut4\Blog\src\controllers\AccesoADatos;
use ut4\Blog\src\model\Post;

require("./funciones.php");
require("./Autoload.php");

const TITULO_MAX_LENTGTH = 60;
const CONTENIDO_MAX_LENGTH = 255;

session_start();

if (!isset($_SESSION["correo"])) {
    $_SESSION["pagina"] = $_SERVER["SCRIPT_NAME"];
    header("Location: ".URL_RAIZ."/ut4/Blog/login.php");
    die();
}

$errores = [];

$titulo = "";
$contenido = "";

if (isset($_POST["enviar"])) {
    $titulo = isset($_POST["titulo"]) ? clean_input($_POST["titulo"]) : "";
    $contenido = isset($_POST["contenido"]) ? clean_input($_POST["contenido"]) : "";

    if (!empty($titulo) && !empty($contenido)) {

        if (strlen($titulo) > TITULO_MAX_LENTGTH) {
            $errores[] = "El título no puede superar los " . TITULO_MAX_LENTGTH . " caracteres.";
        }

        if (strlen($contenido) > CONTENIDO_MAX_LENGTH) {
            $errores[] = "El contenido no puede superar los " . CONTENIDO_MAX_LENGTH . " caracteres.";
        }

        if (count($errores) == 0) {
            $db = AccesoADatos::getSingletone();

            $idPost = $db->crearPost(new Post("", $titulo, $contenido, date("Y-m-d")));

            header("Location: " . URL_RAIZ . "/ut4/Blog/detalles.php?id=" . $idPost);
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
    <link rel="stylesheet" href="./css/style.css">
    <title>index</title>
</head>
<body>
    <?php require_once("./header.php")?>
    
    <main class="centrar">
        <article class="formulario">
            <h1 class="pad-10">Crear post</h1>
            <form action="crearPost.php" method="post" id="formulario">
                <section>
                    <label for="titulo">Titulo: </label>
                    <input class="crear_post" type="text" name="titulo" id="titulo" value="<?= $titulo ?>">
                </section>
    
                <section>
                    <label for="contenido">Cuerpo: </label>
                    <textarea class="crear_post" name="contenido" id="contenido" placeholder="Escriba su comentario aquí"><?= $contenido ?></textarea>
                </section>    

                <?php require_once("./Errores.php") ?>
                
                <section class="centrar">
                    <input name="enviar" type="submit" value="Enviar" id="enviar">
                </section>
    
            </form>
        </article>
    </main>    
</body>
</html>