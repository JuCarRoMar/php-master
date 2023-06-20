<?php
// Gestionar errores
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/**
 * Nombre: 
 * Autor: Juan Carlos Romero Martos
 * Fecha: 
 * Info: 
 */
?>

<?php
// Crear funciones
function conectar($servidor, $usuario, $clave, $bbdd)
{
    // Creamos la conexión
    $conexion = mysqli_connect($servidor, $usuario, $clave, $bbdd);
    // Si conexión-> TRUE, todo correcto!
    // Si conexión-> FALSE, error!
    if (!$conexion) {
        // Mostrar mensaje de error
        echo "Error mysqli_connect_errorno(): mysqli_connect_error() . <br>";
    }
    return $conexion;
}

function desonectar($conexion)
{
    // Cerramos la conexión
    mysqli_close($conexion);
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
function cargarReservas($conexion)
{
    $sql = "   SELECT * FROM reservas";
    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);
    $tablaReservas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $tablaReservas;
}
?>

<body class="bg-dark">
    <?php
    /* Lógica de la página */
    if (isset($_REQUEST['registrar'])) {
        $cliente = $_REQUEST['cliente'];
        $entrada = $_REQUEST['entrada'];
        $salida = $_REQUEST['salida'];
        $habitacion = $_REQUEST['hab'];
        $pagado = $_REQUEST['pagado'];
        $importe = $_REQUEST['importe'];
        $id = $_REQUEST['id'];

        $sql = "UPDATE reservas 
        SET
        cliente = ?, 
        entrada = ?, 
        salida = ?, 
        hab = ?, 
        pagado = ?, 
        importe = ?
        WHERE id = ?";
        $sentenciaPreparada = mysqli_prepare($conexion, $sql);
        $sentenciaEncriptada = mysqli_stmt_bind_param(
            $sentenciaPreparada,
            "sssiiii",
            $cliente,
            $entrada,
            $salida,
            $habitacion,
            $pagado,
            $importe,
            $id
        );
        $ejecucionReservas = mysqli_stmt_execute($sentenciaPreparada);
        $numFilasUpdate = mysqli_stmt_affected_rows($sentenciaPreparada);
    }

    $tablaReservas = cargarReservas($conexion);   
    ?>

    <!-- plantilla.php Con Bootstrap 5.3 -->
    <h1 class="bg-info rounded-pill">Plantilla</h1>
    <main class="container">
        <section class="row">
            <h2 class="col-4 bg-warning rounded-pill text-white">Alerta</h2>
            <p class="col-9 alert alert-warning">
                <?php
                if (isset($ejecucionReservas) && $ejecucionReservas) {
                    echo "Num Filas Actualizadas: $numFilasUpdate <br>";
                    echo "Nombre del cliente: $cliente <br>";
                    echo "Día de llegada: $entrada <br>";
                    echo "Día de salida: $salida <br>";
                    echo "Nº de Habitación: $habitacion <br>";
                    echo "Pagado por adelantado: $pagado <br>";
                    echo "Dinero a pagar: " . $importe;
                }
                ?>
            </p>
        </section>
        <br><br>

        <section class="row">
            <h2 class="col-4 bg-warning rounded-pill text-white">Reservas</h2>
            <section class="bg-white rounded">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Habitación</th>
                            <th>Pagado</th>
                            <th>Importe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tablaReservas as $fila) {
                            echo "<tr>";
                            echo "<td>" . $fila['cliente'] . "</td>";
                            echo "<td>" . $fila['entrada'] . "</td>";
                            echo "<td>" . $fila['salida'] . "</td>";
                            echo "<td>" . $fila['hab'] . "</td>";
                            echo "<td>" . $fila['pagado'] . "</td>";
                            echo "<td>" . $fila['importe'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
            

            <section class="row">
                <h2 class="col-6 bg-info rounded-pill text-white">Formulario</h2>
                <hr>
                <form class="col-9 bg-light p-3 rounded" method="post" action="#">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" class="form-control">
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

<?php
// Al terminar la página desconectamos
desonectar($conexion);
?>