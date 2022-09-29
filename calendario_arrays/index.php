<?php 

    const HORAS = [
        ["Horas","16:00 <br> 16:55", "16:55 <br> 16:55", "17:50 <br> 16:55", "17:50 <br> 18:45", "19:10 <br> 20:05","20:05 <br> 21:00", "21:00 <br> 21:55"],
        ["Lunes", "DWEC", "DWEC", "DWEC","", "DWEC", "EIE", "DWEC"], 
        ["Martes", "INGLES", "DAW", "DAW","", "DIW", "DIW", "DIW"],
        ["Miercoles", "DIW", "DIW", "DIW","", "DWES","DWES","DWES"],
        ["Jueves", "EIE","DAW","DAW","","DWES","DWES","DWES"],
        ["Viernes", "DWES","DWES","DWES","", "DWEC","DWEC","DWEC"]
    ];

    const MAPA = [
        "Horas" => ["16:00 <br> 16:55", "16:55 <br> 16:55", "17:50 <br> 16:55", "17:50 <br> 18:45", "19:10 <br> 20:05","20:05 <br> 21:00", "21:00 <br> 21:55"],
        "Lunes" => ["DWEC", "DWEC", "DWEC","", "EIE", "EIE", "INGLES"], 
        "Martes" => ["INGLES", "DAW", "DAW","", "DIW", "DIW", "DIW"],
        "Miercoles" => ["DIW", "DIW", "DIW","", "DWES","DWES","DWES"],
        "Jueves" => ["EIE","DAW","DAW","","DWES","DWES","DWES"],
        "Viernes" => ["DWES","DWES","DWES","", "DWEC","DWEC","DWEC"]
    ];

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
        $empiezo = false;
        $sigo = true;
        if($hora < 5) {
            for ($i=0; $i < 5 && $sigo; $i++) { 
                if (HORAS[$dia][$i] == $nombre) {
                    $empiezo = true;
                    $cont++;
                }
                else {
                    if ($empiezo) {
                        $sigo = false;
                    }
                }
            }
        }
        else {
            for ($i=5; $i < count(HORAS[$dia]) && $sigo; $i++) { 
                if (HORAS[$dia][$i] == $nombre) {
                    $empiezo = true;
                    $cont++;
                }
                else {
                    if ($empiezo) {
                        $sigo = false;
                    }
                }
            }
        }
    
        return $cont;
    }

    function igualAlAnterior($dia, $hora): bool{
    
        $nombre = HORAS[$dia][$hora];
        $esIgual = false;
        if ($hora > 1) {
            $var = $hora - 1;
            $esIgual = ($nombre == HORAS[$dia][$var]);
        }

        return $esIgual;
    }

    function pintarColor($nombre) {
        $array = ["DWEC", "EIE", "INGLES", "DAW", "DIW", "DWES"];

        return (in_array($nombre, $array))?$nombre:"a";
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
    <title>Arrays</title>
    <style>
        table {
            background-color: #000000;
            border-width: 1px;
            margin-left: 30px;
        }
        td {
            background-color: #FFFFFF;
            text-align: center;
            padding: 10px;
        }

        td:hover {
            background-color: #FFFFFF;
        }
        .tabla {
            padding: 10px;
        }

        .DWEC {
            background-color: yellowgreen;
        }

        .EIE {
            background-color: yellow;

        }

        .INGLES {
            background-color: skyblue;
        }

        .DAW {
            background-color: lightpink;
        }

        .DIW {
            background-color: lightcoral;
        }
        .DWES {
            background-color: lightsalmon;
        }

        body {
            background-image: url(https://c.tenor.com/lOVqHrlKsT0AAAAC/obama-prism.gif);
        }
    </style>
</head>
<body>
    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 d-flex justify-content-center">

            <div class="tabla">
                <table>
                    <tr><td colspan="<?= count(HORAS)?>" style="text-align: center;">Horario</td></tr>

                    <?php for ($i=0; $i < count(HORAS[0]); $i++) { ?>        
                        <tr>
                            <?php for ($j=0; $j < count(HORAS); $j++) { ?>
                                <td class="<?= pintarColor(HORAS[$j][$i])?>">
                                    <?php echo HORAS[$j][$i];?> 
                                </td> 
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table> 
            </div>



            <div class="tabla">
                <table>
                    <tr>
                        <td colspan="<?= count(MAPA)?>" style="text-align: center;">Horario</td>
                    </tr>
                    <tr>
                        <?php foreach (array_keys(MAPA) as $k) {?>
                            <td>
                                <?= $k;?> 
                            </td>
                        <?php } ?>
                    </tr>
                    
                    <?php for ($j=0; $j < 7; $j++) {?> 
                        <tr>
                            <?php  foreach (MAPA as $v) { ?>
                                    <td class="<?= pintarColor($v[$j])?>">
                                        <?= $v[$j];?> 
                                    </td> 
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            </div> 

            <div class="tabla">
                <table>
                    <tr><td colspan="<?= count(HORAS)?>" style="text-align: center;">Horario</td></tr>

                    <?php for ($i=0; $i < count(HORAS[0]); $i++) { ?>        
                        <tr>
                            <?php for ($j=0; $j < count(HORAS); $j++) { ?>
                                <?php if (!igualAlAnterior($j, $i)) { ?>
                                    <td  rowspan="<?= cuantosIgualesDespues($j, $i) ?>" class="<?= pintarColor(HORAS[$j][$i])?>">
                                        <?php echo HORAS[$j][$i];?> 
                                    </td> 
                                <?php } ?>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table> 
            </div>
        </div>        
        <div class="col-md-3"></div>
    </div>

</body>
</html>