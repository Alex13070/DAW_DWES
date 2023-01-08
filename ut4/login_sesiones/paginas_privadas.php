<?php

session_start();

$error = "Para entrar en la página requerida debes iniciar sesión.";

if (!isset($_SESSION["user"]) || $_SESSION["user"] == "") {
    $_SESSION["from"] = $_SERVER["REQUEST_URI"];
    header("Location: login.php?error=$error");
    exit;
} 

?>