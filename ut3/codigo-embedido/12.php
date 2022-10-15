<?php 
// Crea una función que reciba un array con información de un usuario y escriba un formulario relleno. En este caso solo utiliza campos de texto o enteros

// NOTA: Utiliza las funciones array_map o array_walk

// Ejemplo
// $yo = [
//   "nombre" => "Jorge Dueñas Lerín",
//   "dirección" => "Calle falsa número 1234"
//   "teléfono" => "91 123 45 67",
//   "población" => "Madrid",
//   "edad" => 23,
// ]
// format_form_user($yo);
// Imprime:

// <form id="datos personales" action="post">
//   <input name="nombre" value="Jorge Dueñas Lerín"></input>
//   ... etc.
// </form>

$array = [
    "Nombre" => "Jorge Dueñas Lerín",
    "Dirección" => "Calle falsa número 1234",
    "Teléfono" => "91 123 45 67",
    "Población" => "Madrid",
    "Edad" => 23,
];


function pintarFormulario ($array) {
    $formulario = '<form action="" method="get" id="formulario">';

    array_walk($array, function($valor, $clave) use (&$formulario){
        $formulario .= "
        <div class='mb-3'>
            <label class='form-label'>$clave</label>
            <input class='form-control' id='exampleInputEmail1' type='text' name='$clave' placeholder='$clave' value='$valor'>
        </div>";
    });

    $formulario .= '</form>';

    echo $formulario;
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ej 12</title>
    <style>
        html {
            height: 100%;
            width: 99%; 
        }
        body {
            background: #0d0d0d;
        }
    </style>
</head>
<body>
    <div>

        <div class="row p-4">
            <div class="col-md-3"></div>

            <div class="col-md-6">
                <div class="card text-right">
                    <div class="card-header"> 
                        <h3 class="text-center">Formulario</h3>
                    </div>

                    <div class="card-body">
                        <?php pintarFormulario($array) ?>
                    </div>                   
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        
    
    </div>

</body>
</html>