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
         Ejercicio-01-IfElse
         Autor: Juan Carlos Romero Martos
         Fecha: 2023-05-12
         Enunciado: Pedir Nº y decir si es negativo, positivo o cero
    -->
    <?php
    echo "Pedir Nº y decir si es negativo, positivo o cero: <br>";
    echo "<br>";

    $num = -2;
    if ($num < 0) {
        echo "$num es negativo <br>";
    } else if ($num > 0) {
        echo "$num es positivo <br>";
    } else {
        echo "$num es cero <br>";
    }
    echo "<br>";

    $num = 1;
    if ($num < 0) {
        echo "$num es negativo <br>";
    } else if ($num > 0) {
        echo "$num es positivo <br>";
    } else {
        echo "$num es cero <br>";
    }
    echo "<br>";

    $num = 0;
    if ($num < 0) {
        echo "$num es negativo <br>";
    } else if ($num > 0) {
        echo "$num es positivo <br>";
    } else {
        echo "$num es cero <br>";
    }

    ?>

</body>

</html>