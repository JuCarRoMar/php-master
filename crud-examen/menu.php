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


    <!-- plantilla.php con BootStrap 5.3-->
    <h1 class="bg-light rounded-pill">Menu Principal</h1>

    <main class="container">
        
        <hr>
        <nav>
            <p><a href="islantilla.php" class="btn btn-success mt-4">Instalar BBDD</a></p>
            <p><a href="reservas.php" class="btn btn-success mt-4">Consultar Tabla</a></p>
        </nav>
    </main>

</body>

</html>