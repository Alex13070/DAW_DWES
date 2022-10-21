<?php 
/*
$cosas = [
    3,
    "frutas"  => ["a" => "naranja", "b" => [1, 2], "c" => "manzana"],
    "números" => [1, 2, 3, 4, 5, 6],
    "hoyos"   => ["primero", 5 => "segundo", "tercero"],
    "asd"
];

imprimeTabulado($cosas);

3
array
____naranja
____array
________1
________2
____manzana
array
____1
____2
____3
____4
____5
____6
array
____primero
____segundo
____tercero
asd

*/

$cosas = [
    3,
    "frutas"  => ["a" => "naranja", "b" => [1, 2], "c" => "manzana"],
    "números" => [1, 2, 3, 4, 5, 6],
    "hoyos"   => ["primero", 5 => "segundo", "tercero"],
    "asd"
];

function imprimeTabulado($array, $tabulado = "") {
    foreach($array as $clave => $valor) {
        if (gettype($valor) == "array") {
            echo $tabulado."array<br>";
            imprimeTabulado($valor, $tabulado . "_t_");
        }
        else {
            echo $tabulado.$valor."<br>";
        }
    }
}

imprimeTabulado($cosas);

?>