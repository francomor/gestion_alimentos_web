<!DOCTYPE HTML>
<?php
include("../logica/clases.php");
include("../logica/validar_cuit.php");
error_reporting(E_ALL ^ E_NOTICE);
?>
<html>
    <head>  
	<title>Carga Establecimientos</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../resources/css/materialize.css" />
   </head>
<body onload="cargar()" style="background: #1c1d26;"> 
    <div>
        <?php
            include("header.php");
        ?>
    </div>
    <div id="page-wrapper">

        <!-- Main -->
        <div id="main" class="wrapper style1">
            <div class="container">
                <header class="major">
                        <h2>Carga de Establecimientos</h2>
                </header>            
            
            	<!-- Form : Buscar por CUIT Empresa--> 
                <form method="post" action="../logica/cargarrne.php" class="col s12" onsubmit="return validar()" id="formu">
			<div class="row uniform 50%">
                            <h4>CUIT Empresa</h4>
                            <div class="4u 6u\$(xsmall)">
                                <input name="cuit" onkeyup="comprobar_cuit(this.value)" required="true" value="1" />
                            </div>
                            <div class="4u 12u\$(xsmall)" align="left" style="padding-top:2.5em;">
                                <img src="../resources/images/search.png" width="20" height="20" alt="search">
                             </div>
                        </div></br>
                        <section>
                            <div><span id="cambiar_cuit"></span></div>  
                        </section>
                        <section>
                        <h4>Registro RNE</h4>
                           <div class="row">
                                    <div class="input-field col s6">
                                      <input name="rne" id="rne" type="text" class="validate" value="">
                                      <label >RNE: </label>
                                    </div>
                                    <div class="input-field col s6">
                                      <input id="venc" name="venc" type="text" class="validate"  maxlength="12"  value="2017-11-02" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" placeholder="2017-11-02">
                                      <label >Fecha de vencimiento : </label>
                                    </div>
                                    <div class="input-field col s6">
                                    <h4>Datos del Establecimiento</h4></br>
                                    </div>
                                    <div class="input-field col s12">
                                        <input name="nombre" id="nombre" type="text" class="validate" required pattern="([A-ZÁÉÍÓÚa-zñáéíóú]+[\s]*)+" required="true" value="A">
                                    <label >Nombre del Establecimiento:</label>
                                    </div>

                                    <div class="input-field col s6">
                                    <select  name="categoria" id="categoria" required="true">
                                      <option value="seleccionar..." disabled selected>seleccionar...</option>
                                      <option value="A">A</option>
                                      <option value="B">B</option>
                                      <option value="C">C</option>
                                      <option value="D">D</option>
                                    </select>
                                    <label>Categoria</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input  name="nro_factura" type="number" class="validate" value="" >
                                      <label >Nro. Factura: </label>
                                    </div>

                                    <div class="input-field col s6">
                                      <input name="domicilio" type="text" class="validate" required pattern="([A-ZÁÉÍÓÚa-zñáéíóú0-9]+[\s]*)+" required="true" value="">
                                      <label >Domicilio: </label>
                                    </div>
                                    <div class="input-field col s6">
                                        <select id="localidad" name="localidad" required="true">
                                        <option value="seleccionar..." disabled selected>seleccionar...</option>
                                        <option value="Bariloche">Bariloche</option>
                                        <option value="El bolson">El Bolson</option>
                                        </select>
                                    <label>Localidad: </label>
                                    </div>
                                    <div class="input-field col s6">
                                      <input  name="telefono" type="number" class="validate" value="" >
                                      <label >Telefono: </label>
                                    </div>
                                  </div> 
                        </section>
                        <div class="row">
                            <div class="col s4">
                                <table width="98%" height="312">
                                    <thead>
                                         <tr>
                                            <th>Rubro:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td>
                                                <label for="sel1">Origen:</label>
                                                <div id="aca">
                                                   <!--Select de rubros  -->
                                                </div>
                                            </td>
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                            <div class="col s4" align="center">
                                <ul class="actions vertical small">
                                    <li><input type="button"  class="button small" value="Agregar" onClick="pasar()"></li>
                                    <li><input type="button"  class="button small"  value="Quitar" onClick="quitar()"></li>
                                </ul>
                            </div>
                            <div class="col s4">
                              	<table>
                                    <thead>
                                        <tr>
                                            <th>Rubro:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td>
                                                <label for="sel2">Destino:</label>
                                                <select class="browser-default" id="sel2" size="5">
                                                <option value="-">-</option>
                                                </select>
                                            </td>
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col s12"> 
                     	<ul class="actions vertical small">
                        <input type="text" value="" name="rubros" id="rubros" hidden>                        
                         <li>
                             <input type="submit" id="submit" name="submit" class="button small special" value="Guardar" />
                         </li>
                                                    
                        </ul>
                        </div>
                     </form>
                </div>
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
                            xmlhttp.open("GET", "../logica/validar_cuit.php?cuit=" + cuit, true);
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
                            xmlhttp.open("GET", "../logica/rubros.php", true);
                            xmlhttp.send();
	   }  
           
          
  </script> 
  <script type="text/javascript">
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
     if(obj.options.length==0){
        opc = new Option("-","-");
        eval(obj.options[obj.options.length]=opc);
   } 
}
  </script>  
  <script>
function quitar() {
    obj=document.getElementById('sel2');
    if (obj.selectedIndex==-1) return;
  for (i=0; opt=obj.options[i]; i++)
    if (opt.selected) {
        valor=opt.value; // almacenar value
        txt=obj.options[i].text; // almacenar el texto
        obj.options[i]=null; // borrar el item si está seleccionado
        obj2=document.getElementById('sel1');
      if (obj2.options[0].value=='-') // si solo está la opción inicial borrarla
        obj2.options[0]=null;
        opc = new Option(txt,valor);
        eval(obj2.options[obj2.options.length]=opc);
  }
   if(obj.options.length==0){
        opc = new Option("-","-");
        eval(obj.options[obj.options.length]=opc);
   }
}
</script>
<script>
    function cargar_rubros(){
        
        rubros = new Array();
        for(var i=0; i<document.getElementById("sel2").length; i++){
                        rubros[i]=document.getElementById("sel2").options[i].value;
        }
        for(var j=0; j<rubros.length; j++){
            document.getElementById("rubros").value = document.getElementById("rubros").value+rubros[j]+";";
            }
          
    }
    
    function validar(){
        var retorno=false;
        var rubros = document.getElementById("sel2").options[0].value;
        var localidad = document.getElementById('localidad').value;
        var categoria = document.getElementById('categoria').value;
        var escape="seleccionar..." ;
        if(localidad===escape && categoria === escape){
            alert("Faltan llenar campos");
        }
        else if(localidad===escape ){
             alert("Debe seleccionar una localidad");
        }else if(categoria === escape){
            alert("Debe seleccionar una categoria");
        }else if(rubros==="-"){
            alert("Debe agregar al menos un rubro");
        }
        if (localidad!==escape && categoria!==escape && rubros!=="-"){
            cargar_rubros();
            retorno=true;
        }
         return retorno;
        
    }
 </script> 
  
<!-- Scripts -->
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script src="../resources/js/materialize.js"></script>
 
 <script> 	
         $(document).ready(function() {
    $('select:not([multiple])').material_select();
  });
</script>
 

</body>
</html>