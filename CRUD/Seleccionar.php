<?php
// Gestionar errores
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/**
 * Nombre: Seleccionar.php
 * Autor: Juan Carlos Romero Martos
 * Fecha: 2023-06-06
 * Info: 
 * 
 * Ciclo de vida de Discos Luis:
 * 0) Instalar BBDD
 * 1) Seleccionar
 *          | -> 2) Insertar -> Accordion (3 Tablas)
 *          | -> 3) Modificar -> Accordion (3 Tablas)
 *          | -> 4) Borrar -> Solo Discos!
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

// Crear la conexión
$conexion = conectar("localhost", "root", "root", "discosLuis");
// Definimos la consulta
$consulta = "SELECT titulo, nombre, genero, cassette, lanzamiento
             FROM Artistas, Discos, Generos
             WHERE Artistas.idArtista = Discos.idArtista
             AND Discos.idGenero = Generos.idGenero";
// Ejecutamos la consulta
$resultado = mysqli_query($conexion, $consulta);
// echo mysqli_num_rows($resultado);        # Ver num registros

// Sacamos la salida de la consulta -> tabla con todos los registros
// Array bidimensional asociativo
$tabla = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
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
        $nombre = $_POST['nombre'];    // Linea 37 y linea 49, no tienen porque llamarse igual que el label
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
                    echo $nombre;
                }
                // var_dump($tabla);
                echo "Número de discos: " .  mysqli_num_rows($resultado);

                ?>
            </p>
        </section>

        <section class="bg-white rounded">
            <h2 class="col-6 text-info">Discos</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Artista</th>
                        <th>Género</th>
                        <th>Cassette</th>
                        <th>Lanzado</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($tabla as $fila) {
                        echo "<tr>";
                        echo "<td>" . $fila['titulo'] . "</td>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['genero'] . "</td>";
                        if ($fila['cassette']) {
                            echo "<td> SI </td>";
                        } else {
                            echo "<td> NO </td>";
                        }
                        echo "<td>" . $fila['lanzamiento'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>

                </thead>
            </table>
        </section>
        <!--
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
            -->
        <hr>
        <nav>
            <p><a href="insertar.php" class="btn btn-success mt-4">Insertar datos</a></p>
            <p><a href="modificar.php" class="btn btn-info mt-4">Modificar datos</a></p>
            <p><a href="borrar.php" class="btn btn-danger mt-4">Borrar datos</a></p>

        </nav>

    </main>

</body>

</html>

<?php
// Al terminar la página desconectamos
desonectar($conexion);
?>