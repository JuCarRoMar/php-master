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
         Enunciado: Agrupar los 4 primeros ejercicios IF...ELSE en un menú
    -->
    <?php
    // Zona Funciones

    echo "Agrupar los 4 primeros ejercicios IF...ELSE en un menú: <br>";
    echo "<br>";


    function trabajo()
    {
        $edad = 7;
        if ($edad >= 18 && $edad <= 67) {
            echo "-Eres mayor de edad <br>";
            echo "-Puedes trabajar";
        } else if ($edad < 18) {
            echo "-Eres menor de edad <br>";
            echo "-No puedes trabajar";
        } else if ($edad > 67) {
            echo "-Eres muy mayor <br>";
            echo "-Puedes jubilarte";
        }
    }

    function numeros($num1)
    {
        if ($num1 < 0) {
            echo "$num1 es negativo <br>";
        } else if ($num1 > 0) {
            echo "$num1 es positivo <br>";
        } else {
            echo "$num1 es cero <br>";
        }
        echo "<br>";
    }

    function calificaciones()
    {
        $num = 3;
        $mensaje = "";
        if ($num >= 0 && $num < 5) {
            $mensaje = "$num Insuficiente <br>";
        } else if ($num >= 5 && $num < 6) {
            $mensaje = "$num Suficiente <br>";
        } else if ($num >= 6 && $num < 7) {
            $mensaje = "$num Bien <br>";
        } else if ($num >= 7 && $num < 9) {
            $mensaje = "$num Notable <br>";
        } else if ($num >= 9 && $num <= 10) {
            $mensaje = "$num Excelente <br>";
        }
        return $mensaje . "<br>";
    }

    function calculadora($operacion, $num, $num2, $calculo)
    {
        switch ($operacion) {
            case 1:
                $calculo = "<br>" . ($num) + ($num2);
                break;

            case 2:
                $calculo = "<br>" . ($num) - ($num2);
                break;
        }
        return $calculo . "<br>";
    }


    ?>

    <?php
    // Zona Menu
    $menu = 4;
    switch ($menu) {
        case 1:
            trabajo();
            break;

        case 2:
            $num1 = -2;
            numeros($num1);
            break;

        case 3:
            echo calificaciones();
            break;

        case 4: // Hay que arreglarlo
            $operacion = 2;
            $num = 15;
            $num2 = 7;
            $calculo = "";
            calculadora($operacion, $num, $num2, $calculo);
            break;

        case 5:
            echo "Fin";
            break;
    }

    ?>

</body>

</html>