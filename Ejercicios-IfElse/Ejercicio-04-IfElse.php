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
         Ejercicio-04-IfElse
         Autor: Juan Carlos Romero Martos
         Fecha: 2023-5-15
         Enunciado: Pedir dos números y decir si son múltiplos o no
    -->
    <?php
    echo "Pedir dos números y decir si son múltiplos o no: <br>";
    echo "<br>";

    $num = 4;
    $num2 = 8;

    if ($num2 % $num == 0) {
        echo "-Los números son múltiplos. <br>";
    } else if ($num2 % $num != 0) {
        echo "-Los números no son múltiplos. <br>";
    }
    echo "<br>";

    $num = 3;
    $num2 = 7;

    if ($num2 % $num == 0) {
        echo "-Los números son múltiplos. <br>";
    } else if ($num2 % $num != 0) {
        echo "-Los números no son múltiplos. <br>";
    }

    ?>

</body>

</html>