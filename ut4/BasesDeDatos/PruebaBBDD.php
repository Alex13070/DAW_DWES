<?php

try {
    $host = "localhost:3306";
    $db = "gestion_dias";
    $usuario = "root";
    $clave = "123abc";

    $conn = new PDO(
        "mysql:host=$host;dbname=$db",
        $usuario,
        $clave
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (\Throwable $th) {
    exit();
}

$usuarios = $conn->prepare("SELECT * FROM usuario");
$resultado = $usuarios->execute();
$resultado = $usuarios->fetch(PDO::FETCH_ASSOC);


$i = 1;

echo "<h1>Usuarios</h1>";

echo "<pre>";
print_r($resultado);
echo "</pre>";



foreach($conn->query("SELECT * FROM usuario") as $usuario) {
    echo "<h2>Usuario $i</h2>";

    echo "<ul>";
    
    foreach($usuario as $clave => $valor) {
        print_r("<li>$clave => $valor</li>");
    }

    echo "</ul>";
    $i++;
    
}


