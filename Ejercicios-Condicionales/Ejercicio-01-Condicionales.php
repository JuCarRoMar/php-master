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

<?php
function verNum($num): string{
    $mensaje = "";
    if ($num > 0) {
        $mensaje = "El número {$num} es positivo";
    } else if ($num < 0) {
        $mensaje = "El número {$num} es negativo";
    } else if ($num == 0) {
        $mensaje = "El número {$num} es cero";
    }
    return $mensaje;
}
?>

<body class="bg-dark">
    <!--
         Ejercicio-01-Condicionales
         Autor: Juan Carlos Romero Martos
         Fecha: 2023-05-15
         Enunciado: Pedir Nº y decir si es negativo, positivo o cero
    -->
    <?php
    /* Lógica de la página */
    // Script Principal
    // isset --> existe
    if (isset($_REQUEST['enviar'])) {
        $num = $_REQUEST['num'];
        $mensaje = verNum($num);
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
                <label for="num" class="form-label">Dame un numero</label>
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