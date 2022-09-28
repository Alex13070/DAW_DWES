<?php 

    $array = [
        ["Horas","16:00 <br> 16:55", "16:55 <br> 16:55", "17:50 <br> 16:55", "17:50 <br> 18:45", "19:10 <br> 20:05","20:05 <br> 21:00", "21:00 <br> 21:55"],
        ["Lunes", "DWEC", "DWEC", "DWEC","", "EIE", "EIE", "INGLES"], 
        ["Martes", "INGLES", "DAW", "DAW","", "DIW", "DIW", "DIW"],
        ["Miercoles", "DIW", "DIW", "DIW","", "DWES","DWES","DWES"],
        ["Jueves", "EIE","DAW","DAW","","DWES","DWES","DWES"],
        ["Viernes", "DWES","DWES","DWES","", "DWEC","DWEC","DWEC"]
    ];

    $mapa = [
        "Horas" => ["16:00 <br> 16:55", "16:55 <br> 16:55", "17:50 <br> 16:55", "17:50 <br> 18:45", "19:10 <br> 20:05","20:05 <br> 21:00", "21:00 <br> 21:55"],
        "Lunes" => ["DWEC", "DWEC", "DWEC","", "EIE", "EIE", "INGLES"], 
        "Martes" => ["INGLES", "DAW", "DAW","", "DIW", "DIW", "DIW"],
        "Miercoles" => ["Miercoles", "DIW", "DIW", "DIW","", "DWES","DWES","DWES"],
        "Jueves" => ["EIE","DAW","DAW","","DWES","DWES","DWES"],
        "Viernes" => ["DWES","DWES","DWES","", "DWEC","DWEC","DWEC"]
    ]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </style>
</head>
<body>
    
    <table>
        <tr><td colspan="<?= count($array)?>" style="text-align: center;">Horario</td></tr>

        <?php for ($i=0; $i < count($array[0]); $i++) { ?>        
            <tr>
                <?php for ($j=0; $j < count($array); $j++) { ?>
                    <td>
                        <?php echo $array[$j][$i];?> 
                    </td> 
                <?php } ?>
            </tr>
        <?php } ?>
    </table> 

    <table>
        <tr><td colspan="<?= count($array)?>" style="text-align: center;">Horario</td></tr>

        <?php for ($j=0; $j < 6; $j++) {?>        
            <tr>
                <?php  foreach ($mapa as $v) { ?>
                    <td>
                        <?php echo $v[$j];?> 
                    </td> 
                <?php } ?>
            </tr>
        <?php } ?>
    </table> 

</body>
</html>