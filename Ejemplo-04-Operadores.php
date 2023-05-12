<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Ejemplo-04-Operadores -->
    <?php
    $x = 1;
    echo "<br> x = {$x}";
    $y = $z = 0;
    $y = 2;
    $z = $x + $y;
    echo "<br> z = {$z}";

    $z = $y ** $z;
    echo "<br> z = {$z}";
    $z = $z % $y;
    echo "<br> z = {$z}";
    $z++;
    echo "<br> z = {$z}";

    $y *= 5;
    echo "<br> y = {$y}";

    $x = 5;
    $x **= $x;
    echo "<br> x = {$x}";

    $x = true;
    $y = "true";
    echo "<br>" . (($x == $y)  ? 'true' : 'false');
    echo "<br>" . (($x === $y)  ? 'true' : 'false');
    ?>
    
</body>
</html>