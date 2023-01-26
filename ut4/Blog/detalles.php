<?php 

use ut4\Blog\src\controllers\AccesoADatos;

require("./funciones.php");
require("./Autoload.php");

session_start();

$id = -1;

if (isset($_GET["id"])) {
    $db = AccesoADatos::getSingletone();
    $id = $_GET["id"];
}


if (!isset($_SESSION["correo"])) {
    $_SESSION["pagina"] = $_SERVER["SCRIPT_NAME"];
    
    if ($id != -1) {
        $_SESSION["parametros"] = "?id=" . $id;
    }
    
    header("Location: " . URL_RAIZ . "/ut4/Blog/login.php");
    die();
}


$post = $db->findPostById($id);

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
        <div class="post">
            <section class="foto">
                <img src="./images/usuario.png" alt="imagen de foto de usuario">
                <div class="texto_foto"><?= $post["correo"]  ?></div>
            </section>                
                
            <section class="flex titulo">
                <span class="nombre_apartado">Titulo: </span>
                <p><?= $post["titulo"] ?></p>
            </section>
                    
            <section class="flex">                        
                <span class="nombre_apartado">Cuerpo: </span>
                <p><?= $post["cuerpo"] ?></p>
            </section> 
        </div>
    </div>  
</body>
</html>