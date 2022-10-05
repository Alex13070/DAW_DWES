<?php 
set_time_limit(0);


$cadena = "$2y$10$0GNiidCkeO/VBBHPH0DP6e5tgz6l/FIOxs1RcFloJrXuTYmmAsW72";
$encontrada = false;

$clave = "";

for ($i=101; $i < 105 && !$encontrada; $i++) { 
    for ($j= 97 ; $j < 123 && !$encontrada; $j++ ) { 
        for ($k= 97; $k < 123 && !$encontrada; $k++) { 
            for ($l=97; $l < 123 && !$encontrada; $l++) { 

                $intento = chr($i).chr($j).chr($k).chr($l);
                if (password_verify($intento ,$cadena)) {
                    $clave = $intento;
                    $encontrado = true;


                }

    
            }
        }
    }
    
}

echo $clave;
?>