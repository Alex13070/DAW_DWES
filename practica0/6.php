<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sexto</title>
</head>
<body>
    <?php 
        $var1 = 5;
        $var2 = 2;
    ?>
    <p>Suma <?= $var1 + $var2?></p>
    <p>Resta <?= $var1 - $var2?></p>
    <p>Multiplicación  <?= $var1 * $var2?></p>
    <p>División  <?= $var1 / $var2?></p>

    <p><?php print_r(get_defined_vars());?></p>

    <p><?= "var1 = ".$var1++."&nbsp;&nbsp;&nbsp;var2 = ".$var2--?></p>

    <p><?php print_r(get_defined_vars());?></p>
    
</body>
</html> 