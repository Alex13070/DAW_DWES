<?php 

const NOMBRE_COOKIE = "Verificado";

if (!isset($_COOKIE[NOMBRE_COOKIE])) {
    header("Location: http://localhost:8000/ut4/Cookies/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurado</title>
</head>
<body>
    
    <h1>Hola</h1>
</body>
</html>