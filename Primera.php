<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola</title>

    <style>
        table {
            background-color: #000000;
            border-width: 1px;
            margin-left: 30px;
        }
        td {
            background-color: #FFFFFF;
            text-align: center;
        }

        .primo {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <?php include('menu.html')?>
    <h1>Hola esto no es php</h1>
    <?php for ($i=  0; $i < 5; $i++ ) { ?>
        <p>Imprimiendo html</p>
    <?php   } ?>

    <?php 
        for ($i=  0; $i < 5; $i++ ) { 
            echo " Imprimiendo php ". $i;
        }   

        function numerosPrimos($numero) {

            $retorno = true;

            for ($i = 2; $i <= $numero/2 && $retorno; $i++) {
                if ($numero % $i == 0) {
                    $retorno = false;
                }
            }
            
            return $retorno;
        }
    ?>


    <table>
        <tr><td colspan="2" style="text-align: center;">Algoritmo</td></tr>
        <?php 
            $num = 5;
            for ($i=0; $i <= 10; $i++) { 
                echo "<tr><td>".$num." x ".$i."</td> <td>".($num*$i)."</td></tr>";
                
            }
        ?>
    </table>

    <br>

    <table>
        <tr><td colspan="2" style="text-align: center;">Algoritmo</td></tr>
        <?php $num = 5; 
            for ($i=0; $i <= 10; $i++) { ?>
            
            <tr>
                <td>
                    <?php echo $num;?> x <?php  echo $i; ?>
                </td> 
                <td>
                    <?php echo $num*$i;?>
                </td>
            </tr>
                
        <?php } ?>
    </table> 

    <?php $len = 10; ?>

    <br>

    <table>
        <tr><td colspan="<?php echo 10; ?>" style="text-align: center;">Algoritmo</td></tr>
        <?php 
            $num = 0;
            for ($i=0; $i < $len; $i++) { ?>        
                <tr>
                    <?php 
                    $len = 10; 
                    for ($j=0; $j < $len; $j++) { 
                        $num++;?>
                        <td width="30px" height="30px" class="<?php if (numerosPrimos($num)) {echo "primo"; }?>">
                            <?php 

                            echo $num;?> 
                        </td> 
                    <?php } ?>
                </tr>
        <?php } ?>
    </table> 
</body>
</html>