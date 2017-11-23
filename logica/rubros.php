	
 <style>
 select{
	 background:none;
	 border:none;
	 color:#ffffff;
	 }
	select hover{
	 	border:hidden;
	 }
select.browser-default {
  display: block;
  height:auto;
  size:auto;
  -webkit-scrollbar :display:none;
  -moz-scrollbar:display:none;
  -o-scrollbar :display:none;
  -google-ms-scrollbar:display:none;
  -khtml-scrollbar:display:none;
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