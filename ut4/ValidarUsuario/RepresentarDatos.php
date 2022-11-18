<?php 

namespace ValidarUsuario;

spl_autoload_register(function ($class) {
    $classPath = "../";
    require("$classPath${class}.php");
});

$accesoADatos = AccesoADatos::getSingletone();

$usuarios = $accesoADatos->leerFichero();

function pintarUsuarios(array $usuarios) { 
    $datos = "";
    foreach($usuarios as $usuario) {
        //$datos .= "<p> " . trim(htmlentities($usuario->toCSV())) . "</p>";

        $datos .= "
        <tr>
            <td>" . $usuario->getUsuario() . "</td>
            <td>" . $usuario->getClave() . "</td>
            <td>" . $usuario->getSexo()->value . "</td>
            <td>" . $usuario->getEdad() . "</td>
            <td>" . $usuario->getEstudios()->value . "</td>
            <td>" . $usuario->getFechaContratacion()->toDDMMYYYY() . "</td>
            <td>" . (in_array(Idioma::ESPANOL, $usuario->getIdiomas()) ? "X" : "") . "</td>
            <td>" . (in_array(Idioma::INGLES, $usuario->getIdiomas()) ? "X" : "") . "</td>
            <td>" . (in_array(Idioma::CHINO, $usuario->getIdiomas()) ? "X" : "") . "</td>
        </tr>
        ";
    }

    return $datos;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Representar datos</title>
</head>
<body>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Clave</th>
                    <th>Sexo</th>
                    <th>Edad</th>
                    <th>Estudios</th>
                    <th>Fecha Nacimiento</th>
                    <th>Español</th>
                    <th>Inglés</th>
                    <th>Chino</th>
                </tr>
            </thead>
            <tbody>
                <?= pintarUsuarios($usuarios) ?>
            </tbody>
        </table>
    </main>



</body>
</html>