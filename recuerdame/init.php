<?php

session_start();

const TOKEN_LENGTH     = 32;
const TOKEN_RECUERDAME = "token_recuerdame";
const EXPIRATION_DAYS = (7 * 24 * 60 * 60);
const ID_USUARIO = 'usuario';


function crearToken(string $usuario)
{
    $token = bin2hex(openssl_random_pseudo_bytes(TOKEN_LENGTH));

    $registrarToken = AccesoADatos::getSingletone()->registrarToken(
        usuario: $usuario,
        token: $token
    );

    if ($registrarToken) {
        setcookie(TOKEN_RECUERDAME, $token, time() + (EXPIRATION_DAYS));
        $_SESSION[ID_USUARIO] = $usuario;
        header("Location: index.php");
        die();
    }
}
