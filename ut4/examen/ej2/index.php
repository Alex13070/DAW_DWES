<?php 
use ej2\ExamenChungo;
use ej2\ExamenFacil;
use ej2\ExamenHP;

require("./Autoload.php");

$facil = new ExamenFacil(fecha: "20-12-2001");
$chungo = new ExamenChungo(fecha: "21-12-2001");
$hp = new ExamenHP(fecha: "22-12-2001");

$facil->intentar("Facil");
$chungo->intentar("Chungo");
$hp->intentar("Hp");
// $t = time();
// echo date("d-m-Y h:s", $t);

$array = [
    $facil, $chungo, $hp
]

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>
<body>
    <main>
        <h1>Examenes</h1>
        <?php foreach($array as $examen) { ?>
            <section>
                <h2>Examen <?= $examen->getNombre() ?></h2>
                <p>Fecha: <?= $examen->getFecha() ?>, Nota: <?= $examen->obtenerNota() ?></p>
            </section>
        <?php } ?>
        
    </main>
    
</body>
</html>