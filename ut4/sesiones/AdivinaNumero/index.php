<?php
const MAX = 10;
const MIN = 0;
const MAXIMO_INTENTOS = 3;
session_start();


$pintarForm = true;
$response = "Se acabaron los intentos, has perdido";

if(!isset($_SESSION["intentos"])) {
    $_SESSION["intentos"] = MAXIMO_INTENTOS;
    $_SESSION["numero"] = random_int(MIN, MAX);
    $_SESSION["victoria"] = false;
    $response = "Adivina el número aleatorio entre " . MIN . "  y " . MAX . ".";
} else if ($_SESSION["victoria"]){

    $pintarForm = false;
    $response = "¡Has encontrado el número!";
    
} else if ($_SESSION["intentos"] > 0) {
        
    if (isset($_POST["enviar"])) {

        $numero = $_POST["numero"];

        if ($numero == $_SESSION["numero"]){
            $response = "¡Has encontrado el número!";
            $_SESSION["victoria"] = true;
            $pintarForm = false;
        }
        else if ($numero > $_SESSION["numero"]) {
            $response = "El número introducido es mayor al que hay que adivinar.";
        }
        else {
            $response = "El número introducido es menor al que hay que adivinar.";
        }

        $_SESSION["intentos"] = $_SESSION["intentos"]-1;
        if ($_SESSION["intentos"] == 0) {
            if ($_SESSION["victoria"]) {
                $response = "¡Has encontrado el número!";
            }
            else {
                $response = "¡Has perdido!";
            }
            $pintarForm = false;
        }
    }
    else {
        $response = "Adivina el número aleatorio entre " . MIN . "  y " . MAX . ".";
    }
}
else {
    $pintarForm = false;
    $response = "Has perdido.";
}

function pintarForm($pintarForm) { 
    if ($pintarForm) {?>

    <form action="index.php" method="post">
        <section>
            <label for="numero">Introduce un número entre <?= MIN ?> y <?=MAX?>: </label>
            <input type="number" name="numero" id="numero" min="<?= MIN ?>" max="<?= MAX ?>">
        </section>

        <section>
            <input type="submit" value="Enviar" name="enviar">
        </section>
    </form>

<?php }
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros aleatorios</title>
    <style>
        main, section{
            padding: 10px;
        }
    </style>
</head>
<body>
    <main>
        <section>
            <?= $response; ?>
        </section>
        
        </section>
        <section>
            <?= isset($_SESSION["intentos"]) ? "Te faltan " . $_SESSION["intentos"] : "";?>
        </section>

        <section>
            <?php pintarForm($pintarForm) ?>
        </section>
    </main>
    
</body>
</html>




