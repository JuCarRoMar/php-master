<?php
// Ejemplo-18b-verJSON.php

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

    // Transformador -> de api a JSON
    static public function verJSON($api): string
    {
        // Devuelve el array bidimensional en formato JSON
        // Endpoint
        return json_encode($api);
    }
}

$api = $_REQUEST['api'];

switch ($api) {
    case 1:
        echo APIS::verJSON(APIS::harryPotter());
        break;

    case 2:
        echo APIS::verJSON(APIS::starTrek());
        break;
}
?>