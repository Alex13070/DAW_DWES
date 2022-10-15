<?php 

    function crearArray() {
        $array = [];

        for ($i=0; $i < 3; $i++) { 
            $array[$i] = mt_rand(0, 10);
        }

        return $array;
    }

    function pintarArray($array) {

        rsort($array);

        for ($i=0; $i < 3; $i++) { 
            echo "<h".($i+1).">".$array[$i]."</h".($i+1).">";   
        }
    }


    $array = crearArray();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1</title>
</head>
<body>
    <div>
        <?php pintarArray($array); ?>
    </div>
    
</body>
</html>