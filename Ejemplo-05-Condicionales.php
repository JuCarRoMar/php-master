<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Ejemplo-05-Condicionales -->
    <?php
    $x = 20;
    $y = 20;
    if ($x > $y) {
        echo "El mayor es $x <br>";
    } else if ($x == $y) {
        echo "Son iguales <br>";
    } else {
        echo "El mayor es $y <br>";
    }

    echo "<br> Edades para trabajar : <br><br>";
    /*
    $edad = 24;
    if ($edad >= 18) {
        echo "-Eres mayor de edad. <br>";
        if ($edad <= 67) {
            echo "-Puedes trabajar. <br><br>";
        } else {
            echo "-Puedes trabajar. <br><br>";
        }
    } else {
        echo "-Eres menor de edad. <br>";
    }
    */

    $edad = 7;
    if ($edad >= 18 && $edad <= 67) {
        echo "-Eres mayor de edad. <br>";
        echo "-Puedes trabajar. <br>";
    }
    if ($edad >= 18 && $edad > 67) {
        echo "-Eres mayor de edad. <br>";
        echo "-Puedes jubilarte. <br>";
    }
    if ($edad < 18) {
        echo "-Eres menor de edad. <br>";
    }

    
    $cursoElegido = 1;

    // Mayor rendimiento
    switch ($cursoElegido) {
        case 1:
            echo "HTML5";
            break;

        case 2:
            echo "CSS3";
            break;

        case 3:
            echo "JS";
            break;
    }

    /* Menor rendimiento
    if ($cursoElegido == 1) {
        echo "HTML5";
    }
    if ($cursoElegido == 2) {
        echo "CSS3";
    }
    if ($cursoElegido == 3) {
        echo "JS";
    }
    */
    ?>

</body>

</html>