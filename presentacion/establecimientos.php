<!DOCTYPE HTML>
<?php
include ('../logica/logica.php');
//error_reporting(E_ALL);


?>
<html>
    <head>  
	<title>Carga Establecimientos</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="../resources/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="../resources/css/main.css" />
        <link rel="stylesheet" href="../resources/css/materialize.css" />
    
	<!--[if lte IE 9]><link rel="stylesheet" href="../resources/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="../resources/css/ie8.css" /><![endif]-->
    </head>
    <body onload="cargar()">   
        <div id="page-wrapper">

        <!-- Header -->
            <header id="header">
                <h1 id="logo"><a>Gobierno de Rio Negro</a></h1>
                <nav id="nav">
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li>
                            <a href="">Tramites</a>
                            <ul>
                                <li><a  href="" >Carga Prod.Alimenticio</a></li>
                                <li><a href="establecimientos.php">Carga Establecimiento</a></li>

                            </ul>
                        </li>
                        <li>
                             <a href="">Conultas</a>
                             <ul>
                                <li><a  href="consultaRE.php" >Consultar RNE</a></li>
                                <li><a href="consultaRA.php">Consultar RNPA</a></li>
                            </ul>

                        </li>
                        <li><a>Estadisticas</a></li>
                    </ul>
                </nav>
            </header>
        <!-- Main -->
        <div id="main" class="wrapper style1">
            <div class="container">
                <header class="major">
                        <h2>Carga de Establecimientos</h2>
                </header>            
            
            	<!-- Form : Buscar por CUIT Empresa--> 
		<section>
                    <h4>CUIT Empresa</h4>
                    <form method="post" action="../logica/logica.php">
			<div class="row uniform 50%">
                            <div class="6u 12u$(xsmall)">
                                <input name="cuit" onKeyUp="comprobar_cuit(this.value)" value="1" />
                            </div>
                            <div class="6u$ 12u$(xsmall)">
				<input type="image" name="search" id="search" src="../resources/images/search.png" />
                            </div>
                        </div>
                    
                </section>
                <!-- Table -->
		<section>
                    <h4>Datos de la Empresa</h4>
                            <div>

	        <span id="cambiar_cuit"></span> 

        </div>  
                    
                </section>
                
                <!-- Form : Registro Establecimiento --> 
              
                    <section>
                    <h4>Registro RNE</h4>
			<div class="row uniform 50%">
                            <div class="6u 12u$(xsmall)">
                                RNE: <input type="text" class="validate" name="rne" id="rne_em" value="1" placeholder="" />
                            </div>
                            <div class="6u$ 12u$(xsmall)">
                                Fecha:<input type="text"  name="venc" id="fec" value="2017-11-02" placeholder="2017-11-02" />
                            </div>
                            <div class="6u$ 12u$(xsmall)">
				<h4>Datos del Establecimiento</h4>
                            </div>
                                        
                             <div class="6u 12u$(xsmall)">
				Nombre de la Empresa: <input type="text" name="nombre"  value="aaa" placeholder=" " />
                                Categoria: <input type="text" name="categoria"  value="a" placeholder=" " />
                                No. Factura: <input type="text" name="nro_factura"  value="1" placeholder=" " />
                                Provincia: <input type="text" name="provincia"  value="a" placeholder="" />
                            </div>
                            <div class="6u 12u$(xsmall)">
				 Domicilio: <input type="text" name="domicilio"  value="a" placeholder="" />
                            </div>
                            <div class="6u 12u$(xsmall)">
				Localidad: <input type="text" name="localidad"  value="bariloche" placeholder="" />
                            </div>
                            <div class="6u 12u$(xsmall)">
				Telefono: <input type="text" name="telefono"  value="111" placeholder="" />
                            </div>
                        </div></br>
                        </section>
                        <section>
                            <div class="table-wrapper">
                                 <table>
                                     <thead>
                                        <tr>
                                            <th>Rubro:</th>
                                            <th> 
                                            </th>
                                            <th>Rubro:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td><div class="collection">
                                       		<a href="#!" class="collection-item">Rub...</a>
                                       
                                     		</div>
                                            </td>
                                            <td>
                                                <ul class="actions vertical small">
                                                    <li><a id="btAdd" class="button small">Agregar</a></li>
                                                    <li><a id="btQuit" class="button small special">Quitar</a></li>
                                                    <li><a id="btNuv" class="button small">Nuevo</a></li>
                                                </ul>
                                                        
                                            </td>
                                            <td> </td>
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>hola
            <div class="input-field col s12">
    <select>
      <option value="" disabled selected>Choose your option</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Materialize Select</label>
  </div>
                        </section>
                     <ul class="actions vertical small">
                                                   
                         <li><input type="submit" id="submit" name="submit" class="button small special" value="Guardar"/></li>
                                                    
                    </ul>   
                </form>
                        
