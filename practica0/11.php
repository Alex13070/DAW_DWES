<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undécimo</title>
</head>
<body>
    <?php 
        $n = 25; 
        $mostrar = "";
        for ($i=1; $i <= $n; $i++) { 
            $lado = "";
            for ($j=0; $j < $i; $j++) { 
                $lado = $lado."*";
            }

            $mostrar .= "<p>".$lado."</p>";
        }    

        echo $mostrar;
    ?>
</body>
</html>