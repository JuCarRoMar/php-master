<?php
// Gestionar errores
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/**
 * Nombre: Ex1306-Camion.php
 * Autor: Juan Carlos Romero Martos
 * Fecha: 2023-05-30/16:46
 * Info: Herencia
 * 
 * ANÁLISIS
 * ---------------------------
 * 1. Pedir entero entre >=10 y <=20
 * 2. verPrimos($num): array
 * 3. esPrimo($num): bool -> 1(primo), 0(no primo)
 * 4. verPrimos($num) devolver $num primos en Array
 * 5. Recorrer el array al revés y lo pinto bonito 
 * -> pintaPrimos($array)
 */
?>

<?php
// funcion verPrimos
function verPrimos($num)
{
    /*
    $primos[] = 5;
    $primos[] = 15;
    */
    $primos = [];
    $contador = 0;
    $valor = 1;
    while ($contador < $num) {
        if (esPrimo($valor)) {
            $primos[] = $valor;
            $contador++;
        }
        $valor++;
    }
    return $primos;
}
// funcion esPrimo
function esPrimo($num)
{
    $divisores = 0;
    for ($i = 1; $i <= $num; $i++) {
        if ($num % $i == 0) {
            $divisores++;
        }
    }
    if ($divisores <= 2) {
        return true;
    } else {
        return false;
    }
}

// Funcion pintarPrimos
function pintaPrimos($array): string
{
    $mensaje = "";
    for ($i= count($array) -1; $i >= 0; $i--) { 
    $mensaje .= $array[$i] . "<br>";
    }
    return $mensaje;
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
        $num = $_POST['num'];    // Linea 37 y linea 49, no tienen porque llamarse igual que el label
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
                    if ($num < 10 || $num > 20) {
                        echo "El número es incorrecto";
                    } else {
                        //echo $num;
                        //var_dump(verPrimos($num));
                        echo pintaPrimos(verPrimos($num));

                        /*
                        if (esPrimo($num)) {
                            echo " es primo";
                        } else {
                            echo " no es primo";
                        }
                        */
                    }
                }
                ?>
            </p>
        </section>

        <section class="row">
            <h2 class="col-6 bg-info rounded-pill text-white">Formulario</h2>
            <hr>
            <form class="col-9 bg-light p-3 rounded" method="post" action="#">
                <label for="num" class="form-label">Nº 10-20</label>
                <input type="number" class="form-control" id="num" name="num" class="form-control">
                <hr>
                <input type="submit" value="enviar" name="enviar" class="btn btn-primary">
            </form>
        </section>
        <hr>

        <nav>
            <p><a href="#" class="btn btn-success">Ir a página</a></p>

        </nav>

    </main>

</body>

</html>