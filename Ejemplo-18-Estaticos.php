<?php
/* Gestion de errores */

use metodoEspecial as GlobalMetodoEspecial;

ini_set("error_reporting", E_ALL);
ini_set('display_errors', 1);
ini_set("display_startup_errors", 1);

/**
 * POLIMORFISMO
 * - https://phpbasico.com/polimorfismo-en-php-polimorfismo-en-php-explicado-claramente-con-ejemplos/
 * - Poniendo private
 * - Protected es accesible a clases heredadas (hija, nietas,...)
 */
?>
<?php
// Trait es una interfaz pero con los metodos DESARROLLADOS!!
trait rasgosVehiculo
{
    public function arrancar()
    {
        return "Arrancando vehiculo <br>";
    }
    public function detener()
    {
        return "Deteniendo vehiculo <br>";
    }
}

trait rasgosCamion
{
    public function cargarCamion()
    {
        return "Cargando el Camion!<br>";
    }
}


// Definimos una interfaz...
interface metodosCamion
{
    public function acelerar($valor);
    public function frenar($valor);
}

interface metodoEspecial
{
    public function cambiarRemolque();
}

//Definicion de la clase PADRE Abstracta
abstract class Vehiculo
{
    public $marca = "";
    public $modelo = "";
    public $velocidad = 0;

    //Constructor definido con parámetros
    public function __construct($marca, $modelo)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    //Método toString (pinta el objeto)
    abstract public function __toString();
}

//Definicion de la clase hija
class Camion extends Vehiculo implements metodosCamion, metodoEspecial
{
    //Atributos ($this->)
    private $remolque = false;

    // Uso un trait
    use rasgosVehiculo;
    use rasgosCamion;

    //Constructor definido con parámetros
    public function __construct($marca, $modelo, $velocidad, $remolque)
    {
        parent::__construct($marca, $modelo);
        $this->velocidad = $velocidad;
        $this->remolque = $remolque;
    }

    // Setter y Getter
    public function setRemolque($valor)
    {
        $this->remolque = $valor;
    }

    public function getRemolque()
    {
        return $this->remolque;
    }

    //Métodos adicionales

    final public function acelerar($valor)
    {
        $this->velocidad += $valor;
    }

    final public function frenar($valor)
    {
        $this->velocidad -= $valor;
    }

    final public function cambiarRemolque()
    {
        $this->remolque = !$this->remolque;
    }

    //Método toString 
    // Uso parte del método heredado del padre
    public function __toString()
    {
        $mensaje = "<br>Datos Camion: <br>";
        $mensaje .=  "Marca: " . $this->marca . "<br>"
            . "Modelo: " . $this->modelo . "<br>"
            . "Velocidad: " . $this->velocidad . "<br>";
        return $mensaje;
    }
}

class Coche extends Vehiculo implements metodoEspecial
{
    // Atributos
    public $numPuertas = 0;

    // Constructor
    public function __construct($marca, $modelo, $velocidad, $numPuertas)
    {
        parent::__construct($marca, $modelo);
        $this->velocidad = $velocidad;
        $this->numPuertas = $numPuertas;
    }

    public function __toString()
    {
        $mensaje = "<br>Datos Coche: <br>";
        $mensaje .=  "Marca: " . $this->marca . "<br>"
            . "Modelo: " . $this->modelo . "<br>"
            . "Velocidad: " . $this->velocidad . "<br>"
            . "Nº Puertas: " . $this->numPuertas . "<br>";
        return $mensaje;
    }

    final public function cambiarRemolque()
    {
        return "Al coche le pongo un remolque!";
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

    <!-- Hilo principal -->
    <?php
    if (isset($_REQUEST['enviar'])) {
        $marca = $_REQUEST['marca'];
        $modelo = $_REQUEST['modelo'];
        $velocidad = $_REQUEST['velocidad'];

        $miCamion = new Camion($marca, $modelo, $velocidad, false);
        $miCamion->cambiarRemolque();   // true -> false
        //$miCamion->setRemolque(true);
        $miCamion->acelerar(20);
        $miCoche = new Coche($marca, $modelo, $velocidad, 4);
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
                    echo $miCamion;
                    echo $miCamion->arrancar();
                    echo $miCamion->detener();
                    echo $miCamion->cargarCamion();
                    echo $miCamion->getRemolque();
                    echo $miCoche;
                    echo $miCoche->cambiarRemolque();
                }
                ?>
            </p>
        </section>
        <br><br>
        <section class="row">
            <h2 class="col-6 bg-info rounded-pill">Formulario</h2>
            <hr>
            <form class="col-9 bg-warning p-3 rounded" method="post" action="#">
                <label for="marca" class="form-label">marca</label>
                <input type="text" class="form-control bg-light" id="marca" name="marca">
                <label for="modelo" class="form-label">modelo</label>
                <input type="text" class="form-control bg-light" id="modelo" name="modelo">
                <label for="velocidad" class="form-label">velocidad</label>
                <input type="number" class="form-control bg-light" id="velocidad" name="velocidad">
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