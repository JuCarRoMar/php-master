<?php
// Gestionar errores
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
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
    <!--
         Ejercicio-02-Condicionales
         Autor: Juan Carlos Romero Martos
         Fecha: 2023-05-15
         Enunciado: Pedir una calificación de 0 a 10 y mostrar
    -->
    <?php
    /* Lógica de la página */
    if (isset($_REQUEST['enviar'])) {
        $num = $_POST['num'];

        $mensaje = "";
        if ($num >= 0 && $num < 5) {
            $mensaje = "{$num} Insuficiente <br>";
        } else if ($num >= 5 && $num < 6) {
            $mensaje = "{$num} Suficiente <br>";
        } else if ($num >= 6 && $num < 7) {
            $mensaje = "{$num} Bien <br>";
        } else if ($num >= 7 && $num < 9) {
            $mensaje = "{$num} Notable <br>";
        } else if ($num >= 9 && $num <= 10) {
            $mensaje = "{$num} Excelente <br>";
        }
    }
    ?>

    <!-- plantilla.php Con Bootstrap 5.3 -->
    <h1>Plantilla</h1>
    <main class="container">
        <section class="row">
            <h2 class="col-4 bg-warning rounded-pill text-white">Alerta</h2>
            <p class="col-9 alert alert-warning">
                <?php
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
                <label for="num" class="form-label">Calificación</label>
                <input type="text" class="form-control" id="num" name="num" class="form-control">
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