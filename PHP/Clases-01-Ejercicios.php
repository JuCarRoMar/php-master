<?php
/* Gestion de errores */
ini_set("error_reporting", E_ALL);
ini_set('display_errors', 1);
ini_set("display_startup_errors", 1);

?>
<?php
// Definicion de la clase PADRE Abstracta
abstract class Persona
{
    //Atributos
    public $nombre = "";
    public $dni = 0;
    public $sexo = false;

    //Constructor definido con parámetros
    public function __construct($nombre, $dni, $sexo)
    {
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->sexo = $sexo;
    }
    //Método toString (pinta el objeto)
    abstract public function __toString();
}

// Definicion de la clase hija Cliente
class Cliente extends Persona
{
    //Atributos
    public $habitual = false;

    //Constructor definido con parámetros
    public function __construct($nombre, $dni, $sexo, $habitual)
    {
        parent::__construct($nombre, $dni, $sexo);
        $this->habitual = $habitual;
    }
    //Método toString (pinta el objeto)
    public function __toString()
    {
        $mensaje = "Datos de la persona" . "<br>";
        $mensaje .= "Nombre: " . $this->nombre . "<br>";
        $mensaje .= "DNI: " . $this->dni . "<br>";
        $mensaje .= "Sexo: " . $this->sexo . "<br>";
        if ($this->habitual) {
            $mensaje .= " - Habitual";
            } else {
                $mensaje .= " - Es nuevo";
            }
        return $mensaje;
    }
}

// Definicion de la clase hija Empleado
class Empleado extends Persona
{
    //Atributos
    public $puesto = "";

    //Constructor definido con parámetros
    public function __construct($nombre, $dni, $sexo, $puesto)
    {
        parent::__construct($nombre, $dni, $sexo);
        $this->puesto = $puesto;
    }
    //Método toString (pinta el objeto)
    public function __toString()
    {
        $mensaje = parent::__toString();
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
        $nombre = $_REQUEST['nombre'];
        $dni = $_REQUEST['dni'];
        $puesto = $_REQUEST['puesto'];
        $persona = new Cliente($nombre, $dni, $sexo, $habitual, $puesto);
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
                    echo "Se enviaron los datos correctamente";
                    echo $persona;
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
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control bg-light" id="dni" name="dni">
                <label for="puesto" class="form-label">Puesto</label>
                <input type="text" class="form-control bg-light" id="puesto" name="puesto">
                <hr>
                <input type="submit" value="Enviar Formulario" name="enviar" class="btn btn-primary">

            </form>

        </section>
        <br><br>
        <nav>
            <p><a href="#" class="btn btn-success mt-4">Ir a página</a></p>
        </nav>
    </main>










</body>

</html>