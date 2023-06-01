<?php
// Gestionar errores

use Vehiculo as GlobalVehiculo;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/**
 * Nombre: Ex1306-Camion.php
 * Autor: Juan Carlos Romero Martos
 * Fecha: 2023-05-31
 * Info: Ejercicio 5 del Examen 1306 (POO completo)
 * 
 * ANÁLISIS
 * ==========================================
 * 
 */
?>

<?php
// Interfaces
interface Metodos1
{
    static public function darAlta(): object;
}

interface Metodos2
{
    public function darBaja(): string;
}

// Traits
trait Gestion1
{
    public function usar(): string
    {
        return "Vehículo en uso";
    }
}

trait Gestion2
{
    public function asignarChofer(): string
    {
        return "Vehículo con chofer asignado";
    }
}

// Composicion
class Linea
{
    // Atributos
    public $denominacion = "";
    public $numParadas = 10;

    // Constructor
    public function __construct($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    // toString
    public function __toString(): string
    {
        $mensaje =
            "Denominación: $this->denominacion <br>"
            . "NumParadas: $this->numParadas <br>";
        return $mensaje;
    }
}

?>

<?php
// Zona de funciones y clases

// Clase padre
class Vehiculo
{
    // Variables
    private $matricula = "1111";
    protected $antiguedad = 2020;
    protected $electrico = false;

    // Constructor
    public function __construct($matricula, $antiguedad, $electrico)
    {
        $this->matricula = $matricula;
        $this->antiguedad = $antiguedad;
        $this->electrico = $electrico;
    }

    // Setter y Getter
    public function getMatricula()
    {
        return $this->matricula;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    // toString
    public function __toString(): string
    {
        $valorElectrico = "";
        if ($this->electrico) {
            $valorElectrico = "Eléctrico: SI";
        } else {
            $valorElectrico = "Eléctrico: NO";
        }

        $mensaje =
            "Matrícula: $this->matricula <br>"
            . "Antigüedad: $this->antiguedad <br>"
            . "$valorElectrico <br>";
        return $mensaje;
    }
}

// Clase hija
class Bus extends Vehiculo
{
    // Atributos
    public $modelo = "";
    public $capacidad = 55;

    // Constructor
    public function __construct($modelo) {
        $this->modelo = $modelo;
    }

    // toString
    public function __toString()
    {
        
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
    /* Lógica de la página */
    // Llamar funciones
    if (isset($_REQUEST['enviar'])) {
        $nombre = $_POST['nombre'];    // Linea 37 y linea 49, no tienen porque llamarse igual que el label
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
                    //echo $nombre;
                    //$v1 = new Vehiculo("11A", 2020, true);
                    //echo $v1;
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