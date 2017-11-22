	
 <style>
 select{
	 background:#666;
	 color:#ffffff;
	 height:auto;
	 }
 
 </style>   						
<?php 
							
include_once("../logica/clases.php");
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
                                                       
                                                        

	   
															$r = new Rubro();
                                                            $rubros=$r->recuperarNombre();
                                                            $registros=$r->cant_registros();
															echo(" <select  class='browser-default' id='sel1' size='10' multiple='multiple' >");
                                                            for($i=0 ; $i<$registros ; $i++){
                                                                    print('<option value="'.$rubros[$i]["nombre"].'"> '.$rubros[$i]["nombre"].'</option>');
                                                                }
															echo("</select>");
														
														?>