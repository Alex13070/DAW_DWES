<?php 

$usuarios = [
	"jorge" => "1234",
	"amparo" => "admin",
	"mary" => "",
];


//Ver

function mostrar(array $array) {
    array_walk($array, function($v, $k) {
        echo $k." ".$v."</br>";
    });
    
}

//Meterle hash
function cifrar($array) {
    return array_map(function ($v){
        return password_hash($v, PASSWORD_DEFAULT);
    }, $array);
}


//Poner clave a los que no tenga
function ponerClave($array) {
    return array_map(function ($v){
        return ($v == "")?"clave":$v;
    }, $array);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cifrado</title>
</head>
<body>
    <h1>Cifrado</h1>
    <div class="">
        <h2>Mostrar</h2>
        <?php mostrar($usuarios) ?>
    </div>

    <div class="">
        <h2>Mostrar con claves</h2>
        <?php $usuarios = ponerClave($usuarios) ?>
        <?php mostrar($usuarios) ?>
    </div>
    <div class="">
        <h2>Mostrar con claves cifradas</h2>
        <?php $usuarios = cifrar($usuarios) ?>
        <?php mostrar($usuarios) ?>
    </div>
</body>
</html>