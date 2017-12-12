<?php 

    include("clases.php");

    $estab= new Establecimiento();
    $prod= new Producto_alimenticio();

    $respuestaConsulta = $estab->obtenerCantidadPorAño();
    $salida;
    foreach($respuestaConsulta as $respuesta){
        $salida.= $respuesta["año"].":".$respuesta["cantidad"].",";
    }
    $salida.="/";
    $respuestaConsulta = $prod->obtenerCantidadPorAño();
    foreach($respuestaConsulta as $respuesta){
        $salida.= $respuesta["año"].":".$respuesta["cantidad"].",";
    }
    
    print $salida;
?>