<?php
// Gestionar errores
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/**
 * Nombre: Instalar.php
 * Autor: Juan Carlos Romero Martos
 * Fecha: 2023-06-07
 * Info: Página para instalar BBDD desde archivo SQL
 */
?>

<?php
// Crear funciones
function conectar($servidor, $usuario, $clave)
{
    // Creamos la conexión
    $conexion = mysqli_connect($servidor, $usuario, $clave);
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
$conexion = conectar("localhost", "root", "root");
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
        $archivo = $_REQUEST['archivo'];
        $sql = file_get_contents($archivo);
        $resultado = mysqli_multi_query($conexion, $sql);
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
                    echo $archivo;
                }
                ?>
            </p>
        </section>

        <section class="row">
            <h2 class="col-6 bg-info rounded-pill text-white">Formulario</h2>
            <hr>
            <form class="col-9 bg-light p-3 rounded" method="post" action="#">
                <label for="archivo" class="form-label">Archivo</label>
                <input type="file" class="form-control" id="archivo" name="archivo" class="form-control">
                <hr>
                <input type="submit" value="Instalar BBDD" name="enviar" class="btn btn-primary">
            </form>
        </section>
        <hr>

        <nav>
            <p><a href="Seleccionar.php" class="btn btn-success">Ir a Seleccionar</a></p>

        </nav>

    </main>

</body>

</html>

<?php
// Al terminar la página desconectamos
desonectar($conexion);
?>