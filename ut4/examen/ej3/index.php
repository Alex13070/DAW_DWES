<?php
namespace ej3;

require("../ej2/Autoload.php");


$db = AccesoADatosExamen::getSingletone();
$db->insertLog(explode(";", $_SERVER["HTTP_SEC_CH_UA"])[0], time());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <p>Hola mundo!</p>

</body>
</html>