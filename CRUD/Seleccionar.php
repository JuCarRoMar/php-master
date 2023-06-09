<?php
// Gestionar errores
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/**
 * Nombre: seleccionar.php
 * Autor: Iván Rodríguez
 * Fecha: 2023-06-06-18:15
 * Info: Visualizar Datos Tabla Discos
 * 
 * Ciclo de Vida de Discos de Luis:
 * 1) Seleccionar 
 *          | -> 2) Insertar
 *          | -> 3) Modificar
 *          | -> 4) Borrar
 */
?>

<?php
// Zona de Funciones y Clases
function conectar($host, $usuario, $clave, $bbdd)
{
    // Creamos la conexión
    $conexion = mysqli_connect($host, $usuario, $clave, $bbdd);
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

// Crear conexión
$conexion = conectar("localhost", "root", "root", "discosLuis");
// Definimos la consulta
$sql = "   SELECT * 
                FROM Artistas, Discos, Generos
                WHERE Artistas.idArtista = Discos.idArtista
                AND Discos.idGenero = Generos.idGenero
                ";
// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);


// Sacamos la salida de la consulta -> tabla con todos los registros
// Array Bidimensional ASOCIATIVO
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        h1 {
            padding: 10px;
        }

        h1,
        h2,
        p {
            margin: 10px;
        }

        td {
            margin: auto;
        }
    </style>
</head>

<body class="bg-dark">


    <?php
    /* Logica de la página o Hilo Principal*/
    /*
    if (isset($_REQUEST['enviar'])) {
        $nombre = $_REQUEST['nombre'];
    }
    */
    ?>

    <!-- plantilla.php con BootStrap 5.3-->
    <h1 class="bg-light rounded-pill">Discos Luis Javier</h1>

    <main class="container">
        <section class="row">
            <h2 class="col-6 bg-info rounded-pill text-white">Alerta</h2>
            <p class="col-9 alert alert-info">
                <?php
                /*
                if (isset($_REQUEST['enviar'])) {
                    echo $nombre;
                }
                */
                //var_dump($tabla);

                # Ver num registros
                echo "Número de discos: " . mysqli_num_rows($resultado);
                ?>
            </p>
        </section>
        <br><br>

        <section class="bg-white rounded">
            <h2 class="col-6 text-info">Discos</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Artista</th>
                        <th>Género</th>
                        <th>Cassette</th>
                        <th>Fecha</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
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
                            echo "<td>SI </td>";
                        } else {
                            echo "<td>NO </td>";
                        }
                        echo "<td>" . $fila['lanzamiento'] . "</td>";
                        echo "<td class='text-center text-success'>" ?>
                        <i class="fa-solid fa-pencil fa-beat fa-md"></i>
                        <?php "</td>";
                        echo "<td class='text-center text-danger'>" ?>
                        <i class="fa-solid fa-trash fa-beat fa-md"></i>
                    <?php "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!--
        <section class="row">
            <h2 class="col-6 bg-info rounded-pill text-white">Formulario</h2>
            <hr>
            <form class="col-9 bg-light p-3 rounded alert alert-info" method="post" action="#">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
                <hr>
                <input type="submit" value="Enviar Formulario" name="enviar" class="btn btn-primary">
            </form>
        </section>
        <hr>
                -->
        <nav>
            <p><a href="insertar.php" class="btn btn-success mt-4">Insertar Datos</a></p>
            <p><a href="modificar.php" class="btn btn-info mt-4">Modificar Datos</a></p>
            <p><a href="borrar.php" class="btn btn-danger mt-4">Borrar Datos</a></p>
        </nav>
    </main>

</body>

</html>

<?php
// Al terminar la página, quitamos la conexión
desconectar($conexion);
?>