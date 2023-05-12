<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Ejemplo-03-Tablas -->
    <?php
    /* Tablas unidimensionales MIXTAS */
    $num[0] = "cero";
    $num[1] = "uno";
    print_r($num);

    $num[0] = 0;
    $num[1] = 1;
    echo "<br><br> Tabla modificada" . "<br>";
    print_r($num);

    /* Tablas bidimensionales */
    $ciudades_esp[] = ["Madrid", "Valencia", "Sevilla"];
    $ciudades_fra[] = ["Paris", "Nantes", "Lyon"];

    $ciudades["esp"] = $ciudades_esp;
    $ciudades["fra"] = $ciudades_fra;
    echo "<br><br> Tabla Bidimensional Ciudades <br>";
    print_r($ciudades);

    echo "<br><br> Imprimo Ciudades Españolas <br>";
    print_r($ciudades["esp"]);

    echo "<br><br> Imprimo Ciudades Francesas <br>";
    print_r($ciudades["fra"]);

    /* Tabla Bidimensional Asociativa */
    $equipos_futbol = array(
        "ESP" => array("Betis", "Sevilla", "Valencia"),
        "ITA" => array("Milan", "Juventus", "Napoli")
    );
    echo "<br><br> Imrpimo Array Bidimensional Asociativo <br>";
    print_r($equipos_futbol);

    echo "<br><br> Imprimo Equipos Italianos <br>";
    print_r($equipos_futbol["ITA"]);

    echo "<br><br> Imprimo Equipos Españoles <br>";
    print_r($equipos_futbol["ESP"]);

    /* Tablas Bidimensionales Asociativas BBDD */
    $alumnos = array(
        "Maria" => array(
            "edad" => 33,
            "lugarNac" => "Sevilla",
            "sexo" => true
        ),
        "Raul" => array(
            "edad" => 36,
            "lugarNac" => "Sevilla",
            "sexo" => false
        )
    );
    echo "<br><br> Imrpimo Alumnos <br>";
    print_r($alumnos);

    echo "<br><br> Imprimo María <br>";
    print_r($alumnos["Maria"]);

    echo "<br><br> Imprimo Raúl <br>";
    print_r($alumnos["Raul"]);

    echo "<br><br> Imprimo Edad de María <br>";
    print_r($alumnos["Maria"]["edad"]);

    echo "<br><br> Modifico Edad de María <br>";
    $alumnos["Maria"]["edad"] = 23;
    print_r($alumnos["Maria"]["edad"]);

    echo "<br><br> Modifico a Raúl <br>";
    $alumnos["Raul"] = [
        "edad" => 26,
        "lugarNac" => "Murcia",
        "sexo" => false
    ];
    print_r($alumnos["Raul"]);

    echo "<br><br> Ver datos Alumnos <br>";
    foreach ($alumnos as $nombre => $fila) {
        echo "Datos {$nombre}: <br>";
        foreach ($fila as $campo => $dato) {
            if ($dato === true)
                $dato = "Mujer";
            if ($dato === false)
                $dato = "Hombre";
            echo "{$campo}: {$dato} <br>";
        }
    }
    ?>

</body>

</html>