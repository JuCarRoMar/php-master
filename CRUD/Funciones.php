<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Funciones de Conexion
// Conectar con Mysql
function conectarSinBBDD($servidor, $usuario, $clave)
{
    // Creamos la conexión
    $conexion = mysqli_connect($servidor, $usuario, $clave);
    // Si conexión-> TRUE, todo correcto!
    // Si conexión-> FALSE, error!
    if (!$conexion) {
        // Mostrar mensaje de error
        echo "Error mysqli_connect_errorno(): mysqli_connect_error() . <br>";
    }
    return $conexion;
}

// Conectar con la BBDD
function conectar($host, $usuario, $clave, $bbdd)
{
    // Creamos la conexión
    $conexion = mysqli_connect($host, $usuario, $clave, $bbdd);
    // Si Conexión-> TRUE, todo correcto!
    // Si Conexión-> FALSE, error!
    if (!$conexion) {
        // Mostrar mensaje de error
        echo "Error mysqli_connect_errno(): mysqli_connect_error() <br />";
    }
    return $conexion;
}

// Cerramos la conexión
function desconectar($conexion)
{

    mysqli_close($conexion);
}

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Funciones para el manejo de la BBDD
function instalar($conexion, $archivo)
{
    $sql = file_get_contents($archivo);
    $resultado = mysqli_multi_query($conexion, $sql);
    return $resultado;
}

function borrar($conexion, $id)
{
    $sql = "DELETE FROM Discos WHERE id =" . $id . "";
    mysqli_query($conexion, $sql);
}

// --------------------------------------------------------------------------

// Definimos funciones para cargar tablas
function cargarDiscos($conexion)
{
    $sql = "   SELECT * 
                FROM Artistas, Discos, Generos
                WHERE Artistas.idArtista = Discos.idArtista
                AND Discos.idGenero = Generos.idGenero
                ";
    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);
    $numDiscos = mysqli_num_rows($resultado);
    // Sacamos la salida de la consulta -> tabla con todos los registros
    // Array Bidimensional ASOCIATIVO
    $tablaDiscos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $tablaDiscos;
}

// Cargar datos disco concreto (id)
function cargarDisco($conexion, $id)
{
    $sql = "   SELECT *
                FROM Artistas, Discos, Generos
                WHERE Artistas.idArtista = Discos.idArtista
                AND Discos.idGenero = Generos.idGenero
                AND id = $id
                ";
    $resultado = mysqli_query($conexion, $sql);
    $tablaDisco = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $tablaDisco;
}

function cargarArtistas($conexion)
{
    // Hago lo mismo con Artistas
    $sql = " SELECT * FROM Artistas";
    $resultado = mysqli_query($conexion, $sql);
    $tablaArtistas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $tablaArtistas;
}

// Cargar Artista desde id
function cargarArtista($conexion, $id)
{
    $sql = " SELECT * FROM Artistas WHERE idArtista = $id";
    $resultado = mysqli_query($conexion, $sql);
    $tablaArtista = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $tablaArtista;
}

function cargarGeneros($conexion)
{
    // Hago lo mismo con Generos
    $sql = " SELECT * FROM Generos";
    $resultado = mysqli_query($conexion, $sql);
    $tablaGeneros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $tablaGeneros;
}

// Cargar Genero desde id
function cargarGenero($conexion, $id)
{
    $sql = " SELECT * FROM Generos WHERE idGenero = $id";
    $resultado = mysqli_query($conexion, $sql);
    $tablaGenero = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $tablaGenero;
}