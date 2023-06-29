<?php
// Gestionar errores
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/**
 * Nombre: plantilla-CRUD.php
 * Autor: Iván Rodríguez
 * Fecha: 2023-06-05-17:30
 * Info: Plantilla genérica para proyectos PHP y BBDD
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
    $mensaje = "¿Deseas eliminar tu registro? <br>";
    $id = $_REQUEST['id'];

    if (!isset($_REQUEST['enviar'])) {
        $sql = "SELECT * FROM reservas WHERE id=?";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bind_param("i", $id);
    $sentencia->bind_result(
        $id,
        $cliente,
        $entrada,
        $salida,
        $hab,
        $pagado,
        $importe
    );
    $sentencia->execute();
    }
    
    /* Logica de la página o Hilo Principal*/
    if (isset($_REQUEST['enviar'])) {
        $sql = "DELETE FROM reservas 
                WHERE id = ?";
        $sentenciaPreparada = mysqli_prepare($conexion, $sql);
        $sentenciaEncriptada =
            mysqli_stmt_bind_param(
                $sentenciaPreparada,
                "i",
                $id
            );
        $ejecutar = mysqli_stmt_execute($sentenciaPreparada);
        $numFilas = mysqli_stmt_affected_rows($sentenciaPreparada);
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
                    if ($ejecutar) {
                        $mensaje = "Borrado correctamente <br>";
                        $mensaje .= "Filas actualizadas: $numFilas";
                    }
                }
                echo $mensaje;
                ?>
            </p>
        </section>
        <br><br>

        <?php
        if (!isset($_REQUEST['enviar'])) {
        ?>
        <section class="row">
            <h2 class="col-6 bg-info rounded-pill text-white">Formulario</h2>
            <hr>
            <form class="col-9 bg-light p-3 rounded alert alert-info" method="post" action="borrar.php">
                <?php
                while ($sentencia->fetch()) {
                ?>
                    <label for="cliente" class="form-label">Cliente</label>
                    <input disabled type="text" name="cliente" id="cliente" class="form-control" value='<?php echo $cliente; ?>'>
                    <hr>
                    <label for="entrada" class="form-label">Entrada</label>
                    <input disabled type="date" name="entrada" id="entrada" class="form-control" value='<?php echo $entrada; ?>'>
                    <label for="salida" class="form-label">Salida</label>
                    <input disabled type="date" name="salida" id="salida" class="form-control" value='<?php echo $salida; ?>'>
                    <hr>
                    <label for="hab" class="form-label">Habitación</label>
                    <input disabled type="number" name="hab" id="hab" class="form-control" value='<?php echo $hab; ?>'>
                    <hr>

                    <hr>
                    <label for="importe" class="form-label">Importe</label>
                    <input disabled type="number" step="0.1" name="importe" id="importe" class="form-control" value="<?php echo $importe; ?>">
                    <hr>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" value="Eliminar Reserva" name="enviar" class="btn btn-primary">

                <?php
                }
                ?>
            </form>
        </section>
        <?php
         }
        ?>
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