<?php

namespace ut4\login_sesiones;

require("autoload.php");

use ut4\login_sesiones\AccesoADatosBBDD;

function clean_input($data) : string {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function iniciarSesion(string $login, string $password, array $errorList) {

    $usuario = AccesoADatosBBDD::getSingletone()->findUsuarioByEmail($login);

    if (!empty($usuario)) {
        if (password_verify($password, $usuario["pass"])) {
            // generar token ??

            session_start();

            $_SESSION["user"] = $login;

            $url = "inicio.php";

            if (isset($_SESSION["from"])) {
                $url = $_SESSION["from"];
                unset($_SESSION["from"]);
            }
            
            header("Location: $url");
            exit;
        }
        else {
            $errorList[] = "La contraseña introducida no es correcta.";
        }
    }
    else {
        $errorList[] = "El usuario introducido no existe.";
    }
}

$login = "";
$pass = "";
$errorList = [];

if (isset($_POST["submit"])) {
    if (isset($_POST["login"])) {
        $login = clean_input($_POST["login"]);
    }

    if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $errorList[] = "Usuario inválido";
        //http://php.net/manual/es/filter.filters.php
    }


    if (isset($_POST["password"])) {
        $password = clean_input($_POST["password"]);
    }

    iniciarSesion($login, $password, $errorList);

}


if (isset($_GET["error"])) {
    $errorList[] = $_GET["error"];
}

?>
<html>

<head>
    <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>

<body>
    <form action="login.php" method="post" class="login">
        <p>
            <label for="login">Email:</label>
            <input type="text" name="login" id="login" value="<?= $login ?>">
        </p>

        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="">
        </p>

        <?php if (count($errorList) > 0) { ?>
            <p>
                <?php foreach ($errorList as $error) { ?>
            <div class="error"><?= $error ?></div>
        <?php } ?>
        </p>
    <?php } ?>

    <p class="login-submit">
        <label for="submit">&nbsp;</label>
        <button type="submit" name="submit" class="login-button">Login</button>
    </p>
    </form>

    <pre>
        <?php print_r($_SERVER); ?>
    </pre>

</body>

</html>


<!---
<script>alert(document.cookie);</script>
"<script>alert(document.cookie);</script>
"><script>alert(document.cookie);</script>
--->