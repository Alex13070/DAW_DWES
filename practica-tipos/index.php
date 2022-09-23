<?php
    $existe = false;
    $valido = true;
    if (isset($_GET["texto"])) {
        $valor = $_GET["texto"];
        $existe = true;
    }

    function sacarVocales($valor) {
        $cadena = quitarEspacios($valor);
        
        $vowels = array("a", "e", "i", "o", "u");
        $cuantas = 0;
        for ($i=0; $i < strlen($cadena); $i++) { 
            if (in_array($cadena[$i], $vowels)) {
                $cuantas++;
            }
        }

        return $cuantas;
    }

    function sacarConsonantes($valor) {
        $cadena = quitarEspacios($valor);
        $vowels = array("a", "e", "i", "o", "u");
        $cuantas = 0;
        for ($i=0; $i < strlen($cadena); $i++) { 
            if (ctype_alpha($cadena[$i]) && !in_array($cadena[$i], $vowels)) {
                $cuantas++;
            }
        }

        return $cuantas;
    }

    function quitarEspacios($valor) {
        return strtolower(str_replace(' ', '', $valor));
    }


    function esPalindromo($valor) {
        $palindromo = true;

        $cadena = quitarEspacios($valor);
        for ($i=0; $i < strlen($cadena)/2 && $palindromo; $i++) { 
            if ($cadena[$i] != $cadena[strlen($cadena) - $i-1]) {
                $palindromo = false;
            }
        }

        return $palindromo;

    }

    if ($existe && quitarEspacios($valor) == "") {
        $valido = false;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>index</title>
    <style>
        html {
            height: 100%;
            width: 99%; 
        }
        body {
            background: #0d0d0d;
        }
        .cuerpo {
            margin-top: 5%;
        }
    </style>
</head>
<body>

    <div class="cuerpo">

        <div class="row p-4">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card p-3 text-right">
            
            
                    <form action="index.php" method="get">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Introduzca su texto</label>
                            <input  class="form-control" id="exampleInputEmail1" type="text" value="<?= ($existe)?$valor:''?>" name="texto">
                            <?php
                                if ($existe && !$valido) {
                            ?>

                            <div class="form-text text-danger">Debes de rellenar este campo de texto</div>
                                
                            <?php
                                }
                            ?>
                        </div>
                        
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <input type="submit" value="Enviar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>

        <?php
            if ($existe && $valido) {
                $valor = $_GET["texto"]; 
        ?>

            <div class="row p-3">
                <div class="col-md-3"></div>
                <div class="col-md-2">
                    <div class="card p-4     text-right">
                            <blockquote class="blockquote mb-0">
                                <p>
                                    Número de vocales: <?= (sacarVocales($valor))?>
                                </p>
                            </blockquote>
                        </div>
                    </div>
                <div class="col-md-2">
                    <div class="card p-4 text-right">
                        <blockquote class="blockquote mb-0">
                            <p>
                                Número de consonantes: <?= strval(sacarConsonantes($valor))?>
                            </p>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card p-4 text-right">
                        <blockquote class="blockquote mb-0">
                            <p>
                                Palíndromo: <?= (esPalindromo($valor)?"Sí":"No")?>
                            </p>
                        </blockquote>
                    </div>
                </div>

                <div class="col-md-3"></div>
            </div>
            
        
        <?php
            }
        ?>
    
    </div>

</body>
</html>