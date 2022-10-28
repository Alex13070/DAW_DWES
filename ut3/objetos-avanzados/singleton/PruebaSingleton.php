<?php 

include("Config.php");

$config = Config::getSingletone();
$config2 = Config::getSingletone();

$config->setNombreApp("Amazon");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singleton</title>
</head>
<body>
    <?php 
        echo $config->getNombreApp()."<br>";
        echo $config2->getNombreApp()."<br>";

        $config->setNombreApp("Don camarón");

        echo $config->getNombreApp()."<br>";
        echo $config2->getNombreApp()."<br>";
    ?>
</body>
</html>