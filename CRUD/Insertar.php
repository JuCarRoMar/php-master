<?php
// Gestionar errores
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/**
 * Nombre: insertar.php
 * Autor: Iván Rodríguez
 * Fecha: 2023-06-09-17:50
 * Info: Visualizar Datos Tabla Discos / Insertar en Tablas
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
$numDiscos = mysqli_num_rows($resultado);
// Sacamos la salida de la consulta -> tabla con todos los registros
// Array Bidimensional ASOCIATIVO
$tablaDiscos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Hago lo mismo con Artistas
$sql = " SELECT * FROM Artistas";
$resultado = mysqli_query($conexion, $sql);
$tablaArtistas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Hago lo mismo con Generos
$sql = " SELECT * FROM Generos";
$resultado = mysqli_query($conexion, $sql);
$tablaGeneros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
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
                echo "Número de discos: " . $numDiscos;
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
                    foreach ($tablaDiscos as $fila) {
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

        <section class="accordion" id="accordionExample">
            <header class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Formulario Artistas
                    </button>
                </h2><br>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form class="col-9 bg-light p-3 rounded alert alert-info" method="post" action="#">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                            <br>
                            <label for="pais" class="form-label">País Artista</label>
                            <input type="text" name="pais" id="pais" maxlength="3" class="form-control input-sm">
                            <hr>
                            <input type="submit" value="Alta Artista" name="enviarArtista" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </header>
            <br>
            <header class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Formulario Generos
                    </button>
                </h2><br>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form class="col-9 bg-light p-3 rounded alert alert-info" method="post" action="#">
                            <label for="genero" class="form-label">Género</label>
                            <input type="text" name="genero" id="genero" class="form-control">
                            <hr>
                            <input type="submit" value="Alta Genero" name="enviarGenero" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </header><br>
            <header class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Formulario Discos
                    </button>
                </h2><br>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form class="col-9 bg-light p-3 rounded alert alert-info" method="post" action="#">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" name="titulo" id="titulo" class="form-control">
                            <hr>
                            <select class="form-select" name="idArtista" id="idArtista">
                                <option selected disabled>Selecciona Artista</option>
                                <?php
                                foreach ($tablaArtistas as $artista) {
                                    /*
                                    echo "<option value='".
                                     $artista['idArtista'] . "'>" .
                                     $artista['nombre'] . "</option>";
                                     */

                                    $idArtista = $artista['idArtista'];
                                    $nombreArtista = $artista['nombre'];
                                    echo "<option value='$idArtista'>$nombreArtista</option>";
                                }
                                ?>
                            </select>
                            <hr>
                            <select class="form-select" name="idGenero" id="idGenero">
                                <option selected disabled>Selecciona Género</option>
                                <?php
                                foreach ($tablaGeneros as $genero) {
                                    /*
                                    echo "<option value='".
                                     $genero['idGenero'] . "'>" .
                                     $genero['genero'] . "</option>";
                                     */

                                    $idGenero = $genero['idGenero'];
                                    $nombre = $genero['genero'];
                                    echo "<option value='$idGenero'>$nombre</option>";
                                }
                                ?>
                            </select>
                            <hr>
                            <section class="form-check form-switch">
                                <label for="cassette" class="form-check-label">Cassette</label>
                                <input type="checkbox" name="cassette" role="switch" id="cassette" class="form-check-input">
                            </section>
                            <hr>
                            <label for="lanzamiento" class="form-label">Lanzamiento</label>
                            <input type="date" name="lanzamiento" id="lanzamiento" class="form-control">
                            <hr>
                            <input type="submit" value="Alta Disco" name="enviarDisco" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </header>
        </section>

        <hr>

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