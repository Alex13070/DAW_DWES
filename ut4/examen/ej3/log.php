<?php 
namespace ej3;


require("../ej2/Autoload.php");

$logs = AccesoADatosExamen::getSingletone()->findAllLogs();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <td>Navegador</td>
                <td>Timestamp</td>
            </tr>
            <?php foreach ($logs as $log) { ?>
                <tr>
                    <td><?= $log["navegador"] ?></td>
                    <td><?= date("d-m-Y H:s", intval($log["timestamp"])) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>