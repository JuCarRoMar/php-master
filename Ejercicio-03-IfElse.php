<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
         Ejercicio-03-IfElse
         Autor: Juan Carlos Romero Martos
         Fecha: 2023-05-12
         Enunciado: Operaciones
    -->
    <?php
    echo "Operaciones: <br>";

    $operacion = 2;
    $num = 15;
    switch ($operacion) {
        case 1:
            echo "<br>" . ($num) + ($num);
            break;

        case 2:
            echo "<br>" . ($num) - ($num);
            break;
    }
    echo "<br>";

    $operacion = 1;
    $num = 15;
    switch ($operacion) {
        case 1:
            echo "<br>" . ($num) + ($num);
            break;

        case 2:
            echo "<br>" . ($num) - ($num);
            break;
    }
    
    ?>
    
</body>
</html>