<?php

include("Resultado.php");
include("Usuario.php");
include("UsuarioAdmin.php");
include("UsuarioPremium.php");

$usuario = new Usuario("Usuario", "Normal", "furbo");
$usuarioPremium = new UsuarioPremium("Usuario", "Premium", "furbo pero en premium");




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


        for ($i=0; $i < 12; $i++) { 
            $usuario->introducirResultado(Resultado::VICTORIA);
        }

        
        $usuario->imprimirInformacion();
        

        for ($i=0; $i < 12; $i++) { 
            $usuarioPremium->introducirResultado(Resultado::VICTORIA);
        }
        $usuarioPremium->imprimirInformacion();

        echo $usuarioPremium->getNombre()." <-- Aqui debería de aparecer el nombre del UsuarioPremium";
    ?>
</body>
</html>