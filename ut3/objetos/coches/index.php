

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
    $nissanRemolque = new CocheConRemolque("1005", "Nissan", 22, 250);
    $kiagrua = new CocheGrua("1007", "Kia", 30);



    $renaultGrua->cargar($porche);
    $kiagrua->cargar($nissanRemolque);

    $array[0] = $bmv;
    $array[1] = $renaultRemolque;
    $array[2] = $renaultGrua;
    $array[3] = $kiagrua;

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