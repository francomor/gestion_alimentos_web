<?php
include("../logica/logica.php");
include_once("../persistencia/conexionBD.php");
ini_set('display_errors', 'On');
error_reporting(E_ALL);


//$Conexion = ConexionBD::getConexion();

//echo $Conexion;

$a = new rubro();
$result = $a->recuperarNombre();
$a -> insertar();
var_dump($result[1]);
echo "<br>";
$resultado=$a->existe();
var_dump( $resultado);
?>