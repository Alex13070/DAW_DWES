<?php

const HORAS = [
    ["Horas", "16:00 <br> 16:55", "16:55 <br> 16:55", "17:50 <br> 16:55", "17:50 <br> 18:45", "19:10 <br> 20:05", "20:05 <br> 21:00", "21:00 <br> 21:55"],
    ["Lunes", "DWEC", "DWEC", "DWEC", "", "EIE", "EIE", "INGLES"],
    ["Martes", "INGLES", "DAW", "DAW", "", "DIW", "DIW", "DIW"],
    ["Miercoles", "DIW", "DIW", "DIW", "", "DWES", "DWES", "DWES"],
    ["Jueves", "EIE", "DAW", "DAW", "", "DWES", "DWES", "DWES"],
    ["Viernes", "DWES", "DWES", "DWES", "", "DWEC", "DWEC", "DWEC"]
];

const MAPA = [
    "Horas" => ["16:00 <br> 16:55", "16:55 <br> 16:55", "17:50 <br> 16:55", "17:50 <br> 18:45", "19:10 <br> 20:05", "20:05 <br> 21:00", "21:00 <br> 21:55"],
    "Lunes" => ["DWEC", "DWEC", "DWEC", "", "EIE", "EIE", "INGLES"],
    "Martes" => ["INGLES", "DAW", "DAW", "", "DIW", "DIW", "DIW"],
    "Miercoles" => ["DIW", "DIW", "DIW", "", "DWES", "DWES", "DWES"],
    "Jueves" => ["EIE", "DAW", "DAW", "", "DWES", "DWES", "DWES"],
    "Viernes" => ["DWES", "DWES", "DWES", "", "DWEC", "DWEC", "DWEC"]
];

/**
 * Esta funcion lo que hace es contar el numero de clases siguientes que son iguales tras la clase introducida. 
 */
function cuantosIgualesDespues($dia, $hora): int {
    $nombre = HORAS[$dia][$hora];
    $cont = 0;
    /*
        for ($i=0; $i < count(HORAS[$dia]); $i++) { 
            if (HORAS[$dia][$i] == $nombre) {
                $cont++;
            }
        }
        */

    $empiezo = false; // Para controlar cuando comienza a contar las clases.
    $sigo = true; // Ve si tiene que seguir contando.


    if ($hora < 5) { // Aqui contamos las que son antes del recreo.
        $inicio = 0;
        $fin = 5;
    } else { // Aqui contamos las que son despues del recreo.
        $inicio = 5;
        $fin = count(HORAS[$dia]);
    }

    for ($i = $inicio; $i < $fin && $sigo; $i++) {
        if (HORAS[$dia][$i] == $nombre) {
            $empiezo = true; //Comienza a contrar las clases.
            $cont++;
        } else {
            if ($empiezo) {
                $sigo = false; // Si la que sigue no es igual, deja de contar.
            }
        }
    }

    return $cont;
}

/**
 * Aqui vemos si la posicion anterior es igual a la siguiente.
 */
function igualAlAnterior($dia, $hora): bool {

    $nombre = HORAS[$dia][$hora];
    $esIgual = false;
    if ($hora > 1) {
        $var = $hora - 1;
        $esIgual = ($nombre == HORAS[$dia][$var]);
    }

    return $esIgual;
}

/**
 * Pone estilos a las celdas
 */
function pintarColor($nombre): string {
    $array = ["DWEC", "EIE", "INGLES", "DAW", "DIW", "DWES"];
    return (in_array($nombre, $array)) ? $nombre : "a";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    -->
    <link rel="stylesheet" href="colores.css">
    <title>Arrays</title>
</head>

<body>

    <div>
        <div class="tabla alinear">
            <table>
                <tr>
                    <td colspan="<?= count(HORAS) ?>" style="text-align: center;">Horario</td>
                </tr>

                <?php for ($i = 0; $i < count(HORAS[0]); $i++) { ?>
                    <tr>
                        <?php for ($j = 0; $j < count(HORAS); $j++) { ?>
                            <td class="<?= pintarColor(HORAS[$j][$i]) ?>">
                                <?php echo HORAS[$j][$i]; ?>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </div>


        <!-- Recorriendo el array_map -->
        <div class="tabla alinear">
            <table>
                <tr>
                    <td colspan="<?= count(MAPA) ?>" style="text-align: center;">Horario</td>
                </tr>
                <tr>
                    <?php foreach (array_keys(MAPA) as $k) { ?>
                        <td>
                            <?= $k; ?>
                        </td>
                    <?php } ?>
                </tr>

                <?php for ($j = 0; $j < 7; $j++) { ?>
                    <tr>
                        <?php foreach (MAPA as $v) { ?>
                            <td class="<?= pintarColor($v[$j]) ?>">
                                <?= $v[$j]; ?>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <!-- Recorriendo el array teniendo en cuenta la cantidad de horas. -->
        <div class="tabla alinear">
            <table>
                <tr>
                    <td colspan="<?= count(HORAS) ?>" style="text-align: center;">Horario</td>
                </tr>

                <?php for ($i = 0; $i < count(HORAS[0]); $i++) { ?>
                    <tr>
                        <?php for ($j = 0; $j < count(HORAS); $j++) { ?>
                            <?php if (!igualAlAnterior($j, $i)) { // Si es igual al anterior, no tenemos que pintarlo, pues esta tendra rowspan 
                            ?>

                                <!-- Mira cuantas horas mas tenemos con la misma asignatura -->
                                <td rowspan="<?= cuantosIgualesDespues($j, $i) ?>" class="<?= pintarColor(HORAS[$j][$i]) ?>">
                                    <?php echo HORAS[$j][$i]; ?>
                                </td>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</body>

</html>