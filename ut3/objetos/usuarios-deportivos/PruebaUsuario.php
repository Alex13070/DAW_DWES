<?php

include("Resultado.php");
include("Usuario.php");
include("UsuarioAdmin.php");
include("UsuarioPremium.php");

$usuario = new Usuario("Usuario", "Normal", "furbo");
$usuarioPremium = new UsuarioPremium("Usuario", "Premium", "furbo pero en premium");
$usuarioAdmin = new UsuarioAdmin("Usuario", "Admin", "Deporte de admin");

function introducirSeisResultados(Usuario $usuario, Resultado $resultado) {
    for ($i=0; $i < 12; $i++) { 
        $usuario->introducirResultado($resultado);
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <?php 
        $usuario->imprimirInformacion();
        $usuarioPremium->imprimirInformacion();
        $usuarioAdmin->imprimirInformacion();
        
        introducirSeisResultados($usuarioPremium, Resultado::VICTORIA);
        introducirSeisResultados($usuarioPremium, Resultado::DERROTA);
        introducirSeisResultados($usuario, Resultado::VICTORIA);
        introducirSeisResultados($usuario, Resultado::DERROTA);
        introducirSeisResultados($usuarioAdmin, Resultado::VICTORIA);
        introducirSeisResultados($usuarioAdmin, Resultado::DERROTA);

        $usuario->imprimirInformacion();
        $usuarioPremium->imprimirInformacion();
        $usuarioAdmin->imprimirInformacion();

        $usuarioAdmin->crearPartido();
    ?>
</body>
</html>