<?php 

    include("clases.php");

    $estab= new Establecimiento();

    $respuestaConsulta = $estab->obtenerCantidadPorAño();
    $salida;
    foreach($respuestaConsulta as $respuesta){
        $salida.= $respuesta["año"].":".$respuesta["cantidad"].",";
    }
    print $salida;
?>