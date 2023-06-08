<?php
// Gestionar errores

use Camion as GlobalCamion;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>

<?php
// Definicion de la clase PADRE Abstracta
abstract class Vehiculo
{
    public $marca = "";
    public $modelo = "";
    public $velocidad = 0;

    // Constructor definido con parametros
    public function __construct($marca, $modelo)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    abstract public function __toString();
}
// Definicion de la clase hija
class Camion extends Vehiculo
{
    // Atributos (poner acceso!)
    public $remolque = false;

    // Constructor por defecto sin parametros \\ Constructor definido con parametros
    public function __construct($marca, $modelo, $velocidad, $remolque)
    {
        parent::__construct($marca, $modelo);
        $this->velocidad = $velocidad;
        $this->remolque = $remolque;
    }

    // Metodos adicionales
    final public function acelerar($valor)
    {
        $this->velocidad += $valor;
    }
    final public function frenar($valor)
    {
        $this->velocidad -= $valor;
    }

    // Método toString (pinta el objeto)
    // Uso parte del metodo heredado del padre
    public function __toString()
    {
        $mensaje = "Datos Camion: <br>";
        $mensaje .= "Marca: " . $this->marca . "<br>"
            .  "Modelo: " . $this->modelo . "<br>" .
            "Velocidad: " . $this->velocidad . "<br>"
            . "Remolque: $this->remolque <br>";
        return $mensaje;
    }

    final public function cambiarRemolque()
    {
        $this->remolque = !$this->remolque;
    }
}

class CamionElectrico extends Camion
{
    // Atributos
    public $bateria;

    // Constructor
    public function __construct($marca, $modelo, $velocidad, $remolque, $bateria)
    {
        parent::__construct($marca, $modelo, $velocidad, $remolque);
        $this->bateria = $bateria;
    }

    // Método toString
    public function __toString()
    {
        $mensaje = parent::__toString();
        $mensaje .= "Bateria: " . $this->bateria . "<br>";
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
        $marca = $_REQUEST['marca'];
        $modelo = $_REQUEST['modelo'];
        $velocidad = $_REQUEST['velocidad'];

        $miCamionElectrico = new CamionElectrico($marca, $modelo, $velocidad, true, "100kw");
        $miCamionElectrico->cambiarRemolque(); // true -> false
        $miCamionElectrico->acelerar(20);
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
                    echo $miCamionElectrico;
                }
                ?>
            </p>
        </section>

        <section class="row">
            <h2 class="col-6 bg-info rounded-pill text-white">Formulario</h2>
            <hr>
            <form class="col-9 bg-light p-3 rounded" method="post" action="#">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" class="form-control">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" class="form-control">
                <label for="velocidad" class="form-label">Velocidad</label>
                <input type="numb" class="form-control" id="velocidad" name="velocidad" class="form-control">
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