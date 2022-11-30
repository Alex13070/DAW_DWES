<?php 
// (0.5) inicializaSopaLetras($tablero, $n, $m);
// Genera una tablero con letras aleatorias de nxm celdas

$tablero = [];
const WIDTH = 10;
const HEIGHT = 10;
const NORMAL = true;
const REVES = false;

function inicializaSopaLetras(array &$tablero, int $n, int $m) {
    for ($i=0; $i < $n; $i++) { 
        for ($j=0; $j < $m; $j++) { 
            $tablero[$i][$j] = chr(random_int(65, 90));
        }
    }
}


// (0.25) pintaTablero($tablero)
// Muestra el HTML del tablero.

function pintarTablero(array $tablero) {
    $tabla = "<table>";
    for ($i=0; $i < count($tablero); $i++) { 
        $tabla .= "<tr>";
        for ($j=0; $j < count($tablero[$i]); $j++) { 
            $tabla .= "<td>" . $tablero[$i][$j] . "</td>";
        }
        $tabla .= "</tr>";
    }
    
    $tabla .= "</table>";
    
    echo $tabla;
}

// (0.5) colocaPalabraHorizontal($tablero, $palabra);
// Coloca la palabra dentro del tablero en una posición aleatoria de forma horizontal
// NOTA: Posición aleatoria, debe tener en cuenta si se sale del tablero

function colocaPalabraHorizontal(&$tablero, $palabra) {
    palabraHorizontal($tablero, $palabra, NORMAL);
}

// (0.5) colocaPalabraVertical($tablero, $palabra);
// NOTA: Posición aleatoria, debe tener en cuenta si se sale del tablero

function colocaPalabraVertical(&$tablero, $palabra) {
    palabraVertical($tablero, $palabra, REVES);
}

// (0.25) colocaPalabraHorizontalAlreves($tablero, $palabra);

function colocaPalabraHorizontalAlreves(&$tablero, $palabra) {
    palabraHorizontal($tablero, $palabra, REVES);
}


// (0.25) colocaPalabraVerticalAlreves($tablero, $palabra);

function colocaPalabraVerticalAlreves(&$tablero, $palabra) {
    palabraVertical($tablero, $palabra, REVES);
}

// (0.25) colocaPalabra($tablero, $palabra);
// La colocará de una forma aleatoria (Sin diagonales)
function colocarPalabra(&$tablero, $palabra) {
    switch(random_int(0, 3)) {
        case 0: 
            colocaPalabraHorizontal($tablero, $palabra);
            break;

        case 1: 
            colocaPalabraVertical($tablero, $palabra);
            break;

        case 2: 
            colocaPalabraVerticalAlreves($tablero, $palabra);
            break;

        case 3: 
            colocaPalabraHorizontalAlreves($tablero, $palabra);
            break;
    }
}

function palabraHorizontal(array &$tablero, string $palabra, bool $direccion) {
    if (strlen($palabra) > WIDTH ) {
        echo "<h1>La palabra es demasiado larga</h1>";
        return;
    }

    $palabra = $direccion == NORMAL ? strtoupper($palabra) : strrev(strtoupper($palabra));

    $altura = random_int(0, WIDTH-1);
    $inicio = random_int(0, WIDTH-strlen($palabra));

    for ($i=0; $i < strlen($palabra); $i++) { 
        $tablero[$altura][$i+$inicio] = $palabra[$i];
    }
}

function palabraVertical(array &$tablero, string $palabra, bool $direccion) {
    if (strlen($palabra) > HEIGHT ) {
        echo "<h1>La palabra es demasiado larga</h1>";
        return;
    }

    $palabra = $direccion == NORMAL ? strtoupper($palabra) : strrev(strtoupper($palabra));

    $altura = random_int(0, HEIGHT-1);
    $inicio = random_int(0, HEIGHT-strlen($palabra));

    for ($i=0; $i < strlen($palabra); $i++) { 
        $tablero[$i+$inicio][$altura] = $palabra[$i];
    }
}

// Creacion
inicializaSopaLetras($tablero, HEIGHT, WIDTH);
colocarPalabra($tablero, "AAAAAAAAAZ");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Sopa de letras</title>
</head>
<body>
    <main>
        <?php pintarTablero($tablero); ?>
    </main>
</body>
</html>