<?php
require_once("estilos.php"); 
require_once("menu.php");

if (isset($_POST["enviar"])) {
    //Hay que extraerlo a un fichero
    $bgcolor = isset($_POST["bgcolor"]) ? $_POST["bgcolor"] : "#FFFFFF";
    $fgcolor = isset($_POST["fgcolor"]) ? $_POST["fgcolor"] : "#000000";
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "Anonimo";

    setcookie("bgcolor", $bgcolor);
    setcookie("fgcolor", $fgcolor);
    setcookie("nombre", $nombre);
}
else {
    //Hay que extraerlo a un fichero
    $bgcolor = isset($_COOKIE["bgcolor"]) ? $_COOKIE["bgcolor"] : "#FFFFFF";
    $fgcolor = isset($_COOKIE["fgcolor"]) ? $_COOKIE["fgcolor"] : "#000000";
    $nombre = isset($_COOKIE["nombre"]) ? $_COOKIE["nombre"] : "Anonimo";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php pintarEstilos($bgcolor, $fgcolor) ?>
    <title>Config</title>
</head>
<body>
    <?php pintarMenu($nombre) ?>

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