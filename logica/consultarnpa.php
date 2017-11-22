<?php
include_once("../persistencia/conexionBD.php");
include_once("../logica/clases.php");

//session_start();
extract($_REQUEST);
$rnpa=$_REQUEST['rnpa'];  
if($rnpa != null){
        $con = ConexionBD::getConexion();
        $existe_producto=$con->existe("select nro_RNPA from producto_alimenticio where nro_RNPA=".$rnpa);
 if($existe_producto)  
 {   
   $producto=$con->recuperar("SELECT
    `Establecimiento_idEstablecimiento`,
    `nro_RNPA`,
    `nombre_comercial`,
    `Vencimiento_RNPA`,
    `marca`
FROM
    `producto_alimenticio`
WHERE
    `nro_RNPA` = ". $rnpa
           ); 
   
   $establecimiento=$con->recuperar("SELECT
    `Empresa_CUIT`,
    `direccion`,
    `nombre`,
    `telefono`,
    `nro_RNE`,
    `vencimiento_RNE`
FROM
    `establecimiento`
WHERE
    `id` = ".$producto[0][0]
           ); 
   $empresa=$con->recuperar("SELECT
    `CUIT`,
    `email`,
    `nombre`,
    `razon_social`,
    `telefono`
FROM
    `empresa`
WHERE
    `CUIT` = " .$establecimiento[0][0]
           ); 
                 
   
 print("<h4>Datos de la Empresa</h4>");
                   print("<div class='table-wrapper'>");
                   print(" <table>");
                     print("<thead>");
                         print("<tr>");
                         print("<th>CUIT</th>");
			print("<th>Nombre</th>");
			print("<th>Razón Social </th>");
                        print("<th>Email</th>");
                          print("<th>Telefono</th>");
                         print("</tr>");
			print("</thead>");
			print("<tbody>");
                         print("<tr>");
			 print ("<TD>" . $empresa[0][0] . "</TD>\n");
                          print ("<TD>" . $empresa[0][2] . "</TD>\n");
                          print ("<TD>" . $empresa[0][3] . "</TD>\n");
                          print ("<TD>" . $empresa[0][1] . "</TD>\n");
                          print ("<TD>" . $empresa[0][4] . "</TD>\n");
                          print("</tr>");
										
		print("</tbody>");
                 print("</table>");
                  print("</div>");
print("<h4>Establecimientos Asociados</h4>");
			print("<div class='table-wrapper'>");
                            print("<table>");
				print("<thead>");
                                    print("<tr>");
					print("<th>No. RNE</th>");
                                       print(" <th>Vencimiento RNE</th>");
					print("<th>Nombre Establecimiento </th>");
					print("<th>Telefono</th>");
                                       print(" <th>Direccion</th>");
                                    print("</tr>");
				print("</thead>");
				print("<tbody>");
                                  print("<tr>");
					 print ("<TD>" . $establecimiento[0][4] . "</TD>\n");
                                         print ("<TD>" . $establecimiento[0][5] . "</TD>\n");
                                         print ("<TD>" . $establecimiento[0][2] . "</TD>\n");
                                         print ("<TD>" . $establecimiento[0][3] . "</TD>\n");
                                         print ("<TD>" . $establecimiento[0][1] . "</TD>\n");
                                    print("</tr>");
				print("</tbody>");
			print("</table>");
			print("</div>");
print("<h4>Producto Alimenticio Asociado</h4>");
			print("<div class='table-wrapper'>");
                           print(" <table>");
				print("<thead>");
                                  print("<tr>");
					 print("<th>No. RNPA</th>");
                                         print("<th>Nom. Producto</th>");
                                         print("<th>Vencimiento RNPA</th>");
                                         print("<th>Marca</th>");
                                         print("<th>No. RNE</th>");
                                         
                                 print("</tr>");
				 print("</thead>");
                               print("<tbody>");
                                 print("<tr>");
					 print ("<TD>" . $producto[0][1] . "</TD>\n");
                                         print ("<TD>" . $producto[0][2] . "</TD>\n");
                                         print ("<TD>" . $producto[0][3] . "</TD>\n");
                                         print ("<TD>" . $producto[0][4] . "</TD>\n");
                                         print ("<TD>" . $establecimiento[0][5] . "</TD>\n");
                                print("</tr>");
                               print(" </tbody>");
			print("</table>");
                   print(" </div>");
 }
 else  
 {    
   echo ("<table>\n");
     
    echo ("<tr>\n");
	 echo ("<td>El RNPA ingresado no existe, verifique la información.</td>\n");
	echo ("</tr>\n");
	echo ("</table>\n"); 
 }  
}
 
 

?>