<!DOCTYPE HTML>

<html>
    <head>  
	<title>Carga Establecimientos</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="../resources/images/favicon.ico">
	<!--[if lte IE 8]><script src="../resources/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="../resources/css/main.css" />
    <link rel="stylesheet" href="../resources/css/materialize.css" />
    
	<!--[if lte IE 9]><link rel="stylesheet" href="../resources/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="../resources/css/ie8.css" /><![endif]-->
    </head>
    <body style="background: #1c1d26;">    
        <div id="page-wrapper">

         	<div><?php
	
		include("header.php");
   			 ?></div>
        <!-- Main -->
        <div id="main" class="wrapper style1">
            <div class="container">
                <header class="major">
                        <h2>Consulta por RNE</h2>
                </header>            
            
            	<!-- Form : Buscar por RNA Empresa--> 
		<section>
        			<h4>RNE Empresa</h4>
                    <form method="post" action="#">
			<div class="row uniform 50%">
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="rnpa_em" id="rnpa_em" value="" />
                            </div>
                            <div class="6u$ 12u$(xsmall)">
				<input type="image" name="search" id="search" src="../resources/images/search.png" />
                            </div>
                        </div>
                    </form><!-- finForm_Buscar -->
                </section>
                <!-- Table -->
		<section>
                    <h4>Datos de la Empresa</h4>
                   <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
				<th>Nombre</th>
				<th>Razón Social </th>
				<th>Direccion</th>
                                <th>Email</th>
                                <th>Telefono</th>
                            </tr>
			</thead>
			<tbody>
                            <tr>
                                <td></td>
                                <td></td>
				<td></td>
                                <td></td>
                                <td></td>
                            </tr>
										
			</tbody>
                    </table>
                    </div>
                    <h4>Establecimientos Asociados</h4>
			<div class="table-wrapper">
                            <table>
				<thead>
                                    <tr>
					<th>No. RNE</th>
					<th>Nombre Establecimiento </th>
					<th>Telefono</th>
                                        <th>Vencimiento RNE</th>
                                        <th>Direccion</th>
                                    </tr>
				</thead>
				<tbody>
                                    <tr>
					<td></td>
					<td></td>
					<td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
				</tbody>
			</table>
			</div>
                        <h4>Producto Alimenticio Asociado</h4>
			<div class="table-wrapper">
                            <table>
				<thead>
                                    <tr>
					<th>No. RNPA</th>
                                            <th>No. RNE</th>
                                            <th>Nom. Producto</th>
                                            <th>Vencimiento RNPA</th>
                                            <th>Marca</th>
                                    </tr>
				</thead>
                                <tbody>
                                    <tr>
					<td></td>
					<td></td>
					<td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
			</table>
                    </div>
                </section>
                
                


            </div><!-- Fin class=container -->
        </div><!-- Fin class=wrapper stylele -->
        </div><!-- Fin class=page-wrapper -->
        <!-- Scripts -->
			<script src="../resources/js/jquery.min.js"></script>
			<script src="../resources/js/jquery.scrolly.min.js"></script>
			<script src="../resources/js/jquery.dropotron.min.js"></script>
			<script src="../resources/js/skel.min.js"></script>
			<script src="../resources/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../resources/js/main.js"></script>
            <script src="../resources/js/materialize.js"></script>
           	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
       


    </body>
</html>