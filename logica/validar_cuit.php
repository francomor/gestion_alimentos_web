<?php

include_once("../persistencia/conexionBD.php");
include_once("../logica/clases.php");
extract($_REQUEST);
$cuit = $_REQUEST['cuit'];
if ($cuit != null && is_numeric($cuit)) {

    $con = ConexionBD::getConexion();
    $result = $con->existe("select nombre from empresa where cuit=" . $cuit);
    if ($result) {
        $result1 = $con->recuperar1("select * from empresa where cuit=" . $cuit);
        print("<div class='responsive-table'>");
        print ("<TABLE>\n");
        print ("<TR>\n");
        print ("<TH>Cuit</TH>\n");
        print ("<TH>Email</TH>\n");
        print ("<TH>Nombre</TH>\n");
        print ("<TH>Telefono</TH>\n");
        print ("<TH>Razon Social</TH>\n");
        print ("</TR>\n");
        print ("<TR>\n");
        print ("<TD>" . $result1[0]["CUIT"] . "</TD>\n");
        print ("<TD>" . $result1[0]["email"] . "</TD>\n");
        print ("<TD>" . $result1[0]["nombre"] . "</TD>\n");
        print ("<TD>" . $result1[0]["telefono"] . "</TD>\n");
        print ("<TD>" . $result1[0]["razon_social"] . "</TD>\n");
        print ("</TR>\n");

        print ("</TABLE>\n");
        print("</div>");
    } else {
        echo ("<table>\n");

        echo ("<tr>\n");
        echo ("<td>El CUIT ingresado no existe, verifique la información.</td>\n");
        echo ("</tr>\n");
        echo ("</table>\n");
    }
}