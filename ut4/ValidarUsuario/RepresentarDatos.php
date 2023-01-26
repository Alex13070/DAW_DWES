<?php 

namespace ut4\ValidarUsuario;

use ut4\ValidarUsuario\src\data\AccesoADatos;
use ut4\ValidarUsuario\src\usuario\Idioma;

require("./src/util/Autoload.php");

$accesoADatos = AccesoADatos::getSingletone();

$usuarios = $accesoADatos->leerFichero();

function pintarUsuarios(array $usuarios) { 
    $datos = "";
    foreach($usuarios as $usuario) {
        //$datos .= "<p> " . trim(htmlentities($usuario->toCSV())) . "</p>";

        $datos .= "
        <tr>
            <td>" . limpiarString($usuario->getUsuario()) . "</td>
            <td>" . limpiarString($usuario->getClave()) . "</td>
            <td>" . limpiarString($usuario->getSexo()->value) . "</td>
            <td>" . limpiarString($usuario->getEdad()) . "</td>
            <td>" . limpiarString($usuario->getEstudios()->value) . "</td>
            <td>" . limpiarString($usuario->getFechaContratacion()->toDDMMYYYY()) . "</td>
            <td>" . (in_array(Idioma::ESPANOL, $usuario->getIdiomas()) ? "X" : "") . "</td>
            <td>" . (in_array(Idioma::INGLES, $usuario->getIdiomas()) ? "X" : "") . "</td>
            <td>" . (in_array(Idioma::CHINO, $usuario->getIdiomas()) ? "X" : "") . "</td>
        </tr>
        ";
    }

    return $datos;
}

function limpiarString(string $s) : string {
    return trim(htmlentities($s));
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
                    <th>Fecha de contratación</th>
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