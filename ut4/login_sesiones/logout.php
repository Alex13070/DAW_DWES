<?php

namespace ut4\login_sesiones;

session_start();
unset($_SESSION["user"]);
header("Location: login.php");
?>

