<?php
// Cargamos el archivo externo funciones.php
require("Funciones.php");

/**
 * Nombre: Instalar.php
 * Autor: Juan Carlos Romero Martos
 * Fecha: 2023-06-07
 * Info: Página para instalar BBDD desde archivo SQL
 */
?>

<?php
// Probamos la conexión
$conexion = conectarSinBBDD("localhost", "root", "root");
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

<body class="bg-dark">
    <?php
    /* Lógica de la página */
    $mensaje = "";
    if (isset($_REQUEST['enviar'])) {
        $resultado = instalar($conexion, $_REQUEST['archivo']);
        if ($resultado) {
            $mensaje = "Instalación Correcta";
        } else {
            $mensaje = "Error al instalar la BBDD";
        }
    }
    ?>

    <!-- plantilla.php Con Bootstrap 5.3 -->
    <h1 class="bg-info rounded-pill">Plantilla</h1>
    <main class="container">
        <section class="row">
            <h2 class="col-6 bg-warning rounded-pill text-white">Alerta</h2>
            <p class="col-9 alert alert-warning">
                <?php
                // Mostrar funciones
                if (isset($_REQUEST['enviar'])) {
                    echo $mensaje;
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
            <p><a href="Insertar.php" class="btn btn-success">Ir a Insertar</a></p>

        </nav>

    </main>

</body>

</html>

<?php
// Al terminar la página desconectamos
desconectar($conexion);
?>