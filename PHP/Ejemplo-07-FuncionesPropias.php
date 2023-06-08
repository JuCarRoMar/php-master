<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Ejemplo-01-FuncionesPropias -->
    <?php
    // ZONA DE FUNCIONES
    /* Tipos de funciones
    a) Sin entrada y sin salida
    b) Con entrada y sin salida
    c) Sin entrada y con salida
    d) Con entrada y con salida

    Tipos de 
    - Num (int), (float)
    - Sin salida (void)
    - Booleanos (bool)
    - Cadena de caracteres (string)
    - Especiales (array), (object)
    */

    # Funcion suma Sin Entrada y Sin salida
    function suma(): void
    {
        $num1 = 10;
        $num2 = 20;
        $rdo = $num1 + $num2;
        echo "La suma es: $rdo <br>";
        //echo "La suma es : " . ($num1 + $num2);
    }

    # Funcion resta Con entrada y Sin salida
    function resta($num1, $num2): void
    {
        $rdo = $num1 - $num2;
        echo "La resta es: $rdo <br>";
    }

    # Funcion producto Sin entrada con salida
    function producto(): string
    {
        $num1 = 4;
        $num2 = 6;
        $rdo = $num1 * $num2;
        return "El producto es: $rdo <br>";
    }

    # Funcion division Con entrada y Con salida
    function division($num1, $num2): string
    {
        $rdo = $num1 / $num2;
        return "La division es: $rdo <br>";
    }

    # Funcion Operaciones Sin Entrada y Con Salida
    function operaciones(): array
    {
        return ["Suma", "resta", "Producto", "Division"];
    }
    ?>

    <?php
    // SCRIPT PRINCIPAL
    suma();

    // Tiene en cuenta la posicion
    $n1 = 24;
    $n2 = 16;
    resta($n1, $n2);

    // NO tiene en cuenta la posicion del parametro
    $num1 = 12;
    $num2 = 8;
    resta($num2, $num1);

    // Funcion producto
    echo producto();

    // Funcion division
    echo division($n1, $n2);

    // Usamos la funcion que devuelve un array
    $operaciones = operaciones();
    foreach ($operaciones as $valor) {
        echo $valor . "<br>";
    }


    ?>

</body>

</html>