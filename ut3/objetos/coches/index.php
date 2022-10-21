

<?php 
    require('Coche.php');
    require('CocheGrua.php');
    require('CocheConRemolque.php');

    function pintarDatos(array $array) {
        array_walk($array, function(Coche $valor) {
            echo "<div>".$valor->__toString()."</div>";
        });
    }

    $array = [];

    $bmv = new Coche("1000", "BMV", 30);
    $renaultRemolque = new CocheConRemolque ("1001", "Renault", 30, 200);
    $porche = new Coche("1002", "Porche", 40);
    $renaultGrua = new CocheGrua("1003", "Renault", 20);

    //$renaultGrua->cargar($porche);

    $array[0] = $bmv;
    $array[1] = $renaultRemolque;
    $array[2] = $renaultGrua;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba coches</title>
</head>
<body>

<?php pintarDatos($array) ?>    
    
</body>
</html>