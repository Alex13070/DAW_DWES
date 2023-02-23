<?php

require('./AccesoADatos.php');
require('./init.php');

if (isset($_SESSION[ID_USUARIO])) {
    header("Location: index.php");
    die();
}

$error  = "";
$correo = "";


if ($_POST['submit']) {

    $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
    $clave = isset($_POST['clave']) ? $_POST['clave'] : "";

    if ($correo != "" && $clave != "" ) {
        $usuario = AccesoADatos::getSingletone()->buscarUsuario(correo: $correo);

        if (!empty($usuario)) {
            if (password_verify($clave, $usuario['clave'])) {
                if (isset($_POST['recuerdame'])) {
                    crearToken($correo);                    
                }
                else {
                    $_SESSION[ID_USUARIO] = $correo;
                    $_SESSION['imagen'] = $usuario['imagen'];
                    header("Location: index.php");
                    die();
                }
            }
            else {
                $error = "El usuario o la contraseña no son correctos";
            }

        }
        else {
            $error = "El usuario o la contraseña no son correctos";
        }
    }
    else {
        $error = "Faltan campos por rellenar";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form action="login.php" method="post">
        <div class="">
            <label for="correo">Correo: </label>
            <input type="text" name="correo" id="correo" placeholder="Correo" value="<?= $correo ?>">
        </div>
        <div class="">
            <label for="clave">Clave: </label>
            <input type="password" name="clave" id="clave" placeholder="Clave">
        </div>

        <div class="">
            <label for="recuerdame">Recuerdame </label>
            <input type="checkbox" name="recuerdame" id="recuerdame">
        </div>

        <div>
            <input type="submit" name="submit" id="submit" value="Enviar">
        </div>
    </form>

    <?php if ($error != "") { ?>
        <div class="error"><?= $error ?></div>
    <?php } ?>
</body>

</html>