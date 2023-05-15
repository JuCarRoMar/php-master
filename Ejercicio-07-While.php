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
         Ejercicio-
         Autor: Juan Carlos Romero Martos
         Fecha: 2023-05-15
         Enunciado: Mostrar divisores de un numero
    -->
    <?php
    echo "Mostrar divisores de un numero: <br>";
    echo "<br>";

    $num = 12;
    $divisor = 1;
    while ($divisor <= $num) {
        if ($num % $divisor == 0) {
            echo "$divisor <br>";
        }
        $divisor++;
    }

    ?>

</body>

</html>