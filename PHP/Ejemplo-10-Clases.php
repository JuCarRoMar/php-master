<?php
/* Gestion de errores */
ini_set("error_reporting", E_ALL);
ini_set('display_errors', 1);
ini_set("display_startup_errors", 1);

?>
<?php
//Definicion de la clase
class Camion
{
    //Atributos
    public $modelo = "";
    public $velocidad = 0;
    public $remolque = false;

    //Constructor definido con parámetros
    public function __construct($modelo, $velocidad, $remolque)
    {
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->remolque = $remolque;
    }
    //Método toString (pinta el objeto)
    public function __toString()
    {
        $mensaje = "Datos Camion <br>"
            . "Modelo: " . $this->modelo . "<br>"
            . "Velocidad: " . $this->velocidad . "<br>"
            . "Remolque: " . $this->remolque . "<br>";
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
    <link rel="stylesheet" href="bootstrap.min.css">
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

    /*Hilo principal*/

    <?php
    if (isset($_REQUEST['enviar'])) {
        //$nombre = $_REQUEST['nombre'];
        $miVolvo = new Camion("Volovo FHElectric", 0, true);
    }
    ?>


    <!-- plantilla.php con Bootstrap 5.3 -->
    <h1 class="bg-info rounded-pill">Plantilla</h1>

    <main class="container">
        <section class="row">
            <h2 class="col-6 bg-success rounded-pill text-white">Alerta</h2>
            <p class="col-9 alert alert-info bg-light">
                <?php
                if (isset($_REQUEST['enviar'])) {
                    //$nombre = $_REQUEST['nombre'];
                    echo $miVolvo;
                }
                ?>
            </p>
        </section>
        <br><br>
        <section class="row">
            <h2 class="col-6 bg-info rounded-pill">Formulario</h2>
            <hr>
            <form class="col-9 bg-success p-3 rounded" method="post" action="#">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control bg-light" id="nombre" name="nombre">
                <hr>
                <input type="submit" value="Enviar Formulario" name="enviar" class="btn btn-primary">

            </form>

        </section>
        <br><br>
        <nav>
            <p><a href="#" class="btn btn-success mt-4"></a></p>
        </nav>
    </main>










</body>

</html>