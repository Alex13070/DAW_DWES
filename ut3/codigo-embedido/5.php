<?php 
// Crea una función que escriba lo parámetros recibidos por la URL en una tabla

function escribirParametros() {

    $tabla = "<table><tr><th>clave</th><th>valor</th></tr>";

    foreach($_GET as $clave => $valor) {
        $tabla .= "<tr><td>$clave</td><td>$valor</td></tr>";
    }

    $tabla .= "</table>";

    echo $tabla;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <style>
        table {
            background-color: #000000;
            border-width: 1px;
            margin-left: 30px;
        }
        td {
            background-color: #FFFFFF;
            text-align: center;
            width: 50px;
        }
        th {
            color: white;   
        }
    </style>
</head>
<body>
    <?php escribirParametros()?>
</body>
</html>