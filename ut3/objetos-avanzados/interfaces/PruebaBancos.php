<?php

include("PlataformaPago.php");
include("BancoMalvado.php");
include("BitCoinConan.php");
include("BancoMaloMalisimo.php");

function dameMetodoPago(): PlataformaPago {
    $retorno = null;
    switch(mt_rand(0, 2)) {
        case 0:
            $retorno = new BancoMaloMalisimo ();
            break;

        case 1:
            $retorno = new BancoMalvado ();
            break;
        case 2:
            $retorno = new BitCoinConan ();
            break;
    }

    return $retorno;

}

function realizarTransaccion() {
    $plataforma = dameMetodoPago();

    $plataforma->estableceConexión();
    $plataforma->compruebaSeguridad();
    $plataforma->pagar("001", 10000);
    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba cuentas</title>
</head>
<body>
    <h1>Transacciones</h1>
    <?php for ($i=0; $i < 10; $i++) { ?>
        <hr>
        <section>
            <?php realizarTransaccion() ?>
        </section>
    <?php } ?>
</body>
</html>