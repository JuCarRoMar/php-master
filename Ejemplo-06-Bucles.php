<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Ejemplo-06-Bucles -->
    <?php
    // Bucle Indefinido
    echo "Usamos While. <br>";
    $num = 0;
    while ($num < 5) {
        $num++;             // $num = $num + 1;
        echo "-$num <br>";
    }
    echo "<br>";

    $num = 5;
    while ($num >= 1) {
        echo "-$num <br>";
        $num--;             // $num = $num - 1;
    }
    echo "<br>";

    // Bucle definido
    // for (inicio, condicion, variacion)
    // inicio => $num = 5;
    // condicion  => $num >= 1
    // variacion => $num--;
    echo "Ahora vamos a usar for. <br>";
    for ($num = 5; $num >= 1; $num--) {
        echo "-$num <br>";
        }
        echo "<br>";

        // uso de continue y break (DESACONSEJADO)
        echo "Usando for voy a pintar 1, 2, 4, 5. <br>";
    for ($num = 1; $num <= 5; $num++) {
        if ($num == 3) {
            continue;
        }
        echo "-$num <br>";
        }
        echo "<br>";

        echo "Usando for voy a pintar 1, 2. <br>";
        for ($num = 1; $num <= 5; $num++) {
            if ($num == 3) {
                break;
            }
            echo "-$num <br>";
            }
            echo "<br>";

            echo "FIN";

    ?>

</body>

</html>