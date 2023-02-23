<?php

require('init.php');
if (isset($_SESSION[ID_USUARIO])) {
    header("Location: index.php");
    die();
}

require('./AccesoADatos.php');

$error  = "";

$correo = "";


if (isset($_POST['submit'])) {

    $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
    $clave = isset($_POST['clave']) ? $_POST['clave'] : "";
    $clave2 = isset($_POST['clave2']) ? $_POST['clave2'] : "";
    $imagen = isset($_FILES['imagen']);

    if ($correo != "" && $clave != "" && $clave2 != "" && $imagen) {
        if ($clave == $clave2) {

            $imagenData = getimagesize($_FILES["imagen"]["tmp_name"]);
            // Comprobamos si es una imagen

            if ($imagenData !== false) {

                $ruta_base   = "avatares/";
                $archivo     = $ruta_base . basename( $_FILES["imagen"]["name"] );

                $explode = explode('.', $archivo);

                $extension = array_pop($explode);
                $archivo = implode('.', $explode);

                $i = 1;

                while( file_exists( $archivo.'-'.$i . '.' . $extension ) ) {
                    $i++;
                }

                $archivo = $archivo.'-'.$i . '.' . $extension;

                if ( move_uploaded_file( $_FILES["imagen"]["tmp_name"], $archivo ) ) {
                    $resultado = AccesoADatos::getSingletone()->insertarUsuario(
                        correo: $correo, 
                        clave: password_hash($clave, PASSWORD_BCRYPT), 
                        imagen: $archivo
                    );
            
                    if ($resultado) {
                        header("Location: login.php");
                        die();   
                    }
                    else {
                        $error = "Error al insertar usuario";
                    }
                } else {
                    $error = "Lo sentimos, ha habido un error subiendo el archivo.";
                }
            }
            else {
                $error = "El archivo introducido no es una imagen.";
            }
        }
        else {
            $error = "Las contraseñas no coinciden";
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
    <title>Registro</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form action="register.php" enctype="multipart/form-data" method="post">
        <div class="">
            <label for="correo">Correo: </label>
            <input type="text" name="correo" id="correo" placeholder="Correo" value="<?= $correo ?>">
        </div>
        <div class="">
            <label for="clave">Clave: </label>
            <input type="password" name="clave" id="clave" placeholder="Clave">
        </div>

        <div class="">
            <label for="clave2">Repetir Clave: </label>
            <input type="password" name="clave2" id="clave2" placeholder="Repetir Clave">
        </div>
        <div>
            <label for="imagen">Imagen </label>
            <input type="file" name="imagen" id="imagen" placeholder="Seleccione la imagen que dese introducir">
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