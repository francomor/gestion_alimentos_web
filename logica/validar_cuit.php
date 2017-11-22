<?php
include_once("../persistencia/conexionBD.php");
include_once("../logica/clases.php");
extract($_REQUEST);
$cuit=$_REQUEST['cuit'];  
$validar_cuit = "[0-9]+" ;
if($cuit != null && is_numeric($cuit)){

        $con = ConexionBD::getConexion();
        $result=$con->existe("select nombre from empresa where cuit=".$cuit);
 if($result)  
 {   
   $result1=$con->recuperar("select * from empresa where cuit=".$cuit); 
   print("<div class='table-wrapper'>");
                print ("<TABLE>\n");
                print ("<TR>\n");
                print ("<TH>cuit</TH>\n");
                print ("<TH>email</TH>\n");
                print ("<TH>razon social</TH>\n");
                print ("<TH>telefono</TH>\n");
                print ("<TH>localidad</TH>\n");
                print ("</TR>\n");
                print ("<TR>\n");
            print ("<TD>" . $result1[0][0] . "</TD>\n");
            print ("<TD>" . $result1[0][1] . "</TD>\n");
            print ("<TD>" . $result1[0][2] . "</TD>\n");
            print ("<TD>" . $result1[0][3] . "</TD>\n");
            print ("<TD>" . $result1[0][4] . "</TD>\n");
            print ("</TR>\n");

         print ("</TABLE>\n"); 
         print("</div>");
 }
 else  
 {    
   echo ("<table>\n");
     
    echo ("<tr>\n");
	 echo ("<td>El CUIT ingresado no existe, verifique la información.</td>\n");
	echo ("</tr>\n");
	echo ("</table>\n");
 }  
}