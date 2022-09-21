<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duodécimo</title>
</head>
<body>

    <?php
    function rand_color() {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
    ?>
    <?php 
        $n = 5;
        $mostrar = "";
        for ($i=1; $i <= $n; $i++) {
            $mostrar .= "<div style='background-color:".rand_color()."; width: "
                .($i."0")."cm ;text-align: center; margin: 0 auto;'>*</div>";
        }    

        echo $mostrar; 
    ?>
</body>
</html>