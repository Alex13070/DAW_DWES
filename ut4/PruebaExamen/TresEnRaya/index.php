<?php 
// 0.5 Define, inicializa y visualiza un tablero
$tablero = [];
function pintarTablero(&$tablero) : string {

    return "";
    
}

// 0.5 Procesa las variables enviadas en el POST
// 0.5 Detecta y visualiza los errores
// 1.- Casilla ocupada
// 2.- x fuera de rango
// 3.- y fuera de rango
// 0.5 La información del formulario es mantenida en caso de error
// 0.5 Condición de victoria y mensaje
// Bonus 0.5: Para hacer en la última parte del examen
// Solo hacer esta parte tras terminar el resto de ejercicios
// Haz que el turno se cambie automáticamente 
echo "php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tres en raya</title>
</head>
<body>
    <main>
        <h1>Tres en raya</h1>

        <?php pintarTablero($tablero); ?>



    </main>
    
</body>
</html>