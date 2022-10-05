<?php 

$start_time = microtime(true);

set_time_limit(0);


$cadena = "$2y$10$0GNiidCkeO/VBBHPH0DP6e5tgz6l/FIOxs1RcFloJrXuTYmmAsW72";
$encontrada = false;

$clave = "";

for ($i=97; $i < 123 && !$encontrada; $i++) { 
    for ($j= 97 ; $j < 123 && !$encontrada; $j++ ) { 
        for ($k= 97; $k < 123 && !$encontrada; $k++) { 
            for ($l=97; $l < 123 && !$encontrada; $l++) { 

                $intento = chr($i).chr($j).chr($k).chr($l);
                if (password_verify($intento ,$cadena)) {
                    $clave = $intento;
                    $encontrado = true;


                }

                $encontrado = true;
            }
        }
    }
    
}

echo $clave;

$end_time = microtime(true);
$duration = $end_time - $start_time;
$hours = (int)($duration/60/60);
$minutes = (int)($duration/60)-$hours*60;
$seconds = (int)$duration-$hours*60*60-$minutes*60; 
echo "Tiempo empleado para cargar esta pagina: <strong>" . $hours.' horas, '.$minutes.' minutos y '.$seconds.' segundos.</strong>';

?>