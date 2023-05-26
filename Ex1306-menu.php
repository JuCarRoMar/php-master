<?php
// Gestionar errores
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>

<?php
/*
        Ejercicio: Ex1306-menu.php
         Autor: Juan Carlos Romero Martos
         Fecha: 2023-05-26 
         
         1. Entrada (form): n (num)
         2. Controlar que n>1000 y n<1000
         3. Si no, "Num incorrecto"
         4. Correcto: Usar mgd(num) -> return valor

         Van en la funcion:
         5. Obtener divisores del número
            Ej: 6 -> 1, 2, 3, 6 (4 divisores)
        6. Multiplicar los divisores
            Ej: 1x2x3x6 = 36
        7. Dividirlo entre el número de divisores
            Ej: 36/4 divisores = 9 <- La media geométrica de los divisores
        8. Devolver mgd y presentarlo en la alerta
            OJO no confundir Media Geometrica de Divisores con media Aritmetica de divisores
            Ej anterior: 1+2+3+6 = 12 / 4 divisores = 3
 */

?>

<?php
// Zona de funciones
function mgd($num): float
{
    $producto = 1;
    $numDivisores = 0;
    for ($i=1; $i <= $num ; $i++) { 
        $resto = $num % $i;
        if ($resto == 0) {
            //echo $i . "<br>";
            // $producto += $i;  Aritmetica
            $producto *= $i;
            $numDivisores++;
            
        }
    }
    return $producto / $numDivisores;
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.bundle.min.js"></script>
    <style>
        h1,
        h2,
        p {
            margin-top: 10px;
            margin-left: 10px;
        }

        h1 {
            color: white;
        }
    </style>

</head>
<?php
// Crear funciones
?>

<body class="bg-dark">
    <?php
    /* Lógica de la página */
    // Llamar funciones
    if (isset($_REQUEST['enviar'])) {
        $num = $_REQUEST['num'];    // Linea 37 y linea 49, no tienen porque llamarse igual que el label
    }
    ?>

    <!-- plantilla.php Con Bootstrap 5.3 -->
    <h1>Plantilla</h1>
    <main class="container">
        <section class="row">
            <h2 class="col-4 bg-warning rounded-pill text-white">Alerta</h2>
            <p class="col-9 alert alert-warning">
                <?php
                // Mostrar funciones
                if (isset($_REQUEST['enviar'])) {
                    if ($num<1000 || $num>10000) {
                        echo "El número es incorrecto";
                    } else {
                        echo "Media Geométrica divisores: " . mgd($num);
                    }
                }
                ?>
            </p>
        </section>
        <section class="row">
            <h2 class="col-6 bg-info rounded-pill text-white">Formulario</h2>
            <hr>
            <form class="col-9 bg-light p-3 rounded" method="post" action="#">
                <label for="num" class="form-label">Número</label>
                <input type="number" class="form-control" id="num" name="num" class="form-control">
                <hr>
                <input type="submit" value="enviar" name="enviar" class="btn btn-primary">
            </form>
        </section>
        <hr>
        
        <nav>
            <p><a href="Ex1306-media-gdiv.php" class="btn btn-success">Ir a MediaGDivisores</a></p>
            <p><a href="Ex1306-camion.php" class="btn btn-success">Ir a Camión</a></p>
            <p><a href="Ex1306-mis-primos.php" class="btn btn-success">Ir a MisPrimos</a></p>
            <p><a href="Ex1306-tussam.php" class="btn btn-success">Ir a Tussam</a></p>

        </nav>


    </main>

</body>

</html>