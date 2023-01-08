<?php
require_once("estilos.php"); 
require_once("menu.php");

session_start();


if (isset($_POST["enviar"])) {

    $bgcolor = isset($_POST["bgcolor"]) ? $_POST["bgcolor"] : "#FFFFFF";
    $fgcolor = isset($_POST["fgcolor"]) ? $_POST["fgcolor"] : "#000000";
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "Anonimo";

    $_SESSION["bgcolor"] = $bgcolor;
    $_SESSION["fgcolor"] = $fgcolor;
    $_SESSION["nombre"] = $nombre;
    
}
else {
    $bgcolor = isset($_SESSION["bgcolor"]) ? $_SESSION["bgcolor"] : "#FFFFFF";
    $fgcolor = isset($_SESSION["fgcolor"]) ? $_SESSION["fgcolor"] : "#000000";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php pintarEstilos() ?>
    <title>Config</title>
</head>
<body>
    <?php pintarMenu() ?>

    <main>
        <h1>Configuración</h1>
        <form action="config.php" method="post" id="formulario">

            <section>
                <label for="bgcolor">BG-COLOR: </label>
                <input type="color" name="bgcolor" value="<?= $bgcolor ?>">
            </section>

            <section>
                <label for="fgcolor">FG-COLOR: </label>
                <input type="color" name="fgcolor" value="<?= $fgcolor ?>">
            </section>

            <section>
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" value="<?= $nombre ?>">
            </section>

            
            <section>
                <input name="enviar" type="submit" value="Enviar" id="enviar">
            </section>

        </form>
    </main>
    

</body>
</html>