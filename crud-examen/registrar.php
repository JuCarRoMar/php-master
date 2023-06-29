<?php
// Gestionar errores
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/**
 * Nombre: registrar.php
 * Autor: Iván Rodríguez
 * Fecha: 2023-06-28-16:30
 * Info: Ejercicio5 - Examen CRUD
 */
?>

<?php
// Zona de Funciones y Clases
function conectar($servidor, $usuario, $clave, $bbdd)
{
    // Creamos la conexión
    $conexion = mysqli_connect($servidor, $usuario, $clave, $bbdd);
    // Si Conexión-> TRUE, todo correcto!
    // Si Conexión-> FALSE, error!
    if (!$conexion) {
        // Mostrar mensaje de error
        echo "Error mysqli_connect_errno(): mysqli_connect_error() <br />";
    }
    return $conexion;
}

function desconectar($conexion)
{
    if ($conexion) {
        // Cerramos la conexión
        mysqli_close($conexion);
    }
}

// Probamos la conexión
$conexion = conectar("localhost", "root", "root", "islantilla");
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
        h1 {
            padding: 10px;
        }

        h1,
        h2,
        p {
            margin: 10px;
        }
    </style>
</head>

<body class="bg-dark">


    <?php
    /* Logica de la página o Hilo Principal*/
    // Controles adiciones:
    // Mirar que la fecha salida sea mayor que la entrada
    // Mirar que NINGUNA de las 2 fechas sea menor que la actual

    date_default_timezone_set('UTC');
    $hoy = date("Y-m-d");

    if (isset($_REQUEST['enviar'])) {
        $cliente = $_REQUEST['cliente'];
        $entrada = $_REQUEST['entrada'];
        $salida = $_REQUEST['salida'];
        $hab = $_REQUEST['hab'];
        $pagado = $_REQUEST['pagado'];
        $importe = $_REQUEST['importe'];

        $mensaje = "";
        if ($entrada > $salida) {
            $mensaje = "Error en datos Entrada/salida";
        } else if ($entrada < $hoy || $salida < $hoy) {
            $mensaje = " Fecha no válida (inferior a HOY)";
        } else {
            $sql = "INSERT INTO reservas 
            (cliente, entrada, salida, hab, pagado, importe)
            VALUES (?,?,?,?,?,?)";
            $snpr = mysqli_prepare($conexion, $sql);
            $snenc = mysqli_stmt_bind_param(
                $snpr,
                "sssiid",
                $cliente,
                $entrada,
                $salida,
                $hab,
                $pagado,
                $importe
            );
            $insercion = mysqli_stmt_execute($snpr);
            $numFilas = mysqli_stmt_affected_rows($snpr);


            if ($insercion) {
                $mensaje = "Reserva agregada";
            }
        }
    }
    ?>

    <!-- plantilla.php con BootStrap 5.3-->
    <h1 class="bg-light rounded-pill">Plantilla</h1>

    <main class="container">
        <section class="row">
            <h2 class="col-6 bg-info rounded-pill text-white">Alerta</h2>
            <p class="col-9 alert alert-info">
                <?php
                if (isset($_REQUEST['enviar'])) {
                    echo $mensaje;
                }
                ?>
            </p>
        </section>
        <br><br>

        <section class="row">
            <h2 class="col-6 bg-info rounded-pill text-white">Formulario</h2>
            <hr>
            <form class="col-9 bg-light p-3 rounded alert alert-info" 
            method="post" action="#">
                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" name="cliente" id="cliente" class="form-control">
                <hr>
                <label for="entrada" class="form-label">Entrada</label>
                <input type="date" name="entrada" id="entrada" class="form-control">
                <label for="salida" class="form-label">Salida</label>
                <input type="date" name="salida" id="salida" class="form-control">
                <hr>
                <label for="hab" class="form-label">Habitación</label>
                <input type="number" name="hab" id="hab" class="form-control">
                <hr>
                <input type="hidden" name="pagado" value="0">
                <section class="form-check form-switch">
                    <label for="caspagadosette" class="form-check-label">Pagado</label>
                    <input type="checkbox" value="1" name="pagado" role="switch" id="pagado" class="form-check-input">
                </section>
                <hr>
                <label for="importe" class="form-label">Importe</label>
                <input type="number" step="0.1" name="importe" id="importe" class="form-control">
                <hr>
                <input type="submit" value="Enviar Formulario" name="enviar" class="btn btn-primary">
            </form>
        </section>
        <hr>
        <nav>
            <p><a href="menu.php" class="btn btn-success mt-4">Ir a Menú</a></p>
            <p><a href="reservas.php" class="btn btn-success mt-4">Ir a Reservas</a></p>
        </nav>
    </main>

</body>

</html>

<?php
// Al terminar la página, quitamos la conexión
desconectar($conexion);
?>