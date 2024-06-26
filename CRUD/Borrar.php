<?php
// Gestionar errores
require("Funciones.php");

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
    if (isset($_REQUEST['borrarDisco'])) {
        borrar($conexion, $_REQUEST['id']);
    }
    // Cargamos las 3 tablas
    $tablaDisco = cargarDisco($conexion, $_REQUEST['id']);
    $tablaDiscos = cargarDiscos($conexion);
    $numDiscos = count($tablaDiscos);
    ?>

    <!-- plantilla.php con BootStrap 5.3-->
    <h1 class="bg-light rounded-pill">Discos Luis Javier</h1>
    <main class="container">
        <section class="row">
            <h2 class="col-6 bg-info rounded-pill text-white">Borrar disco</h2>
            <p class="col-9 alert alert-info">
                <?php
                echo "Número de discos: " . $numDiscos;
                ?>
            </p>
        </section>
        <br><br>

        <section class="bg-white rounded">
            <h2 class="col-6 text-danger">Disco a borrar!</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Artista</th>
                        <th>Género</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tablaDisco as $fila) {
                        echo "<tr>";
                        echo "<td>" . $fila['titulo'] . "</td>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['genero'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <form class="col-9 bg-light p-3 rounded alert alert-info" method="post" action="#">
                <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                <input type="submit" value="Borrar Disco" name="borrarDisco" class="btn btn-danger">
            </form><br>
        </section>
        <hr>
        <nav>
            <p><a href="Insertar.php" class="btn btn-success mt-4">Insertar Datos</a></p>
            <p><a href="Instalar.php" class="btn btn-warning mt-4">Instalar BBDD</a></p>
        </nav>
    </main>

</body>

</html>

<?php
// Al terminar la página, quitamos la conexión
desconectar($conexion);
?>