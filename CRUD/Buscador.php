<?php
// Gestionar errores
require("Funciones.php");

/**
 * Nombre: insertar.php
 * Autor: Iván Rodríguez
 * Fecha: 2023-06-09-17:50
 * Info: Visualizar Datos Tabla Discos / Insertar en Tablas
 */
?>

<?php
// Crear conexión
$conexion = conectar("localhost", "root", "root", "discosLuis");
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
    if (isset($_REQUEST['enviarArtista'])) {
        $nombre = $_REQUEST['nombre'];

        $sql = "SELECT * FROM Artistas
                WHERE nombre = ?";
        $sentenciaPreparada = mysqli_prepare($conexion, $sql);
        $sentenciaEncriptada =
            mysqli_stmt_bind_param(
                $sentenciaPreparada,
                "s",
                $nombre
            );
            
        $ejecucionArtista = mysqli_stmt_execute($sentenciaPreparada);
        $resultado =  mysqli_stmt_get_result($sentenciaPreparada);
        $tablaDiscos = mysqli_stmt_get_result($sentenciaPreparada);
        $numDiscos = mysqli_stmt_affected_rows($sentenciaPreparada);
    }

    if (isset($_REQUEST['enviarGenero'])) {
        $genero = $_REQUEST['genero'];

        $sql = "INSERT INTO Generos (genero)
        VALUES (?)";
        $sentenciaPreparada = mysqli_prepare($conexion, $sql);
        $sentenciaEncriptada = mysqli_stmt_bind_param($sentenciaPreparada, "s", $genero);
        $ejecucionGenero = mysqli_stmt_execute($sentenciaPreparada);
        $numFilasInsert = mysqli_stmt_affected_rows($sentenciaPreparada);
    }

    if (isset($_REQUEST['enviarDisco'])) {
        $titulo = $_REQUEST['titulo'];
        $idArtista = $_REQUEST['idArtista'];
        $idGenero = $_REQUEST['idGenero'];
        $cassette = $_REQUEST['cassette'];
        $lanzamiento = $_REQUEST['lanzamiento'];

        $sql = "INSERT INTO Discos (titulo, idArtista, idGenero, cassette, lanzamiento)
        VALUES (?, ?, ?, ?, ?)";
        $sentenciaPreparada = mysqli_prepare($conexion, $sql);
        $sentenciaEncriptada = mysqli_stmt_bind_param(
            $sentenciaPreparada,
            "siiis",
            $titulo,
            $idArtista,
            $idGenero,
            $cassette,
            $lanzamiento
        );
        $ejecucionDiscos = mysqli_stmt_execute($sentenciaPreparada);
        $numFilasInsert = mysqli_stmt_affected_rows($sentenciaPreparada);
    }

    // Cargamos las 3 tablas
    if (!isset($_REQUEST['enviarArtista'])) {
        $tablaDiscos = cargarDiscos($conexion);
        $tablaArtistas = cargarArtistas($conexion);
        $tablaGeneros = cargarGeneros($conexion);
        $numDiscos = count($tablaDiscos);
    }

    ?>

    <!-- plantilla.php con BootStrap 5.3-->
    <h1 class="bg-light rounded-pill">Discos Luis Javier</h1>
    <main class="container">
        <section class="row">
            <h2 class="col-6 bg-info rounded-pill text-white">Alerta</h2>
            <p class="col-9 alert alert-info">
                <?php

                if (isset($ejecucionArtista) && $ejecucionArtista) {
                    echo "Num Filas Insertadas: $numFilasInsert <br>";
                    echo "Alta correcta Artista: $nombre <br>";
                }

                if (isset($ejecucionGenero) && $ejecucionGenero) {
                    echo "Num Filas Insertadas: $numFilasInsert <br>";
                    echo "Género nuevo: $genero <br>";
                }

                if (isset($ejecucionDiscos) && $ejecucionDiscos) {
                    echo "Num Filas Insertadas: $numFilasInsert <br>";
                    echo "Título del disco: $titulo <br>";
                    echo "Artista: $idArtista <br>";
                    echo "Género: $idGenero <br>";
                    echo "Cassette: $cassette <br>";
                    echo "Lanzamiento: $lanzamiento <br>";
                    echo "Número de discos: " . $numDiscos;
                }
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

                        $nuevaFecha = cambiarFecha($fila['lanzamiento']);
                        echo "<td> $nuevaFecha </td>";

                        // Icono de modificar
                        echo "<td class='text-center'>
                        <a href= 'Modificar.php?id=" . $fila['id']
                            . "&idArtista=" . $fila['idArtista']
                            . "&idGenero=" . $fila['idGenero'] . "'>";
                        echo "<i class='fa-solid fa-pencil fa-beat fa-md text-success'></i></a></td>";

                        // Icono de borrar
                        echo "<td class='text-center'>
                        <a href= 'Borrar.php?id=" . $fila['id'] . "'>";
                        echo "<i class='fa-solid fa-trash fa-beat fa-md  text-danger'></i></a></td>";
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
                            <hr>
                            <input type="submit" value="Buscar por Artista" name="enviarArtista" class="btn btn-primary">
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
                            <input type="hidden" name="cassette" value="0">
                            <section class="form-check form-switch">
                                <label for="cassette" class="form-check-label">Cassette</label>
                                <input type="checkbox" value="1" name="cassette" role="switch" id="cassette" class="form-check-input">
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
            <p><a href="Instalar.php" class="btn btn-warning mt-4">Instalar BBDD</a></p>
        </nav>
    </main>

</body>

</html>

<?php
// Al terminar la página, quitamos la conexión
desconectar($conexion);
?>