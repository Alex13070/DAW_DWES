<?php 

require_once("estilos.php"); 
require_once("menu.php");

//Hay que extraerlo a un fichero
$bgcolor = isset($_COOKIE["bgcolor"]) ? $_COOKIE["bgcolor"] : "";
$fgcolor = isset($_COOKIE["fgcolor"]) ? $_COOKIE["fgcolor"] : "";
$nombre = isset($_COOKIE["nombre"]) ? $_COOKIE["nombre"] : "Anonimo";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 2</title>
    <?php pintarEstilos($bgcolor, $fgcolor) ?>
</head>
<body>
    <?php pintarMenu($nombre)?>
    
    <p class="pintar">
        Texto2 Texto2 Texto2 Texto2 Texto2 Texto2 Texto2 
        Texto2 Texto2 Texto2 Texto2 Texto2 Texto2 Texto2 
        Texto2 Texto2 Texto2 Texto2 Texto2 Texto2 Texto2 
        Texto2 Texto2 Texto2 Texto2 Texto2 Texto2 Texto2 
    </p>
    

</body>
</html>