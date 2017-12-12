	
 <style>
 select{
	 border-bottom-color:#FFF;
	 border-color:#FFF;
	 font-weight:200;
	 color:#000;
	 }
 </style>
<?php 
							
include_once("../logica/clases.php");
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
                                                       
$r = new Rubro("-");
$rubros=$r->recuperarNombre();
$registros=$r->cant_registros();
echo(" <select  class='browser-default' id='sel1' size='12' multiple='multiple' >");
for($i=0 ; $i<$registros ; $i++){
	print('<option value="'.$rubros[$i]["nombre"].'"> '.$rubros[$i]["nombre"].'</option>');
}
echo("</select>");
														
?>