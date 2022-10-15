<?php

    $variable = "Hola";

    function pintarLetras(string $variable) {

        for($i = 0; $i < strlen($variable); $i++) {
            echo "<h4>".$variable[$i]."</h4>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej2</title>
</head>
<body>
    <div>
        <?php pintarLetras($variable) ?>
    </div>
</body>
</html>