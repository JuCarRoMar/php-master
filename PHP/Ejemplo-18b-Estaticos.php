<?php
/* Gestion de errores */
ini_set("error_reporting", E_ALL);
ini_set('display_errors', 1);
ini_set("display_startup_errors", 1);
?>

<?php
// Zona de Funciones y Clases
class APIS
{
    // Variables
    // Array Bidimensional Asociativo
    public $api;

    // Constructor
    public function __construct()
    {
    }

    // API Harry Potter
    static public function harryPotter(): array
    {
        $api = array(
            "01" => array(
                "Nombre" => "Harry Potter",
                "Edad" => 11,
                "Sexo" => false
            ),
            "02" => array(
                "Nombre" => "Ron Weasley",
                "Edad" => 12,
                "Sexo" => false
            ),
            "03" => array(
                "Nombre" => "Hermione Granger",
                "Edad" => 12,
                "Sexo" => true
            )
        );
        return $api;
    }

    static public function starTrek(): array
    {
        $api = array(
            "01" => array(
                "Nombre" => "James T Kirk",
                "Edad" => 40,
                "Sexo" => false
            ),
            "02" => array(
                "Nombre" => "Spock",
                "Edad" => 100,
                "Sexo" => false
            ),
            "03" => array(
                "Nombre" => "Nyota Uhura",
                "Edad" => 36,
                "Sexo" => true
            )
        );
        return $api;
    }

    static public function verJSON($api): string
    {
        // Devuelve el array bidimensional en formato JSON
        // Endpoint
        return json_encode($api);
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
        $api = $_REQUEST['api'];
    }
    ?>
    <!-- plantilla.php con Bootstrap 5.3 -->
    <h1 class="bg-info text-white rounded-pill">Plantilla</h1>
    <main class="container">
        <section class="row">
            <h2 class="col-6 bg-success rounded-pill text-white">Alerta</h2>
            <p class="col-9 alert alert-info bg-light">
                <?php
                if (isset($_REQUEST['enviar'])) {
                    //echo $api;
                    switch ($api) {
                        case 1:
                            //echo "Harry Potter";
                            // Para imprimir un array usamos un var_dump
                            //var_dump(APIS::harryPotter());
                            //echo APIS::verJSON(APIS::harryPotter());

                            // REDIRECCION
                            header('Location: Ejemplo-18b-verJSON.php?api=1');
                            break;

                        case 2:
                            //echo "Star Trek";
                            //var_dump(APIS::starTrek());
                            //echo APIS::verJSON(APIS::starTrek());

                            // REDIRECCION
                            header('Location: Ejemplo-18b-verJSON.php?api=2');
                            break;
                    }
                }
                ?>
            </p>
        </section>
        <br><br>
        <section class="row">
            <h2 class="col-6 bg-success text-white rounded-pill">Formulario</h2>
            <hr>
            <form class="col-9 bg-danger p-3 rounded" method="post" action="#">
                <label for="nombre" class="form-label"></label>
                <br>
                <select class="form-select bg-warning" name="api" id="api">
                    <option value="" selected disabled>Seleccione API</option>
                    <option value="1">Harry Potter</option>
                    <option value="2">Star Trek</option>
                </select>
                <hr>
                <input type="submit" value="Enviar Formulario" name="enviar" class="btn btn-primary">

            </form>

        </section>
        <br><br>
        <nav>
            <p><a href="#" class="btn btn-info text-white mt-4">Ir a página</a></p>
        </nav>
    </main>

</body>

</html>