<?php
// Gestionar errores
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
/**
 * Nombre: Ex1306-Camion.php
 * Autor: Juan Carlos Romero Martos
 * Fecha: 2023-05-30/16:46
 * Info: Herencia
 * 
 * ANÁLISIS
 * ------------------------------
 * 1. Clase Vehículo -> Constructor (modelo)
 * (#modelo(String) -> Setter/Getter, ruedasd(int))
 * 2. Clase Camion  -> Hereda de vehículo
 * 3. Camion -> Acelerar(vel) y frenar(vel)ç
 * 4. Hilo Principal
 * Crear camion, pintarlo, acelerar(20) y frenar(20)
 * Volver a pintar camion
 * Cambiar Modelo y volver a pintar camion
 */
?>

<?php
// Zona de funciones y clases
class Vehiculo
{
    // Atributos
    protected $modelo = "";
    public $ruedas = 0;

    // Constructor
    public function __construct($modelo)
    {
        $this->modelo = $modelo;
        $this->ruedas = 4;
    }

    // Setter y Getterff
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }
    public function getModelo()
    {
        return $this->modelo;
    }

    // toString
    public function __toString()
    {
        $mensaje = "Modelo: " . $this->modelo . "<br>"
            . "Ruedas: " . $this->ruedas . "<br>";
        return $mensaje;
    }
}


// Clase Camion
class Camion extends Vehiculo
{
    // Atributos
    public $rem = false;
    public $vel = 0;

    // Constructor
    public function __construct($rem)
    {
        parent::__construct("Volvo Fh Electric");
        $this->rem = $rem;
        $this->ruedas = 8;
    }

    // toString
    public function __toString()
    {
        $mensaje = "Datos camion: <br>"
            . parent::__toString()
            . "Remolque: " . $this->rem . "<br>"
            . "Velocidad: " . $this->vel . "<br>";
        return $mensaje;
    }

    // Metodos
    public function acelerar($vel) {
        $this->vel += $vel;
    }
    public function frenar($vel) {
        $this->vel -= $vel;
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
    <!-- plantilla.php Con Bootstrap 5.3 -->
    <h1 class ="bg-info rounded-pill" >Camion</h1>
    <main class="container">
        <section class="row">
            <h2 class="col-4 bg-warning rounded-pill text-white">Alerta</h2>
            <p class="col-9 alert alert-warning">
                <?php
                $miCamion = new Camion (true);
                echo $miCamion;
                $miCamion->acelerar(20);
                $miCamion->frenar(10);
                echo $miCamion;
                $miCamion->setModelo("Mercedes e-Actros");
                echo $miCamion;
                ?>
            </p>
        </section>
        <hr>
        <nav>
            <p><a href="#" class="btn btn-success">Ir a página</a></p>

        </nav>

    </main>

</body>

</html>