<form>
<label for="sel1">Origen:</label>
<div id="aca">
<select id="sel1" size="10" multiple="multiple">
<?php 

    $conexion = mysql_connect("localhost", "root", "1707yoss")
        or die("No se puede conectar con el servidor");

// Seleccionar base de datos
mysql_select_db("uresa")
        or die("No se puede seleccionar la base de datos");

$instruccion = "SELECT nombre FROM `rubro`";
    $consulta = mysql_query($instruccion, $conexion)
            or die("Fallo en la consulta");
        $nfilas = mysql_num_rows($consulta);
        for($i=0 ; $i<$nfilas ; $i++){
    $resultado = mysql_fetch_array($consulta);
            print('<option value="'.$resultado["nombre"].'"> '.$resultado["nombre"].'</option>');
        }
    
?>
</select>
</div>
<label for="sel2">Destino:</label>
<select id="sel2" size="5">
<option value="-">-</option>
</select>
<input type="button" value="Pasar" onClick="pasar()">
</form>

            </div><!-- Fin class=container -->
        </div><!-- Fin class=wrapper stylele -->
        </div><!-- Fin class=page-wrapper -->
        
        <script type="text/javascript">
			    
                            function comprobar_cuit(cuit)   
			    {  
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("cambiar_cuit").innerHTML = this.responseText;
                            }
                                 };
                            xmlhttp.open("GET", "../logica/logica.php?cuit=" + cuit, true);
                            xmlhttp.send();
			   }  
                            function cargar()   
			   
            {  
            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("aca").innerHTML = this.responseText;
                            }
                                 };
                            xmlhttp.open("GET", "../logica/logica.php?", true);
                            xmlhttp.send();
	   }  
           
           function pasar() {
    obj=document.getElementById('sel1');
    if (obj.selectedIndex==-1) return;
  for (i=0; opt=obj.options[i]; i++)
    if (opt.selected) {
        valor=opt.value; // almacenar value
        txt=obj.options[i].text; // almacenar el texto
        obj.options[i]=null; // borrar el item si está seleccionado
        obj2=document.getElementById('sel2');
      if (obj2.options[0].value=='-') // si solo está la opción inicial borrarla
        obj2.options[0]=null;
        opc = new Option(txt,valor);
        eval(obj2.options[obj2.options.length]=opc);
  } 
    
}
		   </script>  
        <!-- Scripts -->
			<script src="../resources/js/jquery.min.js"></script>
			<script src="../resources/js/jquery.scrolly.min.js"></script>
			<script src="../resources/js/jquery.dropotron.min.js"></script>
                        <!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
			<script src="../resources/js/skel.min.js"></script>
			<script src="../resources/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../resources/js/main.js"></script>
                        <script src="../resources/js/materialize.js"></script>
                <script> 	
         $(document).ready(function() {
    $('select:not([multiple])').material_select();
  });
</script>
            <!-- <script src="../resources/js/prototype.js"></script>-->
             
             
             
         


    </body>
</html>