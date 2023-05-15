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
         Enunciado: Imprime la suma de todos los multiplos de 7 entre 1 y 100
    -->
    <?php
    echo "Imprime la suma de todos los multiplos de 7 entre 1 y 100: <br>";
    echo "<br>";

    $num = 1;
    $suma = 0;
    while ($num <= 100) {
        if ($num % 7 == 0) {
            echo "$num <br>";
            $suma = $suma + $num;
            }
            $num++;
    }
        echo "La suma es: " . $suma;
    
    ?>
    
</body>
</html>