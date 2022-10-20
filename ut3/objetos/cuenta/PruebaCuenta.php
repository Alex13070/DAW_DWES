<?php

require('CuentaBancaria.php');

function retrirarMilloneti (CuentaBancaria $cuenta) {

    try {
        for ($i=0; $i < 100; $i++) { 
            $cuenta->retirar(1_000);
        }
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }

    
}

function ingresarAgapito(CuentaBancaria $cuenta) {
    try {
        $cuenta->ingresar(1200);
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
}

function mostrarSaldo(CuentaBancaria $milloneti, CuentaBancaria $agapito, CuentaBancaria $pobreton) {
    echo "
        <div class='cuenta'>
            <span class='campo_cuenta'>".$milloneti->saldo()."</span>
            <span class='campo_cuenta'>".$agapito->saldo()."</span>
            <span class='campo_cuenta'>".$pobreton->saldo()."</span>
        </div>
    ";
}

function pobretonLadron(CuentaBancaria $milloneti, CuentaBancaria $pobreton) {
    $pobreton->unirCon($milloneti);
}

function agapitoGoodGuy(CuentaBancaria $milloneti, CuentaBancaria $agapito) {
    $agapito->transferirA($milloneti, $agapito->saldo()/2);
}





$milloneti = new CuentaBancaria('Milloneti', 1_000_000);
$agapito = new CuentaBancaria('Agapito', 30_345);
$pobreton = new CuentaBancaria('Pobretón', -10_000);
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Cuenta bancaria</title>
    <link rel="stylesheet" href="cuenta.css" type="text/css">
</head>
<body>

    <main>
        <h1>Cuentas bancarias</h1>
        <section>
            <h2>Datos iniciales</h2>
            <?= $milloneti -> mostrar() ?> 
            <?= $agapito -> mostrar() ?>     
            <?= $pobreton -> mostrar() ?> 
        </section>

        <section>
            <h2>Retiramos a Milloneti 1000 euros 100 veces</h2>
            <?php retrirarMilloneti($milloneti) ?>
            <?= $milloneti->mostrar() ?>
        </section>

        <section>
            <h2>Agapito tiene un ingreso de 1200 euros</h2>
            <?php ingresarAgapito($agapito) ?>
            <?= $agapito -> mostrar() ?>     
        </section>

        <section>
            <h2>Saldo de todos</h2>
            <?= mostrarSaldo($milloneti, $agapito, $pobreton) ?>    
        </section>
        
        <section>
            <h2>Pobreton hackea el banco y le roba a milloneti</h2>
            <?= pobretonLadron($milloneti, $pobreton) ?>    
            <?= $milloneti -> mostrar() ?> 
            <?= $agapito -> mostrar() ?>     
            <?= $pobreton -> mostrar() ?> 
        </section>

        <section>
            <h2>Agapito le da la mitad de su dinero a milloneti porque es buena gente</h2>
            <?= agapitoGoodGuy($milloneti, $agapito) ?>    
            <?= $milloneti -> mostrar() ?> 
            <?= $agapito -> mostrar() ?>     
            <?= $pobreton -> mostrar() ?> 
        </section>

        <section>
            <h2>Datos finales</h2>
            <?= $milloneti -> mostrar() ?> 
            <?= $agapito -> mostrar() ?>     
            <?= $pobreton -> mostrar() ?> 
        </section>

    </main>
    
</body>
</html>