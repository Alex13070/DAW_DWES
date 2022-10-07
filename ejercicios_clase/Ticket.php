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



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            background-color: #000000;
            border-width: 1px;
            margin-left: 30px;
        }
        td {
            background-color: #FFFFFF;
            text-align: center;
        }</style>
</head>


<body>

<form action="Ticket.php" method="get">

    <table>

        <?php for($i = 0; $i < count(productos); $i++) { ?>

            <tr>
                <td><?=$claves[$i]?></td>
                <td><?=$valores[$i]?></td>
                <td><?= ($valores[$i] * $_GET[$claves[$i]])?></td>
            </tr>

        <?php } ?>

        <tr>
            <td colspan="3">
                <?= array_reduce($claves, function($acumulador, $nombre){
                    return $acumulador + ($_GET[$nombre] * productos[$nombre]);
                }, 0)
                ?>
                </td>
        </tr>


    </table>


</form>
    
</body>
</html>