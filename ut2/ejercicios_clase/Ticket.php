<?php 
const productos = [
    "naranja" => 1.2,
    "manzana" => 1.5,
    "pera" => 1.8,
    "platano" => 0.8,
    "kiwi" => 0.75,
    "macarrones" => 0.5,
    "arroz" => 0.75,
    "salchichas" => 1,
    "patatas_fritas" => 3,
    "paninis" => 1.5,
    "leche_6_uds" => 5,
    "pizza_jamon_serrano" => 2.59,
    "helado_chocolate" => 2.99
];

$claves = array_keys(productos);

$valores = array_values(productos);

function calcularTotal ($claves) {
    return array_reduce($claves, function($acumulador, $nombre){
        return $acumulador + calcularPrecioPorProducto($nombre, productos[$nombre]);
    }, 0);
}

function calcularPrecioPorProducto($clave, $valor) {
    return isset($_GET[$clave])? ($valor * $_GET[$clave]) : 0;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ticket.css">
</head>


<body>

    <table>
        <?php for($i = 0; $i < count(productos); $i++) { ?>
            <tr>
                <td><?=$claves[$i]?></td>
                <td><?=$valores[$i]?></td>
                <td><?=calcularPrecioPorProducto($claves[$i], $valores[$i])?></td>
            </tr>
        <?php } ?>
        <tr>
            <td>Subtotal</td>
            <td colspan="2"><?= calcularTotal($claves) ?></td>
        </tr>
    </table>
    
</body>
</html>