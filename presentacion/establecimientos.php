<!DOCTYPE HTML>

<html>
    <head>  
	<title>CargaEstablecimientos</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="../resources/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="../resources/css/main.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="../resources/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="../resources/css/ie8.css" /><![endif]-->
    </head>
    <body>    
        <div id="page-wrapper">

        <!-- Header -->
            <header id="header">
                <h1 id="logo"><a>Gobierno de Rio Negro</a></h1>
                <nav id="nav">
                    <ul>
                        <li><a href="index.html">Inicio</a></li>
                        <li>
                            <a href="#">Tramites</a>
                            <ul>
                                <li><a  href="" >Carga Prod.Alimenticio</a></li>
                                <li><a href="">Carga Establecimiento</a></li>

                            </ul>
                        </li>
                        <li>
                             <a href="elements.html">Conultas</a>
                             <ul>
                                <li><a  href="#one" >Consultar RNE</a></li>
                                <li><a href="#one" onClick="muestraEsta()">Consultar RNPA</a></li>
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
                    <h3>CUIT Empresa</h3>
                    <form method="post" action="#">
			<div class="row uniform 50%">
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="cuit_em" id="cuit_em" value="" placeholder="CUIT " />
                            </div>
                            <div class="6u$ 12u$(xsmall)">
				<input type="image" name="search" id="search" src="images/search.png" />
                            </div>
                        </div>
                    </form>
                </section>
                <!-- Table -->
		<section>
                    <h3>Datos de la Empresa</h3>
                    <div class="table-wrapper">
                        <table class="alt">
                            <tbody>
                                    <tr>
                                        <td>CUIT</td>
                                        <td> </td>
                                        <td>Localidad</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre</td>
                                        <td> </td>
                                        <td>Dirección</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>Razon Social</td>
                                        <td> </td>
                                        <td>E-mail</td>
                                        <td> </td>
                                    </tr>
                                     <tr>
                                        <td>Provincia</td>
                                        <td> </td>
                                        <td>Telefono</td>
                                        <td> </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                
                <!-- Form : Registro Establecimiento --> 
		<section>
                    <h3>Registro RNE</h3>
                    <form method="post" action="#">
			<div class="row uniform 50%">
                            <div class="6u 12u$(xsmall)">
				RNE: <input type="text" name="rne_em" id="rne_em" value="" placeholder="RNE Empresa " />
                            </div>
                            <div class="6u$ 12u$(xsmall)">
                                <input type="date" name="fech" id="fec" value="" />
                            </div>
                            <div class="6u$ 12u$(xsmall)">
				<h3>Datos del Establecimiento</h3>
                            </div>
                                        
                             <div class="6u 12u$(xsmall)">
				<input type="text" name="nomb_em" id="nomb_em" value="" placeholder="Nombre Empresa " /></br>
                                <input type="text" name="cat_em" id="cat_em" value="" placeholder="Categoria " /></br>
                                <input type="text" name="nofac_em" id="nofac_em" value="" placeholder="No. Factura " /></br>
                                <input type="text" name="prov_em" id="prov_em" value="" placeholder="Provincia " /></br>
                                           
                            </div>
                            <div class="6u 12u$(xsmall)">
                                 Domicilio: <input type="text" name="domc_em" id="rne_em" value="" placeholder="Domicilio" />
                            </div>
                             <div class="6u 12u$(xsmall)">
                                Localidad: <input type="text" name="loc_em" id="rne_em" value="" placeholder="Localidad" />
                            </div>       
                        </div><!--Fin DatosEspecEmpresa-->
                        
                        <div class="row">
                            <div class="4u 6u(medium) 12u$(xsmall)">
                                <ul class="actions vertical">
                                     Rubro: <textarea name="rubros_em" id="rubros_em" placeholder="rubros" rows="8" disabled></textarea>
                                </ul>
                            </div>
                            <div class="3u 6u$(medium) 12u$(xsmall)">
                                <ul class="actions vertical small">
                                    <li><a href="#" class="button small">Agregar</a></li>
                                    <li><a href="#" class="button small special">Quitar</a></li>
                                    <li><a href="#" class="button small">Nuevo</a></li>
                                </ul>
                            </div>
                            <div class="4u 6u(medium) 12u$(xsmall)">
                                <ul class="actions vertical">
                                     Rubro: <textarea name="rubros_em" id="rubros_em" placeholder="rubros" rows="8" disabled></textarea>
                                </ul>
                            </div>
                        </div><!--Fin Rubros-->
                    </form><!--Fin Form Datos de la Empresa-->
                </section>
                                  
                                  
            </div><!-- Fin class=container -->
        </div><!-- Fin class=wrapper stylele -->
        </div><!-- Fin class=page-wrapper -->
<!-- Scripts -->
    <script src="../resources/js/jquery.min.js"></script>
    <script src="../resources/js/jquery.scrolly.min.js"></script>//menuResponsable
    <script src="../resources/js/jquery.dropotron.min.js"></script>//menucmabios
    <script src="../resources/js/jquery.scrollex.min.js"></script>
    <script src="../resources/js/skel.min.js"></script>
    <script src="../resources/js/util.js"></script>
    <!--[if lte IE 8]><script src="../resources/js/ie/respond.min.js"></script><![endif]-->
    <script src="../resources/js/main.js"></script>

    </body>
</html>