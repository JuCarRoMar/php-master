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

function cargarReservas($conexion)
{
    $sql = "   SELECT * FROM reservas";
    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);
    $tablaReservas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $tablaReservas;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        $nombre = $_POST['nombre'];    // Linea 37 y linea 49, no tienen porque llamarse igual que el label
    }

    $tablaReservas = cargarReservas($conexion);
    ?>

    <!-- plantilla.php Con Bootstrap 5.3 -->
    <h1 class="bg-info rounded-pill">Plantilla</h1>
    <main class="container">
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
                            <th>Editar</th>
                            <th>Eliminar</th>
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

                            // Icono de modificar
                            echo "<td class='text-center'>
                                  <a href= 'modificar.php?id=" . $fila['id']. "'>";
                            echo "<i class='fa-solid fa-pencil fa-beat fa-md text-success'></i></a></td>";

                            // Icono de borrar
                            echo "<td class='text-center'>
                                  <a href= 'borrar.php?id=" . $fila['id'] . "'>";
                            echo "<i class='fa-solid fa-trash fa-beat fa-md  text-danger'></i></a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </section>
        <br>
        <nav>
            <p><a href="registrar.php" class="btn btn-info">Registrar</a></p>
            <p><a href="menu.php" class="btn btn-info">Volver al Menu Principal</a></p>

        </nav>

    </main>

</body>

</html>

<?php
// Al terminar la página desconectamos
desonectar($conexion);
?>