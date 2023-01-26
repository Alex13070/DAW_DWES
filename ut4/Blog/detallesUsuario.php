<?php 

use ut4\Blog\src\controllers\AccesoADatos;

require("./funciones.php");
require("./Autoload.php");

session_start();

if (!isset($_SESSION["correo"])) {
    $_SESSION["pagina"] = $_SERVER["SCRIPT_NAME"];
    header("Location: ".URL_RAIZ."/ut4/Blog/login.php");
    die();
}

$posts = AccesoADatos::getSingletone()->findAllPostsByCorreo($_SESSION["id"]);


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
    
    <div class="main_container">
        <?php foreach($posts as $post) {
            pintarPostEnlazado(
                imagen: "./images/usuario.png", 
                correo: $post["correo"], 
                titulo: $post["titulo"], 
                cuerpo: $post["cuerpo"], 
                enlace:URL_RAIZ . "ut4/Blog/detalles.php?id=" . $post["id"]
            );
        } ?>
    </div>
</body>
</html>