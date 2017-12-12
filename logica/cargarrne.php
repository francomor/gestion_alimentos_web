<?php

include_once("../persistencia/conexionBD.php");
include_once("../logica/clases.php");
if (isset($_POST['submit'])) {
    $est = new Establecimiento();
    $loc = new Localidad();
    $localidad = $loc->obtener_Id_localidad($_POST['localidad']);
    $est->setId_Localidad($localidad);
    $cat = $est->get_Id_Categoria($_POST['categoria']);
    $est->setId_Categoria(implode($cat[0]));
    $est->setCUIT_Empresa($_POST['cuit']);
    $est->setNombre($_POST['nombre']);
    $est->setDireccion($_POST['domicilio']);
    $est->setNro_factura($_POST['nro_factura']);
    $est->setTelefono($_POST['telefono']);
    $est->setRne(new RNE($_POST['rne'], $_POST['venc']));
    $est->setFechaDeCarga();
    $selec = $_POST['rubros'];
    $rub = explode(";", $_POST['rubros']);
    for ($i = 0; $i < sizeof($rub) - 1; $i++) {
        $est->addRubro(new Rubro($rub[$i]));
    }


    if ($est->getRne()->getNumero() === "") {
        if ($est->guardar($est)) {
            $est->establecimientoXrubro($est->getRubros(), $est->obtenerUltimoId());
            print("<script>alert('El establecimiento se ha guardado correctamente');</script>");
        }
    } else {
        if ($est->existe($est->getRne()->getNumero())) { {
                print("<script>alert('El establecimiento ya existe, ingrese un numero rne distinto');</script>");
            }
        } else {
            if ($est->guardar($est)) {
                $est->establecimientoXrubro($est->getRubros(), $est->obtenerUltimoId());
                print("<script>alert('El establecimiento se ha guardado correctamente');</script>");
            }
        }
    }

   //print("<script>window.location='../presentacion/establecimientos.php';</script>");
    header("Location:".$_SERVER['HTTP_REFERER']); 
}
 