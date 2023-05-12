<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Ejercicios-If...Else -->
    <?php
    // Pedir Nº y decir si es negativo, positivo o cero

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
    echo "<br>";

    // Pedir una calificación de 0 a 10 y mostrar

    echo "Pedir una calificación de 0 a 10 y mostrar: <br>";
    echo "<br>";

    $num = 3;
    if ($num >= 0 && $num < 5) {
        echo "$num Insuficiente <br>";
    } else if ($num >= 5 && $num < 6) {
        echo "$num Suficiente <br>";
    } else if ($num >= 6 && $num < 7){
        echo "$num Bien <br>";
    } else if ($num >= 7 && $num < 9) {
        echo "$num Notable <br>";
    } else if ($num >= 9 && $num <= 10) {
        echo "$num Excelente <br>";
    }
    echo "<br>";

    $num = 5;
    if ($num >= 0 && $num < 5) {
        echo "$num Insuficiente <br>";
    } else if ($num >= 5 && $num < 6) {
        echo "$num Suficiente <br>";
    } else if ($num >= 6 && $num < 7){
        echo "$num Bien <br>";
    } else if ($num >= 7 && $num < 9) {
        echo "$num Notable <br>";
    } else if ($num >= 9 && $num <= 10) {
        echo "$num Excelente <br>";
    }
    echo "<br>";

    $num = 6;
    if ($num >= 0 && $num < 5) {
        echo "$num Insuficiente <br>";
    } else if ($num >= 5 && $num < 6) {
        echo "$num Suficiente <br>";
    } else if ($num >= 6 && $num < 7){
        echo "$num Bien <br>";
    } else if ($num >= 7 && $num < 9) {
        echo "$num Notable <br>";
    } else if ($num >= 9 && $num <= 10) {
        echo "$num Excelente <br>";
    }
    echo "<br>";

    $num = 8;
    if ($num >= 0 && $num < 5) {
        echo "$num Insuficiente <br>";
    } else if ($num >= 5 && $num < 6) {
        echo "$num Suficiente <br>";
    } else if ($num >= 6 && $num < 7){
        echo "$num Bien <br>";
    } else if ($num >= 7 && $num < 9) {
        echo "$num Notable <br>";
    } else if ($num >= 9 && $num <= 10) {
        echo "$num Excelente <br>";
    }
    echo "<br>";

    $num = 9;
    if ($num >= 0 && $num < 5) {
        echo "$num Insuficiente <br>";
    } else if ($num >= 5 && $num < 6) {
        echo "$num Suficiente <br>";
    } else if ($num >= 6 && $num < 7){
        echo "$num Bien <br>";
    } else if ($num >= 7 && $num < 9) {
        echo "$num Notable <br>";
    } else if ($num >= 9 && $num <= 10) {
        echo "$num Excelente <br>";
    }
    echo "<br>";

    // Sumas y restas

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
    echo "<br>";

    // Pedir dos números y decir si son múltiplos o no

    echo "Pedir dos números y decir si son múltiplos o no: <br>"
    


    ?>

</body>

</html>