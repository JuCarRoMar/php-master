<?php
// Gestionar errores
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>

<?php
// Definicion de la clase
class Camion
{
    // Atributos (poner acceso!)
    public $modelo = "";
    public $velocidad = 0;
    public $remolque = false;

    // Constructor
    // Constructor por defecto sin parametros \\ Constructor definido con parametros
    public function __construct($modelo, $velocidad, $remolque)
    {
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->remolque = $remolque;
    }

    // Método toString (pinta el objeto)
    public function __toString()
    {
        $mensaje = "Datos Camion <br>";
        $mensaje .= "$this->modelo <br>";
        $mensaje .= "Velocidad: $this->velocidad <br>";
        $mensaje .= "Remolque: $this->remolque <br>";
        return $mensaje;
    }
}

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
    /* Hilo Principal */
    // Llamar funciones
    if (isset($_REQUEST['enviar'])) {
       // $nombre = $_REQUEST['nombre'];    // Linea 37 y linea 49, no tienen porque llamarse igual que el label
       $miVolvo = new Camion ("Volvo FHElectric", 0, true);
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
                    echo $miVolvo;
                }
                ?>
            </p>
        </section>

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
        <hr>

        <nav>
            <p><a href="#" class="btn btn-success">Ir a página</a></p>

        </nav>

    </main>

</body>

</html>