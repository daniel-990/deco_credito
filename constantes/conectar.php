<?php 

    require 'credenciales.php';

    //remota
    //define('URLR', 'https://decohouse.com.co/deco_credito');
    //local
    define('URLR', 'http://localhost:8080/deco_credito');
    //heroku
    //define('URLR','https://decocredito.herokuapp.com/');

    /** 
     * datos de coneccion base de datos
    **/
    $usuario = USER;
    $password = PASS;
    $servidor = SERVER;
    $basededatos = DB;

    $conexion = mysqli_connect($servidor, $usuario, $password, $basededatos);

    if (!$conexion) {
        $alert1 = "Error: No se pudo conectar a MySQL." . PHP_EOL;
        $alert1 .= "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
        $alert1 .= "error de depuración: " . mysqli_connect_error() . PHP_EOL . " Por favor ponerse en contacto con el administrador de sistemas.";
        echo $alert1;
        exit;
    }
?>